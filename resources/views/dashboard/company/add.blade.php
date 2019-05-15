@extends('layouts.app')

@section('content')
		<main id="main">
			<div class="dashboard-block">
				<div class="container">
					<div class="dashboard-wrap">

                        @include('includes.aside')

						<div class="dashboard-body">
							<form action="{{route('store.company')}}" method="POST" class="dashboard-form">
                                @csrf
                                <h3>Company Information</h3>

								<div class="form-row">
                                    <label for="name">Company name:</label>
                                        <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                            value="{{ old('name') }}" placeholder="Company Name *" required>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="website">Site:</label>
                                        <input id="website" type="url" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" name="website"
                                            value="{{ old('website') }}" placeholder="Site (Https://)*" required>

                                    @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="email">Email:</label>
                                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                            value="{{ old('email') }}" placeholder="Email *" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="phone">Phone:</label>
                                        <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone Number *" required>

                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="address_line1">Address Line1:</label>
                                        <input id="address_line1" type="text" class="form-control {{ $errors->has('address_line1') ? ' is-invalid' : '' }}" name="address_line1"
                                            value="{{ old('address_line1') }}" placeholder="Address 1 *">

                                    @if ($errors->has('address_line1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                                    @endif
                                </div>


								<div class="form-row">
									<label for="address_line2">Address Line2:</label>
                                        <input id="address_line2" type="text" class="form-control {{ $errors->has('address_line2') ? ' is-invalid' : '' }}" name="address_line2"
                                            value="{{ old('address_line2') }}" placeholder="Address 2 *">

                                    @if ($errors->has('address_line2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="city">City:</label>
                                        <input id="city" type="text" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                            value="{{ old('city') }}" placeholder="City *">

                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="state">State:</label>
                                        <input id="state" type="text" class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" name="state"
                                            value="{{ old('state') }}" placeholder="State *">

                                    @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="zip">Zip:</label>
                                        <input id="zip" type="text" class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip"
                                            value="{{ old('zip') }}" placeholder="Zip *">

                                    @if ($errors->has('zip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="country">Country:</label>

                                    <select id="country" name="country" required>
                                        <option value="reeer">Pakistan</option>
                                        <option value="reeer">Lorem ipsum</option>
                                        <option value="reeer">Lorem ipsum</option>
                                        <option value="reeer">Lorem ipsum</option>
                                    </select>
                                </div>

								<div class="form-row">
									<label for="description">Description:</label>
									<textarea id="description" name="description">{{ old('description') }}</textarea>
								</div>
								<hr>
								<div class="bottom-row">
									<span>&deg; Company info</span>
									<button class="btn" type="submit">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
