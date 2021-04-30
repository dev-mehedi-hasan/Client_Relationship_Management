@extends('layouts.master')
@section('title', 'Order')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="py-3 m-0 text-font-family">Free Trails (Contructions)</h3>
        </div>
    </div>

    <div class="row bg-white shadow-sm p-4 mx-1 mt-2">
        <div class="table-responsive ">
            <table class="table table-bordered table-striped table-sm table-hover w-100" id="DataTable">
                <thead>
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Deadline</th>
                    <th>Image</th>
                    <th>Specification</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="cancel_btn">Cancelled</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="complete_btn">Completed</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="redo_btn">Redo</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="pending_btn">Pending</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>


                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="redo_btn">Redo</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>


                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="redo_btn">Redo</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="pending_btn">Pending</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="active_btn">Active</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="complete_btn">Completed</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>50</td>
                        <td>Name</td>
                        <td><span class="cancel_btn">Cancelled</span></td>
                        <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Trac Order</a></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
