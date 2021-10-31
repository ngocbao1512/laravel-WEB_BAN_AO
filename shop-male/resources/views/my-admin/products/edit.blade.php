<x-admin-lte>
 
  <form method="POST" action="{{ route('admin.products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Edit Product</p>
            </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
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
            {{-- get data image --}}
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="row" id="data-image">
                <script>
                  var countimg = 0
                </script>

                @foreach ($product->images as $key => $image)
                  <div class="mx-auto col-xl-3 col-lg-3 ">
                    <div class="tm-product-img-dummy">
                    <img id="<?php echo("preview_image".($key+1)) ?>" src="{{showImage('products',$image->name)}}" alt="" style="max-width: 100%; max-height: 100%;"/>
                    </div>
                    <div class="input-group mb-3">
                      <input
                        type="file"
                        name="<?php echo("image".($key+1)) ?>"
                        id="<?php echo("patient_pic".($key+1)) ?>"
                        class="btn btn-primary btn-block mx-auto " style="background-color : transparent;"
                      />
                    </div>
                  </div>
                  <script>
                    countimg++
                  </script>
                @endforeach

                <script>
                  console.log(countimg)
                  const numberimageneedcreatemore = 4 - countimg
                  console.log(numberimageneedcreatemore)
                  const rootimg = document.getElementById('data-image')
                  for(var i = 1; i <= numberimageneedcreatemore; i ++)
                  {
                    const div1 = document.createElement('div')
                    div1.setAttribute('class','mx-auto col-xl-3 col-lg-3')
                    const div2 = document.createElement('div')
                    div2.setAttribute('class','tm-product-img-dummy')
                    var idpreview = 4 - numberimageneedcreatemore + i
                    var imgpreview = document.createElement("IMG");
                    imgpreview.setAttribute('id','preview_image'+idpreview)
                    imgpreview.setAttribute('style','max-width: 100%; max-height: 100%;')
                    var div3 = document.createElement('div')
                    div3.setAttribute('class','input-group mb-3')
                    var input = document.createElement('input')
                    input.setAttribute('type','file')
                    input.setAttribute('name','image'+idpreview)
                    input.setAttribute('id','patient_pic'+idpreview)
                    input.setAttribute('class','btn btn-primary btn-block mx-auto')
                    input.setAttribute('style','background-color : transparent;')
                    div1.appendChild(div2)
                    div1.appendChild(div3)
                    div2.appendChild(imgpreview)
                    div3.appendChild(input)
                    rootimg.appendChild(div1)


                  }
                </script>

              </div>
              <hr>
              <div class="row mx-auto">
                <div class="row " id="add-more-collumn-size">
                  @foreach ($product->sizes as $size)
                <input type="text" name="size" class="col-5 form-control getsize" placeholder="Enter size" contenteditable style="margin-right: 2px;" value="{{$size->name}}">
                <input type="text" name="quantity-size" class="col-5 form-control quantitysize" placeholder="Enter quantity size" contenteditable style="margin-left: 2px;" value="{{$size->quantity}}">
                @endforeach
                  <input type="text" name="size" class="col-5 form-control getsize" placeholder="Enter size" contenteditable style="margin-right: 2px; ">
                  <input type="text" name="quantity-size" class="col-5 form-control quantitysize" placeholder="Enter quantity size" contenteditable style="margin-left: 2px;" >
                </div>
                <div class="row">
                  <a type="button" class="btn btn-primary col-4 add-more-input" style="margin-left: 10px; background-color: transparent; color:white">+</a>
                  <a type="button" class="btn btn-primary col-4 test" style="margin-left: 10px; background-color: transparent; color:white">save</a>
    
                </div>
                <script>
                  

                </script>

                
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
              <button type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white" id="sendrequest">Edit Product</button>
            </div>
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