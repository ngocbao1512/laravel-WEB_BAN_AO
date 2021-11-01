<x-admin-lte>
  <form method="POST" action="{{ route('admin.categories.update',['category' => $category->id]) }}" enctype="multipart/form-data">
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="float-center">
          <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Edit Category</p>
        </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-Category-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              @method('PATCH')
              @csrf
              <div class="form-group ">
                <div class="row">
                  <div class=" col-xs-12 col-sm-12">
                    <label for="name"><b>Category Name</b></label>
                    <input id="name" name="name" type="text" value="{{ $category->name }}" class="form-control validate @error('name') is-invalid @enderror" />
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
              <img id="preview_image" src="{{ showImage('categories', $category->image) }}" alt="" style="max-width: 100%; height: 150px;"/>
              </div>
              <div class="input-group mb-3">
                <button class="btn btn-primary click-upload-image" type="button">Upload Image</button>
                <div type="text" class="form-control show-name-image">{{ $category->image }}</div>
              </div>
              <div class="custom-file mt-3 mb-3 @error('image') is-invalid @enderror">
                <input
                  type="file"
                  name="image"
                  id="patient_pic"
                  class="btn btn-primary btn-block mx-auto upload-image"
                />
                @error('image')
                  @if ($errors->has('image'))
                    <p style="color:yellow; font-size:12px; ">{{ $errors->first('image') }}</p>
                  @endif
                @enderror
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white">Edit Category</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('partials.active-product')

@include('partials.readFileImg')

@include('partials.add-image')

@include('partials.show-name-image')
</form>

</x-admin-lte>