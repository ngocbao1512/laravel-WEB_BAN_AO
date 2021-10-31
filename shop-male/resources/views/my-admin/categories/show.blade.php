<x-admin-lte>

<div class="row">
    <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
            <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">CATEGORY IMAGE</th>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ showImage('categories',$image) }}" alt="" style="width: 100px; height: 100px;"></td> 
                        
                    </tr>
                    @foreach ($products as $product)
                        <td>&ensp;</td>
                        <td>&ensp;</td>
                        <td>&ensp;</td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
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
        <div class="col-12">
            <a  href="{{ route('admin.products.index') }}" class="btn btn-primary btn-block text-uppercase" style="color:white">Go To List Products</a>
        </div>
    </div>
</div>

@include('partials.form-delete');

@include('partials.active-product');

</x-admin-lte>