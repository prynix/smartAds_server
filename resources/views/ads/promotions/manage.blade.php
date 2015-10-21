@extends('manager-master')

@section('title','Promotions Management')

@section('head-footer')
    <link rel="stylesheet" type="text/css" href="{{asset('/datatables/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/manage.css')}}"/>
@endsection

@section('content')
    <br/>
    <div class="row" id="manage-ads">
        <table id="manage-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th id="select-all-chkbox"></th>
                <th>ID</th>
                <th>Items</th>
                <th>Areas</th>
                <th>From</th>
                <th>To</th>
                <th>D. Rate</th>
                <th>D. Value</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('body-footer')
    <script>
        var myTableURL = "{{url('/ads/promotions/table')}}";
        var myOrder = [[8, 'desc']];
        var myDeleteURL='{{route('ads.deleteMulti')}}';
        var myColumns = [
            {
                data: 0,
            },
            {
                "width": "330px",
                render: "[, ]",
                data: 1,
            },
            {
                "width": "120px",
                render: "[, ]",
                data: 2,
            },
            {
                data: 3,
            },
            {
                data: 4,
            },
            {
                "className": "dt-right",
                data: 5,
            },
            {
                "className": "dt-right",
                data: 6,
            },
            {
                data: 7,
            }
        ];
    </script>

    @include('partials.manage-footer-script')
@endsection