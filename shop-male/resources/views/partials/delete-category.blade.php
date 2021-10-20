<form method="POST" action="#" id="delete-category">
  @csrf
  @method('DELETE')
</form>

<div class="modal fade" id="modal-category" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-error">
      <div class="modal-header">
        <h4 class="modal-title">Are you sure??</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-dark" id="btn-delete">Delete</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
<!-- /.modal-dialog -->
</div>

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('.delete-category').click(function() {
      var delUrl = $(this).data('url');
      $('#delete-category').attr('action', delUrl);  
    });
    $('#btn-delete').click(function() {
      $('#delete-category').submit();
    });
  });
</script>
@endsection

