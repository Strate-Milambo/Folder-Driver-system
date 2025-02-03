@extends('MainUser.MainTemplate')
@section('content')

   
  </head>
  <div class="card mt-3 mb-2">
            <div class="card-body">
              <div class="row justify-content-between align-items-center">
                <div class="col-md">
                  <h5 class="mb-2 mb-md-0">Veuillez Créer vos documents très rapidement .</h5>
                </div>
            
                <!-- <iframe src="{{asset($content)}}" frameborder="0"></iframe> -->
                </div>
            </div>
    </div>
 
          
  
    <!-- <form action="{{url('pdf')}}" method="post"  >
        @csrf
    
      <input type="submit" value="Enregister"  class="btn btn-info mb-2">
      <input type="text" name="filename" class="form-control mb-2" placeholder="Nom du fichier">
      <textarea id="mytextarea"  name="doc"  contenteditable="true" spellcheck="false" >Editer votre fichier ...✍</textarea>  
    </form> -->


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