@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">All Fundraising Campaigns</h6>
            <a href="{{ route('fundraising_campaigns.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Campaign
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Goal</th>
                                <th>Raised</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($campaigns as $key => $campaign)
                                <tr>
                                    <td class="align-middle">{{ ++$key }}</td>
                                    <td class="align-middle">
                                        @if (!empty($campaign->image))
                                            <img src="{{ asset('images/fundraising_campaigns/'.$campaign->image) }}" alt="{{ $campaign->title }}" width="60" height="45" class="rounded border">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td class="align-middle fw-bold">{{ $campaign->title }}</td>
                                    <td class="align-middle">৳{{ number_format($campaign->goal_amount, 2) }}</td>
                                    <td class="align-middle">৳{{ number_format($campaign->raised_amount, 2) }}</td>
                                    <td class="align-middle" style="min-width:120px;">
                                        @php
                                            $progress = $campaign->goal_amount > 0 ? min(100, round(($campaign->raised_amount / $campaign->goal_amount) * 100, 1)) : 0;
                                        @endphp
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted">{{ $progress }}%</small>
                                    </td>
                                    <td class="align-middle">
                                        @if($campaign->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif($campaign->status == 'completed')
                                            <span class="badge bg-primary">Completed</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Paused</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($campaign->start_date && $campaign->end_date)
                                            <small>{{ date('M d, Y', strtotime($campaign->start_date)) }} - {{ date('M d, Y', strtotime($campaign->end_date)) }}</small>
                                        @elseif($campaign->start_date)
                                            <small>From {{ date('M d, Y', strtotime($campaign->start_date)) }}</small>
                                        @else
                                            <small class="text-muted">Not set</small>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a href="{{ route('fundraising_campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-primary text-white" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('fundraising_campaigns.delete', $campaign->id) }}" class="btn btn-sm btn-danger text-white" title="Delete" data-confirm="Are you sure you want to delete this campaign?">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-megaphone fs-4"></i>
                                            <p class="mt-2">No fundraising campaigns found. <a href="{{ route('fundraising_campaigns.create') }}">Create the first one</a></p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
