@section('showNameImage')
  <script type="text/javascript">
    $('.upload-image').change(function(){
      $('.show-name-image').text(this.files[0].name);
      console.log('ok show');
    });
  </script>
@endsection