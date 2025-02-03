@extends('MainUser.MainTemplate')
@section('content')
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>        
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <div>
        <div>
        <div class="row g-3 mb-2">
        <div class="card mb-2">
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
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($allContent)}}"}'>0</span><span class="fw-normal text-600">Contenus</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">1201 <span class="text-600 fw-normal">last month</span></p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
          
          <div class="row g-3 mb-3">
           
            <div class="col-xxl-9 col-md-12">
              <div class="card z-1" id="recentPurchaseTable" data-list='{"valueNames":["name","email","product","payment","amount"],"page":7,"pagination":true}'>
                <div class="card-header">
                  <div class="row flex-between-center">
                  <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">TOUS LES CONTENUS SUR DATASKY</h5> 
                    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                      
                      <form  class="position-relative mt-2" method="get" action="{{Route('dashboard-files')}}">
                            <input class="form-control form-control-sm" type="seach" name="search" placeholder="Search..."  data-dismiss="search" style="width=150px" />
                            <button class="bg-transparent px-1 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit">
                              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="fas fa-search fs-9  text-primary mx-2" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            </button>
                          </form>
                    </div>
                   
                    <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                      <div class="d-none" id="table-purchases-actions">
                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                          </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
                      </div>
                      <div id="table-purchases-replace-element"><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">New</span></button><button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button></div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 py-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-sm fs-10 mb-0 overflow-hidden" id="example">
                      <thead class="bg-200">
                        <tr>
                          <th class="white-space-nowrap">
                            <div class="form-check mb-0 d-flex align-items-center"><input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select='{"body":"table-purchase-body","actions":"table-purchases-actions","replacedElement":"table-purchases-replace-element"}' /></div>
                          </th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="name">Icon</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="email">Nom</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="product">Taille</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap text-center" data-sort="payment">Propriètaire</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Action</th>
                          <th class="no-sort pe-1 align-middle data-table-row-action"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="table-purchase-body">
                        @forelse($allContents as $file)
                          <?php
                            $units=['o','Ko','Mo', 'Go', 'To', 'Po'];

                            $power = $file->size > 0 ? floor(log($file->size ,1024)) : 0;
                    
                            $size=number_format($file->size /pow(1024,$power),2,'.',',')." ". $units[$power];
                          
                            
                                  
                              $exts = explode(".",$file->name);
                              foreach($exts as $k=>$ext){
                                if($k=='1'){
                                  $ex= $ext;
                                }
                              }
                        
                          ?>
                         
                        <tr class="btn-reveal-trigger">
                          <td class="align-middle" style="width: 28px;">
                            <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="recent-purchase-9" data-bulk-select-row="data-bulk-select-row" /></div>
                          </td>
                          <th class="align-middle white-space-nowrap name">
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
                          </th>
                          <td class="align-middle white-space-nowrap email">{{$file->name}}</td>
                          <td class="align-middle white-space-nowrap product"><span class="badge badge rounded-pill badge-subtle-warning">{{$size}}</span></td>
                          <td class="align-middle text-center fs-9 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-secondary">{{$file->owner }} <span class="ms-1 fas fa-user" data-fa-transform="shrink-2"></span></span></td>
                          <td class="align-middle text-end amount">
                            <form method="post" action ="{{Route('file.manage')}}">
                                @csrf
                                <select class="form-select form-select-sm mb-2" aria-label="Bulk actions" name="choice">
                                  <option selected="">actions</option>
                                  <option value="Download"><span class="text-info">Download</span></option>
                                  <option value="Delete"><span class="text-red  ">Supprimer</span></option>
                                  </select> 
                                  <input type="hidden" name="file" value="{{$file->id}}"/>
                                  <button class="btn btn-falcon-default btn-sm ms-2 bg-info" type="submit">Apply</button>
                              </form>
                          </td>
                          
                        @empty
                          <tr>
                          <td class="align-middle text-center ">PAS DES CONTENUS DANS LES SYSTEMES</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row align-items-center">
                    <div class="pagination d-none"></div>
                    <div class="col">
                      <p class="mb-0 fs-10"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info"></span></p>
                    </div>
                    <div class="col-auto d-flex"><span>{{$allContents->links()}}</span></div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
         
          
        </div>
      
      </div>
 
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script type="text/javascript">
        $(document).ready(function(){

          $('#example').DataTable();
        })
      </script>
@endsection