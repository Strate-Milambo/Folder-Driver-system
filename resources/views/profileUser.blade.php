@extends('MainUser.MainTemplate')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
          <div class="row">
            <div class="col-12">
              <div class="card mb-3 btn-reveal-trigger">
                <div class="card-header position-relative min-vh-25 mb-8">
                  <div class="cover-image">
                    <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{asset('storage/'.@Auth::user()->photo_path)}});"></div><!--/.bg-holder-->
                  </div>
                  <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                    <div class="h-100 w-100 rounded-circle overflow-hidden position-relative mb-2"> <img src="{{asset('storage/'.@Auth::user()->photo_path)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                    <form action="{{route('updateProfile')}}" class="row  mb-5" method="post" enctype="multipart/form-data">
							        @csrf 
                    <input class="d-none" id="profile-image" type="file" name="photo_path" accept="image/jpg,image/png" required/>
                   
									<!-- <label class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</label> -->
									  
                    <label class="mb-0 overlay-icon d-flex flex-center ml-2" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-1 text-white dark__text-white text-center fs-10"><span class="d-block">choisi une photo</span></span></label></div>
                    <div class="card ">
                      <div class="card-header d-flex align-items-center justify-content-between py-1 mb-2">
                        <button type="submit" class="btn btn-secondary-soft mb-0 mt-1 bg-info" for="uploadfile-1" data-bs-target="#upload" data-bs-toggle="modal" ><span class="fas fa-upload icon" style="color:blue"></span></button>
                        @if(@Auth::user()->photo_path !="avatars/default.png")
                        <button type="submit" class="btn btn-secondary-soft mb-0 mt-1 bg-secondary" data-bs-target="#error" data-bs-toggle="modal"><span class="fas fa-trash icon" style="color:red"></span></button>
                        @endif
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- //model -->
          <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 700px">
              <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                  <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
                  <h4 class="mb-1 text-secondary" id="modalExampleDemoLabel">Êtes-vous sûr de vouloir supprimer votre compte ?</h4>
                  <p class="alert alert-danger text-secondary">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.</p>
                  <form method="POST" action="{{route('profile.delete')}}">
                    @csrf
                    <div class="mb-3">
                      <label class="col-form-label" for="recipient-name">Mot de passe</label>
                      <input id="recipient-name" type="text" name="password" placeholder="Votre mot de passe" required  class=" form-control @error('password') is-invalid @enderror"/>
                      @error('password')
                          <div class="text-danger"> le mot de passe ne correspond pas!</div>
                      @enderror
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
          <!-- //model delete photo -->
          <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px">
              <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                  <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
                  <p class="mb-1 text-secondary" id="modalExampleDemoLabel">Êtes-vous sûr de vouloir supprimer votre profile ?</p>
                  <p class="alert alert-danger text-secondary">En supprimant votre photo de profile il est difficile que les autres utilisateurs puissent vous reconnaitre. Voulez-vous vraiment la supprimé?</p>
                  <form method="POST" action="{{route('updateProfile')}}">
                    @csrf
                    <div class="mb-3">
                      <input id="recipient-name" type="hidden" name="delete" value="yes"/>
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
        <!-- end model delete -->
          <!-- //model upload photo -->
          <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px">
              <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                  <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-info">
                  <p class="mb-1 text-secondary" id="modalExampleDemoLabel">Téléchargemet d'une photo de profile</p>
                  <p class="alert alert-info text-secondary">Avez-vous déjà choisi un fichier de format photo  ( .png, .jpeg, .jpg), avant de soumettre cet upload ?</p>
                  <form action="">
                   
                    <div class="modal-footer">
                      <button class="btn btn-info" type="button" data-bs-dismiss="modal">Valider</button>
                      <button class="btn btn-secondary" type="submit">Annuler</button>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        <!-- end model upload photo -->

          <div class="card mb-3 mt-3">
            <div class="card-header d-flex align-items-center justify-content-between">
              <a class="btn btn-falcon-default btn-sm" type="button" href="{{route('page.users')}}"><span class="fas fa-arrow-left"></span></a>
              <!-- <div class="d-flex"><button class="btn btn-sm btn-falcon-default d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#contactDetailsOffcanvas" aria-controls="contactDetailsOffcanvas"><span class="fas fa-tasks" data-fa-transform="shrink-2"></span><span class="ms-1">To-do</span></button>
                <div class="bg-300 mx-3 d-xl-none" style="width:1px; height:29px"></div><button class="btn btn-falcon-default btn-sm me-2" type="button"><span class="fas fa-edit"></span><span class="d-none d-xl-inline-block ms-1">Edit</span></button><button class="btn btn-falcon-default btn-sm d-none d-sm-block" type="button"><span class="fas fa-sync-alt"></span><span class="d-none d-xl-inline-block ms-1">Convert to Agent</span></button><button class="btn btn-falcon-default btn-sm btn-sm d-none d-sm-block mx-2" type="button"><span class="fas fa-lock"></span><span class="d-none d-xl-inline-block ms-1">Send Activation Email</span></button><button class="btn btn-falcon-default btn-sm d-none d-sm-block me-2" type="button"><span class="fas fa-trash-alt"></span><span class="d-none d-xl-inline-block ms-1">Delete</span></button><button class="btn btn-falcon-default btn-sm d-none d-sm-block me-2" type="button"><span class="fas fa-key"></span><span class="d-none d-xl-inline-block ms-1">Change Password</span></button>
                <div class="dropdown font-sans-serif"><button class="btn btn-falcon-default text-600 btn-sm dropdown-toggle dropdown-caret-none" type="button" id="preview-dropdown" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-v fs-11"></span></button>
                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="preview-dropdown"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a><a class="dropdown-item d-sm-none" href="#!">Convert to Agent</a><a class="dropdown-item d-sm-none" href="#!">Send Activation Email</a><a class="dropdown-item d-sm-none" href="#!">Delete</a><a class="dropdown-item d-sm-none" href="#!">Change Password</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="row g-3">
            <div class="col-xxl-3 col-xl-4 order-xl-1">
              <div class="position-xl-sticky top-0">
              <div class="card mb-3 overflow-hidden">
                  <div class="card-header">
                    <h5 class="mb-0">Account Settings</h5>
                  </div>
                  <div class="card-body bg-body-tertiary">
                    <h6 class="fw-bold">Qui peut aussi être notifier par tes notifications ?<span class="fs-11 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Only The group of selected people can see your profile"><span class="fas fa-question-circle"></span></span></h6>
                    <div class="ps-2">
                      <div class="form-check mb-0 lh-1"><input class="form-check-input" type="radio" value="" id="everyone" name="view-settings" /><label class="form-check-label mb-0" for="everyone">Tout le monde</label></div>
                      <div class="form-check mb-0 lh-1"><input class="form-check-input" type="radio" value="" id="my-followers" checked="checked" name="view-settings" /><label class="form-check-label mb-0" for="my-followers">Mes collaborateurs</label></div>
                      <div class="form-check mb-0 lh-1"><input class="form-check-input" type="radio" value="" id="only-me" name="view-settings" /><label class="form-check-label mb-0" for="only-me">Uniquement moi</label></div>
                    </div>
                    <h6 class="mt-2 fw-bold">Qui peut vous envoyer des contenus ?<span class="fs-11 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Only The group of selected people can tag you"><span class="fas fa-question-circle"></span></span></h6>
                    <div class="ps-2">
                      <div class="form-check mb-0 lh-1"><input class="form-check-input" type="radio" value="" id="tag-everyone" name="tag-settings" /><label class="form-check-label mb-0" for="tag-everyone">Tout le monde </label></div>
                      <div class="form-check mb-0 lh-1"><input class="form-check-input" type="radio" value="" id="group-members" checked="checked" name="tag-settings" /><label class="form-check-label mb-0" for="group-members">Juste mes collaborateurs</label></div>
                    </div>
                    <div class="border-dashed-bottom my-3"></div>
                    <!-- <div class="form-check mb-0 lh-1"><input class="form-check-input" type="checkbox" id="userSettings1" checked="checked" /><label class="form-check-label mb-0" for="userSettings1">Allow users to show your followers</label></div>
                    <div class="form-check mb-0 lh-1"><input class="form-check-input" type="checkbox" id="userSettings2" checked="checked" /><label class="form-check-label mb-0" for="userSettings2">Allow users to show your email</label></div>
                    <div class="form-check mb-0 lh-1"><input class="form-check-input" type="checkbox" id="userSettings3" /><label class="form-check-label mb-0" for="userSettings3">Allow users to show your experiences</label></div> -->
                    <div class="border-bottom border-dashed my-3"></div>
                    <div class="form-check form-switch mb-0 lh-1"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="checked" /><label class="form-check-label mb-0" for="flexSwitchCheckDefault">Permettre les notifications des mise à jour</label></div>
                    <div class="form-check form-switch mb-0 lh-1"><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" /><label class="form-check-label mb-0" for="flexSwitchCheckChecked">Permettre la visibillité du compte</label></div>
                  </div>
                </div>
             
              </div>
            </div>
            <div class="col-xxl-9 col-xl-8">
              <div class="card overflow-hidden">
                <div class="card-header p-0 scrollbar-overlay border-bottom">
                  <ul class="nav nav-tabs border-0 tab-contact-details flex-nowrap" id="contact-details-tab" role="tablist">
                    <li class="nav-item text-nowrap" role="presentation"><a class="nav-link mb-0 d-flex align-items-center gap-1 py-3 px-x1 active" id="contact-timeline-tab" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><span class="fas fa-edit icon text-600"></span>
                        <h6 class="mb-0 text-600">Mettre à jour</h6>
                      </a></li>
                    <li class="nav-item text-nowrap" role="presentation"><a class="nav-link mb-0 d-flex align-items-center gap-1 py-3 px-x1" id="contact-tickets-tab" data-bs-toggle="tab" href="#tickets" role="tab" aria-controls="tickets" aria-selected="false"><span class="fas fa-unlock-alt text-600"></span>
                        <h6 class="mb-0 text-600">Changer le password</h6>
                      </a></li>
                    <li class="nav-item text-nowrap" role="presentation"><a class="nav-link mb-0 d-flex align-items-center gap-1 py-3 px-x1" id="contact-notes-tab" data-bs-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false"><span class="fas fa-trash-alt icon text-600"></span>
                        <h6 class="mb-0 text-600">Supprimer le compte</h6>
                      </a></li>
                  </ul>
                </div>
                <div class="tab-content">
                  <div class="card-body bg-body-tertiary tab-pane active" id="timeline" role="tabpanel" aria-labelledby="contact-timeline-tab">
                    
                    <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="mb-0">Profile Settings</h5>
                    </div>
                
                <div class="card-body bg-body-tertiary">
                  <form class="row g-3" method="POST" action="{{route('updateProfile')}}" id="updateProfile">
                    @csrf 
                    <div class="col-lg-6"> <label class="form-label" for="first-name">First Name</label><input type="text" class="form-control" name="name" placeholder="{{@Auth::user()->name}}" required></div>
                    <div class="col-lg-6"> <label class="form-label" for="email1">Email</label><input class="form-control" id="email1" type="reset" value="{{@Auth::user()->email}}" readonly required/></div>
                    <div class="col-lg-6"> <label class="form-label" for="email1">pays</label><span class="input-group-text">République Du Congo </span></div>
                    <div class="col-lg-6"> <label class="form-label" for="email2">Location</label><input class="form-control" type="text" name="location" placeholder="@if(@Auth::user()->location) {{@Auth::user()->location}} @else Kinshasa, limete 1e rue @endif" required></div>
                    <div class="col-lg-12"><label class="form-label" for="email3">Profession</label><input class="form-control" id="email3" type="text"  name="profession" placeholder="{{!is_null(@Auth::user()->profession) ? @Auth::user()->profession : 'pas de professions'}}"/></div>
                    <div class="col-lg-12"> <label class="form-label" for="intro">Apropos de vous ?</label><textarea class="form-control" rows="3" name="about" required>@if(@Auth::user()->about) {{@Auth::user()->about}} @else Une description pour votre personne.☺ @endif</textarea></div>
                    <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary" type="submit">Update </button></div>
                  </form>
                </div>
              </div>
                    
                  </div>
                  <div class="card-body tab-pane p-0" id="tickets" role="tabpanel" aria-labelledby="contact-tickets-tab">
                    <div class="bg-body-tertiary d-flex flex-column gap-3 p-x1">
                        <div class="card mb-3">
                          <div class="card-header">
                            <h5 class="mb-0">Profile Informations</h5>
                          </div>
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
                        </div>
                    </div>
                    
                  </div>
                  <div class="card-body tab-pane p-0" id="notes" role="tabpanel" aria-labelledby="contact-notes-tab">
                      <div class="bg-body-tertiary d-flex flex-column gap-3 p-x1">
                        
                        <div class="border-bottom border-dashed my-2"></div>
                          <h5 class="fs-9 text-secondary">Suppimez ce compte</h5>
                          <p class="fs-10 text-secondary">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.</p>
                          <button class="btn btn-falcon-danger d-block" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">Supprimer le compte</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<script type="text/javascript">
 $(document).ready(function(event){
   
    $('#updateProfile').on('submit',function(event){
      event.preventDefault();
         jQuery.ajax({
              url : "{{('updateProfile')}}",
              data: $('#updateProfile').serialize(),
              type: 'post',

              success: function(result ){
                  // jQuery('#addpost')[0].reset();
                  alert('Mise à jour effectué avec succès');
                
              }
              
         })
    });
   
 })
   
</script>
<script type="text/javascript">
  
 $(document).ready(function(event){
   
    $('#updatePassword').on('submit',function(event){
      event.preventDefault();
         jQuery.ajax({
              url : "{{('update.password')}}",
              data: $('#updatePassword').serialize(),
              type: 'post',

              success: function(result ){
                  // jQuery('#addpost')[0].reset();
                  alert('Mise à jour effectué avec succès');
                
              }
              
         })
    });
   
 })
   
</script>
@endsection
       