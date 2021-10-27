<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    protected $modelProduct;

    public function __construct(Product $product)
    {
        $this->modelProduct = $product;
    }


    public function index()
    {
        $products = $this->modelProduct
        ->with('brand','category')
        ->orderBy('id', 'DESC')
        ->paginate(config('product.paginate9'));
        
        
        $productcollection = new ProductCollection(
            $products,
        );

        return $this->ResponseSuccess("show database ", $productcollection);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
