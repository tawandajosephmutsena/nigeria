{{-- Contact form (persists to DB) --}}
<section class="contact section" id="{{ $props['section_id'] ?? 'contact' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->

        @if (session('contact_success'))
            <div class="alert alert-success text-center" style="background: var(--brand-primary); color: #fff; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                {{ session('contact_success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger text-center" style="background: #d9534f; color: #fff; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="skype" placeholder="Skype ID" value="{{ old('skype') }}">
                </div>
                <div class="col-sm-6">
                    <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                </div>
                <div class="col-sm-6">
                    <input type="tel" name="phone" placeholder="Mobile No." value="{{ old('phone') }}">
                </div>
                <div class="col-sm-12">
                    <textarea cols="30" rows="10" name="message" placeholder="Enter Your Message" required>{{ old('message') }}</textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="t-btn submit-btn">{{ $props['submit_text'] }}</button>
                </div>
            </div>
        </form>
    </div>
</section>
