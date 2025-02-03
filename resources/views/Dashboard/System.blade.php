@extends('MainUser.MainTemplate')
@section('content')

        <div class="row g-3 ">
        <div class="card mb-3">
            <div class="card-body px-xxl-0 pt-4">
              <div class="row g-0">
                <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-xxl-0 pb-3 p-xxl-0 ps-md-0">
                  <div class="icon-circle icon-circle-primary"><span class="fs-7 fas fa-user text-primary"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($users)}}"}'>0</span><span class="fw-normal text-600">Utilisateurs</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">4203 <span class="text-600 fw-normal">last month</span></p>
                </div>
                <div class="col-xxl-3 col-md-6 px-3 text-center border-end-xxl border-bottom border-bottom-xxl-0 pb-3 pt-4 pt-md-0 pe-md-0 p-xxl-0">
                  <div class="icon-circle icon-circle-warning"><span class="fs-7 fas fa-folder-open text-warning"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($folders)}}"}'>0</span><span class="fw-normal text-600">Dossiers</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">301 <span class="text-600 fw-normal">last month</span></p>
                </div>
                <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-md-0 pb-3 pt-4 p-xxl-0 pb-md-0 ps-md-0">
                  <div class="icon-circle icon-circle-success"><span class="fs-7 fas fa-book text-success"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($files)}}"}'>0</span><span class="fw-normal text-600">Fichiers</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">2779 <span class="text-600 fw-normal">last month</span></p>
                </div>
                
                <div class="col-xxl-3 col-md-6 px-5 text-center pt-4 p-xxl-0 pb-0 pe-md-0">
                  <div class="icon-circle icon-circle-secondary"><span class="fs-8 fas fa-file text-info mx-1"></span> + <span class="fs-8 fas fa-folder-open text-warning mx-1"></span></div>
                  <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"{{count($allContents)}}"}'>0</span><span class="fw-normal text-600">Contenus</span></h4>
                  <p class="fs-10 fw-semi-bold mb-0">1201 <span class="text-600 fw-normal">last month</span></p>
                </div>
              </div>
            </div>
          </div>
    
        </div>
        <div class="row g-3">
        <div class="col-xxl-3 col-md-6 col-lg-6 order-xxl-1">
              <div class="card shopping-cart-bar-min-height h-100">
                <div class="card-header d-flex flex-between-center">
                  <h6 class="mb-0">Statistiques des contenus</h6>
                  <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-shopping-cart-bar" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-shopping-cart-bar"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
                <div class="card-body py-0 d-flex align-items-center h-100">
                  <div class="flex-1">
                    <div class="row g-0 align-items-center pb-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Collaborateurs</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-secondary" style="width: {{count($users)/10}}%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-seconry"></span>{{count($users)}}</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"> Session: <span class ="text-600">{{count($users)}}</span> </p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Collaborations actives</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-danger" style="width: {{count($collaborations)/10}}%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-danger"></span>{{count($collaborations)/10}}</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">{{count($collaborations)}}</span> de {{count($users)}}</p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Fichiers envoyés</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-primary" style="width: {{count($files_shared)/10}}%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-success"></span>{{count($files_shared)}}</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">8</span> of 61</p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Tous les Fichiers</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-info" style="width:{{count($files)/10}}%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-down text-info"></span>{{count($files)}}</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">18</span> of 179</p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Les dossiers</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-warning" style="width: {{count($folders)/10}}%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-warning"></span>{{count($folders)}}</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">18</span> of 179</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6  col-xxl-5">
              <div class="card h-100">
                <div class="card-header bg-body-tertiary d-flex flex-between-center py-2">
                  <h6 class="mb-0">Progression statistique</h6>
                  <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="lms-weekly-goal" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="lms-weekly-goal"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-sm-4">
                      <div class="pb-3 mb-3 border-bottom border-200">
                        <div class="position-relative ps-3">
                          <div class="position-absolute h-100 start-0 rounded bg-secondary" style="width: {{count($users)/50}}px;"></div>
                          <h6 class="fs-11 text-600 mb-1">Users</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-7 text-700 mb-0 me-2" data-countup='{"endValue":{{count($users)}},"suffix":"%"}'>0</h5><span class="badge rounded-pill fs-11 fw-medium badge-subtle-success"><span class="fas fa-check"></span> On par</span>
                          </div>
                        </div>
                      </div>
                      <div class="pb-3 mb-3 border-bottom border-200">
                        <div class="position-relative ps-3">
                          <div class="position-absolute h-100 start-0 rounded bg-primary" style="width: 4px;"></div>
                          <h6 class="fs-11 text-600 mb-1">Fichiers</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-7 text-700 mb-0 me-2" data-countup='{"endValue":{{count($files)}},"suffix":"%"}'>0</h5><span class="badge rounded-pill fs-11 fw-medium badge-subtle-primary"><span class="fas fa-caret-up"></span> Ahead</span>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="position-relative ps-3">
                          <div class="position-absolute h-100 start-0 rounded bg-success" style="width: 4px;"></div>
                          <h6 class="fs-11 text-600 mb-1">Dossiers</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-7 text-700 mb-0 me-2" data-countup='{"endValue":{{count($folders)}},"suffix":"%"}'>0</h5><span class="badge rounded-pill fs-11 fw-medium badge-subtle-danger"><span class="fas fa-caret-down"></span> Behind</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-8 h-100"><!-- Find the JS file for the following chart at: src/js/charts/echarts/weekly-goals-lms.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                      <div class="echart-weekly-goals-lms" data-echart-responsive="true"></div>
                    </div>
                  </div>
                </div>

              </div>

             
            </div>
            <div class="card mb-3">
            <div class="container">
              <h2>Statitisques des contenus</h2>
              <div>
                <canvas id="myChart"></canvas>
              </div>
            </div>
            </div>
    
        </div>
            
            
           
          </div>
          <html>
  <!-- <link
    rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    type="text/css"
  /> -->
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script
    src=
"https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
    type="text/javascript"
  ></script>
  <!-- <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
  
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
  <!-- <style>
    .container {
      width: 70%;
      margin: 15px auto;
    }
    body {
      text-align: center;
      color: green;
    }
    h2 {
      text-align: center;
      font-family: "Verdana", sans-serif;
      font-size: 30px;
    }
  </style> -->
 
    
  
  
  <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "Fichiers",
          "Dossiers",
          "collaborations",
          "utilisateurs",
          "Fichiers envoyés"
        
        ],
        datasets: [
          {
            label: "Contenus",
            data: [10, 9, 3, 17, 6, 3, 7],
            backgroundColor: "rgb(112, 166, 200)",
          },
          // {
          //   label: "Dossiers",
          //   data: [10, 2, 5, 5, 2, 1, 10],
          //   backgroundColor: "rgb(205, 78, 9)",
          // },
          // {
          //   label: "Users",
          //   data: [10, 4,9, 9, 2, 5, 10],
          //   backgroundColor: "rgb(9, 205, 205)",
          // },
        ],
      },
    });
  </script>
</html>
          
          
          <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
      
@endsection
         
         