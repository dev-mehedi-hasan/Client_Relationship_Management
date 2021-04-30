@extends('layouts.master')
@section('title', 'Admin Dashboard')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent    
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="py-3 bg-white shadow-sm mt-2">
            <h3 class="m-0 pl-3 font-weight-bold">Dashboard</h3>
        </div>
    </div>
</div>

<div class="row mt-2 py-3 shadow-sm bg-white" style="margin: 0 2px;">
    <div class="col-xl-6 col-sm-12 col-12 mt-3">

        <div style="background: #19AAF8;">
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-2" style="border-bottom: 1px solid rgb(230, 230, 230); ">
                        <h2 class="text-white d-block text-font-family m-0">Free Trail</h2>
                    </div>
                </div>
            </div>

            <div class="row px-3 py-4">
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Total</span>
                            <h1 class="font-weight-bold text-font-family mt-2">120</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Complete</span>
                            <h1 class="font-weight-bold text-font-family mt-2">120</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-12">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Pending</span>
                            <h1 class="font-weight-bold text-font-family mt-2">120</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-12 col-12 mt-3">

        <div style="background: #19AAF8;">
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-2" style="border-bottom: 1px solid rgb(230, 230, 230); ">
                        <h2 class="text-white d-block text-font-family m-0">Orders</h2>
                    </div>
                </div>
            </div>

            <div class="row px-3 py-4">
                <div class="col-xl-3 col-sm-3 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Recent</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $recentOrder->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Total</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $totalOrder->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Complete</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $completeOrder->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Pending</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $pendingOrder->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-12 col-12 mt-3">

        <div style="background: #19AAF8;">
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-2" style="border-bottom: 1px solid rgb(230, 230, 230); ">
                        <h2 class="text-white d-block text-font-family m-0">Billing</h2>
                    </div>
                </div>
            </div>

            <div class="row px-3 py-4">
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Total</span>
                            <h1 class="font-weight-bold text-font-family mt-2">${{ $totalOrder->sum('price') }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Paid</span>
                            <h1 class="font-weight-bold text-font-family mt-2">${{ $paidOrder->sum('price') }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Due</span>
                            <h1 class="font-weight-bold text-font-family mt-2">${{ $totalOrder->sum('price') - $paidOrder->sum('price') }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-12 col-12 mt-3">

        <div style="background: #19AAF8;">
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-2" style="border-bottom: 1px solid rgb(230, 230, 230); ">
                        <h2 class="text-white d-block text-font-family m-0">Worker</h2>
                    </div>
                </div>
            </div>

            <div class="row px-3 py-4">
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Total</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $worker->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-12 mb-2 mb-lg-0">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Active</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $workerActive->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 col-12">
                    <div class="bg-white  shadow-sm">
                        <div class="text-center py-3">
                            <span class="text-font-family" style="font-size: 20px;">Awating</span>
                            <h1 class="font-weight-bold text-font-family mt-2">{{ $workerAwating->count() }}</h1>
                        </div>
                        <div class="progress rounded-0" style="height: 8px; background: #064365;">
                            <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>





@endsection
