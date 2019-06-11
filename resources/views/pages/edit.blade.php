@extends('template')

@section('title', "Edit")

@section('content')
    <form action="{{ route("contacts.update", $contact) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PUT") }}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                           name="first_name" placeholder="Enter First Name"
                           value="{{ old('first_name', $contact->first_name) }}"/>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                           name="last_name" placeholder="Enter Last Name"
                           value="{{ old('last_name', $contact->last_name) }}"/>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                   placeholder="Enter Email" value="{{ old('email', $contact->email) }}"/>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                           placeholder="Enter Phone Number" value="{{ old('phone', $contact->phone) }}"/>
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group birthday">
                    <input type="hidden" id="birthday" name="birthday"
                           value="{{ old('birthday', $contact->birthday) }}"/>

                    <label>Birthday (MM/DD/YYYY)</label>
                    <input type="text" class="form-control date @error('birthday') is-invalid @enderror"
                           id="birthday_month" name="birthday_month" placeholder="12" size="2"
                           value="{{ old('birthday_month', $birthday_month) }}"/>
                    /
                    <input type="text" class="form-control date @error('birthday') is-invalid @enderror"
                           id="birthday_day" name="birthday_day" placeholder="31" size="2"
                           value="{{ old('birthday_day', $birthday_day) }}"/>
                    /
                    <input type="text" class="form-control date @error('birthday') is-invalid @enderror"
                           id="birthday_year" name="birthday_year" placeholder="1999" size="4"
                           value="{{ old('birthday_year', $birthday_year) }}"/>
                    @error('birthday')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>


            </div>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                   placeholder="Enter Address" value="{{ old('address', $contact->address) }}"/>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                           placeholder="Enter City" value="{{ old('city', $contact->city) }}"/>
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="state">State</label>
                    <select class="custom-select @error('state') is-invalid @enderror" name="state">
                        <option value="">--</option>
                        @foreach($states as $stateCode => $stateName)
                            <option value="{{ $stateCode }}"
                                    {{ old('state', $contact->state) === $stateCode ? "selected" : "" }}>
                                {{ $stateName }}
                            </option>
                        @endforeach
                    </select>
                    @error('state')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode"
                           name="zipcode" placeholder="Enter Zip Code" value="{{ old('zipcode', $contact->zipcode) }}"/>
                    @error('zipcode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <p>
            <button type="submit" class="btn btn-primary">Edit Contact</button>
        </p>
    </form>
@endsection