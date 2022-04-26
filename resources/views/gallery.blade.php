@extends('template.public')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.photo {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
}

.pr-0 {
    padding-right: 0;
}
</style>
@endpush

@section('content')
<div class="container min-vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-12 text-center">
            <h1 class="display-1">Gallery</h1>
        </div>
    </div>

    <div id="gallery" class="row my-5">
        @foreach ($photos->split(4) as $chunk)
            <div class="col-md-3 pr-0">
                @foreach ($chunk as $photo)
                <a href="{{ asset($photo->image) }}" data-lightbox="collection">
                    <img class="photo mb-2" src="{{ asset($photo->image) }}" alt="{{ $photo->name }}">
                </a>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js" integrity="sha512-6gudNVbNM/cVsLUMOb8g2b/RBqtQJ3aDfRFgU+5paeaCTtbYY/Dg00MzZq7r6RvJGI2KKtPBhjkHGTL/iOe21A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>
@endpush
