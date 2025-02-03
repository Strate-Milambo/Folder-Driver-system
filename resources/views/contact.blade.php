@extends('MainUser.MainTemplate')
@section('content')
          <div class="row g-3">
            <div class="col-xxl-9 col-xl-8">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Contactez le service Data Sky</h5>
                </div>
                <div class="card-body bg-body-tertiary">
                  <form class="row g-3" method="post" action="{{route('contact-DataSky')}}">
                    @csrf
                    <div class="col-lg-6"> <label class="form-label" for="first-name">Nom</label><input class="form-control" id="first-name" type="text" required placeholder="{{@Auth::user()->name}}" value="{{@Auth::user()->name}}" name="name"/></div>
                    <div class="col-lg-6"> <label class="form-label" for="last-name">Email</label><input class="form-control" id="last-name" type="text" required placeholder="{{@Auth::user()->email}}" value="{{@Auth::user()->email}}"  name="email"/></div>

                    <div class="col-lg-12"><label class="form-label" for="email3">Subject</label><input class="form-control" id="email3" type="text" name="subject" placeholder="Entrer votre suject" required/></div>
                    <div class="col-lg-12"> <label class="form-label" for="intro">Content</label><textarea class="form-control" id="intro" name="content" cols="4" rows="4" required> </textarea></div>
                    <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary" type="submit">Contactez</button></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-xl-4">
              <div class="row g-3 g-xl-0 sticky-sidebar top-navbar-height">
                <div class="col-20">
                  <div class="card">
                    <div class="card-header d-flex flex-between-center py-2 bg-body-tertiary">
                      <h6 class="mb-0">DataSky Information</h6>
                      
                    </div>
                    <div class="card-body">
                      <div class="row g-0 border-bottom pb-x1 mb-x1 align-items-sm-center align-items-xl-start">
                        <!-- <div class="col-12 col-sm-auto col-xl-12 me-sm-3 me-xl-0">
                          <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="../../assets/img/team/1.jpg" alt="" />
                          </div>
                        </div> -->
                        <div class="col-12 col-sm-auto col-xl-12">
                          
                          <p class="fst-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                        </svg>Location</p><p>Mont-ngafula, quartier plateau universitaire (UNIKIN). DRC, kinshasa</p>
                        </div>
                      </div>
                      <div class="row g-0 justify-content-lg-between">
                        <div class="col-auto col-md-6 col-lg-auto">
                          <div class="row">
                            <div class="col-md-auto mb-4 mb-md-0 mb-xl-4">
                              <h6 class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-at-fill mx-2" viewBox="0 0 16 16">
                                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                              </svg>Email</h6><a class="fst-italic"href="mailto:mattrogers@gmail.com">DataSky4742@gmail.com</a>
                            </div>
                            <div class="col-md-auto mb-4 mb-md-0 mb-xl-4">
                              <h6 class="mb-1 "><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone-fill mx-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                              </svg>Phone Number</h6><a class="fst-italic" href="tel:+6(855)747677">+(243) 89 46 76 466</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-auto col-md-6 col-lg-auto ps-md-5 ps-xl-0">
                          <div class="border-start position-absolute start-50 d-none d-md-block d-xl-none" style="height: 72px"></div>
                          <h6 class="d-flex align-items-center mb-1"><span class="me-2">Disponibilité</span><span class="badge badge-subtle-info">Every day</span></h6><a class="text-truncate fs-10 font-sans-serif mb-1 d-block text-700" href="../../app/support-desk/tickets-preview.html">Sur toutes les plate formes</a>
                          <p class="fs-10 mb-0 text-600 fw-semi-bold"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-hourglass-split mx-2" viewBox="0 0 16 16">
                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                          </svg>8:00 AM<span class="mx-1">|</span><span class="fst-italic">10:30 PM </span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
     