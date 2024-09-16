<?php

namespace App\Http\Controllers\Admin;

use App\Models\DiscountCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountCodeRequest;
use App\Http\Requests\UpdateDiscountCodeRequest;

class DiscountCodeController extends Controller
{
    const PATH_VIEW = 'admin.discount_codes.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DiscountCode::latest('id')->get();
        // dd($data);
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
    public function store(StoreDiscountCodeRequest $request)
    {
        // dd($request->all());

        DiscountCode::create($request->all());

        return response()->json([
            'success' => true,
            'reload' => true,
            'message' => 'Thêm thành công'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DiscountCode $discount_code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiscountCode $discount_code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountCodeRequest $request, DiscountCode $discount_code)
    {
        $discount_code->update($request->all());

        return response()->json([
            'success' => true,
            // 'reload' => true,
            'message' => 'Cập nhật thành công'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscountCode $discount_code)
    {
        $discount_code->delete();

        return response()->json([
            'success' => true,
            'reload' => true,
            'data' => $discount_code,
            'message' => 'Xóa thành công'
        ], 200);
    }
}
