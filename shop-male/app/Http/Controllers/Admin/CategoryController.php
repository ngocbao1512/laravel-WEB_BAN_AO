<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Http\Requests\RequestBasic;

class CategoryController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;
    protected $modelImage;
    
    public function __construct(Product $product, Category $categories,   Image $image)
    {
        $this->modelProduct = $product;
        $this->modelCategory = $categories;
        $this->modelImage = $image;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->name;
        $categories = $this->modelCategory->get();
        return view('my-admin.categories.create',[
            'user' => $user,
            'categories' => $categories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBasic $request)
    { dd('ok');
        $data = $request->only([
            'name',
        ]);
        
        $data['user_id'] = auth()->id();
        
        try {
            $category = $this->modelCategory->create($data);

            $file = $request->file('image');
            ($file);
            if ($file) {
                $file->store('public/images');
                /* create table image */
                $imageInput['name'] = $file->hashName();
                $newImage = $this->modelImage->create($imageInput);
            }
           
            return redirect()
            ->route('admin.categories.show', ['category' => $category->id])
            ->withSuccess('Add category success!');
            
        } catch (\Exception $e) {
         
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Add product failed. Please try again later!');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->modelCategory->findOrFail($id);
        $products = $category->products()->get();

        return view('my-admin.categories.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->modelCategory->findOrFail($id);
        
        return view('my-admin.categories.edit',[
            'category' => $category,
        ]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestBasic $request, $id)
    { dd('ok');
        $data = $request->only([
            'name',
        ]);
        
        $data['user_id'] = auth()->id();
        
        try {
            $category = $this->modelCategory->update($data);

            $file = $request->file('image');

            if ($file) {
                $file->store('public/images');
                /* create table image */
                $imageInput['name'] = $file->hashName();
                $newImage = $this->modelImage->update($imageInput);
            }
           
            return redirect()
            ->route('admin.categories.show', ['category' => $category->id])
            ->withSuccess('Add category success!');
            
        } catch (\Exception $e) {
         
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Add product failed. Please try again later!');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->modelCategory->findOrFail($id);
        //dd($category);
        
        try {
            $category->delete();

            return redirect()
                ->route('admin.products.index')
                ->withSuccess('Delete success!');

        } catch (\Exception $e) {
            
            \Log::error($e);

            return redirect()
                ->route('admin.categories.index')
                ->withError('Delete failed. Please try again later!');
        } 
    }
}
