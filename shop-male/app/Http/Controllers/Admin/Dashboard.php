<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Http\Resources\ProductCollection;

class Dashboard extends Controller
{
    protected $modelProduct;

    public function __construct(
        Product $product
    )
    {
        $this->modelProduct = $product;
    }

    public function __invoke(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        return view('my-admin.home-page');
    }
}
