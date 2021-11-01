<x-admin-lte>
 
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">

      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px" >Add Product</p>
      </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
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
              <div class="row">
                <div class="mx-auto col-xl-3 col-lg-3 ">
                  <div class="tm-product-img-dummy">
                  <img id="preview_image1" src="#" alt="" style="max-width: 100%; max-height: 100%;"/>
                  </div>
                  <div class="input-group mb-3">
                    <input
                      type="file"
                      name="image1"
                      id="patient_pic1"
                      class="btn btn-primary btn-block mx-auto " style="background-color : transparent;"
                    />
                  </div>
                </div>

                <div class="mx-auto col-xl-3 col-lg-3 ">
                  <div class="tm-product-img-dummy">
                  <img id="preview_image2" src="#" alt="" style="max-width: 100%; max-height: 100%;"/>
                  </div>
                  <div class="input-group mb-3">
                    <input
                      type="file"
                      name="image2"
                      id="patient_pic2"
                      class="btn btn-primary btn-block mx-auto " style="background-color : transparent;"
                    />
                  </div>
                </div>

                <div class="mx-auto col-xl-3 col-lg-3 ">
                  <div class="tm-product-img-dummy">
                  <img id="preview_image3" src="#" alt="" style="max-width: 100%; max-height: 100%;"/>
                  </div>
                  <div class="input-group mb-3">
                    <input
                      type="file"
                      name="image3"
                      id="patient_pic3"
                      class="btn btn-primary btn-block mx-auto " style="background-color : transparent;"
                    />
                  </div>
                </div>

                <div class="mx-auto col-xl-3 col-lg-3 ">
                  <div class="tm-product-img-dummy">
                  <img id="preview_image4" src="#" alt="" style="max-width: 100%; max-height: 100%;"/>
                  </div>
                  <div class="input-group mb-3">
                    <input
                      type="file"
                      name="image4"
                      id="patient_pic4"
                      class="btn btn-primary btn-block mx-auto " style="background-color : transparent;"
                    />
                  </div>
                </div>
                
                
              </div>
              
              <hr>
              <div class="row mx-auto">
                <div class="row " id="add-more-collumn-size">
                  <input type="text" name="size" class="col-5 form-control getsize" placeholder="Enter size" contenteditable style="margin-right: 2px; ">
                  <input type="text" name="quantity-size" class="col-5 form-control quantitysize" placeholder="Enter quantity size" contenteditable style="margin-left: 2px;" >
                </div>
                <div class="row">
                  <a type="button" class="btn btn-primary col-4 add-more-input" style="margin-left: 10px; background-color: transparent; color:white">+</a>
                  <a type="button" class="btn btn-primary col-4 test" style="margin-left: 10px; background-color: transparent; color:white">save</a>
    
                </div>
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
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white" id="sendrequest">Add Product</button>
            </div>
            
          </div>
        </div>
</form>

      </div>
    
    </div>
 
  </div>
  
@include('partials.active-product')

@include('partials.readFileImg')

@include('partials.add-image')

@include('partials.show-name-image')

@section('addInput')
<script>
  $(document).ready(function() {
      $('.add-more-input').click(function() {
        var add = '<input type="text" name="size" class="col-5 form-control getsize" placeholder="Enter size" contenteditable style="margin-right: 2px;">'
        +  '<input type="text" name="quantity-size" class="col-5 form-control quantitysize" placeholder="Enter quantity size" contenteditable style="margin-left: 2px;" >';
        $("#add-more-collumn-size").append(add);
      });
    
      /* get value size to string then stick it to value an hidden input */
      $('.test').click(function() {
        var size = $("input[name^='size']");
        var quantitySize = $("input[name^='quantity-size']");
        var n = $("input[name^= 'size']").length;
        var valuesize = ""
        var valuequantity = ""
        
        for(i=0;i<n;i++)
        {
          valuesize += size.eq(i).val() + "|"

          valuequantity += quantitySize.eq(i).val() + "|"

        }

        var size = document.createElement('input')
        var quantity = document.createElement('input')
        
        size.setAttribute('name', 'arrsize')
        size.setAttribute('type', 'text')
        size.style.display = "none"
        size.value = valuesize

        quantity.setAttribute('name', 'arrquantity')
        quantity.setAttribute('type', 'text')
        quantity.style.display = "none"
        quantity.value = valuequantity



        var button = document.getElementById('sendrequest')

        button.appendChild(size)
        button.appendChild(quantity)


      });

  });
</script> 
@endsection



</x-admin-lte>