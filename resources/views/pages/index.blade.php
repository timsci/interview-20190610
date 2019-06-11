@extends('template')

@section('title', "List")

@section('content')
    @foreach($contacts as $contact)
        <div class="row">
            <div class="col">
                <strong>{{ $contact->first_name . " " . $contact->last_name }}</strong>
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                <div>{{ $contact->phone }}</div>
                <div>{{ $contact->birthday }}</div>
                <div>{{ $contact->address }}</div>
            </div>
        </div>
    @endforeach

    <div>
        <a href="{{ route("contacts.create") }}" class="btn btn-primary">New Contact</a>
    </div>
@endsection