<div class="ms-xl-auto">
						<ul class="navbar-nav flex-row align-items-center">

							<!-- Notification dropdown START -->
							<li class="nav-item ms-2 ms-md-3 dropdown">
								<!-- Notification button -->
								<a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
									
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell fa-fw" viewBox="0 0 16 16">
										<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
									</svg>
								</a>
								<!-- Notification dote -->
								<span class="notif-badge animation-blink"></span>
								
								<!-- Notification dropdown menu START -->
								<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
									<div class="card bg-transparent">
										@if(@Auth::user()->unreadNotifications->count() > 0)
											<div class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
												<h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">{{ @Auth::user()->unreadNotifications->count() }} new</span></h6>
												<form action="{{route('page.users')}}" method="" >
													<input type="hidden" name="clear" value="true">
													<input type="submit" value="clear all" class="btn btn-link small">
												</form>
											</div>
										@endif
										<div class="card-body p-0">
											<ul class="list-group list-unstyled list-group-flush">
												
												<!-- Notif item -->
												@if(@isset($_GET['clear']) and $_GET['clear']=="true")

													{{@Auth::user()->unreadNotifications->markAsRead()}}

												@endif

												@forelse(@Auth::user()->unreadnotifications as $notification)
													<li>
														<a href="{{route('file.sharedWithMe')}}" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="{{asset('storage/avatars/default.png')}}" alt="avatar">
																</div>
															</div>
															<div>
																<p class="text-body small m-0"> <b>oups!</b> {{$notification->data['message']}} 👁‍🗨</p>
																<u class="small">Check it on your <b>shared with me</b> </u>
															</div>
														</a>
													</li>
												@empty
													<li>
														<div class="card-footer bg-transparent border-0 py-3 text-center position-relativ">
															<p class="text-body small m-4 text-white btn btn-outline-success">Sorry! There's no notification <b>Located</b> ❌ </p>
																
														</div>
													
													</li>
												@endforelse

											</ul>
										</div>
									</div>
								</div>
								<!-- Notification dropdown menu END -->
							</li>
							<!-- Notification dropdown END -->

							<!-- Profile dropdown START -->
							<li class="nav-item ms-2 ms-md-3 dropdown">
								<!-- Avatar -->
								<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
									<img class="avatar-img rounded-circle" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="{{@Auth::user()->name}}">
								</a>

								<!-- Profile dropdown START -->
								<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
									<!-- Profile info -->
									<li class="px-3">
										<div class="d-flex align-items-center">
											<!-- Avatar -->
											<div class="avatar me-3 mb-3">
												<img class="avatar-img rounded-circle shadow" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="avatar">
											</div>
											<div>
												<a class="h6 mt-2 mt-sm-0" href="#">{{@Auth::user()->name}}</a>
												<p class="small m-0">{{@Auth::user()->email}}</p>
											</div>
										</div>
									</li>
									<li> <hr class="dropdown-divider"></li>
									<!-- Links -->
									<li>
										<a class="dropdown-item" href="{{route('profile.edit')}}">

											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
												<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
											</svg>
										Edit Profile
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{route('profile.update')}}">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
												<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
												<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
											</svg>
											Account Settings
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{route('page.help')}}">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
											<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
										</svg>
											Help
										</a>
									</li>
									<li>
										<form action="{{route('logout')}}" method="post">
											@Csrf
											<input type="hidden" name="logout" >	
											<button type="submit" class="dropdown-item bg-danger-soft-hover">
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
										<div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
											<!-- <span>Mode:</span> -->
											<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
													<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
													<use href="#"></use>
												</svg> Light
											</button>
											<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
													<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
													<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
													<use href="#"></use>
												</svg> Dark
											</button>
											<button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
													<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
													<use href="#"></use>
												</svg> Auto
											</button>
										</div>
									</li> 
									<!-- Dark mode options END-->
								</ul>
								<!-- Profile dropdown END -->
							</li>
							<!-- Profile dropdown END -->
						</ul>
					</div>