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
                                    <p class="alert-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="phone">Phone:</label>
                                        <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                           value="{{ Auth::user()->company->phone }}" placeholder="Phone Number *" required>

                                   @if ($errors->has('phone'))
                                    <p class="alert-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <label for="facebook">Facebook:</label>
                                    <input id="facebook" type="url" class="form-control {{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                        name="facebook" value="{{ Auth::user()->company->facebook }}" placeholder="Facebook *" required>

                                    @if ($errors->has('facebook'))
                                    <p class="alert-danger">{{ $errors->first('facebook') }}</p>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <label for="twitter">Twitter:</label>
                                    <input id="twitter" type="url" class="form-control {{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                                        name="twitter" value="{{ Auth::user()->company->twitter }}" placeholder="Twitter *" required>

                                   @if ($errors->has('twitter'))
                                <p class="alert-danger">{{ $errors->first('twitter') }}</p>
                                @endif
                                </div>

                                <div class="form-row">
                                    <label for="linkedin">Linkedin:</label>
                                    <input id="linkedin" type="url" class="form-control {{ $errors->has('linkedin') ? ' is-invalid' : '' }}"
                                        name="linkedin" value="{{ Auth::user()->company->linkedin }}" placeholder="Linkedin *" required>

                                   @if ($errors->has('linkedin'))
                                    <p class="alert-danger">{{ $errors->first('linkedin') }}</p>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="address_line1">Address Line1:</label>
                                        <input id="address_line1" type="text" class="form-control {{ $errors->has('address_line1') ? ' is-invalid' : '' }}" name="address_line1"
                                            value="{{ Auth::user()->company->address_line1 }}" placeholder="Address 1 *">

                                   @if ($errors->has('address_line1'))
                                <p class="alert-danger">{{ $errors->first('address_line1') }}</p>
                                @endif
                                </div>


								<div class="form-row">
									<label for="address_line2">Address Line2:</label>
                                        <input id="address_line2" type="text" class="form-control {{ $errors->has('address_line2') ? ' is-invalid' : '' }}" name="address_line2"
                                            value="{{ Auth::user()->company->address_line2}}" placeholder="Address 2 *">

                                   @if ($errors->has('address_line2'))
                                    <p class="alert-danger">{{ $errors->first('address_line2') }}</p>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="city">City:</label>
                                        <input id="city" type="text" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                            value="{{ Auth::user()->company->city }}" placeholder="City *">

                                    @if ($errors->has('city'))
                                    <p class="alert-danger">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="state">State:</label>
                                        <input id="state" type="text" class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" name="state"
                                           value="{{ Auth::user()->company->state }}" placeholder="State *">

                                   @if ($errors->has('state'))
                                    <p class="alert-danger">{{ $errors->first('state') }}</p>
                                    @endif
                                </div>

								<div class="form-row">
									<label for="zip">Zip:</label>
                                        <input id="zip" type="text" class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip"
                                           value="{{ Auth::user()->company->zip }}" placeholder="Zip *">

                                   @if ($errors->has('zip'))
                                    <p class="alert-danger">{{ $errors->first('zip') }}</p>
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
