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
                        <h3>Products</h3>

                        <div class="form-row">
                            <label for="product_1_name">Product 1: Name</label>
                            <input id="product_1_name" type="text"
                                class="form-control {{ $errors->has('product_1_name') ? ' is-invalid' : '' }}"
                                name="product_1_name" value="{{ $products->product_1_name ?? ' '}}" placeholder="Product Name *">

                            @if ($errors->has('product_1_name'))
                            <p class="alert-danger">{{ $errors->first('product_1_name') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="product_1_summary">Product 1: Summary</label>
                            @if ($errors->has('product_1_summary'))
                            <p class="alert-danger">{{ $errors->first('product_1_summary') }}</p>
                            @endif
                            <textarea id="product_1_summary"
                                name="product_1_summary"> {{ $products->product_1_summary ?? ' '}}</textarea>
                        </div>
                        <br><br>

                        <div class="form-row">
                            <label for="product_2_name">Product 2: Name</label>
                            <input id="product_2_name" type="text"
                                class="form-control {{ $errors->has('product_2_name') ? ' is-invalid' : '' }}"
                                name="product_2_name" value="{{ $products->product_2_name ?? ' ' }}" placeholder="Product Name *">

                            @if ($errors->has('product_2_name'))
                            <p class="alert-danger">{{ $errors->first('product_2_name') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="product_2_summary">Product 2: Summary</label>
                            @if ($errors->has('product_2_summary'))
                            <p class="alert-danger">{{ $errors->first('product_2_summary') }}</p>
                            @endif
                            <textarea id="product_2_summary"
                                name="product_2_summary"> {{ $products->product_2_summary ?? ' '}}</textarea>
                        </div>
                        <br><br>

                        <div class="form-row">
                            <label for="product_3_name">Product 3: Name</label>
                            <input id="product_3_name" type="text"
                                class="form-control {{ $errors->has('product_3_name') ? ' is-invalid' : '' }}"
                                name="product_3_name" value="{{ $products->product_3_name ?? ' ' }}" placeholder="Product Name *">

                            @if ($errors->has('product_3_name'))
                            <p class="alert-danger">{{ $errors->first('product_3_name') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="product_3_summary">Product 3: Summary</label>
                            @if ($errors->has('product_3_summary'))
                            <p class="alert-danger">{{ $errors->first('product_3_summary') }}</p>
                            @endif
                            <textarea id="product_3_summary"
                                name="product_3_summary"> {{ $products->product_3_summary ?? ' '}}</textarea>
                        </div>

                        <br><br>
                        <div class="form-row">
                            <label for="product_4_name">Product 4: Name</label>
                            <input id="product_4_name" type="text"
                                class="form-control {{ $errors->has('product_4_name') ? ' is-invalid' : '' }}"
                                name="product_4_name" value="{{ $products->product_4_name ?? ' ' }}" placeholder="Product Name *">

                            @if ($errors->has('product_4_name'))
                            <p class="alert-danger">{{ $errors->first('product_4_name') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="product_4_summary">Product 4: Summary</label>
                            @if ($errors->has('product_4_summary'))
                            <p class="alert-danger">{{ $errors->first('product_4_summary') }}</p>
                            @endif
                            <textarea id="product_4_summary"
                                name="product_4_summary"> {{ $products->product_4_summary ?? ' '}}</textarea>
                        </div>

                        <br><br>
                        <div class="form-row">
                            <label for="product_5_name">Product 5: Name</label>
                            <input id="product_5_name" type="text"
                                class="form-control {{ $errors->has('product_5_name') ? ' is-invalid' : '' }}"
                                name="product_5_name" value="{{ $products->product_5_name ?? ' ' }}" placeholder="Product Name *">

                            @if ($errors->has('product_5_name'))
                            <p class="alert-danger">{{ $errors->first('product_5_name') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="product_5_summary">Product 5: Summary</label>
                            @if ($errors->has('product_5_summary'))
                            <p class="alert-danger">{{ $errors->first('product_5_summary') }}</p>
                            @endif
                            <textarea id="product_5_summary"
                                name="product_5_summary"> {{ $products->product_5_summary ?? ' ' }}</textarea>
                        </div>

                        <hr>
                        <div class="bottom-row">
                            <span>&deg; Update Product info</span>
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
