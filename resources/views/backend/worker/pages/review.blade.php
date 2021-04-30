@extends('layouts.master')
@section('title', 'client order feedback')
@push('styles')

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
            <h3 class="m-0 py-3 text-font-family d-flex justify-content-between">Review Order
                <a href="{{ route('worker.order.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-backspace fa-sm"></i> Back to list</a>
            </h3>
        </div>
    </div>

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-xl-6"> 
            <div class="card border-0">
                <div class="card-body">
                    <div class="client-review d-flex justify-content-start align-items-middle">
                        <div class="review-profile mr-2">
                            @if ($order->client->photo != NULL)
                                <img src="{{ $order->client->getFirstMediaUrl('avatar') }}" class="rounded-circle shadow-sm border" style="width: 50px; height: 50px;" alt="">
                            @else
                                <img src="{{ asset('public/assets/images/profile/default-user.png') }}" class="rounded-circle shadow-sm border" style="width: 50px; height: 50px;" alt="">
                            @endif
                        </div>
                        <div class="review-comment">
                            <h6 class="text-font-family font-weight-bold m-0">{{ $order->client->name }}</h6>
                            <span class="text-font-family" style="font-size: 14px;">{{ $order->review->updated_at->diffForHumans() }}</span>
                            <ul class="list-unstyled d-flex m-0 p-0">
                                @if ($order->review->rating === 5)
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                @elseif ($order->review->rating === 4)
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                @elseif ($order->review->rating === 3)
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                @elseif ($order->review->rating === 2)
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                @elseif ($order->review->rating === 1)
                                <li class="mr-1"><i class="fa fa-star fa-sm" style="color: #ffc700;"></i></li>
                                @endif
                                
                            </ul>
                            <p class="m-0 text-font-family text-dark" style="font-size: 15px;">"{{ $order->review->comment }}"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
