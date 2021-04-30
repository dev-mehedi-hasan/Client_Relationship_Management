@extends('layouts.master')
@section('title', 'create free trail')
@push('styles')
<link href="{{ asset('public/assets/css/image-uploader.css') }}" rel="stylesheet">
<style>
    .dropify-wrapper .dropify-message p {
        font-size: 16px !important;
        color: #a2a2a2 !important;
    }
</style>
@endpush
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="d-flex justify-content-between py-3 m-0">Create Free Trails
                <a href="{{ route('client.freetrail.index') }}" class="btn btn-sm rounded-0 text-light px-3 shadow-sm btn-danger"><i class="fas fa-backspace fa-sm"></i> Back to list</a>
            </h3>
        </div>
    </div>

    <div class="row bg-white shadow-sm  mx-1 mt-3">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0 pt-3">
                    <h4 class="card-titles font-weight-bold text-font-family">free trail info</h4>
                    <form action="{{ route('client.freetrail.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <span>Upload Image <code>(jpg, png & max upload image: 20 pcs)</code></span>
                            <div class="freetrail-upload-image" style="padding-top: .5rem;"></div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Require Text <code>(200 characters)</code></label>
                            <textarea name="note_text"  rows="5" class="form-control"></textarea>
                            @error('note_text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-bg-color rounded-0 shadow-sm text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script src="{{ asset('public/assets/js/image-uploader.js') }}"></script>
<script>
    $(document).ready(function(){
        // multiple image upload
        $('.freetrail-upload-image').imageUploader(
            {
            imagesInputName: 'image',
            }
        );
    })
    
</script>
@endpush