@extends('layouts.app')

@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">

                @include('includes.aside')

                <div class="dashboard-body">
                    <form action="{{route('store.domains')}}" method="POST" class="dashboard-form">
                        @csrf
                        <h3>Domains</h3>

                        <div class="form-row">
                            <label for="name">Domains:</label>
                            <input id="name" type="text"
                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                            placeholder="Domain Name *" required>

                            @if ($errors->has('name'))
                           <p class="alert-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <hr>

                        @if(Auth::user()->company->domains()->count() > 0)
                            <h4>Domain List</h4>
                            <ol>
                                @foreach($domains as $domain)
                                    <li>
                                        {{$domain->name}}
                                    </li>
                                @endforeach
                            </ol >
                        @endif

                        <div class="bottom-row">
                            <span>&deg; Add Domain info</span>
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
