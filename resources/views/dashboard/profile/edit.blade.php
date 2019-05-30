@extends('layouts.app')
@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">

                @include('includes.aside')

                <div class="dashboard-body">
                    <form action="{{route('update.user')}}" method="POST" class="dashboard-form">
                        @csrf
                        <h3>Profile</h3>

                        <div class="form-row">
                            <label for="title">Title:</label>
                            <input id="title" type="text"
                                class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                value="{{ Auth::user()->title }}" placeholder="Title *">

                        </div>
                        <div class="shift-error">
                            @if ($errors->has('title'))
                            <p class="alert-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="name">Name:</label>
                            <input id="name" type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ Auth::user()->name }}">

                        </div>
                        <div class="shift-error">
                            @if ($errors->has('name'))
                            <p class="alert-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>


                        <div class="form-row">
                            <label for="address">Address:</label>
                            <input id="address" type="text"
                                class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                value="{{ Auth::user()->address }}" placeholder="Address *">


                        </div>
                        <div class="shift-error">
                            @if ($errors->has('address'))
                            <p class="alert-danger">{{ $errors->first('address') }}</p>
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
