@extends('main')

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Contact Us</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== Contact Information ====== -->
<section class="pc-section bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-geo-alt me-1"></i> Get In Touch</span>
            <h2 class="pc-section-title mt-3">Contact Information</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Reach out to us through any of our offices or contact persons. We'd love to hear from you.</p>
        </div>

        <!-- Head Office & Branches -->
        <div class="row g-4 mb-5">
            @if($head_office)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="pc-card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;background:rgba(42,133,71,0.1);">
                                <i class="bi bi-building fs-5" style="color:var(--pc-primary);"></i>
                            </div>
                            <h5 class="fw-bold mb-0">{{ $head_office->title ?: 'Head Office' }}</h5>
                        </div>
                        <ul class="list-unstyled mb-0 text-secondary">
                            @if($head_office->address)
                            <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color:var(--pc-primary);"></i>{{ $head_office->address }}</li>
                            @endif
                            @if($head_office->mobile || $head_office->mobile2)
                            <li class="mb-2"><i class="bi bi-telephone me-2" style="color:var(--pc-primary);"></i>{{ $head_office->mobile }}@if($head_office->mobile && $head_office->mobile2), @endif{{ $head_office->mobile2 }}</li>
                            @endif
                            @if($head_office->email || $head_office->email2)
                            <li class="mb-2"><i class="bi bi-envelope me-2" style="color:var(--pc-primary);"></i>{{ $head_office->email }}@if($head_office->email && $head_office->email2), @endif{{ $head_office->email2 }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @forelse ($branches as $branch)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="pc-card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;background:rgba(27,42,107,0.1);">
                                <i class="bi bi-geo-alt-fill fs-5" style="color:var(--pc-secondary);"></i>
                            </div>
                            <h5 class="fw-bold mb-0">{{ $branch->title ?: 'Branch Office' }}</h5>
                        </div>
                        <ul class="list-unstyled mb-0 text-secondary">
                            @if($branch->address)
                            <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color:var(--pc-secondary);"></i>{{ $branch->address }}</li>
                            @endif
                            @if($branch->mobile || $branch->mobile2)
                            <li class="mb-2"><i class="bi bi-telephone me-2" style="color:var(--pc-secondary);"></i>{{ $branch->mobile }}@if($branch->mobile && $branch->mobile2), @endif{{ $branch->mobile2 }}</li>
                            @endif
                            @if($branch->email || $branch->email2)
                            <li class="mb-2"><i class="bi bi-envelope me-2" style="color:var(--pc-secondary);"></i>{{ $branch->email }}@if($branch->email && $branch->email2), @endif{{ $branch->email2 }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>

        <!-- Contact Persons -->
        @if($persons->count())
        <div class="text-center mb-4" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-people me-1"></i> Contact Persons</span>
            <h3 class="pc-section-title mt-3 fs-4">Key Contact Persons</h3>
        </div>
        <div class="row g-4 mb-4">
            @forelse ($persons as $person)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="pc-card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;background:rgba(245,158,11,0.1);">
                            <i class="bi bi-person-circle fs-3" style="color:var(--pc-accent);"></i>
                        </div>
                        <h6 class="fw-bold mb-1">{{ $person->title }}</h6>
                        @if($person->name)
                        <p class="text-muted small mb-3">{{ $person->name }}</p>
                        @endif
                        <ul class="list-unstyled text-start small text-secondary mb-0">
                            @if($person->mobile || $person->mobile2)
                            <li class="mb-1"><i class="bi bi-telephone me-2" style="color:var(--pc-primary);"></i>{{ $person->mobile }}@if($person->mobile && $person->mobile2), @endif{{ $person->mobile2 }}</li>
                            @endif
                            @if($person->email || $person->email2)
                            <li class="mb-1"><i class="bi bi-envelope me-2" style="color:var(--pc-primary);"></i>{{ $person->email }}@if($person->email && $person->email2), @endif{{ $person->email2 }}</li>
                            @endif
                            @if($person->skype)
                            <li class="mb-1"><i class="bi bi-skype me-2" style="color:#00aff0;"></i>{{ $person->skype }}</li>
                            @endif
                            @if($person->whatsapp)
                            <li class="mb-1"><i class="bi bi-whatsapp me-2" style="color:#25d366;"></i>{{ $person->whatsapp }}</li>
                            @endif
                            @if($person->twitter)
                            <li class="mb-1"><i class="bi bi-twitter-x me-2" style="color:#1da1f2;"></i>{{ $person->twitter }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        @endif
    </div>
</section>

<!-- ====== Message Form & Map ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-chat-dots me-1"></i> Send a Message</span>
            <h2 class="pc-section-title mt-3">We'd Love to Hear From You</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Send us your message through the form below. We'll respond within a short period of time.</p>
        </div>

        <div class="row g-5 align-items-start">
            <!-- Message Form -->
            <div class="col-lg-7" data-aos="fade-up">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="pc-card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <form action="{{ route('message.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold">Your Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="bi bi-person" style="color:var(--pc-primary);"></i></span>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Your Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="bi bi-envelope" style="color:var(--pc-primary);"></i></span>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="bi bi-chat-left-text" style="color:var(--pc-primary);"></i></span>
                                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Message subject" value="{{ old('subject') }}">
                                    </div>
                                    @error('subject')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="5" placeholder="Write your message here...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-pc-primary px-5 py-2">
                                        <i class="bi bi-send me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                <div class="pc-card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, rgba(42,133,71,0.03), rgba(27,42,107,0.03));">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-envelope-paper fs-1" style="color:var(--pc-primary);"></i>
                            <h4 class="fw-bold mt-3">Message Us</h4>
                            <p class="text-secondary">Please send us your message through email or the contact form. We will respond within a short period of time. Thank you for being with Palli Chetana.</p>
                        </div>
                        <hr>
                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-clock fs-5 me-3" style="color:var(--pc-accent);"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Response Time</h6>
                                <p class="text-muted small mb-0">We typically respond within 24-48 hours</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bi bi-globe fs-5 me-3" style="color:var(--pc-secondary);"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Available</h6>
                                <p class="text-muted small mb-0">Saturday â€“ Thursday, 9:00 AM â€“ 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== Donation CTA ====== -->
<section class="position-relative py-5" style="background: url('{{ asset('img/donation.jpg') }}') center/cover no-repeat fixed;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background:rgba(0,0,0,0.7);"></div>
    <div class="container position-relative" style="z-index:2;">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center py-4" data-aos="fade-up">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background:var(--pc-accent);color:#fff;"><i class="bi bi-heart-fill me-1"></i> We Need Your Cooperation</span>
                <h2 class="text-white fw-bold mb-4">Be a Part of Our Mission to Make a Difference</h2>
                <p class="text-white-50 mb-4">Join Palli Chetana in raising funds for impactful humanitarian causes. Every contribution counts.</p>
                <a href="{{ route('donate') }}" class="btn btn-pc-accent btn-lg px-5 py-3 shadow">
                    <i class="bi bi-coin me-2"></i>Donate Now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ====== Google Maps ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-pin-map me-1"></i> Our Location</span>
            <h2 class="pc-section-title mt-3">Office Location</h2>
        </div>
        <div class="rounded-4 overflow-hidden shadow-sm" data-aos="fade-up" data-aos-delay="100">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1719.1936844054173!2d89.62614056461113!3d25.80873502360909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e2c8d493785f47%3A0x89cb625d52f7cfd3!2sKhalilganj%20Bazar!5e0!3m2!1sen!2sbd!4v1675184176828!5m2!1sen!2sbd"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

@endsection
