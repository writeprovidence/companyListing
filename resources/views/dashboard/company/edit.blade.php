@extends('layouts.app')

@section('content')
		<main id="main">
			<div class="dashboard-block">
				<div class="container">
					<div class="dashboard-wrap">

                        @include('includes.aside')

						<div class="dashboard-body">
							<form action="{{route('update.company')}}" method="POST" class="dashboard-form">
                                @csrf
                                <h3>Company Information</h3>

								<div class="form-row">
                                    <label for="name">Company name:</label>
                                        <input id="name" type="text" class="form-control"
                                            value="{{ Auth::user()->company->name }}"  disabled>
                                </div>

								<div class="form-row">
									<label for="website">Site:</label>
                                        <input id="website" type="url" class="form-control"
                                            value="{{ Auth::user()->company->website }}"  disabled>
                                </div>

								<div class="form-row">
									<label for="email">Email:</label>
                                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                            value="{{ Auth::user()->company->email }}" placeholder="Email *" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="phone">Phone:</label>
                                        <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                           value="{{ Auth::user()->company->phone }}" placeholder="Phone Number *" required>

                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="address_line1">Address Line1:</label>
                                        <input id="address_line1" type="text" class="form-control {{ $errors->has('address_line1') ? ' is-invalid' : '' }}" name="address_line1"
                                            value="{{ Auth::user()->company->address_line1 }}" placeholder="Address 1 *">

                                    @if ($errors->has('address_line1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                                    @endif
                                </div>


								<div class="form-row">
									<label for="address_line2">Address Line2:</label>
                                        <input id="address_line2" type="text" class="form-control {{ $errors->has('address_line2') ? ' is-invalid' : '' }}" name="address_line2"
                                            value="{{ Auth::user()->company->address_line2}}" placeholder="Address 2 *">

                                    @if ($errors->has('address_line2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="city">City:</label>
                                        <input id="city" type="text" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                            value="{{ Auth::user()->company->city }}" placeholder="City *">

                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="state">State:</label>
                                        <input id="state" type="text" class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" name="state"
                                           value="{{ Auth::user()->company->state }}" placeholder="State *">

                                    @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="zip">Zip:</label>
                                        <input id="zip" type="text" class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip"
                                           value="{{ Auth::user()->company->zip }}" placeholder="Zip *">

                                    @if ($errors->has('zip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <label for="country">Country:</label>
                                    <input id="country" type="text" class="form-control" value="{{ Auth::user()->company->country }}" disabled>
                                </div>

								<div class="form-row">
									<label for="description">Description:</label>
									<textarea id="description" name="description">{{ Auth::user()->company->description }}</textarea>
								</div>
								<hr>
								<div class="bottom-row">
									<span>&deg; Edit Company info</span>
									<button class="btn" type="submit">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
