<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function check_discount_code($name)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        return DiscountCode::where('name', $name)
            ->where(function ($query) {
                $query->where('limit', '>', 0)->orWhere('limit', null);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('start')->orWhere('start', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('end')->orWhere('end', '>=', $now);
            })
            ->where('is_active', true)
            ->first();
    }
}
