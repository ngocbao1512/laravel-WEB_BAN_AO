<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;


class BrandController extends Controller
{
    protected $modelProduct;
    protected $modelBrand;
    

    public function __construct(Product $product, Brand $brand)
    {
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //dd($product);
        return view('my-admin.brands.show', [
            'brand' => $brand,
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
        $products = $this->modelProduct->get();
        // dd($product);
        return view('my-admin.brands.edit',[
            'products' => $products,
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
    public function update(Request $request, $id)
    {
        //
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
        //dd($product);
        
        try {
            $brand->delete();

            return redirect()
                ->route('admin.brands.index')
                ->withSuccess('Delete success!');

        } catch (\Exception $e) {
            
            \Log::error($e);

            return redirect()
                ->route('admin.brands.index')
                ->withError('Delete failed. Please try again later!');
        } 
    }
}
