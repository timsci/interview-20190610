@extends('template')

@section('title', "List")

@section('content')
    @foreach($contacts as $contact)
        <div class="row">
            <div class="col">
                <h3>
                    <a href="{{ route("contacts.edit", $contact) }}">
                        {{ $contact->first_name . " " . $contact->last_name }}
                    </a>
                </h3>
                <div>{{ $contact->email }}</div>
                <div>{{ $contact->phone }}</div>
                <div>{{ $contact->birthday }}</div>
                <div>{{ $contact->address }}</div>
            </div>
        </div>
    @endforeach

    <div>
        <a href="{{ route("contacts.create") }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            New Contact
        </a>
    </div>
@endsection