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

    <div class="row">
        <div class="col">
            {{ $contacts->links() }}
        </div>
        <div class="col text-right">
            Results Per Page: &nbsp;
            <select id="per_page" class="custom-select" style="width:auto;">
                @foreach ([10,25,50] as $option)
                    <option {{ $option === $per_page ? "selected" : "" }}>{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>

@endsection