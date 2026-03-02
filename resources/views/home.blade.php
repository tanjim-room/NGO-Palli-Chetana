@extends('main')

@section('title')
Palli Chetana - Empowering Communities
@endsection

@section('content')

{{-- ===== HERO SLIDER ===== --}}
<section class="pc-hero position-relative overflow-hidden">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($slider as $skey => $slide)
            <div class="carousel-item @if($skey == 0) active @endif">
                <div class="pc-hero-slide" style="background-image: url('{{ asset('images/slider/'.$slide->image) }}');">
                    <div class="pc-hero-overlay"></div>
                    <div class="container position-relative" style="z-index:2;">
                        <div class="row min-vh-75 align-items-center">
                            <div class="col-lg-7" data-aos="fade-right">
                                <span class="pc-badge mb-3"><i class="bi bi-heart-fill me-1"></i> Palli Chetana</span>
                                <h1 class="display-4 fw-bold text-white mb-3 lh-sm">{{ $slide->title }}</h1>
                                <p class="text-white opacity-75 fs-6 mb-4" style="max-width:520px;">{{ Str::limit($slide->description, 180) }}</p>
                                <div class="d-flex gap-3 flex-wrap">
                                    <a href="{{ route('donate') }}" class="btn btn-pc-accent btn-lg">
                                        <i class="bi bi-heart-fill me-2"></i>Donate Now
                                    </a>
                                    <a href="{{ route('programs.all') }}" class="btn btn-pc-white btn-lg">
                                        Our Programs <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if(count($slider ?? []) > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" style="width:60px;">
            <span class="d-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-25" style="width:48px;height:48px;">
                <i class="bi bi-chevron-left text-white fs-5"></i>
            </span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" style="width:60px;">
            <span class="d-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-25" style="width:48px;height:48px;">
                <i class="bi bi-chevron-right text-white fs-5"></i>
            </span>
        </button>
        @endif
    </div>
</section>

{{-- ===== QUICK STATS BAR ===== --}}
@php
    $statColors = [
        ['bg' => 'var(--pc-primary-light)', 'color' => 'var(--pc-primary)'],
        ['bg' => '#e8eaf6', 'color' => 'var(--pc-secondary)'],
        ['bg' => '#ffebee', 'color' => 'var(--pc-accent)'],
        ['bg' => 'var(--pc-primary-light)', 'color' => 'var(--pc-primary)'],
    ];
@endphp
<section class="position-relative" style="margin-top:-50px; z-index:10;">
    <div class="container">
        <div class="row g-3 justify-content-center">
            @foreach($impacts as $index => $impact)
            @php $c = $statColors[$index % count($statColors)]; @endphp
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="text-center p-4 rounded-4 bg-white" style="box-shadow: var(--pc-shadow-lg);">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width:50px;height:50px;background:{{ $c['bg'] }};">
                        @if($impact->icon && file_exists(public_path('images/impact/' . $impact->icon)))
                            <img src="{{ asset('images/impact/' . $impact->icon) }}" alt="{{ $impact->title }}" style="width:28px;height:28px;object-fit:contain;">
                        @else
                            <i class="bi bi-bar-chart-fill fs-4" style="color:{{ $c['color'] }};"></i>
                        @endif
                    </div>
                    <h3 class="fw-bold mb-0" style="color:{{ $c['color'] }};">{{ $impact->metric_value }}</h3>
                    <small class="text-muted">{{ $impact->title }}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== ABOUT / WHO WE ARE ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="About Palli Chetana" class="rounded-4" style="width:100%; max-width:500px;">
                    <div class="position-absolute bottom-2 start-0 translate-middle-y ms-n3 d-none d-md-block" style="z-index:2;">
                        <div class="bg-white p-3 rounded-3 shadow-lg d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width:50px;height:50px;background:var(--pc-primary);flex-shrink:0;">
                                <i class="bi bi-heart-fill text-white"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Since 1996</h6>
                                <small class="text-muted">Serving Communities</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="pc-badge">WHO WE ARE</span>
                <h2 class="pc-section-title">Empowering Communities <br>Across <span style="color:var(--pc-primary);">Bangladesh</span></h2>
                <p class="text-muted mb-4" style="line-height:1.8;">
                    Palli Chetana is a community-driven organization working in northern Bangladesh since 1996. Registered with the NGO Affairs Bureau of the Prime Minister's Office, we focus on empowering marginalized communities, especially women, through education, skill-building, healthcare, and sustainable livelihoods. We believe every person deserves the opportunity to live with dignity and hope.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill" style="color:var(--pc-primary);"></i>
                            <span class="fw-medium">Women Empowerment</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill" style="color:var(--pc-primary);"></i>
                            <span class="fw-medium">Education & Health</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill" style="color:var(--pc-primary);"></i>
                            <span class="fw-medium">Livelihood Support</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill" style="color:var(--pc-primary);"></i>
                            <span class="fw-medium">Community Development</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('about.us') }}" class="btn btn-pc-primary">Learn More <i class="bi bi-arrow-right ms-1"></i></a>
                    <a href="{{ route('contact') }}" class="btn btn-pc-outline">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== MISSION & VISION ===== --}}
@if($mission_vision)
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">OUR PURPOSE</span>
            <h2 class="pc-section-title">Mission & Vision</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="h-100 p-4 p-lg-5 rounded-4 bg-white" style="box-shadow: var(--pc-shadow); border-left: 4px solid var(--pc-primary);">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle" style="width:56px;height:56px;background:var(--pc-primary-light);flex-shrink:0;">
                            <i class="bi bi-bullseye fs-4" style="color:var(--pc-primary);"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Our Mission</h3>
                    </div>
                    <p class="text-muted" style="line-height:1.8;">
                        {{ $mission_vision->mission }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="h-100 p-4 p-lg-5 rounded-4 bg-white" style="box-shadow: var(--pc-shadow); border-left: 4px solid var(--pc-secondary);">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle" style="width:56px;height:56px;background:#e8eaf6;flex-shrink:0;">
                            <i class="bi bi-eye fs-4" style="color:var(--pc-secondary);"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Our Vision</h3>
                    </div>
                    <p class="text-muted" style="line-height:1.8;">
                        {{ $mission_vision->vision }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===== FEATURED PROGRAMS ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">WHAT WE DO</span>
            <h2 class="pc-section-title">Featured Programs</h2>
            <p class="pc-section-subtitle">Transforming lives through impactful programs in education, healthcare, empowerment and sustainable development.</p>
        </div>

        <div class="row g-4">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs as $pkey => $program)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $pkey * 100 }}">
                    <div class="pc-card">
                        <div class="position-relative overflow-hidden">
                            @if($program->image)
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="card-img">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=600" alt="{{ $program->title }}" class="card-img">
                            @endif
                            @if($program->status)
                            <span class="position-absolute top-0 end-0 m-3 badge rounded-pill {{ $program->status == 'active' ? 'bg-success' : ($program->status == 'completed' ? 'bg-secondary' : 'bg-info') }}">
                                {{ ucfirst($program->status) }}
                            </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $program->title }}</h5>
                            <p class="card-text">{{ Str::limit($program->description, 120) }}</p>
                            <a href="{{ route('programs.view', $program->id) }}" class="card-link">
                                Learn More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('programs.all') }}" class="btn btn-pc-primary">
                View All Programs <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

{{-- ===== CTA - MAKE A DIFFERENCE ===== --}}
<section class="position-relative py-5" style="background: linear-gradient(135deg, var(--pc-dark) 0%, #162052 100%); overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
        <div class="position-absolute" style="width:300px;height:300px;background:var(--pc-primary);border-radius:50%;top:-100px;right:-50px;"></div>
        <div class="position-absolute" style="width:200px;height:200px;background:var(--pc-accent);border-radius:50%;bottom:-80px;left:-40px;"></div>
    </div>
    <div class="container position-relative py-4" style="z-index:2;">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white mb-4 mb-lg-0" data-aos="fade-right">
                <h2 class="fw-bold mb-2" style="color:#fff; font-family:'Poppins',sans-serif; font-size:2rem;">Together, We Can Make a Difference</h2>
                <p class="opacity-75 mb-0 fs-6">Your support helps us reach more communities, empower more women, and create lasting change across Bangladesh.</p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{{ route('donate') }}" class="btn btn-pc-accent btn-lg me-2 mb-2">
                    <i class="bi bi-heart-fill me-1"></i> Donate Now
                </a>
                <a href="{{ route('volunterr.opportunities') }}" class="btn btn-pc-white btn-lg mb-2">
                    <i class="bi bi-person-plus me-1"></i> Volunteer
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== ONGOING PROJECTS ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">ACTIVE INITIATIVES</span>
            <h2 class="pc-section-title">Ongoing Projects</h2>
            <p class="pc-section-subtitle">Active programs addressing community needs and fostering sustainable development.</p>
        </div>

        <div class="row g-4">
            @foreach ($project as $pkey => $proj)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $pkey * 100 }}">
                <div class="pc-card">
                    <img src="{{ asset('images/project/'.$proj->image) }}" alt="{{ $proj->title }}" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($proj->title, 40) }}</h5>
                        <p class="card-text">{{ Str::limit($proj->description, 100) }}</p>
                        <a href="{{ route('ongoing.project.view', $proj->id) }}" class="card-link">
                            Read More <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('ongoing.project') }}" class="btn btn-pc-outline">
                View All Projects <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

{{-- ===== LATEST NEWS ===== --}}
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">STAY UPDATED</span>
            <h2 class="pc-section-title">Latest News & Events</h2>
            <p class="pc-section-subtitle">Stay connected with our activities and learn about our latest initiatives and community impact.</p>
        </div>

        <div class="row g-4">
            @foreach ($news as $nkey => $data)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $nkey * 100 }}">
                <div class="pc-card">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('images/news/'.$data->image) }}" alt="{{ $data->title }}" class="card-img">
                        <div class="position-absolute bottom-0 start-0 m-3">
                            <span class="badge bg-white text-dark rounded-pill px-3 py-2" style="font-size:.75rem;">
                                <i class="bi bi-calendar3 me-1"></i> {{ $data->created_at ? date('M d, Y', strtotime($data->created_at)) : 'Recent' }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($data->title, 50) }}</h5>
                        <p class="card-text">{{ Str::limit($data->description, 100) }}</p>
                        <a href="{{ route('latest.news.view', $data->id) }}" class="card-link">
                            Read More <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('latest.news.all') }}" class="btn btn-pc-primary">
                All News & Events <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

{{-- ===== SUCCESS STORIES ===== --}}
@if(isset($stories) && count($stories) > 0)
<section class="pc-section" style="background: linear-gradient(135deg, var(--pc-dark) 0%, #162052 100%);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">VOICES OF CHANGE</span>
            <h2 class="pc-section-title" style="color:#fff;">Success Stories</h2>
            <p class="pc-section-subtitle" style="color:rgba(255,255,255,.6);">Real stories of transformation from the communities we serve.</p>
        </div>

        <div id="storiesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">
                @foreach($stories as $sindex => $story)
                <div class="carousel-item {{ $sindex == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center px-3 py-4">
                                <div class="mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= $story->rating ? '-fill' : '' }} fs-5" style="color: {{ $i <= $story->rating ? 'var(--pc-accent)' : 'rgba(255,255,255,.3)' }};"></i>
                                    @endfor
                                </div>
                                <p class="text-white fs-5 fst-italic mb-4" style="line-height:1.8; opacity:.85;">"{{ Str::limit($story->description, 250) }}"</p>
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    @if($story->image)
                                    <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" class="rounded-circle border border-2 border-white" style="width:60px; height:60px; object-fit:cover;">
                                    @endif
                                    <div class="text-start">
                                        <h6 class="text-white fw-bold mb-0">{{ $story->beneficiary_name }}</h6>
                                        @if($story->beneficiary_title)
                                        <small style="color: var(--pc-primary-light);">{{ $story->beneficiary_title }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(count($stories) > 1)
            <div class="text-center mt-4">
                <button class="btn btn-outline-light rounded-circle me-2" type="button" data-bs-target="#storiesCarousel" data-bs-slide="prev" style="width:44px;height:44px;">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-outline-light rounded-circle" type="button" data-bs-target="#storiesCarousel" data-bs-slide="next" style="width:44px;height:44px;">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
            @endif
        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('success.stories') }}" class="btn btn-pc-white">
                All Stories <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ===== PHOTO GALLERY ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">GALLERY</span>
            <h2 class="pc-section-title">Photo Gallery</h2>
            <p class="pc-section-subtitle">Moments captured from our programs, events, and community engagement across Bangladesh.</p>
        </div>

        <div class="row g-3">
            @foreach ($gallery as $gkey => $photo)
            <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="{{ $gkey * 50 }}">
                <div class="position-relative overflow-hidden rounded-3" style="cursor:pointer;">
                    <img src="{{ asset('images/gallery/'.$photo->image) }}" alt="Gallery" class="w-100" style="height:220px; object-fit:cover; transition: transform .5s ease;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background:rgba(42,133,71,.0); transition: all .3s; opacity:0;" onmouseover="this.style.opacity='1';this.style.background='rgba(27,42,107,.4)';this.previousElementSibling.style.transform='scale(1.1)';" onmouseout="this.style.opacity='0';this.style.background='rgba(42,133,71,.0)';this.previousElementSibling.style.transform='scale(1)';">
                        <i class="bi bi-zoom-in text-white fs-2"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('photo.all') }}" class="btn btn-pc-outline">
                View Full Gallery <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

@endsection

@push('css')
<style>
    .pc-hero-slide {
        min-height: 85vh;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        position: relative;
    }
    .min-vh-75 { min-height: 75vh; }
    .pc-hero-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(15,23,42,.75) 0%, rgba(27,42,107,.4) 100%);
        z-index: 1;
    }
    .ms-n3 { margin-left: -1.5rem !important; }
    @media (max-width: 768px) {
        .pc-hero-slide { min-height: 60vh; }
        .min-vh-75 { min-height: 60vh; }
        .pc-hero-slide h1 { font-size: 1.75rem !important; }
    }
</style>
@endpush
