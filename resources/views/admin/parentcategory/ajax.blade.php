<script>

$('#show').on('show.bs.modal', function (event) {
      
      var button = $(event.relatedTarget) 
      var title_ar = button.data('mytitle_ar') 
      var title_en = button.data('mytitle_en') 
      var image = button.data('myimage') 
      var details_ar = button.data('mydetails_ar') 
      var details_en = button.data('mydetails_en') 
      var id = button.data('myid') 
      var modal = $(this)
      document.getElementById('imageBox').src ="http://127.0.0.1:8000/app/public/parentcategory/"+image;
      document.getElementById('imageBox0').src ="http://127.0.0.1:8000/app/public/parentcategory/"+image;
      modal.find('.modal-body #title_ar').val(title_ar);
      modal.find('.modal-body #title_en').val(title_en);
      modal.find('.modal-body #image').val(image);
      modal.find('.modal-body #details_ar').val(details_ar);
      modal.find('.modal-body #details_en').val(details_en);
      modal.find('.modal-body #id').val(id);
  }) 
  
        $('#delete').on('show.bs.modal', function (event) {
      
            var button = $(event.relatedTarget) 
            var id = button.data('myid') 
            var modal = $(this)
      
            modal.find('.modal-body #id').val(id);
      })
         
    
      </script>