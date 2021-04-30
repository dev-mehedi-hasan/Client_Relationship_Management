@extends('layouts.master')
@section('title', 'Record Worker')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="py-3 m-0">Worker Billing Record</h3>
        </div>
    </div>

    <div class="row p-4 shadow-sm bg-white mx-1 mt-2">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm" id="DataTable">

                <thead>
                    <tr>
                        <th style="font-weight: bold !important;">Worker ID</th>
                        <th style="font-weight: bold !important;">Order ID</th>
                        <th style="font-weight: bold !important;">Order Date</th>
                        <th style="font-weight: bold !important;">Delivery Date</th>
                        <th style="font-weight: bold !important;">Image</th>
                        <th style="font-weight: bold !important;">Total Pay</th>
                        <th style="font-weight: bold !important;">Payment Method</th>
                        <th style="font-weight: bold !important;">Invoice</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($WorkerBilling as $WorkerBilling)
                        <tr>
                            <td>
                                {{ $WorkerBilling->worker->user_id }}
                            </td>
                            <td>{{ $WorkerBilling->order_id }}</td>
                            <td>{{ date('d-M-Y', strtotime($WorkerBilling->order_date)) }}</td>
                            <td>{{ date('d-M-Y', strtotime($WorkerBilling->delivery_date)) }}</td>
                            <td>{{ $WorkerBilling->orderImage->count() > 0 ? $WorkerBilling->orderImage->count() : '0' }} Pcs</td>
                            <td>${{ $WorkerBilling->payment->payable }}</td>
                            <td>{{ $WorkerBilling->payment->payment_method }}</td>
                            <td>
                                <a class="btn btn-sm rounded-0 shadow-sm text-light btn-bg-color" href="{{ route('admin.worker.show', $WorkerBilling->id) }}" target="_blank"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
