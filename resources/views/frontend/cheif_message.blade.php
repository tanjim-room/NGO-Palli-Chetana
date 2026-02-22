@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Chief's Message</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Chief's Message</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Chief's Message Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-chat-quote me-1"></i> Leadership</span>
                <h2 class="pc-section-title mt-3">{{ $message->title }}</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            {{-- Photo Column --}}
                            <div class="col-lg-4">
                                <div class="h-100 position-relative" style="min-height: 400px;">
                                    <img src="{{ asset('images/chief_message/' . $message->photo) }}"
                                         class="w-100 h-100"
                                         style="object-fit: cover;"
                                         alt="{{ $message->name }}">
                                    <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white text-center" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                                        <h5 class="fw-bold mb-1">{{ $message->name }}</h5>
                                        <span class="badge rounded-pill" style="background: var(--pc-primary);">{{ $message->designation }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Message Column --}}
                            <div class="col-lg-8">
                                <div class="p-4 p-lg-5 position-relative">
                                    {{-- Decorative quote icon --}}
                                    <div class="position-absolute" style="top: 20px; right: 30px; opacity: 0.06;">
                                        <i class="bi bi-quote" style="font-size: 8rem; color: var(--pc-primary);"></i>
                                    </div>

                                    {{-- Accent bar --}}
                                    <div class="d-flex align-items-center mb-4">
                                        <div style="width:5px; height:40px; background: var(--pc-primary); border-radius:3px;" class="me-3"></div>
                                        <div>
                                            <h5 class="fw-bold mb-0" style="color: var(--pc-primary);">Message from the Chief</h5>
                                        </div>
                                    </div>

                                    <div class="message-content" style="font-size: 1.02rem; line-height: 1.9; color: #374151; position: relative; z-index: 1;">
                                        {!! $message->message !!}
                                    </div>

                                    {{-- Signature --}}
                                    @if($message->signature)
                                    <div class="mt-4 pt-4 border-top">
                                        <img src="{{ asset('images/chief_message/' . $message->signature) }}"
                                             alt="Signature"
                                             style="max-height: 60px; opacity: 0.8;">
                                        <div class="mt-2">
                                            <strong class="d-block" style="color: var(--pc-dark);">{{ $message->name }}</strong>
                                            <small class="text-muted">{{ $message->designation }}, Palli Chetana</small>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
