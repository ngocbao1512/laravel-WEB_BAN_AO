<x-admin-lte>

      <div class="row ">
        <div class="col-9 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead >
                  <tr>
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
                  <tr>
                    <td class="tm-product-name">Lorem Ipsum Product 1</td>
                    <td>Shirt</td>
                    <td>Chanel</td>
                    <td>$100</td>
                    <td>5</td>
                    <td>1000</td>
                    <td>10%</td>
                    <td> Color: Red</td>
                    <td class="row">
                      <a href="/admin/products/show" class="col-4" >
                        <i class="far fa-eye tm-product-delete-icon"></i>
                      </a>
                      <a href="/admin/products/edit" class="col-4" >
                        <i class="far fa-edit tm-product-delete-icon"></i>
                      </a>
                      <a href="#" class="col-4" >
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="{{ route('admin.products.create')}}" class="btn btn-primary mb-3">Add new product</a>
            <button class="btn btn-primary mb-3 float-right">Delete selected products</button>
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
                    <th scope="col">PRODUCT CATEGORY</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                  <tr>
                  <td class="tm-product-name">1</td>
                    <td class="tm-product-name">Product Category 1</td>
                    <td class="row">
                      <a href="/show-product" class="col-4" >
                        <i class="far fa-eye tm-product-delete-icon"></i>
                      </a>
                      <a href="/edit-product" class="col-4" >
                        <i class="far fa-edit tm-product-delete-icon"></i>
                      </a>
                      <a href="#" class="col-4" >
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="/add-product" class="btn btn-primary btn-block text-uppercase mb-3">Add new category</a>
            <button class="btn btn-primary btn-block text-uppercase mb-3">Delete selected categories</button>
          </div>
        </div>
      </div>
  </x-admin-lte>