@extends('layouts.app')
@section('content')
<main id="main">
    <div class="enter-block">
        <div class="container">
            <div class="form-box">
                <header class="entry-header">
                    <h2>Password reset</h2>
                </header>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="enter-form fogetpass-form">
                    @csrf
                    <span class="help-title">We'll send you instruction in email</span>

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

                    <div class="form-row">
                        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
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
