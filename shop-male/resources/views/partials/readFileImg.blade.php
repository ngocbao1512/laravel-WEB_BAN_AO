
@section('image')
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
    
    $("#patient_pic1").on("change",function(){
        readURL(this, "#preview_image1")
    });

    $("#patient_pic2").on("change",function(){
        readURL(this, "#preview_image2")
    });

    $("#patient_pic3").on("change",function(){
        readURL(this, "#preview_image3")
    });

    $("#patient_pic4").on("change",function(){
        readURL(this, "#preview_image4")
    });

</script> 
@endsection