@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <h1 class="fw-bolder mb-3">{{$stories->title}}</h1>
                    <p class="lead fw-normal text-muted mb-4">{{$stories->message}}</p>
                    <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                </div>
            </div>
        </div>
    </div>
</header>


@foreach ($abouts as $key => $about)
<!-- About section one-->
@if ($key % 2 == 0)
<section class="py-5 bg-light" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('storage/' . $about->image) }}" alt="..." style="width: 600px; height: 400px;"></div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">{{$about->title}}</h2>
                <p class="lead fw-normal text-muted mb-0">{{$about->message}}</p>
            </div>
        </div>
    </div>
</section>
<!-- About section two-->
@else
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('storage/' . $about->image) }}" alt="..." style="width: 600px; height: 400px;"/></div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">{{$about->title}}</h2>
                <p class="lead fw-normal text-muted mb-0">{{$about->message}}</p>
            </div>
        </div>
    </div>
    @endif
</section>
@endforeach
@endsection

@section('js')

@endsection