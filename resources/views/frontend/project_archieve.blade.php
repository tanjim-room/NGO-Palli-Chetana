@extends('main')

@section('title', 'Project Archive')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Project Archive</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">What We Do</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Project Archive</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Project Archive Section -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-archive me-1"></i> OUR LEGACY</span>
            <h2 class="pc-section-title">Project Archive</h2>
            <p class="pc-section-subtitle">A comprehensive record of all projects completed by Palli Chetana over the years.</p>
        </div>

        <div class="pc-card" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr style="background:var(--pc-primary); color:#fff;">
                                <th class="ps-4 py-3" style="width:70px;">#</th>
                                <th class="py-3" style="min-width:280px;">Name of the Project</th>
                                <th class="py-3" style="min-width:200px;">Partners / Donors</th>
                                <th class="py-3 pe-4" style="min-width:200px;">Project Period</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($project as $key => $proj)
                                <tr class="{{ $loop->even ? '' : '' }}" style="{{ $loop->even ? 'background:var(--pc-gray-light);' : '' }}">
                                    <td class="ps-4 fw-semibold" style="color:var(--pc-primary);">{{ $loop->iteration }}</td>
                                    <td class="fw-medium">{{ $proj->name }}</td>
                                    <td class="text-muted">{{ $proj->partners }}</td>
                                    <td class="pe-4">
                                        <span class="d-inline-flex align-items-center gap-1">
                                            <i class="bi bi-calendar3 text-muted" style="font-size:.8rem;"></i>
                                            {{ $proj->from_date }} â€” {{ $proj->to_date }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox" style="font-size:2.5rem;"></i>
                                        <p class="mt-2 mb-0">No archived projects found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if(isset($project) && count($project) > 0)
            <div class="text-center mt-4" data-aos="fade-up">
                <p class="text-muted small">
                    <i class="bi bi-info-circle me-1"></i> Showing {{ count($project) }} archived project{{ count($project) > 1 ? 's' : '' }}
                </p>
            </div>
        @endif
    </div>
</section>

@push('css')
<style>
    .table-hover tbody tr:hover {
        background-color: var(--pc-primary-light) !important;
        transition: background-color .2s ease;
    }
    .table thead th {
        font-weight: 600;
        font-size: .9rem;
        letter-spacing: .3px;
        border: none;
    }
    .table tbody td {
        font-size: .92rem;
        padding: .85rem .75rem;
        border-color: rgba(0,0,0,.04);
    }
</style>
@endpush

@endsection
