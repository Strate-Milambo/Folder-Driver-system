@include('layourt.header')

<body>

<!-- Header START -->
<header class="navbar-light navbar-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="index.html">
				<img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse w-100 collapse" id="navbarCollapse">

        	<!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll mx-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown">
						<a class="nav-link" href="{{route('myFiles')}}" id="demoMenu"  aria-haspopup="true" aria-expanded="false">My Files</a>
					</li>

					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link" href="{{route('page.users')}}" id="pagesMenu"  aria-haspopup="true" aria-expanded="false">Users</a>
					</li>

					<!-- Nav item 3 Account -->
					<li class="nav-item dropdown">
						<a class="nav-link " href="{{route('profile.edit')}}" id="accounntMenu"  aria-haspopup="true" aria-expanded="false">Accounts</a>
						
					</li>

					<!-- Nav item 4 Component-->
					<li class="nav-item"><a class="nav-link" href="docs/alerts.html">Components</a></li>

					<!-- Nav item 5 link-->
					
              		</li>
						</ul>
					</li>
				</ul>
				<!-- Nav Main menu END -->
			</div>
			<!-- Main navbar END -->

			<!-- Profile START -->
			@include('layourt.notification&user')
			<!-- Profile START -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
	
<!-- =======================
Page Banner START -->
<section class="pt-0">
	<!-- Main banner background image -->
	<div class="container-fluid px-0">
		<div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
		</div>
	</div>
	<div class="container mt-n4">
		<div class="row">
			<!-- Profile banner START -->
			<div class="col-12">
				<div class="card bg-transparent card-body p-0">
					<div class="row d-flex justify-content-between">
						<!-- Avatar -->
						<div class="col-auto mt-4 mt-md-0">
							<div class="avatar avatar-xxl mt-n3">
								<img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="">
							</div>
						</div>
						<!-- Profile info -->
						<div class="col d-md-flex justify-content-between align-items-center mt-4">
							<div>
								<h1 class="my-1 fs-4">{{@Auth::user()->name}} <i class="bi bi-patch-check-fill text-info small"></i></h1>
								<ul class="list-inline mb-0">
									<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
									<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled Students</li>
									<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>25 Courses</li>
								</ul>
							</div>
							<!-- Button -->
							<div class="d-flex align-items-center mt-2 mt-md-0">
								<a href="instructor-create-course.html" class="btn btn-success mb-0">Create a course</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Profile banner END -->

				<!-- Advanced filter responsive toggler START -->
				<!-- Divider -->
				<hr class="d-xl-none">
				<div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
					<a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
					<button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
						<i class="fas fa-sliders-h"></i>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->
			</div>
		</div>
	</div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Page content START -->
<section class="pt-0">
	<div class="container">
		<div class="row">

			<!-- Left sidebar START -->
			<div class="col-xl-3">
				<!-- Responsive offcanvas body START -->
				<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
					<!-- Offcanvas header -->
					<div class="offcanvas-header bg-light">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
						<button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
					</div>
					<!-- Offcanvas body -->
					<div class="offcanvas-body p-3 p-xl-0">
						<div class="bg-dark border rounded-3 pb-0 p-3 w-100">
							<!-- Dashboard menu -->
							<div class="list-group list-group-dark list-group-borderless">
								<a class="list-group-item" href="instructor-dashboard.html"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
								<a class="list-group-item" href="instructor-manage-course.html"><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>
								<a class="list-group-item" href="instructor-quiz.html"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a>
								<a class="list-group-item" href="instructor-earning.html"><i class="bi bi-graph-up fa-fw me-2"></i>Earnings</a>
								<a class="list-group-item" href="instructor-studentlist.html"><i class="bi bi-people fa-fw me-2"></i>Students</a>
								<a class="list-group-item" href="instructor-order.html"><i class="bi bi-folder-check fa-fw me-2"></i>Orders</a>
								<a class="list-group-item" href="instructor-review.html"><i class="bi bi-star fa-fw me-2"></i>Reviews</a>
								<a class="list-group-item active" href="instructor-edit-profile.html"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>
								<a class="list-group-item" href="instructor-payout.html"><i class="bi bi-wallet2 fa-fw me-2"></i>Payouts</a>
								<a class="list-group-item" href="instructor-setting.html"><i class="bi bi-gear fa-fw me-2"></i>Settings</a>
								<a class="list-group-item" href="instructor-delete-account.html"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>
								<a class="list-group-item text-danger bg-danger-soft-hover" href="sign-in.html"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Responsive offcanvas body END -->
			</div>
			<!-- Left sidebar END -->

			<!-- Main content START -->
			<div class="col-xl-9">
				<!-- Edit profile START -->
				<div class="card bg-transparent border rounded-3">
					<!-- Card header -->
					<div class="card-header bg-transparent border-bottom">
						<h3 class="card-header-title mb-0">Edit Profile</h3>
					</div>
					<!-- Card body START -->
					<div class="card-body">
						<form action="{{route('updateProfile')}}" class="row g-4 mb-5" method="post" enctype="multipart/form-data">
							@csrf
							<div class="col-12 justify-content-center align-items-center">
								<label class="form-label">Profile picture</label>
								<div class="d-flex align-items-center">
									<label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
										<!-- Avatar place holder -->
										<span class="avatar avatar-xl">
											<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="{{asset('storage/'.@Auth::user()->photo_path)}}" alt="">
										</span>
										<!-- Remove btn -->
										<button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
									</label>
									<!-- Upload button -->
									<input id="uploadfile-1" class="form-control d-none" type="file" name="photo_path">
									<!-- <label class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</label> -->
									<button type="submit" class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</button>
									
								</div>
							</div>
						</form>
						<!-- Form -->
						<form class="row g-4" method="post" action="{{route('updateProfile')}}">
							@csrf

							<!-- Username -->
							<div class="col-md-6">
								<label class="form-label">Username</label>
								<div class="input-group">
									<span class="input-group-text">Folder Driver</span>
									<input type="text" class="form-control" name="name" placeholder="{{@Auth::user()->name}}">
								</div>
							</div>

							<!-- Email id -->
							<div class="col-md-6">
								<label class="form-label">Email id</label>
								<span class="input-group-text">{{@Auth::user()->email}}</span>
							</div>

							<!-- Etat civil -->
							<div class="col-md-6">
								<label class="form-label">Pays</label>
								<span class="input-group-text">DR. Congo</span>
								
							</div>

							<!-- Location -->
							<div class="col-md-6">
								<label class="form-label">Location</label>
								<input class="form-control" type="text" name="location" placeholder="@if(@Auth::user()->location) {{@Auth::user()->location}} @else Kinshasa, limete 1e rue @endif">
							</div>
							
							<!-- About me -->
							<div class="col-12">
								<label class="form-label">About me</label>
								<textarea class="form-control" rows="3" name="about">@if(@Auth::user()->about) {{@Auth::user()->about}} @else Une description pour votre personne.☺ @endif</textarea>
								<div class="form-text">Brief description for your profile.</div> 
							</div>

							<!-- Education -->
							<!-- <div class="col-12">
								<label class="form-label">Education</label>
								<input class="form-control mb-2" type="text" value="Bachelor in Computer Graphics">
								<input class="form-control mb-2" type="text" value="Masters in Computer Graphics">
								<button class="btn btn-sm btn-light mb-0"><i class="bi bi-plus me-1"></i>Add more</button>
							</div> -->

							<!-- Save button -->
							<div class="d-sm-flex justify-content-end">
								<button type="submit" class="btn btn-primary mb-0">Save changes</button>
							</div>
						</form>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Edit profile END -->
				
				<div class="row g-4 mt-3">
				

					<!-- EMail change START -->
					<div class="col-lg-6">
						<div class="card bg-transparent border rounded-3">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h5 class="card-header-title mb-0">Update email</h5>
							</div>
							<!-- Card body -->
							<div class="card-body">
								<p>Your current email address is <span class="text-primary">example@gmail.com</span></p>
								<!-- Email -->
								<form>
									<label class="form-label">Enter your new email id</label>
									<input class="form-control" type="email" placeholder="Enter new email">
									<div class="d-flex justify-content-end mt-4">
										<button type="button" class="btn btn-primary mb-0">Update email</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- EMail change end -->

					<!-- Password change START -->
					<div class="col-lg-6">
						<div class="card border bg-transparent rounded-3">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h5 class="card-header-title mb-0">Update password</h5>
							</div>
							<!-- Card body START -->
							<div class="card-body">
								<!-- Current password -->
								<div class="mb-3">
									<label class="form-label">Current password</label>
									<input class="form-control" type="password" placeholder="Enter current password">
								</div>
								<!-- New password -->
								<div class="mb-3">
									<label class="form-label"> Enter new password</label>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Enter new password">
										<span class="input-group-text p-0 bg-transparent">
											<i class="far fa-eye cursor-pointer p-2 w-40px"></i>
										</span>
									</div>
									<div class="rounded mt-1" id="psw-strength"></div>
								</div>
								<!-- Confirm password -->
								<div>
									<label class="form-label">Confirm new password</label>
									<input class="form-control" type="password" placeholder="Enter new password">
								</div>
								<!-- Button -->
								<div class="d-flex justify-content-end mt-4">
									<button type="button" class="btn btn-primary mb-0">Change password</button>
								</div>
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Password change end -->
					<div class="col-xl-12">
				<!-- Title and select START -->
					<div class="card border bg-transparent rounded-3 mb-0">
						<!-- Card header -->
						<div class="card-header bg-transparent border-bottom">
							<h3 class="card-header-title mb-0">Deactivate Account</h3>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<h6>Before you go...</h6>
							<ul>
								<li>Take a backup of your data <a href="#">Here</a> </li>
								<li>If you delete your account, you will lose your all data.</li>
							</ul>
							<div class="form-check form-check-md my-4">
								<input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
								<label class="form-check-label" for="deleteaccountCheck">Yes, I'd like to delete my account</label>
							</div>
							<a href="#" class="btn btn-success-soft mb-2 mb-sm-0">Keep my account</a>
							<button  @click="confirmUserDeletion" class="btn btn-danger mb-0">Delete my account</button>
						</div>
					</div>
					<!-- Title and select END -->
					</div>
				</div>
			</div>
			<!-- Main content END -->
		</div><!-- Row END -->
	</div>
</section>
<!-- =======================
Page content END -->

</main>
<script>
	const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};
<div :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete your account?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Please
                    enter your password to confirm you would like to permanently delete your account.
                </p>

                <div class="mt-6">
                    <label for="password" value="Password" class="sr-only" />

                    <input
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteUser"
                    />

                    <input :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <button @click="closeModal"> Cancel </button>

                    <button
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </button>
                </div>
            </div>
        </div>
</script>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
@include('layourt.footer')