@extends('layouts.master')
@section('title', 'order feedback form')
@push('styles')
<style>

.rate {
    float: right;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float: right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #ffc700;  
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
            <h3 class="m-0 py-3 text-font-family">Order Feedback</h3>
        </div>
    </div>

    <div class="row shadow-sm bg-white mx-1 mt-2">

        <div class="col-xl-6"> 
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ route('client.order.feedback.store',$Orders->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" for="your-email" >Your Email</label>
                            <input type="email" disabled id="your-email" value="{{ $Orders->client->email }}" class="form-control">
                        </div>
                        <div class="form-group d-flex justify-content-start align-items-center">
                            <div>
                                <div class="font-weight-bold">Quality:</div>
                            </div>
                            <div>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            @error('rating')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold" for="comment">Comment</label>
                            <textarea name="comment" id="Comment" rows="5" class="form-control"></textarea>
                            @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-bg-color rounded-0 text-light shadow-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
       

    </div>

@endsection
