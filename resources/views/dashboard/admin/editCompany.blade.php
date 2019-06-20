@extends('layouts.app')

@section('content')
<main id="main">
    <div class="dashboard-block">
        <div class="container">
            <div class="dashboard-wrap">
                <div class="dashboard-body">
                    <form action="{{route('admin.updatecompany', $company->slug)}}" method="POST"
                        class="dashboard-form">
                        @csrf
                        <h3>Company Information</h3>

                        <div class="form-row">
                            <label for="name">Company name:</label>
                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $company->name }}">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('name'))
                            <p class="alert-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="website">Site:</label>
                            <input id="website" type="url" name="website" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" value="{{ $company->website }}">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('website'))
                            <p class="alert-danger">{{ $errors->first('website') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="slug">Link To Go:</label>
                            <input id="slug" type="text" name="slug" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" value="{{ $company->slug }}">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('slug'))
                            <p class="alert-danger">{{ $errors->first('slug') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="domains_count">Domains:</label>
                            <input id="domains_count" type="number" name="domains_count" class="form-control {{ $errors->has('domain_count') ? ' is-invalid' : '' }}" value="{{ $company->domains_count }}">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('domains_count'))
                            <p class="alert-danger">{{ $errors->first('domains_count') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="email">Email:</label>
                            <input id="email" type="email"
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ $company->email }}" placeholder="Email *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('email'))
                            <p class="alert-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="phone">Phone:</label>
                            <input id="phone" type="text"
                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                value="{{ $company->phone }}" placeholder="Phone Number *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('phone'))
                            <p class="alert-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="facebook">Facebook:</label>
                            <input id="facebook" type="url"
                                class="form-control {{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook"
                                value="{{ $company->facebook }}" placeholder="Facebook *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('facebook'))
                            <p class="alert-danger">{{ $errors->first('facebook') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="twitter">Twitter:</label>
                            <input id="twitter" type="url"
                                class="form-control {{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter"
                                value="{{ $company->twitter }}" placeholder="Twitter *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('twitter'))
                            <p class="alert-danger">{{ $errors->first('twitter') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="linkedin">Linkedin:</label>
                            <input id="linkedin" type="url"
                                class="form-control {{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin"
                                value="{{ $company->linkedin }}" placeholder="Linkedin *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('linkedin'))
                            <p class="alert-danger">{{ $errors->first('linkedin') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="address_line1">Address Line1:</label>
                            <input id="address_line1" type="text"
                                class="form-control {{ $errors->has('address_line1') ? ' is-invalid' : '' }}"
                                name="address_line1" value="{{ $company->address_line1 }}" placeholder="Address 1 *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('address_line1'))
                            <p class="alert-danger">{{ $errors->first('address_line1') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="address_line2">Address Line2:</label>
                            <input id="address_line2" type="text"
                                class="form-control {{ $errors->has('address_line2') ? ' is-invalid' : '' }}"
                                name="address_line2" value="{{ $company->address_line2}}" placeholder="Address 2 *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('address_line2'))
                            <p class="alert-danger">{{ $errors->first('address_line2') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="city">City:</label>
                            <input id="city" type="text"
                                class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                value="{{ $company->city }}" placeholder="City *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('city'))
                            <p class="alert-danger">{{ $errors->first('city') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="state">State:</label>
                            <input id="state" type="text"
                                class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" name="state"
                                value="{{ $company->state }}" placeholder="State *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('state'))
                            <p class="alert-danger">{{ $errors->first('state') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="zip">Zip:</label>
                            <input id="zip" type="text"
                                class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip"
                                value="{{ $company->zip }}" placeholder="Zip *">
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('zip'))
                            <p class="alert-danger">{{ $errors->first('zip') }}</p>
                            @endif
                        </div>

                        <div class="form-row">
                            <label for="country">Country:</label>
                            <input id="country" type="text" class="form-control" value="{{ $company->country }}"
                                disabled>
                        </div>

                        <div class="form-row">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description">{{ $company->description }}</textarea>
                        </div>
                        <div class="shift-error">
                            @if ($errors->has('description'))
                            <p class="alert-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                        <hr>
                        <div class="bottom-row">
                            <span>&deg; Edit Company info</span>
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>

                    <br><br>
                    @if($company->domains()->count() > 0)
                    <h4>NameServer List</h4>
                    <ul>
                        @foreach($company->domains as $key => $domain)
                        <li>
                            <form action="{{route('admin.updatedomain', $domain->id)}}" method="POST" class="dashboard-form domain">
                                @csrf
                                <div class="form-row append-after">
                                    <label for="name">NameServer {{$key+1}}:</label>
                                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"   name="name" value="{{$domain->name}}">

                                    @if ($errors->has('name'))
                                    <p class="alert-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                    <button class="btn" type="submit">Save</button>
                                </div>

                            </form>
                        </li>
                        <br>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
