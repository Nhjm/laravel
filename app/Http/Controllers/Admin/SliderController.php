<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    const PATH_VIEW = "admin.sliders.";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slide::latest('id')->get();

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
    public function store(Request $request)
    {
        // dd($request->all());

        foreach ($request->images as $image) {
            Slide::create([
                'image' => Storage::put('sliders', $image)
            ]);
        }

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
    public function show(Slide $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slider)
    {
        $slider->delete();

        if ($slider->image && Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }

        return response()->json([
            'success' => true,
            // 'reload' => true,
            'data' => $slider,
            'message' => 'Xóa thành công',
        ], 200);
    }
}
