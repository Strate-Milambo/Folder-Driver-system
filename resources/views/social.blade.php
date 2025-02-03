@extends('MainUser.MainTemplate')
@section('content')
<div class="row g-3">


<!-- <div class="ratio ratio-16x9">
    <iframe src="https://www.youtube.com/embed/votre-video" title="YouTube video" allowfullscreen></iframe>
</div>-->

   
  
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary overflow-hidden">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-m">
                      <img class="rounded-circle" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h5 class="mb-0 fs-9">Create post</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <form method="post" action="{{route('social.create')}}" enctype="multipart/form-data">
                    @csrf
                    <textarea class="shadow-none form-control rounded-0 resize-none px-x1 border-y-0 border-200" name="description" placeholder="Une description pour votre post" rows="4" required></textarea>
                    <div class="d-flex align-items-center ps-x1 border border-200">
                      
                    <input class="form-control btn btn-primary text-white border-0 fs-10 shadow-none"  type="file" name="post_path"  required/>                    
                    </div>
                    <div class="row g-0 justify-content-between mt-3 px-x1 pb-3">
                      <div class="col">
                        <!-- <button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 mb-0 me-1" type="button">
                          <img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/image.svg" width="17" alt="" />
                          <span class="ms-2 d-none d-md-inline-block">Image</span>
                        </button>
                        <button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 me-1" type="button">
                          <img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/calendar.svg" width="17" alt="" />
                          <span class="ms-2 d-none d-md-inline-block">Event</span>
                        </button>
                        <button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 me-1" type="button">
                          <img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/location.svg" width="17" alt="" />
                          <span class="ms-2 d-none d-md-inline-block text-nowrap">Check in</span></button></div>
                         <div class="col-auto">
                        <div class="dropdown d-inline-block me-1"><button class="btn btn-sm dropdown-toggle px-1" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-globe-americas"></span></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Public</a><a class="dropdown-item" href="#">Private</a><a class="dropdown-item" href="#">Draft</a></div>
                        </div> -->
                        <button class="btn btn-primary btn-sm px-4 px-sm-5" type="submit">Postez</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
             
              @foreach($posts as $post)
              

              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <div class="row justify-content-between">
                    <div class="col">
                      <div class="d-flex">
                        <div class="avatar avatar-2xl">
                          <img class="rounded-circle" src="{{asset('storage/'.$post->photo_path)}}" alt="" />
                        </div>
                        <div class="flex-1 align-self-center ms-2">
                          <p class="mb-1 lh-1"><a class="fw-semi-bold" href="{{route('all-profile',['id'=>$post->user_id])}}">{{ ($post->name == @Auth::user()->name) ? "You" : $post->name }}</a> shared a <a href="#!">{{$post->extension}} </a> Document</p>
                          <p class="mb-0 fs-10">{{$post->created_at->diffForHumans()}}  &bull; {{$post->country}} &bull; <span class="fas fa-users"></span></p>
                          <p class="mt-2 mb-1"><span>{{$post->description}}</span></p>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-auto">
                      <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="post-article-action" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-article-action"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Report</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete </a>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="card-body">
                  <?php if(in_array($post->extension,['txt','doc','html','py','js','php'])):?>

                          <img class="img-fluid" style="height:20px; wdth:30px" src="{{asset('storage/Posts/'.$post->storage_path)}}">
                  <?php elseif(in_array($post->extension,['jpg','png'])):?>
                    
                  <img class="img-fluid w-50" src="{{asset('storage/Posts/'.$post->storage_path)}}">
                    <form action="{{route('social.download')}}" method="post">
                      @Csrf
                    <input type="hidden" name="file" value="{{$post->storage_path}}">
                    <button type="submit" class='btn btn-primary'>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                      </svg>
                    </button>
                    </form>

                  
                  
                  <?php elseif(in_array($post->extension,['mp4','mpge','webm','ogg'])):?>
                    <video controls class="ratio rounded mx-2 w-100" style="--bs-aspect-ratio: 50%">
                       <source src="{{asset('storage/Posts/'.$post->storage_path)}}" type="video/mp4">
                    </video>

                  <?php elseif(in_array($post->extension,['mp3','mpge','webm','ogg'])):?>
                   
                  <?php elseif(in_array($post->extension,['pdf'])):?>
                      <img class="img-fluid  w-50" src="{{asset('/images/icons/pdf.png')}}">

                    <form action="{{route('social.download')}}" method="post">
                        @Csrf
                      <input type="hidden" name="file" value="{{$post->storage_path}}">
                      <button type="submit" class='btn btn-primary mt-1'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                          <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                          <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                        </svg>
                      </button>

                      <a href="{{route('social.view',['view'=>$post->storage_path])}}" class="btn btn-danger text-white fw-bold mt-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-white fw-bold" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                          </svg>
                        </a>
                     
                    </form>
                   
                    
                    
                  <?php elseif(in_array($post->extension,['docx'])):?>
                      <img class="img-fluid  w-50" src="{{asset('/images/icons/mot.png')}}">

                    <form action="{{route('social.download')}}" method="post">
                      @Csrf
                    <input type="hidden" name="file" value="{{$post->storage_path}}">
                    <button type="submit" class='btn btn-primary'>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                      </svg>
                    </button>
                    <a href="{{route('social.view',['view'=>$post->storage_path])}}" class="btn btn-info text-white fw-bold mt-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-white fw-bold" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                          </svg>
                        </a>
                    </form>
                   

                  <?php endif ?>  

                
                
                
                </div>
                <div class="card-footer bg-body-tertiary pt-0">
                  <div class="border-bottom border-200 fs-10 py-3"><a class="text-700" href="#!">{{count($post->comments($post->post_id))}} Comments</a></div>
                  <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"><img src="../../assets/img/icons/spot-illustrations/like-inactive.png" width="20" alt="" /><span class="ms-1">Like</span></a></div>
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!"><img src="../../assets/img/icons/spot-illustrations/comment-active.png" width="20" alt="" /><span class="ms-1">Comment</span></a></div>
                    <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!"><img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" /><span class="ms-1">Share</span></a></div>
                  </div>
                  <form class="d-flex align-items-center border-top border-200 pt-3" method="post" action="{{route('social.comment')}}">
                    @Csrf
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="" />
                    </div>
                    <input class="form-control  ms-2 fs-10 w-80" type="text" name="comment" placeholder="Write a comment..." required />
                    <input type="hidden" name="post" value="{{$post->post_id}}" />
                    <button type="submit" class="btn btn-primary rounded-fill  ms-2 fs-10">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                      </svg>
                    </button>
                  </form>
                  <div class="card-body bg-body-tertiary"><a class="mb-4 d-block d-flex align-items-center" href="#experience-form1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="experience-form1"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Voir Les commentaires</span></a>
                    <div class="collapse" id="experience-form1">
                    @if(!count($post->comments($post->post_id)) < 1)
                      @foreach($post->comments($post->post_id) as $comment)
                      <div class="d-flex mt-3">
                        <div class="avatar avatar-xl">
                          <img class="rounded-circle" src="{{asset('storage/'.$comment->photo_path)}}" alt="" />
                        </div>
                        <div class="flex-1 ms-2 fs-10">
                          <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="{{route('all-profile',['id'=>$comment->user_id])}}">{{ ($comment->user_name == @Auth::user()->name) ? "You" : $comment->user_name }}</a>  {{$comment->content}}</p>
                          <div class="px-2"><a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; {{$comment->created_at->diffForHumans()}} </div>
                        </div>
                      </div>
                      @endforeach
                    @else
                     <span class="bg-info text-secondary rounded px-1"> Pas de commentaires disponibles pour ce poste.</span>
                    @endif
                    </div>
                  </div>
                 <!-- <div class="d-flex mt-3">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2 fs-10">
                      <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../../pages/user/profile.html">Jessalyn Gilsig</a> Jessalyn Sarah Gilsig is a Canadian-American actress known for her roles in television series, e.g., as Lauren Davis in Boston Public, Gina Russo in Nip/Tuck, Terri Schuester in Glee, and as Siggy Haraldson on the History Channel series Vikings. 🏆</p>
                      <div class="px-2"><a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 3hrs </div>
                    </div>
                  </div> -->
                  <a class="fs-10 text-700 d-inline-block mt-2" href="#!">Load more comments (2 of 34)</a>
                </div>
              </div> 
              @endforeach
              <div class="card-body bg-body-tertiary"><a class="mb-4 d-block d-flex align-items-center" href="#experience-form1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="experience-form1"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Modifier votre mot de passe</span></a>
                            <div class="collapse" id="experience-form1">
                              <!-- <p>Nous allons envoyer un email de vérification qui vous permettra de changer votre mot de passe. Cette vérification est une manoeuvre sécuritaire importante pour nous assurer que l'opération est initié par le propriétaire.</p> -->
                            <form method="post" action="{{route('update.password')}}" id="updatePassword">
                                @csrf
                                <div class="mb-2"><input name="oldpassword" type="password" class="form-control mb-2"  placeholder=" Ancien mot de pass "  required/>
                                <input name="Newpassword" type="password" class="form-control mb-2"  placeholder="mot de pass Actuel" required/>
                                <input name="Confirmpassword" type="password" class="form-control" placeholder="confirme mot de pass"  required/>
                              </div><button class="btn btn-primary d-block w-100" type="submit">Changer le mot de passe</button>
                              </form>
                              <div class="border-dashed-bottom my-4"></div>
                            </div>
                          </div>
             
              <!-- <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <div class="row justify-content-between">
                    <div class="col">
                      <div class="d-flex">
                        <div class="avatar avatar-2xl">
                          <img class="rounded-circle" src="../../assets/img/team/8.jpg" alt="" />
                        </div>
                        <div class="flex-1 align-self-center ms-2">
                          <p class="mb-1 lh-1"><a class="fw-semi-bold" href="../../pages/user/profile.html">Johnny Depp</a> shared a <a href="#!">video</a></p>
                          <p class="mb-0 fs-10">Just Now &bull; Paris &bull; <span class="fas fa-users"></span></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="post-video-action" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-video-action"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Report</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p>See the sport of surfing as it’s never been captured before in John Florence and Blake Vincent Kueny’s second signature release, in association with the award-winning film studio, Brain Farm. The first surf film shot entirely in 4K, View From a Blue Moon. 🤩 🌎 🎬</p>
                  <div>
                    <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="fxDPooC7IbM"></div>
                  </div>
                  
                </div>
                <div class="card-footer bg-body-tertiary pt-0">
                  <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"><img src="../../assets/img/icons/spot-illustrations/like-inactive.png" width="20" alt="" /><span class="ms-1">Like</span></a></div>
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"><img src="../../assets/img/icons/spot-illustrations/comment-inactive.png" width="20" alt="" /><span class="ms-1">Comment</span></a></div>
                    <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!"><img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" /><span class="ms-1">Share</span></a></div>
                  </div>
                  <form class="d-flex align-items-center border-top border-200 pt-3">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                    </div><input class="form-control rounded-pill ms-2 fs-10" type="text" placeholder="Write a comment..." />
                  </form>
                </div>
              </div>
              -->
            </div>
            <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-body fs-10">
                  <div class="d-flex"><span class="fas fa-gift fs-9 text-warning"></span>
                    <div class="flex-1 ms-2">Welcome  <a class="fw-semi-bold" href="../../pages/user/profile.html">{{@Auth::user()->name}}</a> Dans le panel de posts</div>
                  </div>
                </div>
              </div>
              <!-- <div class="card mb-3">
                <div class="card-header bg-body-tertiary d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Add to your feed</h5><a class="fs-10" href="#!">See all</a>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/13.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Katheryn Winnick</a></h6><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/5.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Travis Fimmel</a></h6>
                      <p class="fs-10 mb-0">5 mutual connections</p><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/10.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Gustaf Skarsgård</a></h6>
                      <p class="fs-10 mb-0">10 mutual connections</p><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/8.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Clive Standen</a></h6>
                      <p class="fs-10 mb-0">8 mutual connections</p><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/15.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Jennie Jacques</a></h6><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/6.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Isaac Hempstead</a></h6><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/2.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Antony Hopkins</a></h6><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="../../pages/user/profile.html">Sophie Turner</a></h6><button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs-10">Follow</span></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-3 mb-lg-0">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0">You may interested</h5>
                </div>
                <div class="card-body fs-10">
                  <div class="d-flex btn-reveal-trigger">
                    <div class="calendar"><span class="calendar-month">Feb</span><span class="calendar-day">21</span></div>
                    <div class="flex-1 position-relative ps-3">
                      <h6 class="fs-9 mb-0"><a href="../../app/events/event-detail.html">Newmarket Nights</a></h6>
                      <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                      <p class="text-1000 mb-0">Time: 6:00AM</p>
                      <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge<div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex btn-reveal-trigger">
                    <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">31</span></div>
                    <div class="flex-1 position-relative ps-3">
                      <h6 class="fs-9 mb-0"><a href="../../app/events/event-detail.html">31st Night Celebration</a></h6>
                      <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                      <p class="text-1000 mb-0">Time: 11:00PM</p>
                      <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York<div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex btn-reveal-trigger">
                    <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">16</span></div>
                    <div class="flex-1 position-relative ps-3">
                      <h6 class="fs-9 mb-0"><a href="../../app/events/event-detail.html">Folk Festival</a></h6>
                      <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                      <p class="text-1000 mb-0">Time: 9:00AM</p>
                      <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North Cambridge
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-body-tertiary p-0 border-top"><a class="btn btn-link d-block w-100" href="../../app/events/event-list.html">All Events<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
              </div> -->
            </div>
          </div>
          <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
@endsection

