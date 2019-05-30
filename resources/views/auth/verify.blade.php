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
                            <a class="btn reset" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
                       </p>
                       <br>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</section>

@endsection
