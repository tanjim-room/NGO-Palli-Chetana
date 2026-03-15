@extends('layouts.admin')

@section('content')

{{-- Welcome Header --}}
<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">Welcome back, {{ Auth::user()->name ?? 'Admin' }}!</h4>
        <p class="text-muted mb-0 small">Here's what's happening with Palli Chetana today.</p>
    </div>
    <div class="text-muted small">
        <i class="bi bi-calendar3 me-1"></i> {{ date('l, F j, Y') }}
    </div>
</div>

{{-- Stats Cards Row 1 --}}
<div class="row g-3 mb-4">
    @php
        $cards = [
            ['label' => 'Ongoing Projects', 'count' => $stats['ongoing_projects'], 'icon' => 'bi-rocket-takeoff', 'color' => '#2a8547', 'bg' => '#e8f5e9', 'route' => 'project.index'],
            ['label' => 'Archived Projects', 'count' => $stats['archived_projects'], 'icon' => 'bi-archive', 'color' => '#1b2a6b', 'bg' => '#e8eaf6', 'route' => 'project.archive.index'],
            ['label' => 'Programs', 'count' => $stats['programs'], 'icon' => 'bi-grid-3x3-gap', 'color' => '#e65100', 'bg' => '#fff3e0', 'route' => 'programs.index'],
            ['label' => 'Latest News', 'count' => $stats['news'], 'icon' => 'bi-newspaper', 'color' => '#00838f', 'bg' => '#e0f7fa', 'route' => 'news.index'],
        ];
    @endphp
    @foreach($cards as $card)
    <div class="col-6 col-lg-3">
        <a href="{{ route($card['route']) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 dash-stat-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">{{ $card['label'] }}</p>
                            <h3 class="fw-bold mb-0" style="color: {{ $card['color'] }};">{{ $card['count'] }}</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px; height:48px; background:{{ $card['bg'] }};">
                            <i class="bi {{ $card['icon'] }}" style="font-size:1.3rem; color:{{ $card['color'] }};"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

{{-- Stats Cards Row 2 --}}
<div class="row g-3 mb-4">
    @php
        $cards2 = [
            ['label' => 'Team Members', 'count' => $stats['team_members'], 'icon' => 'bi-people', 'color' => '#6a1b9a', 'bg' => '#f3e5f5', 'route' => 'team.index'],
            ['label' => 'Donations', 'count' => $stats['donations'], 'icon' => 'bi-heart', 'color' => '#c62828', 'bg' => '#ffebee', 'route' => 'admin.donations.index'],
            ['label' => 'Subscribers', 'count' => $stats['subscribers'], 'icon' => 'bi-envelope-paper', 'color' => '#00695c', 'bg' => '#e0f2f1', 'route' => 'subscribe.all'],
            ['label' => 'Messages', 'count' => $stats['messages'], 'icon' => 'bi-chat-dots', 'color' => '#ef6c00', 'bg' => '#fff8e1', 'route' => 'message.index'],
        ];
    @endphp
    @foreach($cards2 as $card)
    <div class="col-6 col-lg-3">
        <a href="{{ route($card['route']) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 dash-stat-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">{{ $card['label'] }}</p>
                            <h3 class="fw-bold mb-0" style="color: {{ $card['color'] }};">{{ $card['count'] }}</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px; height:48px; background:{{ $card['bg'] }};">
                            <i class="bi {{ $card['icon'] }}" style="font-size:1.3rem; color:{{ $card['color'] }};"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

{{-- Stats Cards Row 3 --}}
<div class="row g-3 mb-4">
    @php
        $cards3 = [
            ['label' => 'Gallery Photos', 'count' => $stats['gallery'], 'icon' => 'bi-images', 'color' => '#1565c0', 'bg' => '#e3f2fd', 'route' => 'gallery.index'],
            ['label' => 'Volunteers', 'count' => $stats['volunteers'], 'icon' => 'bi-hand-thumbs-up', 'color' => '#2e7d32', 'bg' => '#e8f5e9', 'route' => 'volunteers.index'],
            ['label' => 'Partners & Donors', 'count' => $stats['partners'], 'icon' => 'bi-handshake', 'color' => '#4527a0', 'bg' => '#ede7f6', 'route' => 'partner.index'],
            ['label' => 'Success Stories', 'count' => $stats['stories'], 'icon' => 'bi-trophy', 'color' => '#f9a825', 'bg' => '#fffde7', 'route' => 'stories.index'],
        ];
    @endphp
    @foreach($cards3 as $card)
    <div class="col-6 col-lg-3">
        <a href="{{ route($card['route']) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 dash-stat-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">{{ $card['label'] }}</p>
                            <h3 class="fw-bold mb-0" style="color: {{ $card['color'] }};">{{ $card['count'] }}</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px; height:48px; background:{{ $card['bg'] }};">
                            <i class="bi {{ $card['icon'] }}" style="font-size:1.3rem; color:{{ $card['color'] }};"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

{{-- Donation Summary Banner --}}
<div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #1b2a6b 0%, #2a8547 100%);">
    <div class="card-body p-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="text-white fw-bold mb-1"><i class="bi bi-cash-stack me-2"></i>Total Donations Received</h5>
                <p class="text-white-50 mb-0 small">All verified & pending donations combined</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <h2 class="text-white fw-bold mb-0">৳ {{ number_format($totalDonations, 2) }}</h2>
            </div>
        </div>
    </div>
</div>

{{-- Tables Row --}}
<div class="row g-4 mb-4">
    {{-- Recent Donations --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-heart-fill text-danger me-2"></i>Recent Donations</h6>
                <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentDonations->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3 small fw-semibold">Donor</th>
                                <th class="small fw-semibold">Amount</th>
                                <th class="small fw-semibold">Status</th>
                                <th class="small fw-semibold pe-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentDonations as $d)
                            <tr>
                                <td class="ps-3">
                                    <div class="fw-medium small">{{ $d->donor_name }}</div>
                                    <div class="text-muted" style="font-size:.75rem;">{{ $d->donor_phone }}</div>
                                </td>
                                <td class="fw-bold small" style="color: #2a8547;">৳ {{ number_format($d->amount, 2) }}</td>
                                <td>
                                    @if($d->status === 'verified')
                                        <span class="badge bg-success rounded-pill">Verified</span>
                                    @elseif($d->status === 'rejected')
                                        <span class="badge bg-danger rounded-pill">Rejected</span>
                                    @else
                                        <span class="badge bg-warning text-dark rounded-pill">Pending</span>
                                    @endif
                                </td>
                                <td class="text-muted small pe-3">{{ $d->created_at ? date('M d, Y', strtotime($d->created_at)) : 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-inbox" style="font-size:2rem;"></i>
                    <p class="small mt-2 mb-0">No donations yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Recent Messages --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-chat-dots-fill me-2" style="color:#ef6c00;"></i>Recent Messages</h6>
                <a href="{{ route('message.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentMessages->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($recentMessages as $m)
                    <div class="list-group-item border-0 px-3 py-2">
                        <div class="d-flex align-items-start gap-2">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:36px; height:36px; background:#fff3e0; color:#ef6c00; font-weight:600; font-size:.8rem;">
                                {{ strtoupper(substr($m->name, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1 min-width-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-medium small">{{ Str::limit($m->name, 20) }}</span>
                                    <span class="text-muted" style="font-size:.7rem;">{{ Str::limit($m->email, 20) }}</span>
                                </div>
                                <p class="text-muted mb-0" style="font-size:.78rem;">{{ Str::limit($m->subject ?? $m->message, 50) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-inbox" style="font-size:2rem;"></i>
                    <p class="small mt-2 mb-0">No messages yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Recent Subscribers & Quick Actions --}}
<div class="row g-4 mb-4">
    {{-- Recent Subscribers --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-envelope-paper-fill me-2" style="color:#00695c;"></i>Recent Subscribers</h6>
                <a href="{{ route('subscribe.all') }}" class="btn btn-sm btn-outline-secondary rounded-pill">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentSubscribers->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($recentSubscribers as $s)
                    <div class="list-group-item border-0 px-3 py-2 d-flex align-items-center gap-2">
                        <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:36px; height:36px; background:#e0f2f1; color:#00695c; font-weight:600; font-size:.8rem;">
                            {{ strtoupper(substr($s->name, 0, 1)) }}
                        </div>
                        <div class="flex-grow-1">
                            <span class="fw-medium small d-block">{{ Str::limit($s->name, 25) }}</span>
                            <span class="text-muted" style="font-size:.75rem;">{{ $s->email }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-inbox" style="font-size:2rem;"></i>
                    <p class="small mt-2 mb-0">No subscribers yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-lightning-fill me-2" style="color:#f9a825;"></i>Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="row g-3 p-4">
                    @php
                        $actions = [
                            ['label' => 'Add Project', 'icon' => 'bi-plus-circle', 'route' => 'project.add', 'color' => '#2a8547'],
                            ['label' => 'Add News', 'icon' => 'bi-plus-circle', 'route' => 'news.add', 'color' => '#00838f'],
                            ['label' => 'Add Program', 'icon' => 'bi-plus-circle', 'route' => 'programs.add', 'color' => '#e65100'],
                            ['label' => 'Add Gallery', 'icon' => 'bi-plus-circle', 'route' => 'gallery.add', 'color' => '#1565c0'],
                            ['label' => 'Add Story', 'icon' => 'bi-plus-circle', 'route' => 'stories.add', 'color' => '#f9a825'],
                            ['label' => 'Add Team Member', 'icon' => 'bi-plus-circle', 'route' => 'team.add', 'color' => '#6a1b9a'],
                            ['label' => 'Add Partner', 'icon' => 'bi-plus-circle', 'route' => 'partner.create', 'color' => '#4527a0'],
                            ['label' => 'Add Strategic Plan', 'icon' => 'bi-plus-circle', 'route' => 'strategic_plans.create', 'color' => '#1b2a6b'],
                        ];
                    @endphp
                    @foreach($actions as $action)
                    <div class="col-6">
                        <a href="{{ route($action['route']) }}" class="btn btn-light btn-sm w-100 text-start d-flex align-items-center gap-2 py-2 quick-action-btn" style="border: 1px solid #e2e8f0;">
                            <i class="bi {{ $action['icon'] }}" style="color: {{ $action['color'] }};"></i>
                            <span class="small">{{ $action['label'] }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Additional Stats Row --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <a href="{{ route('publications.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm dash-stat-card">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-3" style="width:42px; height:42px; background:#fce4ec;">
                        <i class="bi bi-book" style="font-size:1.1rem; color:#c62828;"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Publications</p>
                        <h5 class="fw-bold mb-0" style="color:#c62828;">{{ $stats['publications'] }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a href="{{ route('executive.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm dash-stat-card">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-3" style="width:42px; height:42px; background:#e8eaf6;">
                        <i class="bi bi-person-badge" style="font-size:1.1rem; color:#1b2a6b;"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Committee</p>
                        <h5 class="fw-bold mb-0" style="color:#1b2a6b;">{{ $stats['committee'] }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a href="{{ route('faq.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm dash-stat-card">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-3" style="width:42px; height:42px; background:#e0f7fa;">
                        <i class="bi bi-question-circle" style="font-size:1.1rem; color:#00838f;"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">FAQs</p>
                        <h5 class="fw-bold mb-0" style="color:#00838f;">{{ DB::table('faq')->count() }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a href="{{ route('impact.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm dash-stat-card">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-3" style="width:42px; height:42px; background:#e8f5e9;">
                        <i class="bi bi-bar-chart-line" style="font-size:1.1rem; color:#2a8547;"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Impact Stats</p>
                        <h5 class="fw-bold mb-0" style="color:#2a8547;">{{ DB::table('impact')->count() }}</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<style>
    .dash-stat-card {
        transition: transform .2s ease, box-shadow .2s ease;
        border-radius: 12px !important;
    }
    .dash-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,.1) !important;
    }
    .quick-action-btn {
        transition: all .2s ease;
        border-radius: 8px !important;
    }
    .quick-action-btn:hover {
        background: #f0faf3 !important;
        border-color: #2a8547 !important;
    }
</style>

@endsection

