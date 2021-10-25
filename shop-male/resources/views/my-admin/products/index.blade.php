<x-admin-lte>

@if(Session::has('success')) 
<div class="alert alert-success fade in alert-dismissible show" style="height: 50px;">
  {{Session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="font-size:20px">×</span>
</div> 
@endif 
@if(Session::has('error')) 
  <div class="alert alert-danger fade in alert-dismissible show" style="height: 50px;">
  {{Session::get('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="font-size:20px">×</span>
</div>
  @endif 
  <div class="row ">
    <div class="col-9 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div>
          <table class="table table-hover tm-table-small tm-product-table">
            <thead >
              <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">BRAND</th>
                <th scope="col">PRICE</th>
                <th scope="col">RATE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">SALE OFF</th>
                <th scope="col">DESCREPTION</th>
                <th scope="col" >ACTION</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td class="tm-product-name">{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->rate }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->sale_off }}</td>
                <td>{{ Str::limit($product->description, 50) }}</td>
                <td>
                  <div class="row" style="margin-right: 2px;">
                    <div class="col-md-4">
                      <a href="{{ route('admin.products.show',['product' => $product->id]) }}" >
                        <i class="far fa-eye tm-product-delete-icon"></i>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <a href="{{ route('admin.products.edit',['product' => $product->id]) }}" >
                        <i class="far fa-edit tm-product-delete-icon"></i>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <button class="confirm-delete"  
                        style="background-color: #50697f;"
                        data-toggle="modal" 
                        data-target="#modal-delete" 
                        data-url="{{ route('admin.products.destroy', ['product' => $product->id]) }}">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach 
            </tbody>
          </table>
        </div>
        <!-- table container -->
      </div>
      <div class="d-flex justify-content-between">
        <div class="col-4">
          <a href="{{ route('admin.products.create')}}" class="btn btn-primary mb-3 float-left">Add new product</a>
        </div>
        <div  class="d-flex justify-content-between">
          {{ $products->links('pagination.bootstrap-4') }}
        </div>
        
      </div>   
    </div>
    <div class="col-3 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
        <h2 class="tm-block-title">Categories</h2>
        <div class="tm-product-table-container">
          <table class="table tm-table-small tm-product-table">
            <tbody>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME CATEGORY</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            @foreach ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td class="tm-product-name">{{ $category->name }}</td>
                <td >
                  <div class="row">
                  <div class="col-md-4">
                      <a href="{{ route('admin.categories.show',['category' => $category->id]) }}" >
                        <i class="far fa-eye tm-product-delete-icon"></i>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <a href="{{ route('admin.categories.edit',['category' => $category->id]) }}" >
                        <i class="far fa-edit tm-product-delete-icon"></i>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <button class="confirm-delete"  
                        style="background-color: #50697f;"
                        data-toggle="modal" 
                        data-target="#modal-delete" 
                        data-url="{{ route('admin.categories.destroy', ['category' => $category->id]) }}">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </button>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-block text-uppercase mb-3">Add new category</a>
      </div>
      <hr style="margin: 24px 0 24px 0">
      <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
        <h2 class="tm-block-title">Brand</h2>
        <div class="tm-product-table-container">
          <table class="table tm-table-small tm-product-table">
            <tbody>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME Brand</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            @foreach ($brands as $brand)
              <tr>
                <td>{{ $brand->id }}</td>
                <td class="tm-product-name">{{ $brand->name }}</td>
                <td >
                  <div class="row">
                  <div class="col-md-4">
                      <a href="{{ route('admin.brands.show',['brand' => $brand->id]) }}" >
                        <i class="far fa-eye tm-product-delete-icon"></i>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <a href="{{ route('admin.brands.edit',['brand' => $brand->id]) }}" >
                        <i class="far fa-edit tm-product-delete-icon"></i>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <button class="confirm-delete"  
                        style="background-color: #50697f;"
                        data-toggle="modal" 
                        data-target="#modal-delete" 
                        data-url="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </button>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary btn-block text-uppercase mb-3">Add new brand</a>
      </div>
    </div>
  </div>

@include('partials.form-delete')

@include('partials.active-product')

@include('partials.add-image')
</x-admin-lte>