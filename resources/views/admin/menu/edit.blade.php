@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('header', 'Edit Menu')

@section('content')
<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('edit.menu', $menu->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="{{$menu->title}}">
                </div>
                <div class="form-group mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" required >{{$menu->content}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <p>Current Image</p>
                    @if (!empty($menu->image))
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->title ?? 'Image' }}" width="150">
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="image" class="form-control mt-2" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')    

@endsection