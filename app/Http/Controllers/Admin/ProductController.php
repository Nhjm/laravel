<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Catalogue;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $catalogues = Catalogue::get()->filter(function ($catalogue) {
        //     return $catalogue->is_active == true;
        // })->pluck('name', 'id')->toArray();

        $catalogues = Catalogue::with('children')
            ->whereNull('catalogue_id')
            ->latest('id')
            ->get()->filter(function ($catalogue) {
                return $catalogue->is_active == true;
            });

        $sizes = ProductSize::all()->pluck('name', 'id')->toArray();

        $colors = ProductColor::all();

        return view(
            self::PATH_VIEW . __FUNCTION__,
            compact(
                'catalogues',
                'sizes',
                'colors'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        list(
            $data_products,
            $data_product_variants,
            $data_product_galleries,
            $all_images_new
        ) = $this->handle_data($request);

        try {
            DB::beginTransaction();

            $product = Product::create($data_products);

            foreach ($data_product_variants as $variant) {
                $variant += ['product_id' => $product->id];

                ProductVariant::create($variant);
            }

            foreach ($data_product_galleries as $gallery) {
                $gallery += ['product_id' => $product->id];

                ProductGallery::create($gallery);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'back' => route('admin.products.index'),
                'message' => 'Thêm mới thành công',
            ], 201);

        } catch (\Throwable $th) {
            DB::rollback();

            foreach ($all_images_new as $image) {
                if ($image && Storage::exists($image)) {
                    Storage::delete($image);
                }
            }

            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $catalogues = Catalogue::with('children')
            ->whereNull('catalogue_id')
            ->where('is_active', true)
            ->latest('id')
            ->get();

        $sizes = ProductSize::all()->pluck('name', 'id')->toArray();

        $colors = ProductColor::all()->pluck('name', 'id')->toArray();

        $product->load(['catalogue', 'variants.color', 'variants.size', 'galleries']);
        // return 1;

        return view(
            self::PATH_VIEW . __FUNCTION__,
            compact(
                'catalogues',
                'sizes',
                'colors',
                'product'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->all());
        list(
            $data_products,
            $data_product_variants,
            $data_product_galleries,
            $all_images_new
        ) = $this->handle_data($request);

        $product->load('variants', 'galleries');

        // dd($data_products['product_galleries_old']);


        try {
            DB::beginTransaction();

            $all_images_delete = [];

            if ($product->image && $request->image && Storage::exists($product->image)) {
                $all_images_delete[] = $product->image;
            }

            $product->update($data_products);

            foreach ($data_product_variants as $variant) {

                $product_variants = $product->variants()->where([
                    'product_size_id' => $variant['product_size_id'],
                    'product_color_id' => $variant['product_color_id'],
                ])->first();

                if ($product_variants && $product_variants->image && $variant['image'] && Storage::exists($product_variants->image)) {
                    $all_images_delete[] = $product_variants->image;
                }

                $product->variants()->updateOrCreate(
                    [
                        'product_size_id' => $variant['product_size_id'],
                        'product_color_id' => $variant['product_color_id'],

                    ],
                    array_filter([
                        'quantity' => $variant['quantity'],
                        'image' => $variant['image'] ?? null
                    ])
                );

            }

            if (!empty($data_products['product_galleries_old'])) {
                foreach ($product->galleries as $gallery) {
                    if (!in_array($gallery->image, $data_products['product_galleries_old'])) {
                        $all_images_delete[] = $gallery->image;
                        $product->galleries()->where('image', $gallery->image)->delete();
                    }
                }
            } else {
                $product->galleries()->each(function ($gallery) use (&$all_images_delete) {
                    if (Storage::exists($gallery->image)) {
                        $all_images_delete[] = $gallery->image;
                    }
                });
                $product->galleries()->delete();
            }

            foreach ($data_product_galleries as $gallery) {

                $product->galleries()->create([
                    'image' => $gallery['image']
                ]);

            }

            DB::commit();

            foreach ($all_images_delete as $image) {
                if ($image && Storage::exists($image)) {
                    Storage::delete($image);
                }
            }

            return response()->json([
                'success' => true,
                'reload' => true,
                'data' => null,
                'message' => 'Cập nhật thành công',
            ]);

        } catch (\Throwable $th) {
            foreach ($all_images_new as $image) {
                if ($image && Storage::exists($image)) {
                    Storage::delete($image);
                }
            }

            DB::rollback();
            return $th->getMessage();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {


        // dd($product);
        try {

            DB::transaction(function () use ($product) {

                if ($product->image && Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }

                $product->galleries()->each(function ($gallery) {
                    if ($gallery->image && Storage::exists($gallery->image)) {
                        Storage::delete($gallery->image);
                    }
                });

                $product->variants()->each(function ($variant) {
                    if ($variant->image && Storage::exists($variant->image)) {
                        Storage::delete($variant->image);
                    }
                });

                $product->galleries()->delete();
                $product->variants()->delete();
                $product->delete();

            }, 3);

            return response()->json([
                'success' => true,
                'reload' => true,
                // 'reload' => route('admin.products.index'),\
                'data' => null,
                'message' => 'Xóa thành công',
            ], 200);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    private function handle_data($request)
    {
        // dd($request);
        $all_images_new = [];

        $data_products = $request->except('product_variants', 'image', 'product_galleries');
        $data_products['is_active'] ??= 0;
        $data_products['slug'] = Str::slug($data_products['name'] . '-' . $data_products['sku']);

        if ($request->hasFile('image')) {
            $data_products['image'] = Storage::put('products', $request->file('image'));
            $all_images_new[] = $data_products['image'];
        }

        $data_product_variants_tmp = $request->product_variants ?? [];
        $data_product_variants = [];
        foreach ($data_product_variants_tmp as $key => $item) {
            $tmp = explode('-', $key);

            $data_product_variants[] = [
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
                'quantity' => $item['quantity'],
                'image' => !empty($item['image']) ? Storage::put('products', $item['image']) : null
            ];

            $all_images_new[] = $data_product_variants[count($data_product_variants) - 1]['image'];
        }
        $data_product_galleries_tmp = $request->product_galleries ?? [];
        $data_product_galleries = [];
        foreach ($data_product_galleries_tmp as $image) {
            if (!empty($image)) {
                $data_product_galleries[] = [
                    'image' => Storage::put('products', $image)
                ];

                $all_images_new[] = $data_product_galleries[count($data_product_galleries) - 1]['image'];
            }
        }

        return [
            $data_products,
            $data_product_variants,
            $data_product_galleries,
            $all_images_new
        ];
    }
}
