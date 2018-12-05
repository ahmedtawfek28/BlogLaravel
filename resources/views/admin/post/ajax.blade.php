<script>

        $('#delete').on('show.bs.modal', function (event) {
      
            var button = $(event.relatedTarget) 
      
            var id = button.data('myid') 
            var modal = $(this)
      
            modal.find('.modal-body #id').val(id);
      })
         
      
      $('#approval').on('show.bs.modal', function (event) {
      
      var button = $(event.relatedTarget) 

      var id = button.data('myid') 
      var modal = $(this)

      modal.find('.modal-body #id').val(id);
})
      </script>