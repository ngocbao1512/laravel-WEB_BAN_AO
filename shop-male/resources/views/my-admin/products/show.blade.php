<x-admin-lte>

  <div class="container" style="margin-top: 30px">
    <div class="row">
      <div class="col-12 mx-auto">
      <div class="float-center">
              <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Information Product</p>
            </div>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="" method="post" class="tm-edit-product-form">
                <div class="form-group ">
                <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                   <label for="name"><b>Product Name</b></label>
                    <p style="color: white;">{{ $product->name }}</p>
                   </div>
                   <div class=" col-xs-12 col-sm-6">
                    <label for="brand"><b>Rate</b></label>&ensp;
                   <span style="color:white;">{{ $product->rate }}
                    @for ($i=0; $i<$product->rate; $i++) 
                    <span class="far fa-star"></span> 
                    @endfor </span>
                   </div>
                 </div>
                </div>
                <hr>
                <div class="form-group ">
                 <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                    <label for="category"><b>Category</b></label>
                    <p style="color: white;">{{ $product->category->name }}</p>
                   </div>
                   <div class=" col-xs-12 col-sm-6">
                    <label for="brand"><b>Brand</b></label>
                    <p style="color: white;">{{ $product->brand->name }}</p>
                   </div>
                 </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="price"><b>Price</b></label>
                    <p style="color: white;">${{ $product->price }}</p>
                  </div>
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="sale_off"><b>Sale Of</b></label>
                    <p style="color: white;">{{ $product->sale_off }}%</p>
                  </div>
                </div>
                <hr>
                <div class="form-group ">
                  <label for="description"><b>Description</b></label>
                  <p style="color: white;">{{ $product->description }}</p>
                </div>
                
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-edit mx-auto">
                <img src="/admin-lte/img/product-image.jpg" style="width: 100%; height: 200%" alt="Product image" class="img-fluid d-block mx-auto">
              </div>
            </div>
            <div class="col-12">
              <a  href="{{ route('admin.products.index') }}" class="btn btn-primary btn-block text-uppercase" style="color:white">Go To List Products</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('partials.active-product');

</x-admin-lte>