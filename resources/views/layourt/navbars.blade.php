
         @if(@isset($_COOKIE['first_time']))
          <div class="toast hide notice shadow-none bg-transparent" id="cookie-notice" role="alert" data-options='{"autoShow":true,"autoShowDelay":360000,"cookieExpireTime":7200}' data-autohide="false" aria-live="assertive"  style="max-width:35rem">
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
        
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">
              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            </div><a class="navbar-brand" href="{{route('page.users')}}">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('storage/avatars/logo1.png')}}" alt="" width="140" /></div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
              @if(@Auth::user()->admin==1)
              <li class="nav-item"><!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span></div>
                  </a>
                  <ul class="nav collapse show" id="dashboard">
                    <li class="nav-item"><a class="nav-link active" href="{{Route('dashboard-system')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Système</span></div>
                      </a><!-- more inner pages--></li>
                    <li class="nav-item"><a class="nav-link" href="{{Route('dashboard-users')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Users</span></div>
                      </a><!-- more inner pages--></li>
                    <li class="nav-item"><a class="nav-link" href="{{Route('dashboard-files')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Données</span></div>
                      </a><!-- more inner pages--></li>
                   
                  </ul>
              </li>
              @endif
                <li class="nav-item">
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Dashboard</div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>
                  <a class="nav-link" href="{{route('myFiles')}}" role="button" >
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Mes documents</span><span class="badge rounded-pill ms-2 badge-subtle-success">New</span></div>
                  </a>
                 
                </li>
                <li class="nav-item">
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">App</div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>
                  <a class="nav-link" href="{{route('page.users')}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file"></span></span><span class="nav-link-text ps-1">Acceuil</span></div>
                  </a>
                  <a class="nav-link" href="{{route('all-profile',['id'=>@Auth::user()->id])}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Profile</span></div>
                  </a>
                  <a class="nav-link" href="{{route('page.help')}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-help"></span></span><span class="nav-link-text ps-1">F.A.Q</span></div>
                  </a><a class="nav-link " href="{{route('policy')}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-cogs"></span></span><span class="nav-link-text ps-1">Politique & condition</span></div>
                  </a>
                  
                 
                  <a class="nav-link " href="{{route('contact')}}" role="button" >
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-edit"></span></span><span class="nav-link-text ps-1">Contact</span></div>
                  </a>
                 
                 
                  <!-- <a class="nav-link " href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">E commerce</span></div>
                  </a> -->
                 
                 
                  <!-- <a class="nav-link " href="#e-learning" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-graduation-cap"></span></span><span class="nav-link-text ps-1">E learning</span><span class="badge rounded-pill ms-2 badge-subtle-success">New</span></div>
                  </a> -->
                 
                 
                  <!-- <a class="nav-link" href="../app/kanban.html" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Kanban</span></div>
                  </a> -->
                 
                  <a class="nav-link" href="{{route('invite')}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Invitation</span></div>
                  </a>
                  
                  
                  
                  <a class="nav-link" href="{{route('quickdocument')}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-folder-open"></span></span><span class="nav-link-text ps-1">Créer Un fichier</span></div>
                  </a>
                  <a class="nav-link" href="{{route('social')}}" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Social</span></div>
                  </a>
                  
                 
                  <!-- <a class="nav-link " href="#support-desk" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="support-desk">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">Support desk</span></div>
                  </a> -->
                
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;">
        </nav>