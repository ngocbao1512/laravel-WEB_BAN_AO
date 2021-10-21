<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Http\Requests\RequestBrand;

class BrandController extends Controller
{
    protected $modelProduct;
    protected $modelBrand;
    
    public function __construct(Product $product, Brand $brand)
    {//dd('ok');
        $this->modelProduct = $product;
        $this->modelBrand = $brand;
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
        $brands = $this->modelBrand->get();
        return view('my-admin.brands.create',[
            'user' => $user,
            'brands' => $brands,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBrand $request)
    { 
        $data = $request->only([
            'name',
            'description',
        ]);
        
        $data['user_id'] = auth()->id();
        
        try {
            $getFile = $request->file('description');
            //dd( $get_file);
            if ($getFile) {
                $getName = $getFile->getClientOriginalName();
                $nameFile = current(explode('.', $getName));
                $newFile =  $nameFile . '_' . rand(1,99) . '.' . $getFile->getClientOriginalExtension();
                $getFile->move('storage/files', $newFile);
                $data['description'] = $newFile;
            }
            $brand = $this->modelBrand->create($data);
            //dd($brand);
            return redirect()
            ->route('admin.brands.show', ['brand' => $brand->id])
            ->withSuccess('Add brand success!');
            
       } catch (\Exception $e) {
         
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Add brand failed. Please try again later!');
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
        $brand = $this->modelBrand->findOrFail($id);
        $products = $brand->products()->get();

        return view('my-admin.brands.show', [
            'brand' => $brand,
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
        $brand = $this->modelBrand->findOrFail($id);
        
        return view('my-admin.brands.edit',[
            'brand' => $brand,
        ]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestBrand $request, $id)
    {   
        $brand = $this->modelBrand->findOrFail($id);

        $data = $request->only([
            'name',
            'description'
        ]);
        //dd($data);
        $data['user_id'] = auth()->id();
        
        try {

            $brand->update($data);
           
            return redirect()
            ->route('admin.brands.show', ['brand' => $brand->id])
            ->withSuccess('Add brand success!');
            
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
        $brand = $this->modelBrand->findOrFail($id);
        //dd($brand);
        
        try {
            $brand->delete();

            return redirect()
                ->route('admin.products.index')
                ->withSuccess('Delete success!');

        } catch (\Exception $e) {
            
            \Log::error($e);

            return redirect()
                ->route('admin.products.index')
                ->withError('Delete brand failed. Please try again later!');
        } 
    }
}
