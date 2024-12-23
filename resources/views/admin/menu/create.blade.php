@extends('layouts.admin')

@section('title', 'Create Spesial Menu')

@section('header', 'Create Spesial Menu')

@section('content')
<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('process.menu')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <input type="file" name="image" class="form-control" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection