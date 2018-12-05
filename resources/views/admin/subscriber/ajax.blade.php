<script>

  
        $('#edit').on('show.bs.modal', function (event) {
      
            var button = $(event.relatedTarget) 
            var email = button.data('myemail') 
            var id = button.data('myid') 
            var modal = $(this)
      
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #id').val(id);
      }) 
      
      
        $('#delete').on('show.bs.modal', function (event) {
      
            var button = $(event.relatedTarget) 
      
            var id = button.data('myid') 
            var modal = $(this)
      
            modal.find('.modal-body #id').val(id);
      })
      
      
      </script>