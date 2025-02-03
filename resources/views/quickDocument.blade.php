@extends('MainUser.MainTemplate')
@section('content')

    <script src="{{asset('usersTemplatejs/tinymce/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','markdown',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount',
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
          icons: 'default',
          model:'dom',
      });
    </script>

  </head>
  <div class="card mt-3 mb-2">
            <div class="card-body">
              <div class="row justify-content-between align-items-center">
                <div class="col-md">
                  <h5 class="mb-2 mb-md-0">Veuillez Créer vos documents très rapidement .</h5>
                </div>
                <!-- <div class="col-auto"><button class="btn btn-falcon-primary btn-sm">Make your event live </button></div> -->
              </div>
            </div>
    </div>
 
          
  
    <form action="{{url('pdf')}}" method="post"  >
        @csrf
    
      <input type="submit" value="Enregister"  class="btn btn-info mb-2">
      <input type="text" name="filename" class="form-control mb-2" placeholder="Nom du fichier">
      <textarea id="mytextarea"  name="doc"  contenteditable="true" spellcheck="false" >Editer votre fichier ...✍</textarea>  
    </form>

    <div id="out">hhd</div>
    
 
</html>

<!-- <script type="text/javascript">
 $(document).ready(function(event){
   
    $('#addpost').on('onclick',function(event){
      event.preventDefault();
         jQuery.ajax({
              url : "{{('pdf')}}",
              data: jQuery('#addpost').serialize(),
              type: 'post',

              success: function(result ){
                  jQuery('#addpost')[0].reset();
              }
         })
    });
 })



</script> -->
@endsection