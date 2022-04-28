@extends('template.public')

@push('styles')
<style>
.min-h-screen {
    min-height: 100vh;
}

.underline {
    text-decoration: underline;
}
</style>
@endpush

@section('content')
<div class="container min-vh-100">
    <div class="row mt-5">
        <div class="col-md-5">
            <h3>Ours Map</h3>
            <hr>
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d931.0554709229104!2d105.79004472686245!3d21.023806095784174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b329f68977%3A0x6ddf5ff1e829fc56!2zxJDhuqFpIEjhu41jIEdyZWVud2ljaA!5e0!3m2!1svi!2s!4v1650947836024!5m2!1svi!2s" style="border:0; height: 440px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-7">
            <h3>Contacts</h3>
            <hr>

            <p><strong>Quick access numbers</strong></p>

            <p>
                For personal: 1-800-T-MOBILE <br>
                For business: 1-866-965-0526
            </p>

            <p><strong>General Customer Care & Technical Support</strong></p>

            <p>
                From your Shale-Pizza phone: 611 <br>
                Call: 1-800-937-8997 <br>
                If you are calling about a technical issue with your Shale-Pizza service, please call from a different phone so that we can troubleshoot with you.
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 mb-3">
            <span class="display-4">Addresses</span>
        </div>

        <div class="col-md-4">
            <p><strong>Questions and Comments</strong></p>
            <hr>
            <p class=" font-weight-light">
                Shale Pizza Customer Relations <br>
                PO Box 37380 <br>
                Albuquerque, NM 87176-7380 <br>
                Please don't send payments to this address.
            </p>
        </div>
        <div class="col-md-4">
            <p><strong>Payment</strong></p>
            <hr>
            <p>
                You can pay your bill online, or by phone at <br>
                <span class="underline">1-877-453-1304</span>.
            </p>
        </div>
        <div class="col-md-4">
            <p><strong>Bankruptcy Legal Notices</strong></p>
            <hr>
            <p>
                Shale Pizza Bankruptcy Team <br>
                PO Box 53410 <br>
                Bellevue, WA 98015-3410 <br>
                DMCA Notices <br>
            </p>
        </div>

    </div>
</div>
@endsection
