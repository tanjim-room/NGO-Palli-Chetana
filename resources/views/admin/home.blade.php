@extends('layouts.admin')

@section('content')

<div class="row">
<div class="card">
    <div class="card-body">
        <div class="text-center p-5">
            <h2 style="color:#1b2a6b; font-weight:700;">Palli Chetana</h2>
            <h6 class="text-muted">Admin Dashboard</h6>
        </div>
        <hr>
        <div class="text-center">
            <h1 style="color:#2a8547; font-weight:700;">Admin Dashboard</h1>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
            <a href="{{ route('strategic_plans.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Strategic Plan
            </a>
            <a href="{{ route('strategic_plans.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-list-ul"></i> All Strategic Plans
            </a>
        </div>
    </div>
</div>
</div>

@endsection

