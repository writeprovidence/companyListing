@extends('layouts.app')

@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">

                @include('includes.aside')

                <div class="dashboard-body">
                    <form action="{{route('store.products')}}" method="POST" class="dashboard-form">
                        @csrf
                        <h3>Product</h3>

                        <div class="form-row">
                            <label for="name">Name:</label>
                            <input id="name" type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ old('name') }}" placeholder="Product Name *" required>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                    <div class="form-row">
                        <label for="description">Summary:</label>
                        <textarea id="description" name="description"> {{ old('description')}}</textarea>
                    </div>

                        <hr>
                        <div class="bottom-row">
                            <span>&deg; Add Product info</span>
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
