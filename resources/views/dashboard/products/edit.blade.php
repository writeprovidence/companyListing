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
                                <h3>Edit Nameservers</h3>

                                <div class="form-row">
                                    <label for="name_1">Nameservers 1:</label>
                                    <input id="name_1" type="text" class="form-control {{ $errors->has('name_1') ? ' is-invalid' : '' }}" name="name_1"
                                        value="{{ $nameservers->name_1 }}" placeholder="Name Server 1 *" required>

                                    @if ($errors->has('name_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_1') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <label for="name_2">Nameservers 2:</label>
                                    <input id="name_2" type="text" class="form-control {{ $errors->has('name_2') ? ' is-invalid' : '' }}" name="name_2"
                                        value="{{ $nameservers->name_2 }}" placeholder="Name Server 2 *" required>

                                    @if ($errors->has('name_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_2') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<hr>
								<div class="bottom-row">
									<span>&deg; Edit Nameserver info</span>
									<button class="btn" type="submit">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
