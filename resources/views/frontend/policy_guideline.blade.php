@extends('main')

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Policy & Guidelines</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item text-white-50">Stay Informed</li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Policy & Guidelines</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== Policy & Guideline Section ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-shield-check me-1"></i> Documents</span>
            <h2 class="pc-section-title mt-3">Policy & Guidelines</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Browse our uploaded policy documents below. Each item is managed from Admin and shown here as a bullet list.</p>
        </div>

        @if(isset($policy) && count($policy) > 0)
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <div class="pc-card border-0 shadow-sm p-4 p-lg-5">
                    <ul class="mb-0 ps-3" style="list-style: disc;">
                        @foreach ($policy as $index => $data)
                        <li class="mb-3">
                            @if(!empty($data->file))
                            <a href="{{ asset('images/policy_guideline/'.$data->file) }}" target="_blank" class="fw-semibold" style="color:var(--pc-primary);">
                                {{ $data->name }}
                            </a>
                            <span class="text-muted ms-2">(PDF)</span>
                            @else
                            <span class="fw-semibold" style="color:var(--pc-dark);">{{ $data->name }}</span>
                            <span class="text-muted ms-2"></span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width:100px;height:100px;background:rgba(42,133,71,0.1);">
                <i class="bi bi-shield-check fs-1" style="color:var(--pc-primary);"></i>
            </div>
            <h4 class="fw-bold text-dark">No Policies Available</h4>
            <p class="text-muted fs-5">Policy and guideline documents will appear here once published.<br>Please check back later.</p>
        </div>
        @endif
    </div>
</section>

@endsection
