@extends('main')

@section('title', 'Success Stories')

@section('content')

<!-- Page Header -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Success Stories</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Programs</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Success Stories</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Success Stories Section -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-chat-quote me-1"></i> SUCCESS STORIES</span>
            <h2 class="pc-section-title">Voices of Change</h2>
            <p class="pc-section-subtitle">Real stories from the communities we serve — testimonies of hope, resilience, and transformation.</p>
        </div>

        @if(isset($stories) && count($stories) > 0)
            <div class="row g-4">
                @foreach($stories as $story)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <a href="{{ route('success.stories.view', $story->id) }}" class="text-decoration-none">
                            <div class="pc-card h-100">
                                <div class="card-body d-flex flex-column">
                                    <!-- Rating Stars -->
                                    <div class="mb-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= ($story->rating ?? 0))
                                                <i class="bi bi-star-fill" style="color:var(--pc-accent); font-size:1rem;"></i>
                                            @else
                                                <i class="bi bi-star-fill" style="color:var(--pc-accent); opacity:.25; font-size:1rem;"></i>
                                            @endif
                                        @endfor
                                    </div>

                                    <!-- Quote -->
                                    <div class="position-relative flex-grow-1 mb-3">
                                        <i class="bi bi-quote" style="font-size:2.5rem; color:var(--pc-primary); opacity:.15; position:absolute; top:-10px; left:-5px;"></i>
                                        <p class="card-text ps-3 pt-2" style="font-style:italic; line-height:1.7;">
                                            "{{ Str::limit($story->description, 200) }}"
                                        </p>
                                    </div>

                                    <!-- Beneficiary Info -->
                                    <div class="d-flex align-items-center gap-3 pt-3 mt-auto" style="border-top:1px solid rgba(0,0,0,.06);">
                                        @if($story->image)
                                            <img src="{{ asset('images/stories/'.$story->image) }}"
                                                 alt="{{ $story->beneficiary_name }}"
                                                 class="rounded-circle"
                                                 style="width:50px; height:50px; object-fit:cover; border:2px solid var(--pc-primary-light);">
                                        @else
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                 style="width:50px; height:50px; background:var(--pc-primary-light);">
                                                <i class="bi bi-person-fill" style="font-size:1.2rem; color:var(--pc-primary);"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="fw-semibold" style="color:var(--pc-dark); font-size:.95rem;">{{ $story->beneficiary_name }}</div>
                                            @if($story->beneficiary_title)
                                                <div class="text-muted" style="font-size:.82rem;">{{ $story->beneficiary_title }}</div>
                                            @endif
                                        </div>
                                        <i class="bi bi-arrow-right ms-auto" style="color:var(--pc-primary); font-size:1.1rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5" data-aos="fade-up">
                <i class="bi bi-chat-left-text" style="font-size:3.5rem; color:var(--pc-gray);"></i>
                <p class="text-muted mt-3 fs-5">No success stories available at the moment.</p>
            </div>
        @endif
    </div>
</section>

@endsection
