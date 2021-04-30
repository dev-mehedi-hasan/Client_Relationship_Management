<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('public/css/pdf.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Invoice</title>
</head>
<body>

    @php
        $invoicePrint = App\Models\Invoice::with('order','payment')->where('order_id',$id)->first();
    @endphp
    <div class="main-contents">
        <div class="header-content">
            <div class="content-left">
                <div class="company-info">
                    <img src="{{ asset('public/images/logo.png') }}" alt="">
                    <div class="address">
                        <h5>E-mail: &nbsp;&nbsp;&nbsp;&nbsp;<span>info@dterms.com</span></h5>
                        <h5>Phone: &nbsp;&nbsp;&nbsp;&nbsp;<span>+880-1747776531</span></h5>
                        <h5>Address: &nbsp;<span>1/D, Avenue 4/28, Mipur-1, Dhaka 1216</span></h5>
                    </div>
                </div>
            </div>

            <div class="content-right">
                <div class="invoicePrint-info">
                    <div style="height: 36px;"></div>
                    <div class="address">
                        <h5>Invoice No:&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $invoicePrint->invoice_id }}</span></h5>
                        <h5>Invoice Date:  <span>{{ date('d/m/Y', strtotime($invoicePrint->invoice_date)) }}</span></h5>
                    </div>
                </div>
            </div>
        </div>

        <table id="invoice-table">

            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Order Name</th>
                <th>Specification</th>
                <th>Image qty</th>
                <th>Payment Method</th>
                <th>Amount</th>
            </tr>

            <tr>
                <td>{{ $invoicePrint->order->order_id }}</td>
                <td>{{ date('d/m/Y', strtotime($invoicePrint->order->order_date)) }}</td>
                <td width="15%">{{ $invoicePrint->order->order_name }}</td>
                <td width="15%">{{ $invoicePrint->order->specification->name }}</td>
                <td width="12%">
                    @if ($invoicePrint->order->orderImage->count() > 0)
                        {{ $invoicePrint->order->orderImage->count() }} Pcs
                    @endif
                </td>
                <td width="18%">{{ $invoicePrint->payment->payment_method }}</td>
                <td>${{ $invoicePrint->order->price }}</td>
            </tr>

        </table>

        <footer class="footers" style="background: #E8EFFF; margin-top: 100px;">
            <div class="invoicePrint-footer">
                <h5>Powered by <img src="{{ asset('public/images/dterms.png') }}" alt="" style="height: 20px;"></h5>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, numquam ipsum maxime at illo excepturi laborum dolorem saepe exercitationem praesentium.</span>
            </div>
        </footer>
    </div>

</body>
</html>

    
