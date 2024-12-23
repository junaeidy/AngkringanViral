@extends('layouts.admin')

@section('title', 'Edit About')

@section('header', 'Edit About')

@section('content')
<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('update.about', $about->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="{{$about->title}}">
                </div>
                <div class="form-group mb-3">
                    <textarea name="message" class="form-control" placeholder="Message" required>{{$about->message}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <p>Current Image</p>
                    @if (!empty($about->image))
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title ?? 'Image' }}" width="150">
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