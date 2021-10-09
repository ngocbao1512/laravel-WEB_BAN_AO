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
              <form action="" method="post" class="tm-edit-product-form">
                <div class="form-group ">
                <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                   <label for="name"><b>Product Name</b></label>
                  <input id="name" name="name" type="text"  placeholder="Enter product name" class="form-control validate" />
                   </div>
                 </div>
                </div>
                <hr>
                <div class="form-group ">
                 <div class="row">
                   <div class=" col-xs-12 col-sm-6">
                   <label for="category"><b>Category</b></label>
                    <select class="custom-select tm-select-accounts" id="category">
                        <option value="1" selected>Shirt</option>
                        <option value="2">Most Popular</option>
                        <option value="3">Trending</option>
                  </select>
                   </div>
                   <div class=" col-xs-12 col-sm-6">
                   <label for="category"><b>Brand</b></label>
                    <select class="custom-select tm-select-accounts" id="brand">
                        <option value="1" selected>Chanel</option>
                        <option value="2">Most Popular</option>
                        <option value="3">Trending</option>
                  </select>
                   </div>
                 </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="price"><b>Price</b></label>
                    <input id="price" name="price" type="text" placeholder="Enter price" class="form-control validate" />
                  </div>
                  <div class="form-group  col-xs-12 col-sm-6">
                    <label for="sale_off"><b>Sale Of</b></label>
                    <input id="sale_off" name="sale_off" type="text" placeholder="Enter sale off" class="form-control validate" />
                  </div>
                </div>
                <hr>
                <div class="form-group ">
                  <label for="description">Description</label>
                  <textarea class="form-control validate" rows="3" placeholder="Enter descreption"></textarea>
                </div>
                
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="UPLOAD PRODUCT IMAGE"
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div>
              </div>
              <a  herf="/products" type="button" class="btn btn-primary btn-block text-uppercase" style="color:white">Add Product</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-lte>