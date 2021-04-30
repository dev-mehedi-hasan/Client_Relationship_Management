@extends('layouts.master')
@section('title', 'Order')
@push('styles')
    <style>
        ul.specification_info > li.list_image{
            float: left !important;
            margin-left: 38px !important;
            min-width: 150px !important;
        }
        .table td, .table th {
            vertical-align: middle !important;
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

<div class="row shadow-sm bg-white mx-1 my-2">
    <div class="col-12">
        <h3 class="py-3 m-0 text-font-family">Client Specification</h3>
    </div>
</div>

<div class="bg-white shadow-sm mx-1 p-4">
    <div class="row mx-1 mb-4">
        <div class="col-12">
            <div class="dateFilter d-flex justify-content-center">
                <form action="{{ route('admin.specification.search') }}" method="POST" class="w-50 w-sm-100 mx-auto mx-sm-0">
                    @csrf
                    <div class="form-row">
                        <div class="col-xl-4 col-sm-12 col-12">
                            <div class="form-group m-0">
                                <input type="date" name="start_date" class="form-control" >
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                            <div>
                                To
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-12 col-12">
                            <div class="form-group m-0">
                                <input type="date" name="end_date" class="form-control">
                                @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-xl-1 col-sm-12 col-12">
                            <div class="form-group m-0 text-sm-center text-center">
                                <button type="submit" class="btn shadow-sm bg-white border"><img style="width: 100%; height: 23px;" src="{{ asset('public/images/search.svg') }}" alt=""></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mx-1">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped table-hover" id="DataTable2">
                <thead>
                    <th style="font-weight: bold !important; width: 10%;">Client Id</th>
                    <th style="font-weight: bold !important; width: 15%;">Specification Name</th>
                    <th style="font-weight: bold !important;">Specification Info</th>
                    <th style="font-weight: bold !important; width: 15%;">Order Number</th>
                </thead>
                <tbody>

                    @foreach ($AllSpecification as $AllSpecifications)
                        <tr>
                            <td>{{ $AllSpecifications->user->user_id }}</td>
                            <td>{{ $AllSpecifications->name }}</td>
                            <td>
                                <ul class="specification_info m-0 w-100 p-0">
                                    @foreach ($AllSpecifications->file_type as $file_type)
                                        <li class="list_image">{{ $file_type->name }},</li>
                                    @endforeach
                                    @foreach ($AllSpecifications->background as $Background)
                                        <li class="list_image">{{ $Background->name }},</li>
                                    @endforeach
                                    @foreach ($AllSpecifications->alignment as $Alignment)
                                        <li class="list_image">{{ $Alignment->name }},</li>
                                    @endforeach
                                    @foreach ($AllSpecifications->color as $Color)
                                        <li class="list_image">{{ $Color->name }},</li>
                                    @endforeach
                                    @foreach ($AllSpecifications->margin as $Margin)
                                        @if ($Margin->name == NULL)
                                            
                                        @else
                                            <li class="list_image">{{ $Margin->name }},</li>
                                        @endif  
                                    @endforeach
                                    @foreach ($AllSpecifications->dpi as $DPI)
                                        <li class="list_image">{{ $DPI->name }},</li>
                                    @endforeach
                                    @if ($AllSpecifications->custom_size != NULL)
                                        <li class="list_image">{{ $AllSpecifications->custom_size->value_1 }} :
                                            {{ $AllSpecifications->custom_size->value_2 }}</li>
                                    @else

                                    @endif
                                    @foreach ($AllSpecifications->size as $Size)
                                        <li class="list_image">{{ $Size->name }},</li>
                                    @endforeach
                                    @foreach ($AllSpecifications->addon as $Addon)
                                        <li class="list_image">{{ $Addon->name }},</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>12545656</td>
                        </tr>
                    @endforeach
    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row shadow-sm bg-white mx-1 mt-4">
    <div class="col-12">
        <h3 class="py-3 m-0 text-font-family">Most Popular
            Specification</h3>
    </div>
</div>

<div class="row bg-white shadow-sm p-4 mx-1 mt-2">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="DataTable">

            <thead>
                <th style="font-weight: bold !important;" width="15%">Specification Name</th>
                <th style="font-weight: bold !important;" width="75%">Specification Info</th>
                <th style="font-weight: bold !important;" width="10%">Used</th>
            </thead>

            <tbody>

                @foreach ($PopularSpecification as $PopulerSpecifications)
                    <tr>
                        <td>{{ $PopulerSpecifications->specification->name }}</td>
                        <td style="text-align: center; display: flex;justify-content: center;align-items: center;">
                            <ul class="specification_info m-0 w-100 p-0">
                                @foreach ($PopulerSpecifications->specification->file_type as $file_type)
                                    <li class="list_image">{{ $file_type->name }},</li>
                                @endforeach
                                @foreach ($PopulerSpecifications->specification->background as $Background)
                                        <li class="list_image">{{ $Background->name }},</li>
                                    @endforeach
                                    @foreach ($PopulerSpecifications->specification->alignment as $Alignment)
                                        <li class="list_image">{{ $Alignment->name }},</li>
                                    @endforeach
                                    @foreach ($PopulerSpecifications->specification->color as $Color)
                                        <li class="list_image">{{ $Color->name }},</li>
                                    @endforeach
                                    @foreach ($PopulerSpecifications->specification->margin as $Margin)
                                        @if ($Margin->name == NULL)
                                            
                                        @else
                                            <li class="list_image">{{ $Margin->name }},</li>
                                        @endif  
                                    @endforeach
                                    @foreach ($PopulerSpecifications->specification->dpi as $DPI)
                                        <li class="list_image">{{ $DPI->name }},</li>
                                    @endforeach
                                    @if ($PopulerSpecifications->specification->custom_size != NULL)
                                        <li class="list_image">{{ $PopulerSpecifications->specification->custom_size->value_1 }} :
                                            {{ $PopulerSpecifications->specification->custom_size->value_2 }}</li>
                                    @else

                                    @endif
                                    @foreach ($PopulerSpecifications->specification->size as $Size)
                                        <li class="list_image">{{ $Size->name }},</li>
                                    @endforeach
                                    @foreach ($PopulerSpecifications->specification->addon as $Addon)
                                        <li class="list_image">{{ $Addon->name }},</li>
                                    @endforeach
                            </ul>
                        </td>
                        <td>({{ $PopulerSpecifications->specification_count }})</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
</section>
@endsection

@push('scripts')
    <script>
        $('#DataTable2').DataTable();
    </script>
@endpush