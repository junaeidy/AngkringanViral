@extends('layouts.admin')

@section('title', 'Edit Misi')

@section('header', 'Edit Misi')

@section('content')
<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('edit.misi', $misi->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="{{$misi->title}}">
                </div>
                <div class="form-group mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" required>{{$misi->content}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <select name="category" class="form-control" required>
                        <option>{{$misi->category}}</option>
                        <option value="Visi">Visi</option>
                        <option value="Misi">Misi</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection