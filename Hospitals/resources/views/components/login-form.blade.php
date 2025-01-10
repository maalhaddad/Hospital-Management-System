<div class="login-form" id="{{ $id }}">

    <h5 class="font-weight-semibold mb-4" id="l-name" >{{ $title }}</h5>
    <form method="POST" action="{{ $route }}">
        @csrf
        <div class="form-group">
            <label>{{ __('Dashboard/login_trans.email') }}</label> <input class="form-control" placeholder="{{ __('Dashboard/login_trans.email_plac') }}"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
            <label>{{ __('Dashboard/login_trans.password') }}</label> <input class="form-control" placeholder="{{ __('Dashboard/login_trans.password_plac') }}" type="password" name="password" :value="old('password')" required autofocus autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div><button type="submit" class="btn btn-main-primary btn-block">{{ __('Dashboard/login_trans.Sign_In') }}</button>
        <div class="row row-xs">
            <div class="col-sm-6">
                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
            </div>
            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
            </div>
        </div>
    </form>
    <div class="main-signin-footer mt-5">
        <p><a href="">Forgot password?</a></p>
        <p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
    </div>
</div>