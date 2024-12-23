@extends('layouts.main')

@section('title', 'Home')

@section('content')
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">{{$hero->title}}</h1>
                    <p class="lead fw-normal text-white-50 mb-4">{{$hero->content}}</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Read More</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="" target="_blank"><i class="bi bi-whatsapp"></i> Contact</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img src="{{ asset('storage/' . $hero->image) }}" alt="..." /></div>
        </div>
    </div>
</header>
 <!-- Features section-->
 <section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Visi dan Misi Angkringan Viral</h2></div>
            <div class="col-lg-8">
                <div class="row gx-5 row-cols-1 row-cols-md-2">
                    {{-- Visi --}}
                    @foreach ($visis as $visi)
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h5">{{$visi->title}}</h2>
                        <p class="mb-0">{{$visi->content}}</p>
                    </div>
                    @endforeach
                    {{-- Misi --}}
                    @foreach ($misis as $misi)
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h5">{{$misi->title}}</h2>
                        <p class="mb-0">{{$misi->content}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial section-->
<div class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-10 col-xl-7">
                <div class="text-center">
                    <div class="fs-4 mb-4 fst-italic">"{{$sambutan->message}}"</div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                        <div class="fw-bold">
                            Ainul
                            <span class="fw-bold text-primary mx-1">/</span>
                            CEO, Angkringan Viral
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog preview section-->
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder">Menu Spesial</h2>
                    <p class="lead fw-normal text-muted mb-5">Beberapa menu spesial yang dibuat oleh angkringan viral untuk anda coba.</p>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            @foreach ($menus as $menu)
                
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="..."  class="card-img-top">
                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Spesial</div>
                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">{{$menu->title}}</h5></a>
                        <p class="card-text mb-0">{{$menu->content}}</p>
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-3" style="width: 40px; height: 40px;" src="https://www.svgrepo.com/show/530462/gold.svg" alt="..." />
                                <div class="small">
                                    <div class="fw-bold">Ainul Haq</div>
                                    <div class="text-muted">March 12, 2023&middot;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')
    
@endsection
