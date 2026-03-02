@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Our Team</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Team Members</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Team Members Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-people me-1"></i> Our People</span>
                <h2 class="pc-section-title mt-3">Meet the Team</h2>
                <p class="text-muted">The passionate individuals driving change at Palli Chetana.</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden pc-card">
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <img src="{{ asset('images/team_members/' . $member->photo) }}"
                             class="w-100 h-100"
                             style="object-fit: cover; transition: transform 0.4s ease;"
                             alt="{{ $member->name }}"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                        @if($member->department)
                        <span class="position-absolute top-0 end-0 m-3 badge rounded-pill" style="background: var(--pc-primary);">
                            {{ $member->department }}
                        </span>
                        @endif
                    </div>
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-1">{{ $member->name }}</h5>
                        <p class="mb-2" style="color: var(--pc-primary); font-weight: 500; font-size: 0.9rem;">{{ $member->designation }}</p>
                        @if($member->bio)
                        <p class="text-muted small mb-3">{{ Str::limit(strip_tags($member->bio), 100) }}</p>
                        @endif

                        {{-- Social Links --}}
                        <div class="d-flex justify-content-center gap-2">
                            @if($member->facebook)
                            <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" style="width:36px; height:36px; background: rgba(42,133,71,0.1); color: var(--pc-primary); transition: all 0.3s;" onmouseover="this.style.background='var(--pc-primary)'; this.style.color='#fff'" onmouseout="this.style.background='rgba(42,133,71,0.1)'; this.style.color='var(--pc-primary)'">
                                <i class="bi bi-facebook"></i>
                            </a>
                            @endif
                            @if($member->twitter)
                            <a href="{{ $member->twitter }}" target="_blank" class="btn btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" style="width:36px; height:36px; background: rgba(42,133,71,0.1); color: var(--pc-primary); transition: all 0.3s;" onmouseover="this.style.background='var(--pc-primary)'; this.style.color='#fff'" onmouseout="this.style.background='rgba(42,133,71,0.1)'; this.style.color='var(--pc-primary)'">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            @endif
                            @if($member->instagram)
                            <a href="{{ $member->instagram }}" target="_blank" class="btn btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" style="width:36px; height:36px; background: rgba(42,133,71,0.1); color: var(--pc-primary); transition: all 0.3s;" onmouseover="this.style.background='var(--pc-primary)'; this.style.color='#fff'" onmouseout="this.style.background='rgba(42,133,71,0.1)'; this.style.color='var(--pc-primary)'">
                                <i class="bi bi-instagram"></i>
                            </a>
                            @endif
                            @if($member->youtube)
                            <a href="{{ $member->youtube }}" target="_blank" class="btn btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" style="width:36px; height:36px; background: rgba(42,133,71,0.1); color: var(--pc-primary); transition: all 0.3s;" onmouseover="this.style.background='var(--pc-primary)'; this.style.color='#fff'" onmouseout="this.style.background='rgba(42,133,71,0.1)'; this.style.color='var(--pc-primary)'">
                                <i class="bi bi-youtube"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
