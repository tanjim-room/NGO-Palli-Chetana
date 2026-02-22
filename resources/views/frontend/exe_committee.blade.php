@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Executive Committee</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Executive Committee</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Organogram Section -->
<section class="pc-section pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-diagram-3 me-1"></i> Organization Structure</span>
                <h2 class="pc-section-title mt-3">Palli Chetana Organogram</h2>
                <p class="text-muted mb-4">View our complete organizational structure and hierarchy.</p>
                <a href="{{ asset('frontend/file/AFAD_Organogram.pdf') }}" target="_blank" class="btn btn-pc-primary rounded-pill px-5 py-2">
                    <i class="bi bi-file-earmark-pdf me-2"></i> Download Organogram (PDF)
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Executive Committee Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-people me-1"></i> Leadership</span>
                <h2 class="pc-section-title mt-3">Our Executive Committee</h2>
                <p class="text-muted">The leaders guiding Palli Chetana towards its mission and vision.</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($committee as $member)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden pc-card">
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img src="{{ asset('images/executive_committee/' . $member->photo) }}"
                             class="w-100 h-100"
                             style="object-fit: cover; transition: transform 0.4s ease;"
                             alt="{{ $member->name }}"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                        <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                            <span class="badge rounded-pill" style="background: var(--pc-primary);">{{ $member->designation }}</span>
                        </div>
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
