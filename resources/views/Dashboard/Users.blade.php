@extends('MainUser.MainTemplate')
@section('content')

        <div class="row g-3 mb-2">
        <div class="card mb-3">
            <div class="card-body px-xxl-0 pt-4">
              <div class="row g-0">
                <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-xxl-0 pb-3 p-xxl-0 ps-md-0">
                  <div class="icon-circle icon-circle-primary"><span class="fs-7 fas fa-user text-primary"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($users)}}"}'>0</span><span class="fw-normal text-600">Utilisateurs</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">4203 <span class="text-600 fw-normal">last month</span></p>
                </div>
                <div class="col-xxl-3 col-md-6 px-3 text-center border-end-xxl border-bottom border-bottom-xxl-0 pb-3 pt-4 pt-md-0 pe-md-0 p-xxl-0">
                  <div class="icon-circle icon-circle-warning"><span class="fs-7 fas fa-folder-open text-yellow"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($folders)}}"}'>0</span><span class="fw-normal text-600">Dossiers</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">301 <span class="text-600 fw-normal">last month</span></p>
                </div>
                <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-md-0 pb-3 pt-4 p-xxl-0 pb-md-0 ps-md-0">
                  <div class="icon-circle icon-circle-success"><span class="fs-7 fas fa-book text-success"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($files)}}"}'>0</span><span class="fw-normal text-600">Fichiers</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">2779 <span class="text-600 fw-normal">last month</span></p>
                </div>
                
                <div class="col-xxl-3 col-md-6 px-5 text-center pt-4 p-xxl-0 pb-0 pe-md-0">
                  <div class="icon-circle icon-circle-secondary"><span class="fs-8 fas fa-file text-info mx-1"></span> + <span class="fs-8 fas fa-folder-open text-yellow mx-1"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($allContents)}}"}'>0</span><span class="fw-normal text-600">Contenus</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">1201 <span class="text-600 fw-normal">last month</span></p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row g-3">
            <div class="col-xxl-9">
              <div class="card" id="ticketsTable">
                <div class="card-header border-bottom border-200 px-0">
                  <div class="d-lg-flex justify-content-between">
                    <div class="row flex-between-center gy-2 px-x1">
                      <div class="col-auto pe-0">
                        <h6 class="mb-0">Utilisateurs  dans le systèmes</h6>
                      </div>
                      <div>
                      <form  class="position-relative" method="get" action="{{Route('dashboard-users')}}">
                            <input class="form-control form-control-sm" type="seach" name="search" placeholder="Search..."  data-dismiss="search" />
                            <button class="bg-transparent px-1 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit">
                              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="fas fa-search fs-9  text-primary mx-2" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            </button>
                          </form>
                        </div>  
                    </div>
                    <div class="border-bottom border-200 my-3"></div>
                    <div class="d-flex align-items-center justify-content-between justify-content-lg-end px-x1"><button class="btn btn-sm btn-falcon-default" type="button"><span class="fas fa-filter" data-fa-transform="shrink-4 down-1"></span><span class="ms-1 d-none d-sm-inline-block">Filter</span></button>
                      <div class="bg-300 mx-3 d-none d-lg-block" style="width:1px; height:29px"></div>
                      <div class="d-none" id="table-ticket-actions">
                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                          </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
                      </div>
                      <div class="d-flex align-items-center" id="table-ticket-replace-element">
                        <div class="dropdown"><button class="btn btn-sm btn-falcon-default dropdown-toggle dropdown-caret-none" type="button" id="dashboard-layout" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="d-none d-sm-inline-block d-xl-none d-xxl-inline-block me-1 table-layout">Table View</span><span class="fas fa-chevron-down" data-fa-transform="shrink-3 down-1"></span></button>
                          <div class="dropdown-menu dropdown-toggle-item dropdown-menu-end border py-2" aria-labelledby="dashboard-layout" role="tablist"><a class="dropdown-item active" id="tableView" data-bs-toggle="tab" href="#table-view" role="tab" aria-controls="table-view">Table View</a><a class="dropdown-item" id="cardView" data-bs-toggle="tab" href="#card-view" role="tab" aria-controls="card-view">Card View</a></div>
                        </div><button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3"></span><span class="d-none d-sm-inline-block d-xl-none d-xxl-inline-block ms-1">New</span></button><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3"></span><span class="d-none d-sm-inline-block d-xl-none d-xxl-inline-block ms-1">Export</span></button>
                        <div class="dropdown font-sans-serif ms-2"><button class="btn btn-falcon-default text-600 btn-sm dropdown-toggle dropdown-caret-none" type="button" id="preview-dropdown" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="preview-dropdown"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-red" href="#!">Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-content" id="ticketViewContent">
                  <div class="fade tab-pane active show" id="table-view" role="tabpanel" aria-labelledby="tableView" data-list='{"valueNames":["client","subject","status","priority","agent"],"page":6,"pagination":true}'>
                    <div class="card-body p-0">
                      <div class="table-responsive scrollbar">
                        <table class="table table-sm mb-0 fs-10 table-view-tickets">
                          <thead class="bg-body-tertiary">
                            <tr>
                              <th class="py-2 fs-9 pe-2" style="width: 28px;">
                                <div class="form-check d-flex align-items-center"><input class="form-check-input" id="checkbox-bulk-table-tickets-select" type="checkbox" data-bulk-select='{"body":"table-ticket-body","actions":"table-ticket-actions","replacedElement":"table-ticket-replace-element"}' /></div>
                              </th>
                              <th class="text-800 sort align-middle ps-2" data-sort="client">Nom</th>
                              <th class="text-800 sort align-middle" data-sort="subject" style="min-width:15.625rem">Email</th>
                              <th class="text-800 sort align-middle" data-sort="status">Memoire</th>
                              <th class="text-800 sort align-middle" data-sort="priority">Code D'access</th>
                              <th class="text-800 sort align-middle text-end" data-sort="agent">Agent</th>
                            </tr>
                          </thead>
                          <tbody class="list" id="table-ticket-body">
                            @forelse($users as $user)
                            <?php
                             $units=['o','Ko','Mo', 'Go', 'To', 'Po'];
                             $power = $user->memory > 0 ? floor(log($user->memory,1024)) : 0;
                             $size =number_format($user->memory/pow(1024,$power),2,'.',',')." ". $units[$power];
                             if ($user->memory <= 500*pow(10,6) ){
                              $color = 'green';
                              $area = 1; 
                             }
                             else if ($user->memory > 500*pow(10,6) and $user->memory <= 1*pow(10,9) ){
                              $color = 'blue';
                              $area = 30; 
                             }
                             else if ($user->memory > 1*pow(10,9) and $user->memory <= 2.5*pow(10,9) ){
                              $color = 'yellow';
                              $area = 50; 
                             }
                             else if ($user->memory > 2.5*pow(10,9) and $user->memory <= 4*pow(10,9)){
                              $color = 'red';
                              $area = 70; 
                             }else{
                              $color = 'red';
                              $area = 110; 
                             }
                             

                            ?>
                            <tr>
                              <td class="align-middle fs-9 py-3">
                                <div class="form-check mb-0">
                                  <a href="?user={{$user->id}}"><input class="form-check-input" type="checkbox" id="table-view-tickets-0" data-bulk-select-row="data-bulk-select-row" /></a> 
                                </div>
                              </td>
                              <td class="align-middle client white-space-nowrap pe-3 pe-xxl-4 ps-2">
                                <div class="d-flex align-items-center gap-2 position-relative">
                                  <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="{{asset('storage/'.$user->photo_path)}}" alt="" />
                                  </div>
                                  <h6 class="mb-0"><a class="stretched-link text-900" href="{{route('all-profile',['id'=>$user->id])}}">{{$user->name}}</a></h6>
                                </div>
                              </td>
                              <td class="align-middle subject py-2 pe-4"><a class="fw-semi-bold" href="{{route('all-profile',['id'=>$user->id])}}">{{$user->email}}</a></td>
                              <td class="align-middle status fs-9 pe-4"><small class="badge rounded badge-subtle-info false">{{is_null($size) ? '0' : $size}}</small></td>
                              <td class="align-middle priority pe-4">
                                <div class="d-flex align-items-center gap-2">
                                  <div style="--falcon-circle-progress-bar:{{$area}}"><svg class="circle-progress-svg" width="30" height="30" viewBox="0 0 120 120">
                                      <circle class="progress-bar-rail" cx="60" cy="60" r="54" fill="none" stroke-linecap="round" stroke-width="12"></circle>
                                      <circle class="progress-bar-top" cx="60" cy="60" r="54" fill="none" stroke-linecap="round" stroke="{{$color}}"  stroke-width="12"></circle>
                                    </svg></div>
                                  <h6 class="mb-0 text-700">{{ $user->AccessCode}}</h6>
                                </div>
                              </td>
                              <td class="align-middle agent">
                               <form method="post" action ="{{Route('users.manage')}}">
                                @csrf
                                <select class="form-select form-select-sm mb-2" aria-label="Bulk actions" name="choice">
                                  <option selected="">actions</option>
                                  <option value="Warnings"><span class="text-info">Avertir</span></option>
                                  <option value="Blocked"><span class="text-yellow ">Bloquer</span></option>
                                  <option value="Delete"><span class="text-red  ">Supprimer</span></option>
                                  </select> 
                                  <input type="hidden" name="user" value="{{$user->id}}"/>
                                  <button class="btn btn-falcon-default btn-sm ms-2 bg-info" type="submit">Apply</button>
                              </form>
                                
                              </td>
                            </tr>
                            
                            @empty
                            
                                <div class="d-flex align-items-center items-center bg-info gap-2 mx-2 px-2 rounded">

                                  <p class="fw-bold mx-5 mt-3 text-secondary items-center">Aucun Utilsateur trouvé</p>
                                </div>
                              
                              
                             
                            @endforelse
                           
                          </tbody>
                        </table>
                        <div class="text-center d-none" id="tickets-table-fallback">
                          <p class="fw-bold fs-8 mt-3">No ticket found</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row align-items-center">
                        <div class="pagination d-none"></div>
                        <div class="col"><span class="d-none d-sm-inline-block me-2 fs-10" data-list-info="data-list-info"></span></div>
                        <div class="col-auto d-flex">{{$users->links()}} </div>
                      </div> 
                    </div>
                  </div>
                  <div class="fade tab-pane" id="card-view" role="tabpanel" aria-labelledby="cardView" data-list='{"valueNames":["client","subject","status","priority","agent"],"page":4,"pagination":true}'>
                    <div class="card-body p-0">
                      <div class="form-check d-none"><input class="form-check-input" id="checkbox-bulk-card-tickets-select" type="checkbox" data-bulk-select='{"body":"card-ticket-body","actions":"table-ticket-actions","replacedElement":"table-ticket-replace-element"}' /></div>
                      <div class="list bg-body-tertiary p-x1 d-flex flex-column gap-3" id="card-ticket-body">
                      @forelse($users as $user)
                        <div class="bg-white dark__bg-1100 d-md-flex d-xl-inline-block d-xxl-flex align-items-center p-x1 rounded-3 shadow-sm card-view-height">
                          <div class="d-flex align-items-start align-items-sm-center">
                            <div class="form-check me-2 me-xxl-3 mb-0"><input class="form-check-input" type="checkbox" id="card-view-tickets-0" data-bulk-select-row="data-bulk-select-row" /></div><a class="d-none d-sm-block" href="../app/support-desk/contact-details.html">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="{{asset('storage/'.$user->photo_path)}}" alt="" />
                                  </div>
                            </a>
                            <div class="ms-1 ms-sm-3">
                              <p class="fw-semi-bold mb-3 mb-sm-2"><a href="../app/support-desk/tickets-preview.html">{{$user->email}}</a></p>
                              <div class="row align-items-center gx-0 gy-2">
                                <div class="col-auto me-2">
                                  <h6 class="client mb-0"><a class="text-800 d-flex align-items-center gap-1" href="../app/support-desk/contact-details.html"><span class="fas fa-user" data-fa-transform="shrink-3 up-1"></span><span>{{$user->name}}</span></a></h6>
                                </div>
                                <div class="col-auto lh-1 me-3"><small class="badge rounded badge-subtle-success false">Recent</small></div>
                                <div class="col-auto">
                                  <h6 class="mb-0 text-500">2d ago</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-bottom mt-4 mb-x1"></div>
                          <div class="d-flex justify-content-between ms-auto">
                            <div class="d-flex align-items-center gap-2 ms-md-4 ms-xl-0" style="width:7.5rem;">
                              <div style="--falcon-circle-progress-bar:100"><svg class="circle-progress-svg" width="26" height="26" viewBox="0 0 120 120">
                                  <circle class="progress-bar-rail" cx="60" cy="60" r="54" fill="none" stroke-linecap="round" stroke-width="12"></circle>
                                  <circle class="progress-bar-top" cx="60" cy="60" r="54" fill="none" stroke-linecap="round" stroke="#e63757" stroke-width="12"></circle>
                                </svg></div>
                              <h6 class="mb-0 text-700">Urgent</h6>
                            </div><select class="form-select form-select-sm" aria-label="agents actions" style="width:9.375rem;">
                              <option>Select Agent</option>
                              <option selected="selected">Anindya</option>
                              <option>Nowrin</option>
                              <option>Khalid</option>
                            </select>
                          </div>
                        </div>
                      @empty
                        <div class="text-center d-none" id="tickets-card-fallback">
                            <p class="fw-bold fs-8 mt-3">Aucun utilisateu trouvé.</p>
                        </div>
                      @endforelse
                      </div>
                      <div class="text-center d-none" id="tickets-card-fallback">
                        <p class="fw-bold fs-8 mt-3">No ticket found</p>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row align-items-center">
                        <div class="pagination d-none"></div>
                        <div class="col"><span class="d-none d-sm-inline-block me-2 fs-10" data-list-info="data-list-info"></span></div>
                        <div class="col-auto d-flex ">{{$users->links()}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection
         
         