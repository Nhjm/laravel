<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logFilePath = storage_path('logs/webhook.log');

        if (File::exists($logFilePath)) {
            $logs = File::lines($logFilePath)
                ->map(function ($line) {
                    return $this->parseLogLine($line);
                })
                ->filter()
                ->flatten(1) // Flatten mảng 2 chiều thành mảng 1 chiều
                ->values();

            return response()->json([
                'status' => 'success',
                'data' => $logs
            ],200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Log file not found.'
        ], 404);
    }
    /**
     * Hàm để phân tích một dòng log và trích xuất thông tin cần thiết.
     *
     * @param string $line
     * @return array|null
     */
    private function parseLogLine($line)
    {

        // Kiểm tra xem dòng log có chứa dữ liệu JSON không
        if (preg_match('/\{.*\}/', $line, $matches)) {
            // Giải mã chuỗi JSON
            $json = json_decode($matches[0], true);

            if (isset($json['data']) && is_array($json['data'])) {
                // Lọc dữ liệu để chỉ lấy 'amount' và 'description'
                return array_map(function ($item) {
                    $TIM_KIEM = 'DH';
                    $pattern = '/' . $TIM_KIEM . '(\S+)/i';
                    preg_match($pattern, $item['description'], $matches);

                    return [
                        'amount' => $item['amount'] ?? null,
                        'order_id' => $matches[1] ?? null,
                    ];
                }, $json['data']);
            }
        }

        // Trả về null nếu không tìm thấy dữ liệu hoặc không phải là định dạng mong muốn
        return null;
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
