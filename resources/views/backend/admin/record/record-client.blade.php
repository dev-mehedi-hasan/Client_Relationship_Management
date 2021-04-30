@extends('layouts.master')
@section('title', 'Record Client')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

<section class="admin_client_record mt-2">
    <div class="card p-4">
        <div class="card-title" style="padding: 10px 15px;width: 100%;">
            <b style="font-weight:900">#Client Record 1</b>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered w-100">
                <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Location</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Organization</th>
                </tr>
                <tbody>
                    <tr>
                        <td>548</td>
                        <td>Anna</td>
                        <td>Canada</td>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>+88017885855445</td>
                        <td>www.google.com</td>
                        <td>alibaba.inc</td>
                    </tr>
                    <tr>
                        <td>548</td>
                        <td>Anna</td>
                        <td>Canada</td>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>+88017885855445</td>
                        <td>www.google.com</td>
                        <td>alibaba.inc</td>
                    </tr>
                    <tr>
                        <td>548</td>
                        <td>Anna</td>
                        <td>Canada</td>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>+88017885855445</td>
                        <td>www.google.com</td>
                        <td>alibaba.inc</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card p-4" style="margin-top: 50px;">
        <div class="card-title" style="padding: 10px 15px;width: 100%"><b style="font-weight:900">#Client Record 2</b>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered w-100">

                <tr>
                    <th>Org Email</th>
                    <th>Total Order</th>
                    <th>Active Order</th>
                    <th>Pending Order</th>
                    <th>Status</th>
                    <th>Trac Order</th>
                </tr>

                <tbody>
                    <tr>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>59854525</td>
                        <td>563254</td>
                        <td>548</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>59854525</td>
                        <td>563254</td>
                        <td>548</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>59854525</td>
                        <td>563254</td>
                        <td>548</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>raju2020.d.elite@gmail.com</td>
                        <td>59854525</td>
                        <td>563254</td>
                        <td>548</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
