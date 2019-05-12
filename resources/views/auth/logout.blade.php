@extends('layouts.auth')
@section('content')
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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="Email *" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <input type="email" placeholder="Email *">
                        </div>
                        <div class="form-row">
                            <input type="password" placeholder="Password*">
                        </div>
                        <div class="form-row restore-pass-mod">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="terms">
                                <label for="terms">Remember</label>
                            </div>
                            <div>
                                <a href="{{route('password.request')}}">Fogot password?</a>
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
                            <a class="btn btn-outline" href="#">Sign Up</a>
                        </div>
                        <div class="entry-confirm">
                            <p>By continuing you're confirming that you've read our <a href="#">Terms & Conditions</a> and <a href="#">Cookie Policy</a></p>
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
@endsection¬
