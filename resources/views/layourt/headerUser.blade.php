
<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>Data Sky | Acceuil &amp; Web App </title>

    <!-- ===============================================--><!--    Favicons--><!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="90x90" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="90x90" href="{{asset('favicon/apple-touch-icon.png')}}">
  <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
  <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('usersTemplatejs/config.js')}}"></script>
    <script src="{{asset('usersTemplatejs/simplebar.min.js')}}"></script>

    <!-- ===============================================--><!--    Stylesheets--><!-- ===============================================-->
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{asset('usersTemplatecss/simplebar.min.css')}}" rel="stylesheet">
    <link href="{{asset('usersTemplatecss/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('usersTemplatecss/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('usersTemplatecss/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('usersTemplatecss/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <link href="{{asset('usersTemplatecss/plyr.min.css')}}" rel="stylesheet" id="user-style-default">
    <link href="{{asset('usersTemplatecss/glightbox.min.css')}}" rel="stylesheet" id="user-style-default">
   
  </head>

  <body>
  @if(@isset($_COOKIE['first_time']))
          <div class="toast hide notice shadow-none bg-transparent" id="cookie-notice" role="alert" data-options='{"autoShow":true,"autoShowDelay":360000,"cookieExpireTime":72000}' data-autohide="false" aria-live="assertive"  style="max-width:35rem">
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