{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<section class="section bg-grey">
    <div class="container">
        <header class="section-header">
            <h1>Verify Your Account</h1>
             @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
        </header>
        <ul class="reviewbox-list reset">
            <li>
                <div class="reviewbox-card reset">
                    <header class="entry-header">
                        <h3>Check email address</h3>
                    </header>

                    <div class="entry-company">
                        <br>
                       <p>
                           Before proceeding, please check your email for a verification link.
                       </p>
                       <p>
                            If you did not receive the email <br><br><br>
                            <a class="btn" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
                       </p>
                       <br>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</section>

@endsection
