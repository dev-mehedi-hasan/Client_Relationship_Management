@extends('layouts.master')
@section('title', 'Record Billing')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')
    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="py-3 m-0">Client Billing Record</h3>
        </div>
    </div>

    <div class="row p-4 shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="DataTable">
                    <thead>
                        <th style="font-weight: bold !important;">Client ID</th>
                        <th style="font-weight: bold !important;">Order ID</th>
                        <th style="font-weight: bold !important;">Order Date</th>
                        <th style="font-weight: bold !important;">Image</th>
                        <th style="font-weight: bold !important;">Total Pay</th>
                        <th style="font-weight: bold !important;">Payment Method</th>
                        <th style="font-weight: bold !important;">Invoice</th>
                    </thead>

                    <tbody>

                        @foreach ($ClientBilling as $ClientBillings)
                            <tr>
                                <td>
                                    {{ $ClientBillings->client->user_id }}
                                </td>
                                <td>{{ $ClientBillings->order_id }}</td>
                                <td>{{ date('d-M-Y', strtotime($ClientBillings->order_date)) }}</td>
                                <td>{{ $ClientBillings->orderImage->count() > 0 ? $ClientBillings->orderImage->count() : '0' }} Pcs</td>
                                <td>${{ $ClientBillings->payment->payable }}</td>
                                <td>{{ $ClientBillings->payment->payment_method }}</td>
                                <td>
                                    <a class="btn btn-sm rounded-0 shadow-sm text-light btn-bg-color" href="{{ route('admin.billing.show', $ClientBillings->id) }}" target="_blank"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
