<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;
use App\Models\ProductImage;
use App\Http\Controllers\Auth;

class ProductController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;
    protected $modelBrand;
    protected $modelImage;
    protected $modelProductImage;

    public function __construct(Product $product, Category $categories, Brand $brand,  Image $image, ProductImage $productImage)
    {
        $this->modelProduct = $product;
        $this->modelCategory = $categories;
        $this->modelBrand = $brand;
        $this->modelImage = $image;
        $this->modelImage = $productImage;
    }
    
    public function index()
    {
        $user = auth()->user()->name;
        if ($this->modelProduct != null) 
        {   $categories = $this->modelCategory->get();
            $brands = $this->modelBrand->get();
            $products = $this->modelProduct
            ->paginate(config('product.paginate8'));
            
            return view('my-admin.products.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
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
        $products = $this->modelProduct->get();
        $categories = $this->modelCategory->get();
        $brands = $this->modelBrand->get();
        return view('my-admin.products.create',[
            'user' => $user,
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            ]);
    }

    
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'user_id',
            'category_id',
            'brand_id',
            'description',
            'price',
            'quantity',
            'sale_off',
            'is_public',
        ]);
        dd($request);
        $data['category_id'] = (int) $data['category_id'];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();
       
        
        try {
            $newProduct = $this->modelProduct->create($data);


            return redirect()
            ->route('admin.products.show', ['product' => $product->id])
            ->withSuccess('Add product success!');
            
        } catch (\Exception $e) {
         
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Add product failed. Please try again later!');
        } 
    }

    
    public function show($id)
    {
        $product = $this->modelProduct->findOrFail($id);
        $imageProduct = $product->images()->get();
        //dd($imageProduct);
        $image = $this->modelImage->get();
        return view('my-admin.products.show', [
            'product' => $product,
            'imageProduct' => $imageProduct,
        ]);
    }

    
    public function edit($id)
    {
        $categories = $this->modelCategory->get();
        $brands = $this->modelBrand->get();
        $product = $this->modelProduct->findOrFail($id);
        // dd($product);
        return view('my-admin.products.edit',[
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
        ]);     
    }

    
    public function update(Request $request, $id)
    {
        $product = $this->modelProduct->findOrFail($id);
        //dd($product);
        $data = $request->only([
            'name',
            'user_id',
            'category_id',
            'brand_id',
            'description',
            'price',
            'quantity',
            'sale_off',
            'is_public',
        ]);
        //dd($data);
        
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();
      //  dd($data);
        
        //try {
            $product->update($data);

            // $fileImg = $request->file('image');
           
            // if ($fileImg) {
            //     $fileImg->store('public/products');
            //     $data['image'] = $fileImg->hashName();
            // }
            return redirect()
            ->route('admin.products.show', ['product' => $product->id])
            ->withSuccess('Edit product success!');
            //dd($product);
            
        // } catch (\Exception $e) {
         
        //     \Log::error($e);

        //     return redirect()
        //         ->route('admin.products.index')
        //         ->withError('Edit product failed. Please try again later!');
        // } 
    }

    
    public function destroy ($id)
    {
        $product = $this->modelProduct->findOrFail($id);
        //dd($product);
        
        try {
            $product->delete();

            return redirect()
                ->route('admin.products.index')
                ->withSuccess('Delete success!');

        } catch (\Exception $e) {
            
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Delete product failed. Please try again later!');
        } 
    }
}
