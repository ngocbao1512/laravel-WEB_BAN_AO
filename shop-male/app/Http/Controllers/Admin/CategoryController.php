<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\RequestCategory;

class CategoryController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;
    
    public function __construct(Product $product, Category $category)
    {//dd('ok');
        $this->modelProduct = $product;
        $this->modelCategory = $category;
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
    public function store(RequestCategory $request)
    { 
        $data = $request->only([
            'name',
        ]);
        
        $data['user_id'] = auth()->id();
        
        try {
            $fileImg = $request->file('image');
           
            if ($fileImg) {
                $image_name = encodeImage($fileImg);
                $fileImg->move('storage/categories',$image_name);
                $data['image'] = $image_name;

            }
 
            $category = $this->modelCategory->create($data);

            return redirect()
            ->route('admin.categories.show', ['category' => $category->id])
            ->withSuccess('Add category success!');
            
       } catch (\Exception $e) {
         
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Add category failed. Please try again later!');
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
    public function update(RequestCategory $request, $id)
    {   
        $category = $this->modelCategory->findOrFail($id);

        $data = $request->only([
            'name',
            'image'
        ]);
        //dd($data);
        $data['user_id'] = auth()->id();
        
        try {
            $fileImg = $request->file('image');
           
            if ($fileImg) {
                $image_name = encodeImage($fileImg);
                $fileImg->move('storage/categories',$image_name);
                $data['image'] = $image_name;

            }

            $category->update($data);
           
            return redirect()
            ->route('admin.categories.show', ['category' => $category->id])
            ->withSuccess('Add category success!');
            
       } catch (\Exception $e) {
         
            \Log::error($e);

            return redirect()
               ->route('admin.products.index')
               ->withError('Add category failed. Please try again later!');
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
                ->route('admin.products.index')
                ->withError('Delete category failed. Please try again later!');
        } 
    }
}
