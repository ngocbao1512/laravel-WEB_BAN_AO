<x-admin-lte>

  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Add Brand</p>
      </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
            <form method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group ">
                <div class="row">
                   <div class=" col-xs-12 col-sm-12">
                    <label for="name"><b>Product Name</b></label>
                    <input id="name" name="name" type="text" placeholder="Enter brand name" class="form-control validate  @error('name') is-invalid @enderror" />
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
              <div class="custom-file mb-5 @error('description') is-invalid @enderror">
              <label for="name" style="color: white;"><b>Description</b></label>
                <input
                  type="file"
                  name="description"
                  class="btn btn-primary btn-block mx-auto"
                />
                @error('description')
                  @if ($errors->has('description'))
                    <p style="color:yellow; font-size:12px; ">{{ $errors->first('description') }}</p>
                  @endif
                @enderror
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white">Add Brand</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@include('partials.active-product')

</x-admin-lte>