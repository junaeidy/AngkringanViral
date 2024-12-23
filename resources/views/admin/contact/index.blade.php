@extends('layouts.admin')

@section('title', 'Contact')

@section('header', 'Contact')

@section('content')
<div class="container">
    <table class="table table-striped table-hover border">
        <thead class="table-dark">
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $key => $contact)
            <tr>
                <th class="text-center">{{$key+1}}</th>
                <td class="text-center">{{$contact->name}}</td>
                <td class="text-center">{{$contact->email}}</td>
                <td class="text-center">{{$contact->phone}}</td>
                <td class="text-center">{{$contact->message}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')    

@endsection