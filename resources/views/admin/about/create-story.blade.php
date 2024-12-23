@extends('layouts.admin')

@section('title', 'Create Story')

@section('header', 'Create Story')

@section('content')
<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('process.story')}}">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group mb-3">
                    <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')    

@endsection