<!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">show Category</h4>
      </div>
      <form action="{{route('admin.parentcategory.show','test')}}" method="post" enctype="multipart/form-data">
        {{method_field('patch')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="parentcategory_id" id="id" value="">
          @include('admin.parentcategory.form')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <form action="{{route('admin.parentcategory.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
            <div class="modal-body">
                  <p class="text-center">
                      Are you sure you want to delete this?
                  </p>
                    <input type="hidden" name="parentcategory_id" id="id" value="">
  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-warning">Yes, Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
                  <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
               
              </div>
              <!-- ============================================================== -->
              <!-- End Container fluid  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- footer -->
              <!-- ============================================================== -->
              <footer class="footer"> © 2018 Tawfek </footer>
              <!-- ============================================================== -->
              <!-- End footer -->
              <!-- ============================================================== -->
          </div>
