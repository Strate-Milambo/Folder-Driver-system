@extends('MainUser.MainTemplate')
@section('content')
      
        <div class="content">
          <div class="card overflow-hidden">
            <div class="card-header bg-body-tertiary">
              <div class="row flex-between-center">
                <div class="col-sm-auto">
                  <h5 class="mb-1 mb-md-0">Toutes le Notifications</h5>
                </div>
                <div class="col-sm-auto fs-10"><a class="font-sans-serif" href="#!">Mark all as read</a><a class="font-sans-serif ms-2 ms-sm-3" href="#notification-deleting" data-bs-toggle="modal">Supprimé toutes.</a></div>
              </div>
            </div>
            <div class="card-body fs-10 p-0">

            <?php
            $link="";
            $ext="null";
            ?>
            @forelse($notificationsAll as $notification)

            @if(@isset($_GET['delete']) and $_GET['delete']=="true")

              {{$notification->delete()}}

            @endif
            
            
            <?php
              if($notification->read()){ 
                  $link="notification rounded-0";
              }
              else{ 
                    $link="notification-unread notification rounded-0 ";
              }
              ?>
              <a class="border-bottom-0 {{$link}}  border-x-0 border-300" href="{{route('page.users',['search'=>$notification->data['user']])}}">
                <div class="notification-avatar">
                  <div class="avatar avatar-xl me-3">
                    <img class="rounded-circle" src="{{asset('storage/'.$notification->data['image'])}}" alt="" />
                  </div>
                </div>
                <div class="notification-body">
                @if($notification->type=='App\Notifications\sendFolderNotifications')
                <p class="mb-1"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-arrow-down-fill text-info" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54L13.026 8.03A4.5 4.5 0 0 0 8 12.5c0 .5 0 1.5-.773.36l-1.59-2.498L.644 7.184l-.002-.001-.41-.261a.5.5 0 0 1 .083-.886l.452-.18.001-.001L15.314.035a.5.5 0 0 1 .54.111M6.637 10.07l7.494-7.494.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154z"/>
                    <path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-1.646a.5.5 0 0 1-.722-.016l-1.149-1.25a.5.5 0 1 1 .737-.676l.28.305V11a.5.5 0 0 1 1 0v1.793l.396-.397a.5.5 0 0 1 .708.708z"/>
                  </svg>
                  <b class="text-info mx-1">oups!
                  </b> l'utilisateur {{$notification->data['user']}} Vous a envoyé du contenu. 👁‍🗨</p>
                  @foreach($notification->data['files'] as $file)
                    <?php
                       $units=['o','Ko','Mo', 'Go', 'To', 'Po'];

                       $power = $file['size'] > 0 ? floor(log($file['size'] ,1024)) : 0;
               
                       $size=number_format($file['size'] /pow(1024,$power),2,'.',',')." ". $units[$power];
                    
                      
                            
                        $exts = explode(".",$file['name']);
                        foreach($exts as $k=>$ext){
                          if($k=='1'){
                            $ex= $ext;
                          }
                        }
                  
                    ?>
                    <?php if($ext == ""):?>
                      <img class="img-fluid" style="height:20px; wdth:30px"  src="{{asset('/images/icons/file-and-folder.png')}}">

                      <?php elseif(in_array($ext,['txt','doc','html','py','js','php'])):?>
                        <img class="img-fluid" style="height:20px; wdth:30px" src="{{asset('/images/icons/texte.png')}}">
                      
                      <?php elseif(in_array($ext,['jpg','png'])):?>
                      <img class="img-fluid" style="height:20px; wdth:30px" src="{{asset('images/icons/image.png')}}">
                      
                      <?php elseif(in_array($ext,['mp4','mpge','webm','ogg'])):?>
                        <img class="img-fluid" style="height:20px; wdth:30px" src="asset('/images/icons/chat-video.png')}}">
                      
                      <?php elseif(in_array($ext,['mp3','mpge','webm','ogg'])):?>
                        <img class="img-fluid" style="height:20px; wdth:30px"  src="{{asset('/images/icons/les-ondes-sonores.png')}}">
                      
                      <?php elseif(in_array($ext,['pdf'])):?>
                        <img class="img-fluid" style="height:20px; wdth:30px" src="{{asset('/images/icons/pdf.png')}}">
                    
                      <?php elseif(in_array($ext,['docx'])):?>
                        <img class="img-fluid" style="height:20px; wdth:30px" src="{{asset('/images/icons/mot.png')}}">

                      <?php elseif(in_array($ext,['zip','rar'])):?>
                        <img class="img-fluid" style="height:20px; wdth:30px"  src="{{asset('/images/icons/zip-francais.png')}}">
                      
                      <?php else :?>
                        <img class="img-fluid" style="height:20px; wdth:30px" src="{{asset('/images/icons/attachement.png')}}">
                      <?php endif ?>  

                    
                    
                    
                    <p class="badge badge-subtle-warning"> {{$file['name']}}</p> <span  class="badge bg-info">{{($file['is_folder']) ? "": $size }}</span><br>
                        
                     
                                  @endforeach
                                  <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>{{$notification->created_at->diffForHumans()}} à {{$notification->created_at->format('H:i:s')}}</span>
                                  @elseif($notification->type=="App\Notifications\CoworkersNotifications")
                                  <p class="mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-add text-warning" viewBox="0 0 16 16">
                                      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                    </svg> 
                                    
                                  <b class="text-warning mx-1">Salut !!</b> 
                                  
                                  Une collaboration est souhaitée par l'utilisateur 
                                  <span class="text-secondary fw-bold">{{$notification->data['user']}}</span>😊 </p>
                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji"></span>{{$notification->created_at->diffForHumans()}}</span>
                                
                                  @elseif($notification->type=="App\Notifications\AcceptedCollaborations")
                                  <p class="mb-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                  </svg>
                                    
                                  <b class="text-success mx-1">Réussi</b>. 
                                 
                                  <span class="text-secondary fw-bold">{{$notification->data['user']}}</span>✌ a accepté votre collaborations </p>
                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji"></span>{{$notification->created_at->diffForHumans()}}</span>
                               
                                  @elseif($notification->type=="App\Notifications\DeletedCollaborations")
                                  <p class="mb-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                  </svg>
                                    
                                  <b class="text-danger mx-1">Annulé</b>. 
                                 
                                  <span class="text-secondary fw-bold">{{$notification->data['user']}}</span>✌ a annulé votre collaboration </p>
                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji"></span>{{$notification->created_at->diffForHumans()}}</span>
                                  @endif
                                  
                                  
                                </div>


              </a>
             
              @empty
              <div class="notification notification-flush notification-unread ">
								<p class="text-body small m-4 text-white btn btn-outline-info ml-2 "><span class="text-info">oups!</span> Pas des notifications encore  <b>Localisées</b> ❌ </p>
							</div>													
							@endforelse
              
            </div>
           
          </div>
          <center class="mt-3" >{{$notificationsAll->links()}}</center>
        </div>
        


        <!-- <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-1">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                  <p class="fs-10 mb-0 text-white">Please create your free Falcon account</p>
                </div><button class="btn-close position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <form>
                  <div class="mb-3"><label class="form-label" for="modal-auth-name">Name</label><input class="form-control" type="text" autocomplete="on" id="modal-auth-name" /></div>
                  <div class="mb-3"><label class="form-label" for="modal-auth-email">Email address</label><input class="form-control" type="email" autocomplete="on" id="modal-auth-email" /></div>
                  <div class="row gx-2">
                    <div class="mb-3 col-sm-6"><label class="form-label" for="modal-auth-password">Password</label><input class="form-control" type="password" autocomplete="on" id="modal-auth-password" /></div>
                    <div class="mb-3 col-sm-6"><label class="form-label" for="modal-auth-confirm-password">Confirm Password</label><input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" /></div>
                  </div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" /><label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a class="white-space-nowrap" href="#!">privacy policy</a></label></div>
                  <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button></div>
                </form>
                <div class="position-relative mt-5">
                  <hr />
                  <div class="divider-content-center">or register with</div>
                </div>
                <div class="row g-2 mt-2">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

         <div class="modal fade" id="notification-deleting" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px">
              <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                  <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
                  <p class="mb-1 text-secondary" id="modalExampleDemoLabel">Êtes-vous sûr de vouloir supprimer Toutes les notifications ?</p>
                  <p class="alert alert-info text-secondary">En supprimant vos notifications , vous aurez plus l'historiques de vos différentes actions antérieures. Voulez-vous vraiment les supprimées?</p>
                  <form  method="get">
                
                    <div class="mb-3">
                      <input id="recipient-name" type="hidden" name="delete" value="true"/>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
                      <button class="btn btn-danger" type="submit">Supprimer</button>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        
       
@endsection