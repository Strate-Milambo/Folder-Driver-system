@extends('MainUser.MainTemplate')
@section('content')
          <div class="card">
            <div class="card-body text-center py-5">
              <div class="row justify-content-center">
                <div class="col-7 col-md-5"><img class="img-fluid" src="{{asset('storage/avatars/alert.png')}}" alt="" style="width:58%;" /></div>
              </div>
              <h3 class="mt-3 fw-normal fs-7 mt-md-4 fs-md-6">Invite un ou plusieurs collaborateurs. </h3>
              <p class="lead mb-5">Invitez vos amis et commencez à travailler ensemble en quelques secondes.<br class="d-none d-md-block" />Toutes les personnes que vous invitez recevront un e-mail de bienvenue.</p>
              <div class="row justify-content-center">
                <div class="col-md-7">
                  <form class="row gx-2" method="post" action="{{route('inviteByEmail')}}">
                    @csrf
                    <div class="col-sm mb-2 mb-sm-0"><input class="form-control" name="email" type="email" placeholder="Email address" aria-label="Recipient's username" /></div>
                    <div class="col-sm-auto"><button class="btn btn-primary d-block w-100" type="submit">Send Invitation</button></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-footer bg-body-tertiary text-center pt-4">
              <div class="row justify-content-center">
                <div class="col-11 col-sm-10">
                  <h4 class="fw-normal mb-0 fs-8 fs-md-7">More ways to <br class="d-sm-none" /> invite your friends</h4>
                  <div class="row gx-2 my-4">
                    <div class="col-lg-4"><a href="mailto:datasky4742@gmail.com" class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0"><img src="../../assets/img/logos/gmail.png" width="20" alt="" /><span class="fw-medium ms-2">Invite from Gmail</span></a></div>
                    <div class="col-lg-4"><button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#copyLinkModal"><span class="fas fa-link text-700"></span><span class="fw-medium ms-2">Copy Link</span></button>
                      <div class="modal fade" id="copyLinkModal" tabindex="-1" role="dialog" aria-labelledby="copyLinkModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content overflow-hidden">
                            <div class="modal-header">
                              <h5 class="modal-title" id="copyLinkModalLabel">Your personal referral link</h5><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body bg-body-tertiary p-4">
                              <form><input class="form-control form-control-sm invitation-link" value="https://DataSky.com" /></form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4"><button class="btn btn-falcon-default d-block w-100 ms-0 mb-xl-0"><span class="fab fa-facebook-square text-facebook" data-fa-transform="grow-2"></span><span class="fw-medium ms-2">Share on Facebook</span></button></div>
                  </div>
                  <p class="mb-2 fs-10">Une fois que vous avez invité des amis, vous pouvez <a href="#!">collaborer</a><br class="d-none d-lg-block d-xxl-none" /> et vous distribuer des données <a href="{{route('page.help')}}">centre d'aide </a>Si vous avez certaines questions. </p>
                </div>
              </div>
            </div>
          </div>
@endsection
