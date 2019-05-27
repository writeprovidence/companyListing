@extends('layouts.app')
@section('content')

@if(session('error'))
<div class="container-fluid enter-block">
    <div class="row">
        <div class="col-8 mx-auto text-center">
            <p class="mx-5 px-5" style="color:#333333">{{session('error')}} </p>
            <a class="btn" href="{{ route('verification.resend') }}">{{ __('Send me Email Confirmation Link') }}</a>.
        </div>
    </div>
</div>
@endif
@if(session('success'))
<div class="container-fluid enter-block">
    <div class="row">
        <div class="col-8 mx-auto text-center">
            {{session('success')}}
        </div>
    </div>
</div>
@endif

<main id="main">
    <div class="enter-block">
        <div class="container">
            <div class="form-box">
                <header class="entry-header">
                    <h2>Login to your account</h2>
                </header>
                <form action="{{route('login')}}" method="POST" class="enter-form login-form">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-6 form-row">
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ old('email') }}" placeholder="Email *" required>

                            @if ($errors->has('email'))
                            <p class="alert-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 form-row">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                placeholder="Password*" required>

                            @if ($errors->has('password'))
                            <p class="alert-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 form-row restore-pass-mod">
                            <div class="form-check custom-checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="terms"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="terms">
                                    {{ __('Remember') }}
                                </label>
                            </div>

                            <div>
                                <a href="{{route('password.request')}}">Fogot password?</a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit">Login</button>
                    </div>
                    <div class="help-text">
                        <span>* Required field</span>
                    </div>
                </form>
                <div class="singup-link-block">
                    <p>Don't have an account?</p>
                    <div class="btn-wrap">
                        <a class="btn btn-outline" href="{{route('register')}}">Sign Up</a>
                    </div>
                    <div class="entry-confirm">
                        <p>By continuing you're confirming that you've read our <a href="#">Terms & Conditions</a> and
                            <a href="#">Cookie Policy</a></p>
                    </div>
                </div>
            </div>
            <aside class="enter-aside">
                <h3><mark>Benefits</mark> of registering with us</h3>
                <ul>
                    <li>View and respond to customer reviews </li>
                    <li>Update your company profile</li>
                    <li>Generate bage for your website</li>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </aside>
        </div>
    </div>
</main>
@endsection
