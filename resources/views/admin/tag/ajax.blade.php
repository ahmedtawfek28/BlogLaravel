<script>

  
    $('#edit').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        var title = button.data('mytitle') 
            // var slug = button.data('myslug') 
            // var content = button.data('mycontent') 
            var id = button.data('myid') 
            var modal = $(this)
            
            modal.find('.modal-body #title').val(title);
            // modal.find('.modal-body #slug').val(slug);
            // modal.find('.modal-body #content').val(content);
            modal.find('.modal-body #id').val(id);
        }) 
    
    
    $('#delete').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        
        var id = button.data('myid') 
        var modal = $(this)
        
        modal.find('.modal-body #id').val(id);
    })
    
    
</script>