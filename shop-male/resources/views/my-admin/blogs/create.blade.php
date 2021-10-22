<x-admin-lte>
    @if (session('msg'))
          <div class="alert alert-success flex-container " style="display: grid; grid-template: 9fr 1fr">
            {{ session('msg') }}

            <i class="far fa-times-circle closesession" style="grid-collumn:2/3"></i>
          </div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
            <i class="far fa-times-circle closesession" style="grid-collumn:2/3"></i>
          </div>
      @endif
    <div class="row" >
        
        <div class="col-9" style="min-height: 70vh">
            <div class="float-center">
                <p class="tm-block-title d-inline-block float-center" style="font-size: 30px">Add Product</p>
            </div>
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <form action="{{route('admin.blogs.store')}}" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
                    @csrf
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
                                <textarea class="form-control validate" style="resize: none" class="form-control" cols="30" rows="20" placeholder="Enter descreption" name="content"></textarea>
                            </div>
                            
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                <div class="tm-product-img-dummy mx-auto">
                                    <img id="preview_image" src="#" alt="" />
                                    
                                </div>
                                
                                <div class="custom-file mt-3 mb-3">
                                    <input id="patient_pic" type="file" style="display:none;" name="image"/>
                                    <input type="button" class="btn btn-primary btn-block mx-auto"
                                        value="UPLOAD IMAGE" 
                                        onclick="document.getElementById('patient_pic').click();"/>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="tag"><b>Tag</b></label>
                                    <textarea class="form-control validate" id="taginput" cols="2" rows="5" placeholder="tag1|tag2.......|tagn.." name="tag"></textarea>
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
                <div class="tags" style="min-height: 30vh; max-width: 20vw;">
                    @foreach ($tags as $tag)
                    <span style="border: 1px solid rgb(153, 152, 152); border-radius: 20%;  color: white; margin-right: 5px;cursor: pointer;" class="tagname">
                      {{$tag->name}}
                    </span>
                  @endforeach
                </div>
            </section>
        </div>         
    </div>
    
@section('css')
<style>
    .input-file-row-1:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0;
    }

    .input-file-row-1{
        display: inline-block;
        margin-top: 25px;
        position: relative;
    }

    #preview_image {
    display: none;
    max-width: 100%;
    height: 230px;
    margin: 2px 0px 0px 5px;
    border-radius: 10px;
    }

    .upload-file-container { 
        position: relative; 
        width: 100px; 
        height: 137px; 
        overflow: hidden;	
        background: url(http://i.imgur.com/AeUEdJb.png) top center no-repeat;
        float: left;
        margin-left: 23px;
    } 

    .upload-file-container-text{
        font-family: Arial, sans-serif;
        font-size: 12px;
        color: #719d2b;
        line-height: 17px;
        text-align: center;
        display: block;
        position: absolute; 
        left: 0; 
        bottom: 0; 
        width: 100px; 
        height: 35px;
    }

    .upload-file-container-text > span{
        border-bottom: 1px solid #719d2b;
        cursor: pointer;
    }

    .one_opacity_0 {
    opacity: 0;
    height: 0;
    width: 1px;
    float: left;
    }
</style>
@endsection

@section('script')
    <script>
        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var image_target = $(target);
                reader.onload = function (e) {
                    image_target.attr('src', e.target.result).show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#patient_pic").on("change",function(){
            readURL(this, "#preview_image")
        });

        

        $(".tagname").click(function(){
            var str = removeSpace($("#taginput").val()) + "|" +removeSpace($(this).html());
            $("#taginput").html(str);
        });

    </script>
@endsection

@include('partials.active-blog');

</x-admin-lte>