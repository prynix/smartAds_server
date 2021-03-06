@extends('ads.partials.manage-master')

@section('title','Manage Promotions')

@section('table-header')
    <thead>
    <tr>
        <th id="select-all-chkbox"></th>
        <th class="sorting">ID</th>
        <th>Items</th>
        <th>Areas</th>
        <th>From</th>
        <th>To</th>
        <th>D. Rate</th>
        <th>D. Value</th>
        <th>Action</th>
    </tr>
    <tr>
        <td></td>
        {!! Utils::genSearchCell('id') !!}
        {!! Utils::genSearchCell('items') !!}
        {!! Utils::genSearchCell('areas') !!}
        @include('partials.search.start-end-date')
        @include('partials.search.number-from-to',['name'=>'rate','min'=>'0.01','step'=>'0.01','max'=>'100'])
        @include('partials.search.number-from-to',['name'=>'value','min'=>'0.001','step'=>'0.001'])
        @include('partials.search.action-group')
    </tr>
    </thead>
@endsection

@section('content-footer')
    @include('partials.flash-overlay')
@endsection

@section('table-url',url('/ads/promotions/table'))
@section('my-columns')
        var myColumns = [
            {
                data: 0,
            },
            {
                "width": "260px",
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
        width: "60px",
            },
            {
                "className": "dt-right",
                data: 6,
        width: "60px",
            },
            {
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return '<a class="my-manage-edit-btn" role="button" href="{{url("manager/ads/promotions")}}/' + row[0] + '/edit">' +
                            '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>';
                }
            }
        ];
@endsection
@section('table-search-init')
        var COLS = ["id", "items", "areas", "from", "to", "rate", "value"];
        var divider = 4;
@endsection