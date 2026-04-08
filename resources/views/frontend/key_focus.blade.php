@extends('main')

@section('title', 'Key Focus Areas')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Key Focus Areas</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">What We Do</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Key Focus Areas</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Focus Areas Section -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-bullseye me-1"></i> WHAT WE DO</span>
            <h2 class="pc-section-title">Our Focus Areas</h2>
            <p class="pc-section-subtitle">
                A brief overview of the key areas our projects prioritize â€” infrastructure support for women, community empowerment, livelihood development, and social protection.
            </p>
        </div>

        @php
            $badgeStyles = [
                ['bg' => 'rgba(42,133,71,.12)', 'color' => 'var(--pc-primary)'],
                ['bg' => 'rgba(27,42,107,.12)', 'color' => 'var(--pc-secondary)'],
                ['bg' => 'rgba(245,158,11,.12)', 'color' => 'var(--pc-accent)'],
                ['bg' => 'rgba(239,68,68,.12)', 'color' => '#ef4444'],
                ['bg' => 'rgba(139,92,246,.12)', 'color' => '#8b5cf6'],
                ['bg' => 'rgba(20,184,166,.12)', 'color' => '#14b8a6'],
            ];
        @endphp

        <div class="row g-4">
            @forelse(($focus_areas ?? collect()) as $item)
                @php
                    $style = $badgeStyles[$loop->index % count($badgeStyles)];
                    $iconClass = !empty($item->icon_class) ? $item->icon_class : 'bi bi-bullseye';

                    $iconUrl = null;
                    if (!empty($item->icon_path)) {
                        $iconUrl = asset('storage/' . $item->icon_path);
                    }

                    $imageUrl = null;
                    if (!empty($item->image_path)) {
                        $imageUrl = asset('storage/' . $item->image_path);
                    } elseif (!empty($item->default_image)) {
                        $imageUrl = asset($item->default_image);
                    }
                @endphp
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="pc-card h-100 position-relative overflow-hidden">
                        @if(!empty($imageUrl))
                            <div class="position-relative" style="height:200px; overflow:hidden;">
                                <img src="{{ $imageUrl }}" alt="{{ $item->title }}" class="w-100 h-100" style="object-fit:cover;">
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(180deg,rgba(0,0,0,.1) 0%,rgba(0,0,0,.55) 100%);"></div>
                                <div class="position-absolute bottom-0 start-0 p-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-2"
                                         style="width:48px; height:48px; background:rgba(255,255,255,.2); backdrop-filter:blur(8px);">
                                        @if(!empty($iconUrl))
                                            <img src="{{ $iconUrl }}" alt="{{ $item->title }} icon" style="width:24px; height:24px; object-fit:contain;">
                                        @else
                                            <i class="{{ $iconClass }} text-white" style="font-size:1.25rem;"></i>
                                        @endif
                                    </div>
                                    <h5 class="text-white fw-bold mb-0 text-shadow">{{ $item->title }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-text text-muted" style="text-align:justify; max-height:110px; overflow:hidden;">
                                    {!! $item->description !!}
                                </div>
                                <a href="{{ route('key.focus.view', $item->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1 mt-2">
                                    Learn More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3"
                                     style="width:56px; height:56px; background:{{ $style['bg'] }};">
                                    @if(!empty($iconUrl))
                                        <img src="{{ $iconUrl }}" alt="{{ $item->title }} icon" style="width:28px; height:28px; object-fit:contain;">
                                    @else
                                        <i class="{{ $iconClass }}" style="font-size:1.4rem; color:{{ $style['color'] }};"></i>
                                    @endif
                                </div>
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <div class="card-text text-muted" style="text-align:justify; max-height:110px; overflow:hidden;">
                                    {!! $item->description !!}
                                </div>
                                <a href="{{ route('key.focus.view', $item->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1 mt-2">
                                    Learn More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-folder2-open" style="font-size:3rem; color:var(--pc-gray);"></i>
                    <p class="text-muted mt-3 fs-5">No focus areas available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
