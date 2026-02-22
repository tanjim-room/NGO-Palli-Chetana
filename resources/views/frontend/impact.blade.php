@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Our Impact</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">What We Do</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Impact</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Impact Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-graph-up-arrow me-1"></i> Results</span>
                <h2 class="pc-section-title mt-3">Measuring Our Impact</h2>
                <p class="text-muted">The numbers that reflect our commitment to creating meaningful change in communities through Palli Chetana's programs.</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($impact as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden pc-card">
                    <div class="card-body p-4 p-lg-5 text-center">
                        {{-- Icon --}}
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width:80px; height:80px; background: rgba(42,133,71,0.1);">
                            @if($item->icon)
                            <i class="bi bi-{{ $item->icon }} fs-2" style="color: var(--pc-primary);"></i>
                            @else
                            <i class="bi bi-bar-chart-line fs-2" style="color: var(--pc-primary);"></i>
                            @endif
                        </div>

                        {{-- Metric --}}
                        <div class="mb-3">
                            <span class="d-block fw-bold" style="font-size: 2.5rem; color: var(--pc-primary); line-height: 1.1;">
                                {{ $item->metric_value }}
                            </span>
                            @if($item->metric_unit)
                            <span class="text-muted text-uppercase small fw-semibold letter-spacing-1">{{ $item->metric_unit }}</span>
                            @endif
                        </div>

                        {{-- Title & Description --}}
                        <h5 class="fw-bold mb-2">{{ $item->title }}</h5>
                        @if($item->description)
                        <p class="text-muted small mb-2">{{ $item->description }}</p>
                        @endif

                        {{-- Year Badge --}}
                        @if($item->year)
                        <span class="badge rounded-pill" style="background: rgba(42,133,71,0.1); color: var(--pc-primary); font-weight: 600;">
                            <i class="bi bi-calendar3 me-1"></i> {{ $item->year }}
                        </span>
                        @endif
                    </div>
                    <div style="height:4px; background: linear-gradient(90deg, var(--pc-primary), var(--pc-accent));"></div>
                </div>
            </div>
            @endforeach
        </div>

        @if($impact->isEmpty())
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-6 text-center">
                <div class="card border-0 shadow-sm rounded-4 p-5">
                    <i class="bi bi-bar-chart-line fs-1 text-muted mb-3"></i>
                    <h5 class="fw-bold text-muted">Impact Data Coming Soon</h5>
                    <p class="text-muted mb-0">We're compiling our impact data. Check back soon for updates.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
