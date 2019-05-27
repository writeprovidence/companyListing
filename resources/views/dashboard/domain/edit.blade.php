@extends('layouts.app')

@section('content')
		<main id="main">
			<div class="dashboard-block">
				<div class="container">
					<div class="dashboard-wrap">

                        @include('includes.aside')

						<div class="dashboard-body">
							<form action="{{route('update.nameservers')}}" method="POST" class="dashboard-form">
                                @csrf
                                <h3>Edit Domain</h3>

                                <div class="form-row">
                                    <label for="name">Domain:</label>
                                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ $domain->name }}" required>

                                    @if ($errors->has('name'))
                                    <p class="alert-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

								<hr>
								<div class="bottom-row">
									<span>&deg; Edit Domain info</span>
									<button class="btn" type="submit">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
