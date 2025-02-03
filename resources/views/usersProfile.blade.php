
@extends("MainUser.MainTemplate")
@section("content")
         <div class="card mb-3">
            <div class="card-header position-relative min-vh-25 mb-7">
              <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{asset('storage/'.$user->photo_path)}});"></div><!--/.bg-holder-->
              <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset('storage/'.$user->photo_path)}}" width="200" alt="" /></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-1"> {{$user->name}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h4>
                  <label for="" class="text-info">Profession</label> :<h5 class="fs-9 fw-normal text-secondary">{{empty($user->profession) ? $user->profession : "pas d'information 🚫!"}}</h5> 
                  <label for="" class="text-info">Pays</label> : <p class="text-500 text-info">{{isset($user->country) ? $user->country : "Pas d'information! 🚫"}}</p>
                  <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                </div>
                <!-- <div class="col ps-2 ps-lg-3">
                  </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="{{asset('images/icons/g.png')}}" alt="Generic placeholder image" width="30" />
                    <div class="flex-1">
                      <h6 class="mb-0">Google</h6>
                    </div>
                  </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="{{asset('images/icons/apple.png')}}" alt="Generic placeholder image" width="30" />
                    <div class="flex-1">
                      <h6 class="mb-0">Apple</h6>
                    </div>
                  </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="{{asset('images/icons/hp.png')}}" alt="Generic placeholder image" width="30" />
                    <div class="flex-1">
                      <h6 class="mb-0">Hewlett Packard</h6>
                    </div>
                  </a></div> -->
              </div>
            </div>
          </div>
          <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0">Intro</h5>
                </div>
                <div class="card-body text-justify">
                  <p class="mb-0 text-1000 text-secondary">Information à propos de <strong>{{$user->name}}</strong></p>
                  <div class="collapse show" id="profile-intro">
                    <p class="mt-3 text-1000 text-secondary">{{isset($user->about) ? $user->about : "Pas d'information possible! 🚫" }}</p>
                  </div>
                </div>
                <div class="card-footer bg-body-tertiary p-0 border-top"><button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs-11"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs-11"></span></span></button></div>
              </div>
              <!-- <div class="card mb-3">
                <div class="card-header bg-body-tertiary d-flex justify-content-between">
                  <h5 class="mb-0">Associations</h5><a class="font-sans-serif" href="#">Toutes les Associations</a>
                </div>
                <!-- <div class="card-body fs-10 pb-0">
                  <div class="row">
                    <div class="col-sm-6 mb-3">
                      <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('images/icons/apple.png')}}" alt="" width="50" />
                        <div class="flex-1">
                          <h6 class="fs-9 mb-0"><a class="stretched-link" href="#!">Apple</a></h6>
                          <p class="mb-1">3243 associates</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('images/icons/g.png')}}" alt="" width="50" />
                        <div class="flex-1">
                          <h6 class="fs-9 mb-0"><a class="stretched-link" href="#!">Google</a></h6>
                          <p class="mb-1">34598 associates</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('images/icons/instagram.png')}}" alt="" width="50" />
                        <div class="flex-1">
                          <h6 class="fs-9 mb-0"><a class="stretched-link" href="#!">Instagram</a></h6>
                          <p class="mb-1">7652 associates</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('images/icons/facebook.png')}}" alt="" width="50" />
                        <div class="flex-1">
                          <h6 class="fs-9 mb-0"><a class="stretched-link" href="#!">Facebook</a></h6>
                          <p class="mb-1">765 associates</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              <!-- </div> --> 
            </div>
            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                <div class="card mb-3">
                  <div class="card-header bg-body-tertiary">
                    <h5 class="mb-0">Plus d'informations</h5>
                  </div>
                  <div class="card">
                      <div class="flex-1 position-relative ps-3">
                        <h6 class="fs-9 mb-0">Localisation & Mail<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                        <p class="mb-1 text-info"> Mail</p>
                        <p class="text-1000 mb-0"><h6 class="text-secondary">{{$user->email}}</h6></p>
                        <p class="mb-1 text-info"> localisation</p>
                        <p class="text-1000 mb-0"><span class="text-secondary"> {{ isset($user->location) ? $user->location : "Pas d'informations!🚫" }}</span></p>
                        <div class="border-bottom border-dashed my-3"></div>
                      </div>
                    </div>
                  </div>
              </div>  
              </div>
            </div>
          </div>

@endSection()
  