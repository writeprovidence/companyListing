@extends('layouts.app')

@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">

                @include('includes.aside')

                <div class="dashboard-body">
                    <header class="entry-header">
                        <h3>Reset Password</h3>
                    </header>
                    <br><br>
                    <form action="{{route('admin.resetpassword')}}" method="POST" class="enter-form login-form">
                        @csrf

                        <div class="form-group reset">

                            <div class="col-md-6 form-row">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" value="{{ old('password') }}" placeholder="New Password *" >

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
                                    name="password_confirmation" placeholder="Confirm New Password" >

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
        </div>

    </div>
</main>
@endsection
