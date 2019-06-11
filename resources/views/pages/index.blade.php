@extends('template')

@section('title', "List")

@section('content')
    <input type="hidden" id="sort" value="{{ $sort }}"/>
    <input type="hidden" id="order" value="{{ $order }}"/>

    <p class="text-right">
        <a href="{{ route("contacts.create") }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            New Contact
        </a>
    </p>

    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>
                @if ($sort === "id")
                    <a href="?sort=id&order={{$order==="asc" ? "desc":"asc"}}&per_page{{$per_page}}">
                        ID
                        <i class="fas {{$order==="asc" ? "fa-caret-up":"fa-caret-down"}}"></i>
                    </a>
                @else
                    <a href="?sort=id&order=asc&per_page={{$per_page}}">ID</a>
                @endif
            </th>
            <th>
                @if ($sort === "first_name")
                    <a href="?sort=first_name&order={{$order==="asc" ? "desc":"asc"}}&per_page{{$per_page}}">
                        First Name
                        <i class="fas {{$order==="asc" ? "fa-caret-up":"fa-caret-down"}}"></i>
                    </a>
                @else
                    <a href="?sort=first_name&order=asc&per_page={{$per_page}}">First Name</a>
                @endif
            </th>
            <th>
                @if ($sort === "last_name")
                    <a href="?sort=last_name&order={{$order==="asc" ? "desc":"asc"}}&per_page{{$per_page}}">
                        Last Name
                        <i class="fas {{$order==="asc" ? "fa-caret-up":"fa-caret-down"}}"></i>
                    </a>
                @else
                    <a href="?sort=last_name&order=asc&per_page={{$per_page}}">Last Name</a>
                @endif
            </th>
            <th>
                @if ($sort === "email")
                    <a href="?sort=email&order={{$order==="asc" ? "desc":"asc"}}&per_page{{$per_page}}">
                        Email
                        <i class="fas {{$order==="asc" ? "fa-caret-up":"fa-caret-down"}}"></i>
                    </a>
                @else
                    <a href="?sort=email&order=asc&per_page={{$per_page}}">Email</a>
                @endif
            </th>
            <th>
                @if ($sort === "phone")
                    <a href="?sort=phone&order={{$order==="asc" ? "desc":"asc"}}&per_page{{$per_page}}">
                        Phone
                        <i class="fas {{$order==="asc" ? "fa-caret-up":"fa-caret-down"}}"></i>
                    </a>
                @else
                    <a href="?sort=phone&order=asc&per_page={{$per_page}}">Phone</a>
                @endif
            </th>
            <th>
                @if ($sort === "birthday")
                    <a href="?sort=birthday&order={{$order==="asc" ? "desc":"asc"}}&per_page{{$per_page}}">
                        Birthday
                        <i class="fas {{$order==="asc" ? "fa-caret-up":"fa-caret-down"}}"></i>
                    </a>
                @else
                    <a href="?sort=birthday&order=asc&per_page={{$per_page}}">Birthday</a>
                @endif
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>
                    <a href="{{ route("contacts.edit", $contact) }}">{{ $contact->id }}</a>
                </td>
                <td>{{ $contact->first_name }}</td>
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