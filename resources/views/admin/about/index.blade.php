@extends('layouts.admin')

@section('title', 'About')

@section('header', 'About')

@section('content')
<div class="container">
    <p><h4 class="bg-secondary text-white text-center p-2 rounded-pill">Cerita Singkat</h4></p>
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @if (empty($stories))
                <a class="btn btn-primary rounded-pill" href="{{route('create.story')}}">Create</a>
                @else
                
            @endif
        </div>
        <form action="{{route('update.story')}}" method="POST">
            @csrf
            @method('PUT')
            @if (empty($stories))

            @else
            <div class="form-group mb-3">
                <input type="text" name="title" class="form-control mb-3" placeholder="Title" required value="{{$stories->title}}">
            </div>
            <div class="form-group mb-3">
                <textarea name="message" cols="12" rows="3" class="form-control" required placeholder="Type your message here...">{{$stories->message}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            @endif
        </form>
    </div>
</div>

<div class="container mt-3">
    <p><h4 class="bg-secondary text-white text-center p-2 rounded-pill">Tentang</h4></p>
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary rounded-pill" href="{{route('create.about')}}">Create</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Content</th>
                <th class="text-center">Gambar</th> 
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $key => $about)
            <tr>
                <th class="text-center">{{$key+1}}</th>
                <td class="text-center">{{$about->title}}</td>
                <td class="text-center">{{$about->message}}</td>
                <td class="text-center">
                    @if (!empty($about->image))
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title ?? 'Image' }}" width="150">
                    @else
                        <p>No image available</p>
                    @endif
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{route('show.edit.about',$about->id)}}" class="btn btn-warning">Edit</a> | <form action="{{route('delete.about',$about->id)}}" method="POST" id="deleteAboutForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" id="deleteAboutButton">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection

@section('js')
<script>
    document.getElementById('deleteAboutButton').addEventListener('click', function () {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteAboutForm').submit();
            }
        });
    });
</script>
@endsection