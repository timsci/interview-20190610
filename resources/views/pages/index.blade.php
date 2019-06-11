@extends('template')

@section('title', "List")

@section('content')
    <p class="text-right">
        <a href="{{ route("contacts.create") }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            New Contact
        </a>
    </p>

    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Birthday</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>
                    <a href="{{ route("contacts.edit", $contact) }}">{{ $contact->first_name }}</a>
                </td>
                <td>{{ $contact->last_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->birthday }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
@endsection