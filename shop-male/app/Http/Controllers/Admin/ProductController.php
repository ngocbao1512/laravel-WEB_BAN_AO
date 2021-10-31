<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Size;
use App\Models\ProductImage;
use App\Http\Controllers\Auth;

class ProductController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;
    protected $modelBrand;
    protected $modelImage;
    protected $modelSize;

    public function __construct(
        Product $product,
        Category $categories,
        Brand $brand,  
        Image $image,
        ProductImage $productImage,
        Size $size
        )
    {
        $this->modelProduct = $product;
        $this->modelCategory = $categories;
        $this->modelBrand = $brand;
        $this->modelImage = $image;
        $this->modelSize = $size;
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
            'category_id',
            'brand_id',
            'description',
            'price',
            'sale_off',
            'is_public',
        ]);
        $data['category_id'] = (int) $data['category_id'];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();

        $quantity = 0;

        // xử lý size lấy quantity 
        $quantitySize = mergeTwoArray($request->arrsize, $request->arrquantity);
        $quantity = sumOfArr($quantitySize);

        $data['quantity'] = $quantity;

        
        try {
            // create table product 
            $newProduct = $this->modelProduct->create($data);

            // create table image 
            $files = $request->file();
            if ($files) {
                foreach($files as $file)
                {
                    $image_name = encodeImage($file);
                    $file->move('storage/products',$image_name);
                    $data_image['name'] = $image_name;
                    $new_image = $this->modelImage->create($data_image);

                    // create table productimage 
                   $newProduct->images()->save($new_image);
                }
            }
    
           // dd($quantitySize);
            // create table size 
            foreach($quantitySize as $key => $size)
            {
                $datasize['name'] = $key;
                $datasize['quantity'] = (int)$size;
                $newSize = $this->modelSize->create($datasize);

                // create table productsize 
                $newProduct->sizes()->save($newSize);
            }


            return redirect()
            ->route('admin.products.show', ['product' => $newProduct->id])
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
        $oldimg = $product->images->toArray();
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
        
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();

        $quantitySize = mergeTwoArray($request->arrsize, $request->arrquantity);
        $quantity = sumOfArr($quantitySize);

        $data['quantity'] = $quantity;
        
        try {
            $product->update($data);

            // update table image 
            $files = $request->file();
            

            foreach($files as $key => $file)
            {
                if($key == "image1")
                {
                    if(count($oldimg) > 0)
                    {
                        // update image 
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $old_image = $this->modelImage->findOrFail($oldimg[0]['id']);
                        $old_image->update($data_image);
                    }else {
                        //store image
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $new_image = $this->modelImage->create($data_image); 

                        // create table product image 
                        $product->images()->save($new_image);
                    }
                }

                if($key == "image2")
                {
                    if(count($oldimg) > 1)
                    {
                        // update image 
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $old_image = $this->modelImage->findOrFail($oldimg[1]['id']);
                        $old_image->update($data_image);
                        
                    }else {
                        //store image
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $new_image = $this->modelImage->create($data_image); 

                        // create table product image 
                        $product->images()->save($new_image);
                    }
                }

                if($key == "image3")
                {
                    if(count($oldimg) > 2)
                    {
                        // update image 
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $old_image = $this->modelImage->findOrFail($oldimg[2]['id']);
                        $old_image->update($data_image);
                    }else {
                        //store image
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $new_image = $this->modelImage->create($data_image); 
                        // create table product image 
                        $product->images()->save($new_image);
                    }
                }

                if($key == "image4")
                {
                    if(count($oldimg) > 3)
                    {
                        // update image 
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $old_image = $this->modelImage->findOrFail($oldimg[3]['id']);
                        $old_image->update($data_image);
                    }else {
                        //store image
                        $image_name = encodeImage($file);
                        $file->move('storage/products',$image_name);
                        $data_image['name'] = $image_name;
                        $new_image = $this->modelImage->create($data_image); 
                        // create table product image 
                        $product->images()->save($new_image);
                    }
                }
            }
                
            // delete size of old product 
            foreach($product->sizes as $key => $size)
            {
                $size->delete();
                $product->sizes()->delete($size);
            }

            // update table size 
            foreach($quantitySize as $key => $size)
            {
                $datasize['name'] = $key;
                $datasize['quantity'] = (int)$size;
                $newSize = $this->modelSize->create($datasize);

                // create table productsize 
                $product->sizes()->save($newSize);
            }

            return redirect()
            ->route('admin.products.show', ['product' => $product->id])
            ->withSuccess('Edit product success!');
            
        } catch (\Exception $e) {
         
             \Log::error($e);

             return redirect()
                 ->route('admin.products.index')
                 ->withError('Edit product failed. Please try again later!');
         } 
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
