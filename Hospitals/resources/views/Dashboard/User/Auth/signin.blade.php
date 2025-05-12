@extends('Dashboard.layouts.master2')
@section('css')

<style>
    .login-form{
        display:none;
    }
</style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{ __('Dashboard/login_trans.Welcome') }}</h2>

                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                                <div class="form-group">
                                                    <label for="">{{ __('Dashboard/login_trans.Select_Enter') }}</label>
                                                    <select class="form-control" id="Access-Control" aria-label="Default select example">
                                                        <option selected disabled >{{ __('Dashboard/login_trans.Choose_list') }}</option>
                                                        <option value="admin">{{ __('Dashboard/login_trans.admin') }}</option>
                                                        <option value="user">{{ __('Dashboard/login_trans.user') }}</option>
                                                        <option value="doctor">{{ __('Dashboard/login_trans.doctor') }}</option>
                                                        {{-- <option value="3">Three</option> --}}
                                                      </select>
                                                </div>

                                                {{-- login-form user --}}

                                                <x-login-form id="login-form-user"
                                                 :route="route('login.user')"
                                                  :title="__('Dashboard/login_trans.user')" >
                                                </x-login-form>



                                                  {{-- login-form admin --}}
                                                  <x-login-form id="login-form-admin"
                                                   :route="route('login.admin')"
                                                   :title="__('Dashboard/login_trans.admin')" >
                                                </x-login-form>

                                                 {{-- login-form doctor --}}
                                                  <x-login-form id="login-form-doctor"
                                                   :route="route('login.doctor')"
                                                   :title="__('Dashboard/login_trans.doctor')" >
                                                </x-login-form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')

<script>
     $(document).ready(function() {
            $('#Access-Control').change(function() {
                if ($(this).val() === 'admin') {

                    $('#login-form-doctor').hide();
                    $('#login-form-user').hide();
                    $('#login-form-admin').show();

                }
                else if($(this).val() === 'user')
                {
                    $('#login-form-admin').hide();
                    $('#login-form-doctor').hide();
                    $('#login-form-user').show();
                }
                 else if($(this).val() === 'doctor')
                {
                    $('#login-form-admin').hide();
                    $('#login-form-user').hide();
                    $('#login-form-doctor').show();
                }


            });
        });
</script>
@endsection
