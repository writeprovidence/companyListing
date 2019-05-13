@extends('layouts.app')
@section('content')
<main id="main">
    <div class="enter-block">
        <div class="container">
            <div class="form-box">
                <header class="entry-header">
                    <h2>Create account</h2>
                </header>
                <form action="{{ route('register') }}" method="POST" class="enter-form singup-form">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 form-row">
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ old('name') }}" placeholder="Your name *" required>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 form-row">
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ old('email') }}" placeholder="Your email *" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 form-row">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                placeholder="Create password*" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 form-row">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirm password*" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">Accept <a href="#">Terms of use </a></label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    </div>

                    <div>
                        <button type="submit">Register</button>
                    </div>
                    <div class="help-text">
                        <span>* Required fild</span>
                    </div>
                </form>
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
