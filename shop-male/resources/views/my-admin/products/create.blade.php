<x-admin-lte>
 
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Add Product</p>
      </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group ">
                <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                    <label for="name"><b>Product Name</b></label>
                    <input id="name" name="name" type="text" placeholder="Enter product name" class="form-control validate  @error('name') is-invalid @enderror" />
                    @error('name')
                      @if ($errors->has('name'))
                        <p style="color:yellow; font-size:12px; ">{{ $errors->first('name') }}</p>
                      @endif
                    @enderror
                   </div>
                 </div>
                </div>
                <hr>
                <div class="form-group">
                 <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                   <label for="category"><b>Category</b></label>
                    <select class="custom-select tm-select-accounts" name="category_id" id="category">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach 
                  </select>
                   </div>
                   <div class=" col-xs-12 col-sm-6">
                   <label for="brand"><b>Brand</b></label>
                    <select class="custom-select tm-select-accounts" name="brand_id" id="brand">
                    @foreach($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach 
                  </select>
                   </div>
                 </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="price"><b>Price</b></label>
                    <input id="price" name="price" type="text" placeholder="Enter price" class="form-control validate @error('price') is-invalid @enderror" />
                    @error('price')
                      @if ($errors->has('price'))
                        <p style="color:yellow; font-size:12px; ">{{ $errors->first('price') }}</p>
                      @endif
                    @enderror
                  </div>
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="sale_off"><b>Sale Off</b></label>
                    <input id="sale_off" name="sale_off" type="text" placeholder="Enter sale off" class="form-control validate @error('sale_off') is-invalid @enderror" />
                    @error('sale_off')
                      @if ($errors->has('sale_off'))
                        <p style="color:yellow; font-size:12px; ">{{ $errors->first('sale_off') }}</p>
                      @endif
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="form-group ">
                  <label for="description"><b>Description</b></label>
                  <textarea class="form-control validate @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Enter descreption"></textarea>
                  @error('description')
                    @if ($errors->has('description'))
                      <p style="color:yellow; font-size:12px; ">{{ $errors->first('description') }}</p>
                    @endif
                  @enderror
                </div>
                
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-dummy mx-auto">
                <img id="preview_image" src="#" alt="" style="max-width: 100%; height: 240px;"/>
              </div>
              <div class="custom-file mt-3 mb-3">
                <input
                  type="file"
                  name="image"
                  id="patient_pic"
                  class="btn btn-primary btn-block mx-auto"
                  value="UPLOAD PRODUCT IMAGE"
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
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white">Add Product</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@include('partials.active-product')

@include('partials.readFileImg')
</x-admin-lte>