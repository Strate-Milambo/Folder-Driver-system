@extends('MainUser.MainTemplate')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  const input = document.querySelector('#y');
  const btn = document.querySelector('button');

</script>
<input type="text" id="y" value="salue">


          <!-- debut middle content -->
          <!-- table of user -->
          <div class="row g-3 mb-3" id="header-2">
            <div class="col-xxl-6 col-xl-12">
              <div class="row g-3">
               
                <div class="col-lg-12">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="card h-md-100 ecommerce-card-min-width">
                        
                        <div class="col-xs-12 text-center">
                            <h6>Statisque en mémoire</h6>
                          </div>
                        
                          <div id="donut-chart" style="height:200px"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card product-share-doughnut-width">
                        <div class="card-header pb-0">
                          <h3 class="mb-0 mt-2 d-flex align-items-center text-secondary">Collaborations en cours</h3>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end">
                          <div class="row align-items-end">
                            <div class="col">
                              <p class="font-sans-serif lh-1 mb-1 fs-7">{{$usersPriorities->count()  ?? 0}}</p> <?php if($usersPriorities->count() == 0) :?><span class="badge badge-subtle-info text-small rounded-pill">Collaborez avec des amis pour une meilleur prise en main. 😊</span> <?php endif ?>
                            </div>
                            <!-- <div class="col-auto ps-0"><canvas class="my-n5" id="marketShareDoughnut" width="112" height="112"></canvas>
                              <p class="mb-0 text-center fs-11 mt-4 text-500">Target: <span class="text-800">55%</span></p>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
            
          </div>
             <!-- fintable of user -->
          <!-- debut classification users -->
       
            <!-- fin middle content -->          

          <!-- début de l'utilisation de l'utilisateur -->
      <div class="row g-3 mb-3 " id="header-2">
        <div class="card mb-2">
            <div class="card-header bg-body-tertiary">
                <div class="row align-items-center">
                    <div class="col">
                    <h5 class="mb-0 text-secondary" id="followers">Différents collaborateurs <span class="d-none d-sm-inline-block"></span></h5>
                    </div>
                    <div class="col">
                      <div class="row g-0">     
                        <div class="col">
                          <form  class="position-relative" method="get" action="{{Route('page.users')}}">
                            <input class="form-control form-control-sm" type="seach" name="search" placeholder="Search..."  data-dismiss="search" />
                            <button class="bg-transparent px-1 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit">
                              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="fas fa-search fs-9  text-primary mx-2" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            </button>
                          </form>
                        </div>  

                        <!-- <div class="col d-md-block d-none">
                          <form method="get" action="">
                            @csrf
                            <select class="form-select form-select-sm ms-2" aria-label=".form-select-sm example">
                              <option selected="selected">Organisations</option>
                              <option>Collaborateurs</option>
                              <option>Utilisateurs</option>        
                            </select>
                            <input type="submit" value="valider">
                          </form>
                        </div>      -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="card-body bg-body-tertiary px-1 py-0">
            <div class="row g-0 text-center fs-10" >
                  @forelse($users as $k=>$user)
                      <?php
                        $statut ="Access code ne pas defini";
                        $tableUsers= [];
                        $css= "secondary";

                        foreach($usersPriorities as $userP){
                          $tableUsers[]=$userP->email;
                        }
                        if(!empty($tableUsers)){ 
                          if(@in_array($user->email,$tableUsers)){
                            $statut ="Access code 👇";
                            $css="success";
                          }
                        }
                      ?>
                  @if($user->id != @Auth::id())
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                      <div class="bg-white dark__bg-1100 p-3 h-100"><a href="{{route('all-profile',['id'=>$user->id])}}"><img class="img-thumbnail img-fluid rounded-circle mb-3 mx-3 h-2 shadow-sm" src="{{asset('storage/'.$user->photo_path)}}" alt="" style="width:120px; height:120px" /></a>
                        <h6 class="mb-1 text-secondary"><span>{{$user->name}}</span></h6>
                        <p class="fs-11 mb-1"><span class="text-700" >{{$user->email}}</span></p>
                        <p class="fs-11 mb-1"><span class="text-700" ><span class="badge bg-{{$css}}">{{$statut}}</span></span></p>
                        <p   data-bs-toggle="modal" data-bs-target="#tooltippopovers" class="link" onclick="CopyToClipboard('{{$user->AccessCode}}')"><?php if(in_array($user->id,$coworkers)):?> 
                          {{$user->AccessCode}}
                          <!-- // model -->
                              <div class="modal fade" id="tooltippopovers" tabindex="-1" aria-labelledby="tooltippopoversLabel" aria-hidden="true">
                              <div class="modal-dialog mt-6" role="document">
                                <div class="modal-content border-0">
                                  <div class="position-absolute top-0 end-0 mt-2 me-2 z-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                  <div class="modal-body p-0">
                                    <div class="bg-body-tertiary rounded-top-3 py-3 ps-4 pe-6">
                                      <h4 class="mb-1" id="tooltippopoversLabel">copier le Code d'accès</h4>
                                    </div>
                                    <hr>
                                    
                                      <main class="flex flex-col h-screen justify-center items-center bg-gray-100">
                                        <p class="mx-2">Le code d'accès vous permet de s'changer des contenus avec l'utilisateur <span class="text-secondary fw-bold">{{$user->name}}</span> en le remplissant dans le champ code d'accès lorsque vous allez vouloir lui envoyer des contenus
                                        envoyer ici -> Allez dans le <a href="{{route('myFiles')}}">Dashboard</a>
                                      </p>
                                        <div class="bg-white max-w-sm p-5 rounded shadow-md mb-3">
                                          <input
                                            class="border-blue-500 border-solid border rounded py-2 px-4"
                                            
                                            type="text"
                                            placeholder="Enter some text"
                                            id="texte"
                                            value="{{$user->AccessCode}}"
                                            
                                          />
                                          
                                          <button 
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                                            onclick="copierTexte()"
                                          >
                                            Copy
                                          </button>
                                        </div>
                                        <p class="text-green-700"></p>
                                      </main>
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                          <?php elseif($statut =="Access code 👇") :?>
                          <div class="spinner-border text-info h-2 w-2"  style="height:15px; width:15px" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                          <span class="text-small text-info">Loading...</span>
                        <?php endif?>
                        
                          </p>

                        
                      
                        <form action="{{url('users-trait')}}" method="post" id="addCollaborate" >
                          @Csrf
                          <input type="hidden" name="statut" value="{{$user->id}}"> 
                          <!-- <button type="submit" class="btn btn-primary" >{{$statut}}</button> -->
                          @if($statut !="Access code 👇")
                          <button class="btn btn-sm btn-info me-1 mb-1 mb-md-0" type="submit" id="addpost">Add 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                          </button>
                          @else
                            <button class="btn btn-sm btn-secondary me-1 mb-1 mb-md-0" type="submit" >Delete 
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                              </svg>
                            </button>
                          @endif
                        </form>
                      </div>
                    </div>
                    
                  @endif
                  @empty
                  <div class="btn btn-info max-w-full mb-2">
                    <h5>pas des résultats!😥</h5>
                  </div>
                  @endforelse
            </div>
           
        </div>
      </div>
      <div class="flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between d-flex mt-2 " id="header-2">
      <p class="mb-2 mt-2">{{ $users->links() }}</p>
      </div>
      
      <!--  -->
          <!-- fin de l'utilisation des utilisateurs -->
      <!-- <script>
              function CopyToClipboard(containerid, element) {
                if (document.selection) {
                  var range = document.body.createTextRange();
                  range.moveToElementText(document.getElementById(containerid));
                  range.select().createTextRange();
                  document.execCommand("copy");

                } else if (window.getSelection) {
                  var range = document.createRange();
                  range.selectNode(document.getElementById(containerid));
                  window.getSelection().addRange(range);
                  document.execCommand("copy");

                  //   alert("Text has been copied, now paste in the text-area")
                }

                let clipboard = document.getElementById(element);
                clipboard.style.display = "none";

                let clipboardCheck = document.getElementById(element+'Check');
                clipboardCheck.style.display = "block";

                }

                function downloadFile(path, fileName) {
                  // Create an anchor element
                  const downloadLink = document.createElement("a");

                  // Set the href attribute of the anchor element to the file path
                  downloadLink.href = path;

                  // Set the download attribute of the anchor element to the desired file name
                  downloadLink.download = fileName;

                  // Trigger a click event on the anchor element
                  downloadLink.click();
                }

                function copyToClipboard(elementId) {
                // Get the text from the specified element
                const textToCopy = document.getElementById(elementId).innerText;

                // Create a temporary input element
                const tempInput = document.createElement('input');
                tempInput.value = textToCopy;
                document.body.appendChild(tempInput);

                // Select the text in the input element
                tempInput.select();

                // Execute the copy command
                document.execCommand('copy');

                // Clean up: remove the temporary input element
                document.body.removeChild(tempInput);

                // Optionally, provide user feedback (e.g., display a success message)
                alert('Text copied to clipboard!');
            }
      </script> -->
      <html>
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <script src=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
  <link
    rel="stylesheet"
    href=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css"
  />
  <link
    rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    type="text/css"
  />
  
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
  </script>
  
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
  </script>
  
  <!-- <style>
    body {
      text-align: center;
      color: green;
    }
    h2 {
      text-align: center;
      font-family: "Verdana", sans-serif;
      font-size: 40px;
    }
  </style> -->
  <body>
    
  
    <script>
      var chart = bb.generate({
        data: {
          columns: [
            ["Disponible", {{$defaultSize}}],
            ["Consommée", {{$totalSize}}],
            // ["Disponible", {{$defaultSize}}],
          ],
          type: "donut",
          onclick: function (d, i) {
            console.log("onclick", d, i);
          },
          onover: function (d, i) {
            console.log("onover", d, i);
          },
          onout: function (d, i) {
            console.log("onout", d, i);
          },
        },
        donut: {
          title: "{{$totalSizes}}",
        },
        bindto: "#donut-chart",
      });
    </script>
  </body>
</html>

<script type="text/javascript">
 $(document).ready(function(event){
   
    $('#').on('submit',function(event){
      event.preventDefault();
         jQuery.ajax({
              url : "http://folder-driver.test/users-trait",
              data: $('#addCollaborate').serialize(),
              type: 'post',

              success: function(result ){
                  // jQuery('#addpost')[0].reset();
                  alert('cela est fait');
                
              }
         })
    });
 })

</script>



    
@endsection


        
 