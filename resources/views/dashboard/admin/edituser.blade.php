@extends('layouts.app')
@section('content')
    <main id="main">
        <div class="dashboard-block">
            <div class="container">
                <div class="dashboard-wrap">

                    <div class="dashboard-body">
                        <form action="{{route('admin.update.user', $user->id)}}" method="POST" class="dashboard-form">
                            @method('PUT')
                            @csrf
                            <h3>Admin Edit User Profile</h3>

                            <div class="form-row">
                                <label for="title">Title:</label>
                                <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title" value="{{ $user->title }}" placeholder="Title *" required>

                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-row">
                                <label for="name">Name:</label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ $user->name }}" required>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-row">
                                <label for="email">Email:</label>
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-row">
                                <label for="address">Address:</label>
                                <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                    value="{{ $user->address }}" placeholder="Address *">

                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>

                            <hr>
                            <div class="bottom-row">
                                <span>&deg; Personal info</span>
                                <button class="btn" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
