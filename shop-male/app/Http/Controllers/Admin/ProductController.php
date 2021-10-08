<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Product;
use App\Http\Controllers\Auth;


class ProductController extends Controller
{
    protected $modelProduct;
    

    public function __contruct(Product $product)
    {
        $this->modelProduct = $product;
        

    }
    
    public function index()
    {
        $user = auth()->user()->name;
        if ($this->modelProduct != null) 
        {
            $products = $this->modelProduct
            ->paginate(config('product.paginate8'));
            
            return view('my-admin.products.index', [
            'products' => $products,
            'user' => $user,
            ]);
        }
        return view('my-admin.products.index', [
            'user' => $user,
            ]);
        
    }

    
    public function create()
    {
        $user = auth()->user()->name;
        return view('my-admin.products.create',[
            'user' => $user,
            ]);
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
