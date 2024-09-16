<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;
use App\Models\ProductVariant;

class CatalogueController extends Controller
{
    const PATH_VIEW = 'admin.catalogues.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogues = Catalogue::with('children')->whereNull('catalogue_id')->latest('id')->get();
        // $catalogues = $this->getCategoriesWithLevel();
        // dd(Catalogue::find(7)->parent);
        $data = Catalogue::with('parent')->latest('id')->get();
        // dd($data);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogueRequest $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active ?? 0,
            'catalogue_id' => $request->catalogue_id
        ];
        // dd($data);
        Catalogue::create($data);

        return response()->json([
            'success' => true,
            'reload' => true,
            'message' => 'Thêm mới thành công',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalogue $catalogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalogue $catalogue)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogueRequest $request, Catalogue $catalogue)
    {
        // dd($request->all());
        $catalogue->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công',
            'data' => $catalogue,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalogue $catalogue)
    {
        // dd($catalogue->products);
        // dd(ProductVariant::with('cart_items')->findOrFail(13));

        try {
            DB::beginTransaction();

            foreach ($catalogue->children as $children) {
                $children->catalogue_id = null;
                $children->save();
            }

            foreach ($catalogue->products as $product) {
                if ($product->image && Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }

                foreach ($product->galleries as $gallery) {
                    if ($gallery->image && Storage::exists($gallery->image)) {
                        Storage::delete($gallery->image);
                    }
                }

                // dd($product->variants);

                foreach ($product->variants as $variant) {
                    if ($variant->image && Storage::exists($variant->image)) {
                        Storage::delete($variant->image);
                    }

                    foreach ($variant->order_items as $order_item) {
                        $order_item->product_variant_id = null;
                        $order_item->save();
                    }

                    foreach ($variant->cart_items as $cart_item) {
                        $cart_item->product_variant_id = null;
                        $cart_item->save();
                    }
                }

                $product->galleries()->delete();
                $product->variants()->delete();
                $product->delete();
            }

            $catalogue->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'reload' => true,
                'data' => null,
                'message' => 'Xóa thành công'
            ], 200);
            // return back()->with('success', 'Xóa thành công');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }


}
