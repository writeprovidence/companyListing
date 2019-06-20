@extends('layouts.app')

@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">

                @include('includes.aside')

                <div class="dashboard-body">
                    @if(session('success'))
                    <p class="alert-success">
                       {{session('success')}}
                    </p>
                    @endif
                    <form action="{{route('store.domains')}}" method="POST" class="dashboard-form domain">
                        @csrf
                        <div class="bottom-row">
                            <h3>Nameservers</h3>

                            <button class="btn add-field" type="submit">Add Nameserver Field</button>
                        </div>

                        <div class="form-row append-after">
                            <label for="name">Nameservers:</label>
                            <input id="name" type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name[]"
                                placeholder="Domain Name *" >

                            @if ($errors->has('name'))
                            <p class="alert-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <hr>

                        @if(Auth::user()->company->domains()->count() > 0)
                        <h4>Nameserver List</h4>
                        <ol>
                            @foreach($domains as $domain)
                            <li>
                                {{$domain->name}}
                            </li>
                            @endforeach
                        </ol>
                        @endif

                        <div class="bottom-row">
                            <span>&deg; Add Nameservers info</span>
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
