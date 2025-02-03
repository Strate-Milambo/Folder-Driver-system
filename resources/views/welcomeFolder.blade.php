@include('layourt.header')

<body>

<!-- Header START -->
<header class="navbar-light navbar-sticky navbar-transparent">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-0" href="index.html">
				<img class="light-mode-item navbar-brand-item max-w-50 " src="{{asset('images/logo1.png')}}" style="width : 10vw; height : 10vh;max-width : 200px; max-height : 150px;" alt="logo2">
				<img class="dark-mode-item navbar-brand-item " src="{{asset('images/logo1.png')}}"  	style="width : 10vw;height : 10vh; max-width : 200px; max-height : 150px;" alt="logo2">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>
			<!-- Main navbar START -->
			<div class="navbar-collapse collapse" id="navbarCollapse">

				<!-- Nav Search END -->
				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					@if(!@Auth()->user())
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown mx-2">
						<a  href="{{route('login')}}" class="btn btn-sm btn-dark mb-0">Login</a>
						<!-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="demoMenu">
							<li> <a class="dropdown-item" href="index.html">Home Default</a></li>
							<li> <a class="dropdown-item" href="index-2.html">Home Education</a></li>
							<li> <a class="dropdown-item" href="index-3.html">Home Academy</a></li>
							<li> <a class="dropdown-item" href="index-4.html">Home Course</a></li>
							<li> <a class="dropdown-item" href="index-5.html">Home University</a></li>
							<li> <a class="dropdown-item" href="index-6.html">Home Kindergarten</a></li>
							<li> <a class="dropdown-item active" href="index-7.html">Home Landing</a></li>
							<li> <a class="dropdown-item" href="index-8.html">Home Tutor</a></li>
							<li> <a class="dropdown-item" href="index-9.html">Home School</a></li>
							<li> <a class="dropdown-item" href="index-10.html">Home Abroad</a></li>
							<li> <a class="dropdown-item" href="index-11.html">Home Workshop</a></li>
						</ul> -->
					</li>
					

					<!-- Nav item 2 Course -->
					<li class="nav-item"><a  href="{{route('register')}}" class="btn btn-sm btn-dark mb-0">Register</a></li>
					@else
					<!-- Nav item 3 link-->
					<li class="nav-item"><a  href="{{route('myFiles')}}" class="btn btn-sm btn-dark mb-0">Mes contenus</a></li>
					@endif
				</ul>
			</div>

			<!-- Dark mode options START -->
			<div class="dropdown mx-3 " >
				<button class="btn btn-light btn-sm lh-1 p-2 mb-0" id="bd-theme"
				type="button"
				aria-expanded="false"
				data-bs-toggle="dropdown"
				data-bs-display="static">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-half fa-fw theme-icon-active" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
						<use href="#"></use>
					</svg>
				</button>

				<ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
					<li class="mb-1">
						<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
							<svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
								<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
								<use href="#"></use>
							</svg>Light
						</button>
					</li>
					<li class="mb-1">
						<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
								<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
								<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
								<use href="#"></use>
							</svg>Dark
						</button>
					</li>
					<li>
						<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
								<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
								<use href="#"></use>
							</svg>Auto
						</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Main Banner START -->
<section class="position-relative">

	<!-- SVG decoration -->
	<figure class="position-absolute top-50 end-0 translate-middle-y mt-n8">
		<svg class="rtl-flip" width="1360.5px" height="793px" viewBox="0 0 1360.5 793" style="enable-background:new 0 0 1360.5 793;" xml:space="preserve">
			<path class="fill-primary opacity-1" d="M33.5,766.3c75.3-24.2,124.5-20.3,155.2-62.8c35.4-49,53.1-184.7,138-191.2s100.9,55.6,208.8-21.2 s44.5-134.3,166.4-174.9c121.8-40.6,177,80.1,279.6,36s122.1-248.4,178.8-290.9c49.3-37,171.2-56.7,200.2-61.1v793H33.5 C33.5,793-41.9,790.4,33.5,766.3z"/>
		</svg>
	</figure>

	<div class="container position-relative mt-0 mt-sm-5 pt-5">
		<div class="row align-items-center">
			<div class="col-md-5">
				<!-- Title -->
				<h1 class="mb-3">Le Temps est un grand maître, il règle bien des choses </h1>
				<h6 class="mb-3">Plusieurs fonctionalités pour votre organisation</h6>
				<!-- Button -->
				<a href="{{route('login')}}" class="btn btn-primary">Get Started</a>
			</div>
			<div class="col-md-7">
				<!-- Image -->
				 
				<img src="{{asset('images/icons/05.svg')}}" alt="">
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main Banner END -->

<!-- =======================
About START -->
<section class="pb-0 pb-lg-5">
	<div class="container">
		<div class="row g-4 g-lg-5 align-items-center">
			<div class="col-lg-6 position-relative order-2">
				<!-- SVG decoration -->
				<figure class="position-absolute top-50 start-50 translate-middle ms-n8 d-none d-sm-block">
					<svg width="625.8px" height="550px" viewBox="0 0 625.8 630.8" style="enable-background:new 0 0 625.8 630.8;">
						<path class="fill-primary opacity-1" d="M445.8,133.5c59.7,50.3,122.9,96,149.7,161c26.5,64.6,15.9,148.6-29.9,197.7C520.3,541,439,555,364.9,578.1 c-74.5,23.1-142.1,55.2-200.4,42.3S57.2,549.7,32.6,487.3c-24.2-62-24.2-128.9-17.8-199.6C21.7,217,34.5,142.6,78.7,89.6 S198.6,5,264.4,16.7S386.1,83.2,445.8,133.5z"/>
					</svg>
				</figure>
				<!-- Image -->
				<img src="{{asset('images/icons/06.svg')}}" class="position-relative" alt="">
			</div>

			<div class="col-lg-6 position-relative order-1 order-lg-2">
				<!-- Title -->
				<h2>Perspective</h2>
				<p class="mb-2">Voulez-vous ameliorer la manière d'organisé votre systeme d'information , ainsi que gagné en compétence lors que vous traiter les  informations de l'organisation ? et Bien, vous avez le meilleur outil sur vous</p>
				<!-- Info list -->
				<ul class="list-group list-group-borderless mb-2">
					<li class="list-group-item d-flex align-items-center px-0">
						<p class="mb-0 h6 fw-light">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-command" viewBox="0 0 16 16">
						<path d="M3.5 2A1.5 1.5 0 0 1 5 3.5V5H3.5a1.5 1.5 0 1 1 0-3M6 5V3.5A2.5 2.5 0 1 0 3.5 6H5v4H3.5A2.5 2.5 0 1 0 6 12.5V11h4v1.5a2.5 2.5 0 1 0 2.5-2.5H11V6h1.5A2.5 2.5 0 1 0 10 3.5V5zm4 1v4H6V6zm1-1V3.5A1.5 1.5 0 1 1 12.5 5zm0 6h1.5a1.5 1.5 0 1 1-1.5 1.5zm-6 0v1.5A1.5 1.5 0 1 1 3.5 11z"/>
						</svg>
							Inclus la Répudité de traitement</p>
					</li>
					<li class="list-group-item d-flex align-items-center px-0">
						<p class="mb-0 h6 fw-light">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-command" viewBox="0 0 16 16">
						<path d="M3.5 2A1.5 1.5 0 0 1 5 3.5V5H3.5a1.5 1.5 0 1 1 0-3M6 5V3.5A2.5 2.5 0 1 0 3.5 6H5v4H3.5A2.5 2.5 0 1 0 6 12.5V11h4v1.5a2.5 2.5 0 1 0 2.5-2.5H11V6h1.5A2.5 2.5 0 1 0 10 3.5V5zm4 1v4H6V6zm1-1V3.5A1.5 1.5 0 1 1 12.5 5zm0 6h1.5a1.5 1.5 0 1 1-1.5 1.5zm-6 0v1.5A1.5 1.5 0 1 1 3.5 11z"/>
						</svg>
							Offre une interface simple</p>
					</li>
					<li class="list-group-item d-flex align-items-center px-0">
						<p class="mb-0 h6 fw-light">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-command" viewBox="0 0 16 16">
						<path d="M3.5 2A1.5 1.5 0 0 1 5 3.5V5H3.5a1.5 1.5 0 1 1 0-3M6 5V3.5A2.5 2.5 0 1 0 3.5 6H5v4H3.5A2.5 2.5 0 1 0 6 12.5V11h4v1.5a2.5 2.5 0 1 0 2.5-2.5H11V6h1.5A2.5 2.5 0 1 0 10 3.5V5zm4 1v4H6V6zm1-1V3.5A1.5 1.5 0 1 1 12.5 5zm0 6h1.5a1.5 1.5 0 1 1-1.5 1.5zm-6 0v1.5A1.5 1.5 0 1 1 3.5 11z"/>
						</svg>
							Une sécurité fiable des vos contenus</p>
					</li>
					<li class="list-group-item d-flex align-items-center px-0">
						<p class="mb-0 h6 fw-light">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-command" viewBox="0 0 16 16">
						<path d="M3.5 2A1.5 1.5 0 0 1 5 3.5V5H3.5a1.5 1.5 0 1 1 0-3M6 5V3.5A2.5 2.5 0 1 0 3.5 6H5v4H3.5A2.5 2.5 0 1 0 6 12.5V11h4v1.5a2.5 2.5 0 1 0 2.5-2.5H11V6h1.5A2.5 2.5 0 1 0 10 3.5V5zm4 1v4H6V6zm1-1V3.5A1.5 1.5 0 1 1 12.5 5zm0 6h1.5a1.5 1.5 0 1 1-1.5 1.5zm-6 0v1.5A1.5 1.5 0 1 1 3.5 11z"/>
						</svg>
						Eviter l'encombrement</p>
					</li>
				</ul>
				<!-- Button -->
				<a href="{{route('login')}}" class="btn btn-primary-soft mb-0">More about us</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
About END -->

<!-- =======================
Listed course START -->
<section class="position-relative pb-0 pb-sm-5">
	<div class="container">
		<!-- Title -->
		<div class="row mb-4">
			<div class="col-lg-8 mx-auto text-center">
				<h2>Folder Driver vous offre </h2>
				<p class="mb-0">Pour se beigner dans le monde de l'organisation, lancez-vous avec Folder Driver</p>
			</div>
		</div>

		<div class="row g-4">
			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/send.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Envoie des contenus</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 Stext-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/scan.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Scan système</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/cloud.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Cloud système</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/notification.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Notifications</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/upload.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Upload des contenus</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/hierarchie.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Hierarchie</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/trash.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Corbeille</a></h5>
					
				</div>
			</div>

			<!-- Item -->
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="bg-primary bg-opacity-10 rounded-3 text-center p-3 position-relative btn-transition">
					<!-- Image -->
					<div class="icon-xl bg-body mx-auto rounded-circle mb-3">
						<img src="{{asset('images/icons/download.png')}}" alt="" class="w-50">
					</div>
					<!-- Title -->
					<h5 class="mb-1"><a href="#" class="stretched-link">Download contenus</a></h5>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Listed course END -->

<!-- =======================
Download START -->
<section class="overflow-hidden">
	<div class="container">
		<div class="row g-4 align-items-center">
			<div class="col-md-5 position-relative z-index-9">
				<!-- Title -->
				<h2>Transmettez les contenus en toute esance</h2>
				<p>Pas besion d'être sur place pour apporter des solutions dans votre organisation, Pas besoin de créer plusieurs plusieurs pour établir une bonne organisation. </p>
				<!-- Download button -->
				
			</div>

			<div class="col-md-7 text-md-end position-relative">
				<!-- SVG decoration -->
				<figure class="position-absolute top-50 end-0 translate-middle-y me-n8">
					<svg width="632.6px" height="540.4px" viewBox="0 0 632.6 540.4">
						<path class="fill-primary opacity-1" d="M531.4,46.9c46.3,27.4,81.4,79.8,91.1,136.2c9.7,56.8-6.4,117.7-38.3,166s-79.4,84.2-138.6,119.3 c-59.6,35.1-130.6,69.7-201.5,62.1c-70.5-7.7-141.4-57.6-185.4-126.5C14.4,335.5-2.9,247.2,23.7,179.5 c26.2-68.1,96.7-116.5,161.6-140.2c64.9-24.2,124.5-24.6,183.3-23.4C427,17.1,485.1,19.5,531.4,46.9z"/>
					</svg>
				</figure>

				<!-- Image -->
				<img src="{{asset('images/icons/07.svg')}}" class="position-relative" alt="">
			</div>
		</div>
	</div>
</section>
<!-- =======================
Download END -->

<!-- =======================
Action box START -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bg-light p-4 p-sm-5 rounded-3 position-relative overflow-hidden">
					<!-- SVG decoration -->
					<figure class="position-absolute top-0 start-0 d-none d-lg-block ms-n7">
						<svg width="294.5px" height="261.6px" viewBox="0 0 294.5 261.6" style="enable-background:new 0 0 294.5 261.6;">
							<path class="fill-warning opacity-5" d="M280.7,84.9c-4.6-9.5-10.1-18.6-16.4-27.2c-18.4-25.2-44.9-45.3-76-54.2c-31.7-9.1-67.7-0.2-93.1,21.6 C82,36.4,71.9,50.6,65.4,66.3c-4.6,11.1-9.5,22.3-17.2,31.8c-6.8,8.3-15.6,15-22.8,23C10.4,137.6-0.1,157.2,0,179 c0.1,28,11.4,64.6,40.4,76.7c23.9,10,50.7-3.1,75.4-4.7c23.1-1.5,43.1,10.4,65.5,10.6c53.4,0.6,97.8-42,109.7-90.4 C298.5,140.9,293.4,111.5,280.7,84.9z"/>
						</svg>
					</figure>
					<!-- SVG decoration -->
					<figure class="position-absolute top-50 start-50 translate-middle">
						<svg width="453px" height="211px">
							<path class="fill-orange" d="M16.002,8.001 C16.002,12.420 12.420,16.002 8.001,16.002 C3.582,16.002 -0.000,12.420 -0.000,8.001 C-0.000,3.582 3.582,-0.000 8.001,-0.000 C12.420,-0.000 16.002,3.582 16.002,8.001 Z"/>
							<path class="fill-warning" d="M176.227,203.296 C176.227,207.326 172.819,210.593 168.614,210.593 C164.409,210.593 161.000,207.326 161.000,203.296 C161.000,199.266 164.409,196.000 168.614,196.000 C172.819,196.000 176.227,199.266 176.227,203.296 Z"/>
							<path class="fill-primary" d="M453.002,65.001 C453.002,69.420 449.420,73.002 445.001,73.002 C440.582,73.002 437.000,69.420 437.000,65.001 C437.000,60.582 440.582,57.000 445.001,57.000 C449.420,57.000 453.002,60.582 453.002,65.001 Z"/>
						</svg>
					</figure>
					<!-- SVG image -->
					<img src="{{asset('images/icons/09.svg')}}" class="position-absolute bottom-0 end-0 z-index-1 d-none d-lg-block me-n3" alt="">
					<!-- SVG decoration -->
					<figure class="position-absolute top-0 end-0 mt-5 me-n5 d-none d-sm-block">
						<svg 	width="285px" height="272px">
							<path class="fill-info opacity-4" d="M142.500,-0.000 C221.200,-0.000 285.000,60.889 285.000,136.000 C285.000,211.111 221.200,272.000 142.500,272.000 C63.799,272.000 -0.000,211.111 -0.000,136.000 C-0.000,60.889 63.799,-0.000 142.500,-0.000 Z"/>
						</svg>
					</figure>

					<div class="row g-4 justify-content-center align-items-center position-relative">
						<div class="col-lg-3 text-center text-lg-start ps-0">
							<!-- Image -->
							<img src="{{asset('images/icons/08.svg')}}" alt="">
						</div>
						<!-- Title -->
						<div class="col-lg-6 text-center">
							<span class="h6 fw-light">la vie est simple</span>
							<h3 class="mb-0 mt-2">Démeurez les Docteurs du temps dans l'organisation et le traitement des contenus</h3>
						</div>
						<!-- Content and input -->
						<div class="col-lg-3 text-center text-lg-end z-index-9">
							<a href="{{route('login')}}" class="btn btn-warning mb-0">Lancez-vous</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Action box END -->

<!-- =======================
Client feedback START -->
<!-- =======================
Client feedback END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
@include("layourt.footer");