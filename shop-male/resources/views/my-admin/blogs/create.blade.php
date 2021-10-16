<x-admin-lte>
    <div class="row" >
        <div class="col-9" style="min-height: 70vh">
            <div class="float-center">
                <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Add Product</p>
            </div>
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <form action="{{route('admin.blogs.store')}}" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="title">
                                            <b>
                                               Title
                                            </b>
                                        </label>
                                        <input id="title" name="title" type="text"  placeholder="Title Post" class="form-control validate" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control validate" cols="30" rows="20" placeholder="Enter descreption" name="content"></textarea>
                            </div>
                            
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                <div class="tm-product-img-dummy mx-auto">
                                    <i class="fas fa-cloud-upload-alt tm-upload-icon"
                                        onclick="document.getElementById('fileInput').click();">
                                    </i>
                                </div>
                                <div class="custom-file mt-3 mb-3">
                                    <input id="fileInput" type="file" style="display:none;" name="image"/>
                                    <input type="button" class="btn btn-primary btn-block mx-auto"
                                        value="UPLOAD IMAGE" 
                                        onclick="document.getElementById('fileInput').click();"/>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="tag"><b>Tag</b></label>
                                    <textarea class="form-control validate" cols="2" rows="5" placeholder="tag1|tag2.......|tagn.." name="tag"></textarea>
                                </div>
                            </div>
                            <button  type="submit" class="btn btn-primary btn-block text-uppercase" style="color:white">Create Blog</button>
                        
                    </div>
                </form>
                </div>
            </div>
            <section>
                <hr class="hidden-sm hidden-xs">
                <h5>FEATURED TAGS</h5>
                <div class="tags" style="min-height: 30vh">
                  <a href="/tags/linux" title="tui" style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; padding: 5px; color: white; margin-right: 5px; ">
                    tui
                  </a>
                  <a href="/tags/linux" title="quan" style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; padding: 5px; color: white; margin-right: 5px;">
                    quan
                  </a>
                  <a href="/tags/linux" title="ao" style="border: 1px solid rgb(153, 152, 152); border-radius: 20%; padding: 5px; color: white; margin-right: 5px;">
                    ao
                  </a>
                </div>
            </section>
        </div>         
    </div>
    
      
    

@include('partials.active-blog');

</x-admin-lte>