<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductSize;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;

class ProductSizeController extends Controller
{
    const PATH_VIEW = 'admin.sizes.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductSize::latest('id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
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
    public function store(StoreProductSizeRequest $request)
    {
        // dd($request->all());

        ProductSize::create($request->all());

        return response()->json([
            'success' => true,
            'reload' => true,
            'data' => null,
            'message' => 'Thêm mới thành công',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSize $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSize $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSizeRequest $request, ProductSize $size)
    {
        $size->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công',
            'data' => $size,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSize $size)
    {
        $size->delete();

        return response()->json([
            'success' => true,
            'reload' => true,
            'data' => $size,
            'message' => 'Xóa thành công'
        ], 200);
    }
}
