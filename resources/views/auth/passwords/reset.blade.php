
@extends('layouts.app')

@section('content')
<section class="section bg-grey">
    <div class="container">
        <header class="section-header">
            <h1>Dashboard</h1>
        </header>
        <ul class="reviewbox-list reset">
            <li>
                <div class="reviewbox-card reset">
                    <header class="entry-header">
                        <h3>Reset Password</h3>
                    </header>

                    <div class="entry-company">
                        <form action="{{ route('password.update') }}" method="POST" class="enter-form login-form">
                            @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-group reset">

                                <div class="col-md-6 form-row">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" value="{{ old('password') }}" placeholder="New Password *"
                                        required>

                                    @if ($errors->has('password'))
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group reset">
                                <div class="col-md-6 form-row">
                                    <input id="password_confirmation" type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation" placeholder="Confirm New Password" required>

                                    @if ($errors->has('password_confirmation'))
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="reset-button">
                                <button type="submit" class>Reset Password</button>
                            </div>

                        </form>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</section>

@endsection
