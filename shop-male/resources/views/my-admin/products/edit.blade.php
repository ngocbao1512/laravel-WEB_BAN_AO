<x-admin-lte>
 
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Edit Product</p>
            </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
            <form method="POST" action="{{ route('admin.products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group ">
                <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                   <label for="name"><b>Product Name</b></label>
                  <input id="name" name="name" type="text" value="{{ $product->name }}" class="form-control validate" />
                   </div>
                 </div>
                </div>
                <hr>
                <div class="form-group">
                 <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                   <label for="category"><b>Category</b></label>
                   <select class="custom-select tm-select-accounts" name="category_id" id="category">
                    <option  value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                      @foreach($categories as $category)
                      <option  value="{{ $category->id }}" >{{ $category->name }}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class=" col-xs-12 col-sm-6">
                   <label for="brand"><b>Brand</b></label>
                   <select class="custom-select tm-select-accounts" name="brand_id" id="brand">
                    <option  value="{{ $product->brand->id }}">{{ $product->brand->name }}</option>
                      @foreach($brands as $brand)
                      <option  value="{{ $brand->id }}" >{{ $brand->name }}</option>
                      @endforeach
                    </select>
                   </div>
                 </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="price"><b>Price</b></label>
                    <input id="price" name="price" type="text" value="{{ $product->price }}" class="form-control validate" />
                  </div>
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="sale_off"><b>Sale Of</b></label>
                    <input id="sale_off" name="sale_off" type="text" value="{{ $product->sale_off }}" class="form-control validate" />
                  </div>
                </div>
                <hr>
                <div class="form-group ">
                  <label for="description"><b>Description</b></label>
                  <textarea class="form-control validate" name="description" rows="3">{{ $product->description }}</textarea>
                </div>
                
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-dummy mx-auto">
                <i
                  class="fas fa-cloud-upload-alt tm-upload-icon"
                  onclick="document.getElementById('fileInput').click();"
                ></i>
              </div>
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" type="file" style="display:none;" name="image" />
                <input
                  type="button"
                  class="btn btn-primary btn-block mx-auto"
                  value="UPLOAD PRODUCT IMAGE"
                  onclick="document.getElementById('fileInput').click();"
                />
              </div>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <div class="form-check">
                <input name="is_public" class="form-check-input" type="checkbox" value="1">
                <label class="form-check-label">
                  <b>Public</b>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white">Edit Product</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('partials.active-product');

</x-admin-lte>