@extends('main')

@section('content')
{{-- ===== PAGE HEADER ===== --}}
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Make a Donation</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Get Involved</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Donate</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== HERO DONATION CTA ===== --}}
<section class="py-5" style="background: linear-gradient(135deg, var(--pc-primary), var(--pc-secondary));">
    <div class="container text-center text-white" data-aos="fade-up">
        <i class="bi bi-heart-fill display-3 mb-3 d-block" style="color: var(--pc-accent);"></i>
        <h2 class="fw-bold mb-3">Your Generosity Changes Lives</h2>
        <p class="lead mb-4 mx-auto" style="max-width:700px;">
            Every contribution to <strong>Palli Chetana</strong> helps us empower rural communities through education,
            healthcare, and sustainable development. Together we can build a brighter future.
        </p>
        <a href="#donate-form" class="btn btn-pc-accent btn-lg px-5 rounded-pill shadow">
            <i class="bi bi-gift me-2"></i>Donate Now
        </a>
    </div>
</section>

{{-- ===== PAYMENT METHODS ===== --}}
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">Payment Options</span>
            <h2 class="pc-section-title mx-auto">How to Send Your Donation</h2>
            <p class="text-muted mt-3" style="max-width:600px; margin:auto;">
                Choose any of the following payment methods. Please complete the payment first, then fill in the confirmation form below.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($paymentMethods as $method)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="pc-card h-100 text-center p-4">
                        {{-- Icon --}}
                        <div class="mb-3">
                            @if($method->icon_image)
                                <img src="{{ asset('storage/'.$method->icon_image) }}" alt="{{ $method->account_name }}"
                                     class="rounded" style="height:64px; width:auto; object-fit:contain;">
                            @elseif($method->type === 'bank')
                                <i class="bi bi-bank display-4" style="color:var(--pc-primary);"></i>
                            @else
                                <i class="bi bi-cash-stack display-4" style="color:var(--pc-primary);"></i>
                            @endif
                        </div>

                        <h5 class="fw-bold">{{ $method->account_name }}</h5>

                        {{-- Account Number --}}
                        <p class="mb-1">
                            <span class="text-muted small">Account / Wallet No:</span><br>
                            <span class="fw-semibold fs-5" style="color:var(--pc-primary);">{{ $method->account_number }}</span>
                        </p>

                        {{-- Bank Details (if JSON) --}}
                        @if($method->bank_details)
                            @php
                                $bank = is_string($method->bank_details) ? json_decode($method->bank_details, true) : $method->bank_details;
                            @endphp
                            @if($bank)
                                <hr>
                                <ul class="list-unstyled text-start small mb-0">
                                    @if(!empty($bank['bank_name']))
                                        <li><i class="bi bi-building me-1 text-muted"></i> <strong>Bank:</strong> {{ $bank['bank_name'] }}</li>
                                    @endif
                                    @if(!empty($bank['branch_name']))
                                        <li><i class="bi bi-geo-alt me-1 text-muted"></i> <strong>Branch:</strong> {{ $bank['branch_name'] }}</li>
                                    @endif
                                    @if(!empty($bank['routing_number']))
                                        <li><i class="bi bi-hash me-1 text-muted"></i> <strong>Routing:</strong> {{ $bank['routing_number'] }}</li>
                                    @endif
                                </ul>
                            @endif
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-info-circle display-4 d-block mb-3"></i>
                    <p class="lead">Payment methods will be available soon.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== DONATION FORM ===== --}}
<section class="pc-section" id="donate-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7" data-aos="fade-up">
                <div class="text-center mb-5">
                    <span class="pc-badge">Step 2</span>
                    <h2 class="pc-section-title mx-auto">Confirm Your Donation</h2>
                </div>

                {{-- Success Message --}}
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Info Alert --}}
                <div class="alert alert-info border-0 shadow-sm mb-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    <strong>Important:</strong> Please make the payment using one of the methods above first,
                    then fill in this form with your transaction details for confirmation.
                </div>

                <div class="pc-card p-4 p-md-5">
                    <form action="{{ route('donation.submit') }}" method="POST">
                        @csrf

                        {{-- Donor Name --}}
                        <div class="mb-3">
                            <label for="donor_name" class="form-label fw-semibold">
                                <i class="bi bi-person me-1"></i> Your Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="donor_name" id="donor_name"
                                   class="form-control form-control-lg @error('donor_name') is-invalid @enderror"
                                   value="{{ old('donor_name') }}" placeholder="Enter your full name" required>
                            @error('donor_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Donor Phone --}}
                        <div class="mb-3">
                            <label for="donor_phone" class="form-label fw-semibold">
                                <i class="bi bi-phone me-1"></i> Phone Number <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="donor_phone" id="donor_phone"
                                   class="form-control form-control-lg @error('donor_phone') is-invalid @enderror"
                                   value="{{ old('donor_phone') }}" placeholder="Enter your phone number" required>
                            @error('donor_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Payment Method --}}
                        <div class="mb-3">
                            <label for="payment_method_id" class="form-label fw-semibold">
                                <i class="bi bi-credit-card me-1"></i> Payment Method <span class="text-danger">*</span>
                            </label>
                            <select name="payment_method_id" id="payment_method_id"
                                    class="form-select form-select-lg @error('payment_method_id') is-invalid @enderror" required>
                                <option value="">-- Select Payment Method --</option>
                                @foreach($paymentMethods as $method)
                                    <option value="{{ $method->id }}" {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
                                        {{ $method->account_name }} ({{ $method->account_number }})
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_method_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Transaction ID --}}
                        <div class="mb-3">
                            <label for="transaction_id" class="form-label fw-semibold">
                                <i class="bi bi-receipt me-1"></i> Transaction ID <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="transaction_id" id="transaction_id"
                                   class="form-control form-control-lg @error('transaction_id') is-invalid @enderror"
                                   value="{{ old('transaction_id') }}" placeholder="Enter your transaction / reference ID" required>
                            @error('transaction_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Amount --}}
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-semibold">
                                <i class="bi bi-cash me-1"></i> Amount (BDT) <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="amount" id="amount" min="1" step="any"
                                   class="form-control form-control-lg @error('amount') is-invalid @enderror"
                                   value="{{ old('amount') }}" placeholder="Enter donation amount" required>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-pc-primary btn-lg rounded-pill">
                                <i class="bi bi-send-fill me-2"></i>Submit Donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
