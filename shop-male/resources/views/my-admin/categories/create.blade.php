<x-admin-lte>
 
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Add Category</p>
      </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
            <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group ">
                <div class="row">
                   <div class=" col-xs-12 col-sm-12">
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
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white">Add Category</button>
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