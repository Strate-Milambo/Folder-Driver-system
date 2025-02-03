@include("layourt/headerUser")

@if(@isset($_COOKIE['first_time']))
          <div class="toast hide notice shadow-none bg-transparent"  role="alert"  data-options='{"autoShow":true}'  data-bs-delay="1000000"  style="max-width:35rem">
                    <div class="toast-body my-3 ms-0 ms-md-5">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex">
                            <div class="pe-3"><img src="{{asset('storage/avatars/alert.png')}}" width="90"  alt="policy alert" /></div>
                            <div>
                              <p>En vous registrant sur cette application, nous espèrerons que vous acceptez tous les terms et conditions liées à l'application. </p><button class="btn btn-sm btn-falcon-primary me-3" type="button" data-bs-dismiss="toast" aria-label="Close">Okay</button><a class="learn-more me-3" href="{{route('policy')}}">Learn more<span class="fas fa-chevron-right ms-1 fs-11"></span></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          @endif
 
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        @include('layourt/navbars')
        <div class="content">
          <!-- top navbar -->
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{route('page.users')}}">
              <div class="d-flex align-items-center"><img class="me-2" src="{{asset('storage/avatars/logo1.png')}}" alt="" width="70" /></div>
            </a>
             <!-- search bloc -->
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
               
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                  <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
                 
                </div>
                
              </li>
            </ul>
               <!-- fin search bloc -->
            <!-- début navbar incon  -->
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
              <li class="nav-item ps-2 pe-0">
                <div class="dropdown theme-control-dropdown"><a class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait fs-9 pe-1 py-0" href="#" role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-sun fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="light"></span><span class="fas fa-moon fs-7" data-fa-transform="shrink-3" data-theme-dropdown-toggle-icon="dark"></span><span class="fas fa-adjust fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="auto"></span></a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-caret border py-0 mt-3" aria-labelledby="themeSwitchDropdown">
                    <div class="bg-white dark__bg-1000 rounded-2 py-2"><button class="dropdown-item d-flex align-items-center gap-2" type="button" value="light" data-theme-control="theme"><span class="fas fa-sun"></span>Light<span class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button><button class="dropdown-item d-flex align-items-center gap-2" type="button" value="dark" data-theme-control="theme"><span class="fas fa-moon" data-fa-transform=""></span>Dark<span class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button><button class="dropdown-item d-flex align-items-center gap-2" type="button" value="auto" data-theme-control="theme"><span class="fas fa-adjust" data-fa-transform=""></span>Auto<span class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button></div>
                  </div>
                </div>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span> @if(@Auth::user()->unreadNotifications->count() > 0) <span class="notification-indicator-number">{{@Auth::user()->unreadNotifications->count()}}</span> @endif</a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    @if(@Auth::user()->unreadNotifications->count() > 0)
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Notifications </h6>
                        </div>
                        <div class="col-auto ps-0 ps-sm-3">
                          <form action="{{route('page.users')}}" method="" >
                            <input type="hidden" name="clear" value="true">
                            <input type="submit" value="Marquer lues" class="btn btn-link small col-auto ps-0 ps-sm-3" style='text-decoration:none' >
                          </form>
                        </div>
                      </div>
                    </div>
                    @endif
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs-10">
                      @if(@Auth::user()->unreadNotifications->count() < 1)
                      <div class="list-group-title border-bottom">ouff ! 🙄</div>
                      @else
                      <div class="list-group-title border-bottom">NEW</div>

                      @endif
                        
												@forelse($notifications as $notification)
                           
                            @if(@isset($_GET['clear']) and $_GET['clear']=="true")

                              {{@Auth::user()->unreadNotifications->markAsRead()}}

                            @endif
                           
                            <div class="list-group-item">
                              <a class="notification notification-flush notification-unread" href="{{route('page.users',['search'=>$notification->data['user']])}}">
                                <div class="notification-avatar">
                                  <div class="avatar avatar-2xl me-3">
                                    <img class="rounded-circle" src="{{asset('storage/'.$notification->data['image'])}}" alt="" />
                                  </div>
                                </div>
                                <div class="notification-body">
                                  @if($notification->type=="App\Notifications\sendFolderNotifications")
                                    <p class="mb-1"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-send-arrow-down-fill text-info" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54L13.026 8.03A4.5 4.5 0 0 0 8 12.5c0 .5 0 1.5-.773.36l-1.59-2.498L.644 7.184l-.002-.001-.41-.261a.5.5 0 0 1 .083-.886l.452-.18.001-.001L15.314.035a.5.5 0 0 1 .54.111M6.637 10.07l7.494-7.494.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154z"/>
                                      <path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-1.646a.5.5 0 0 1-.722-.016l-1.149-1.25a.5.5 0 1 1 .737-.676l.28.305V11a.5.5 0 0 1 1 0v1.793l.396-.397a.5.5 0 0 1 .708.708z"/>
                                    </svg>
                                    <b class="text-info mx-1">oups! 
                                    </b> l'utilisateur  <span class="text-secondary fw-bold"> {{$notification->data['user']}}</span> vous a envoyé des contenus. 👁‍🗨</p>
                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>{{$notification->created_at->diffForHumans()}}</span>
                                 
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
                                    
                                  <b class="text-success mx-1">Réussi</b> 
                                 
                                  <span class="text-secondary fw-bold">{{$notification->data['user']}}</span>✌ a accepté votre collaborations </p>
                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji"></span>{{$notification->created_at->diffForHumans()}}</span>
                               
                                  @elseif($notification->type=="App\Notifications\DeletedCollaborations")
                                  <p class="mb-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                  </svg>
                                    
                                  <b class="text-danger mx-1">Annulé</b> 
                                 
                                  <span class="text-secondary fw-bold">{{$notification->data['user']}}</span>✌ a annulé votre collaboration </p>
                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji"></span>{{$notification->created_at->diffForHumans()}}</span>
                                  @endif
                                  
                                </div>
                              </a>
                            </div>
                            <!-- <div class="list-group-title border-bottom">EARLIER</div> -->
                            <!-- <div class="card-footer text-center border-top"><a class="card-link d-block" href="{{route('notifications')}}">View all</a></div> -->
                        @empty
													
														<div class="notification notification-flush notification-unread">
															<p class="text-body small m-4 text-white btn btn-outline-info"><span class="text-info">oups!</span> Aucune notification <b>Localisée</b> ❌ </p>
														</div>
                           
                           										
												@endforelse
                        
                        <div class="card-footer text-center border-top"><a class="card-link d-block" href="{{route('notifications')}}">Voir toutes. 👁</a></div>
                 </div>
                    </div>
                   
                  </div>
                </div>
             
								
              </li>
              <!-- <li class="nav-item dropdown px-1">
                <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button" data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16" fill="none">
                    <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                    <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                    <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                    <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                    <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                    <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                    <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                    <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                    <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                  </svg></a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg" aria-labelledby="navbarDropdownMenu">
                  <div class="card shadow-none">
                    <div class="scrollbar-overlay nine-dots-dropdown">
                      <div class="card-body px-3">
                        <div class="row text-center gx-0 gy-0">
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="../pages/user/profile.html" target="_blank">
                              <div class="avatar avatar-2xl"> <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" /></div>
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11">Account</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://themewagon.com/" target="_blank"><img class="rounded" src="../assets/img/nav-icons/themewagon.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Themewagon</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://mailbluster.com/" target="_blank"><img class="rounded" src="../assets/img/nav-icons/mailbluster.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Mailbluster</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/google.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Google</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/spotify.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Spotify</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/steam.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Steam</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/github-light.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Github</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/discord.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Discord</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/xbox.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">xbox</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/trello.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Kanban</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/hp.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Hp</p>
                            </a></div>
                          <div class="col-12">
                            <hr class="my-3 mx-n3 bg-200" />
                          </div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/linkedin.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Linkedin</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/twitter.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Twitter</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/facebook.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Facebook</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/instagram.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Instagram</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/pinterest.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Pinterest</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/slack.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Slack</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="../assets/img/nav-icons/deviantart.png" alt="" width="40" height="40" />
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Deviantart</p>
                            </a></div>
                          <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="../app/events/event-detail.html" target="_blank">
                              <div class="avatar avatar-2xl">
                                <div class="avatar-name rounded-circle bg-primary-subtle text-primary"><span class="fs-7">E</span></div>
                              </div>
                              <p class="mb-0 fw-medium text-800 text-truncate fs-11">Events</p>
                            </a></div>
                          <div class="col-12"><a class="btn btn-outline-primary btn-sm mt-4" href="#!">Show more</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li> -->
              <li class="nav-item dropdown">
								<!-- Avatar -->
								<a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="" />
                  </div>
                </a>

								<!-- Profile dropdown START -->
								<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3 px-4 " aria-labelledby="profileDropdown">
									<!-- Profile info -->      
									<li class="px-3">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-xl me-3 max-w-[20px] mb-2">
                          <img class="rounded-circle shadow" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="avatar">
                        </div>
                        <div>
                          <p class="h4 mt-2 mt-sm-0 text-secondary" href="#">{{@Auth::user()->name}}</p>
                          <p class="h6 text-info  m-0 ">{{@Auth::user()->email}}</p>
                        </div>
                      </div>
									</li>
									<li> <hr class="dropdown-divider"></li>
									<!-- Links -->
									<li>
										<a class="dropdown-item text-secondary" href="{{route('all-profile',['id'=>@Auth::user()->id])}}">

											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
												<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
											</svg>
										  Profile
										</a>
									</li>
                  <li> <hr class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item text-secondary" href="{{route('profile')}}">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
												<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
												<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
											</svg>
											Account Settings
										</a>
									</li>
                  <li> <hr class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item text-secondary" href="{{route('page.help')}}">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
											<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
										</svg>
											Help
										</a>
									</li>
                  <li> <hr class="dropdown-divider"></li>
									<li>
										<form action="{{route('logout')}}" method="post">
											@Csrf
											<input type="hidden" name="logout" >	
											<button type="submit" class="dropdown-item bg-danger-soft-hover text-secondary">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
												<path d="M7.5 1v7h1V1z"/>
												<path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
												</svg>
												Sign Out
											</button>
										</form>
										
									<li> 
									<hr class="dropdown-divider"></li>

									<!-- Dark mode options START -->
									<li>
                          <p>Votre carte d'information</p>
									</li> 
									<!-- Dark mode options END-->
								</ul>
								<!-- Profile dropdown END -->
							</li>
            </ul>
            <!-- fin navbar icon -->
          </nav>
            <!-- top navbar -->
         
          <script>
            var navbarPosition = localStorage.getItem('navbarPosition');
            var navbarVertical = document.querySelector('.navbar-vertical');
            var navbarTopVertical = document.querySelector('.content .navbar-top');
            var navbarTop = document.querySelector('[data-layout] .navbar-top:not([data-double-top-nav');
            var navbarDoubleTop = document.querySelector('[data-double-top-nav]');
            var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

            if (localStorage.getItem('navbarPosition') === 'double-top') {
              document.documentElement.classList.toggle('double-top-nav-layout');
            }

            if (navbarPosition === 'top') {
              navbarTop.removeAttribute('style');
              navbarTopVertical.remove(navbarTopVertical);
              navbarVertical.remove(navbarVertical);
              navbarTopCombo.remove(navbarTopCombo);
              navbarDoubleTop.remove(navbarDoubleTop);
            } else if (navbarPosition === 'combo') {
              navbarVertical.removeAttribute('style');
              navbarTopCombo.removeAttribute('style');
              navbarTop.remove(navbarTop);
              navbarTopVertical.remove(navbarTopVertical);
              navbarDoubleTop.remove(navbarDoubleTop);
            } else if (navbarPosition === 'double-top') {
              navbarDoubleTop.removeAttribute('style');
              navbarTopVertical.remove(navbarTopVertical);
              navbarVertical.remove(navbarVertical);
              navbarTop.remove(navbarTop);
              navbarTopCombo.remove(navbarTopCombo);
            } else {
              navbarVertical.removeAttribute('style');
              navbarTopVertical.removeAttribute('style');
              navbarTop.remove(navbarTop);
              navbarDoubleTop.remove(navbarDoubleTop);
              navbarTopCombo.remove(navbarTopCombo);
            }
          </script>
          <!-- debut middle content -->
          @yield('content')
         
          <!-- fin middle content -->
        
          <footer class="footer">
            <div class="row g-0 justify-content-between fs-10 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">Design by <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2024 &copy; <a href="https://themewagon.com">Sman pop</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.0.0</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
      	
    </main><!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->
@include("layourt/footerUser")