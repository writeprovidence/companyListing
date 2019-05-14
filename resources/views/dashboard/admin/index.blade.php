@extends('layouts.app')

@section('content')
<section class="section bg-grey">
        <div class="container">
            <header class="section-header">
                <h1>Admin Dashboard</h1>
                <p>Check logs, approve companies, approve reviews and reset password</p>
            </header>
            <ul class="reviewbox-list">
                <li>
                    <div class="reviewbox-card">
                        <header class="entry-header">
                            <h3>No. of Companies</h3>
                        </header>
                        
                        <div class="entry-company">
                            <h1>{{$company_count}}</h1>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="reviewbox-card">
                        <header class="entry-header">
                            <h3>No. of Reviews</h3>
                        </header>
                        
                        <div class="entry-company">
                            <h1>{{$review_count}}</h1>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="reviewbox-card">
                        <header class="entry-header">
                            <h3>Passwords</h3>
                        </header>
                        
                        <div class="entry-company">
                            <a class="btn"href="{{route('admin.password.reset')}}"><i class="fa fa-thumbs-up"></i> Reset Password</a>
                        </div>
                    </div>
                </li>
            </ul>
           
        </div>
    </section>
 
@endsection