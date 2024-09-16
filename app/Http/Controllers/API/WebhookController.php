<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WebhookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Token bí mật của bạn
        $secretToken = 'asfagagagagagag';

        // Lấy token từ header
        // $receivedToken = $request->header('secure-token');

        // // Kiểm tra nếu token không khớp
        // if ($secretToken !== $receivedToken) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        // Xử lý dữ liệu từ webhook
        $data = $request->all();
        // Đường dẫn đến file log riêng
        $logFilePath = storage_path('logs/webhook.log');

        // Ghi dữ liệu vào file log
        File::append($logFilePath, now()->toDateTimeString() . ' ' . json_encode($data) . PHP_EOL);

        // Đáp lại webhook để xác nhận đã nhận dữ liệu
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
