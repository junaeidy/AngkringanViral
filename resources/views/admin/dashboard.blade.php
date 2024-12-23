@extends('layouts.admin')

@section('title', 'Angkringan Viral')

@section('header', 'Dashboard')

@section('css')
@section('content')
<div class="container">
    <p><h4 class="bg-secondary text-white text-center p-2 rounded-pill">Hero Section</h4></p>
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @if (empty($heroes))
                
            <a class="btn btn-primary rounded-pill" href="{{route('create.hero')}}">Create</a>
            @endif
            
        </div>
        <div class="col-6 col-md-6">
            <form action="{{route('update.hero')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <p><strong>Text Display</strong></p>
            <div class="card">
                <div class="card-header">
                    @if (($heroes != null))
                    <p>Title</p>
                    <input type="text" name="title" class="form-control" value="{{$heroes->title}}" required>
                    @else
                    <h5 class="card-title mb-0">No data available</h5>
                    @endif
                </div>
                <div class="card-body">
                    @if (($heroes != null))
                    <p>Content</p>
                    <textarea name="content" class="form-control mb-3" required>{{ $heroes->content }}</textarea>
                    @else
                    <h5 class="card-title mb-0">No data available</h5>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6">
            <p><strong>Image</strong></p>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Current Image</h5>
                    @if (!empty($heroes) && !empty($heroes->image))
                        <img src="{{ asset('storage/' . $heroes->image) }}" alt="{{ $heroes->title ?? 'Image' }}" width="150">
                    @else
                        <p>No image available</p>
                    @endif
                        <input class="form-control mt-3" type="file" id="formFile" name="image">
                        <button type="submit" class="btn btn-success mt-3">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="container mt-3">
    <p ><h4 class="bg-secondary text-white text-center p-2 rounded-pill">Visi dan Misi</h4></p>
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('create.visi')}}" class="btn btn-primary rounded-pill">Create</a>
        </div>
        <div class="col-6 col-md-6">
            <p><strong>Visi</strong></p>
            @foreach($visis as $visi)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{$visi->title}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$visi->content}}</p>
                    <div class="d-flex gap-2 align-items-center">
                        <a href="{{route('show.edit.visi',$visi->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('delete.visi',$visi->id)}}" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-6 col-md-6">
            <p><strong>Misi</strong></p>
            @foreach($Misis as $Misi)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{$Misi->title}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$Misi->content}}</p>
                    <div class="d-flex gap-1 align-items-center">
                        <a href="{{route('show.edit.misi',$Misi->id)}}" class="btn btn-warning">Edit</a>`
                        <form action="{{route('delete.misi',$Misi->id)}}" method="POST" id="deleteMisiForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" id="deleteMisiButton">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container mt-3">
    <p><h4 class="bg-secondary text-white text-center p-2 rounded-pill">Kata Sambutan</h4></p>
    <form action="{{ isset($sambutan->message) ? route('process.edit.sambutan') : route('process.sambutan') }}" method="POST">
        @csrf
        @if(isset($sambutan->message))
            @method('PUT') {{-- Tambahkan method PUT jika data ada (edit) --}}
        @endif
        <div class="mb-3">
            <textarea name="message" rows="3" class="form-control" required placeholder="Type your message here...">@if(isset($sambutan) && $sambutan->message){{ $sambutan->message }}@endif</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>

<div class="container mt-3">
    <p><h4 class="bg-secondary text-white text-center p-2 rounded-pill">Menu Spesial</h4></p>
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary rounded-pill" href="{{route('create.menu')}}">Create</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Judul</th>
                <th scope="col" class="text-center">Content</th>
                <th scope="col" class="text-center">Gambar</th> 
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $key => $menu)
            <tr>
                <th scope="row" class="text-center">{{$key+1}}</th>
                <td class="text-center">{{$menu->title}}</td>
                <td class="text-center">{{$menu->content}}</td>
                <td class="text-center">
                    @if (!empty($menu->image))
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->title ?? 'Image' }}" width="150">
                    @else
                        <p>No image available</p>
                    @endif
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{route('show.edit.menu',$menu->id)}}" class="btn btn-warning">Edit</a> | <form action="{{route('delete.menu',$menu->id)}}" method="POST" id="deleteMenuForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" id="deleteMenuButton">Delete</button>
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
    document.getElementById('deleteButton').addEventListener('click', function () {
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
                document.getElementById('deleteForm').submit();
            }
        });
    });
</script>

<script>
    document.getElementById('deleteMisiButton').addEventListener('click', function () {
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
                document.getElementById('deleteMisiForm').submit();
            }
        });
    });
</script>
<script>
    document.getElementById('deleteMenuButton').addEventListener('click', function () {
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
                document.getElementById('deleteMenuForm').submit();
            }
        });
    });
</script>

@endsection