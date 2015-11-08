@extends('system.admin-system')

@section('head-footer-child')
    <link href="{{asset('css/admin-setting.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','SmartAds Settings')
@section('page-title','SmartAds Settings')
@section('breadcrumb-child')
    <li class="active">Settings</li>
@endsection
<?php
$labelClass = "control-label";
$fromValueGroup = "";
$toRateGroup = "";
?>
@section('content')
    <div class="row">
        <div class="my-setting-container">
            <div class="panel panel-default">
                <div class="panel-body my-list-setting-panel">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default threshold-panel">
                            <a class=" panel-heading panel-title" data-toggle="collapse" role="tab"
                               data-parent="#accordion"
                               href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Promotion Notification Threshold
                            </a>

                            <div id="collapseTwo" class="collapse in">
                                <div class="panel-body">
                                    {!! Form::open(['route'=> 'system.settings','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'id' => 'process-config']) !!}
                                    <fieldset>
                                        <legend>Entrance Notification</legend>
                                        <div class="form-group">
                                            {!! Form::label('entrance_value','Min Discount Amount',['class'=>"$labelClass"]) !!}
                                            <div class="input-group my-inline-input-group">
                                                {!! Form::input('number','entrance_value',null,['class'=>'form-control my-inline-control discount-value','required'=>'required',
                                                 'min'=>'0.001','step'=>'0.001','placeholder'=>'e.g. 10500']) !!}
                                                <div class="input-group-addon">VND</div>
                                            </div>
                                            {!! Form::label('entrance_rate','Rate',['class'=>'control-label my-between-label']) !!}
                                            <div class="input-group my-inline-input-group">
                                                {!! Form::input('number','entrance_rate',null,['class'=>'form-control my-inline-control  discount-rate', 'min'=>'0.01','step'=>'0.01','max'=>'100',
                                                'required'=>'required','placeholder'=>'e.g. 20']) !!}
                                                <div class="input-group-addon">%</div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br/>
                                    <fieldset>
                                        <legend>Aisle Notification</legend>
                                        <div class="form-group">
                                            {!! Form::label('aisle_value','Min Discount Amount',['class'=>"$labelClass"]) !!}
                                            <div class="input-group my-inline-input-group">
                                                {!! Form::input('number','aisle_value',null,['class'=>'form-control my-inline-control discount-value','required'=>'required',
                                                 'min'=>'0.001','step'=>'0.001','placeholder'=>'e.g. 10500']) !!}
                                                <div class="input-group-addon">VND</div>
                                            </div>
                                            {!! Form::label('aisle_rate','Rate',['class'=>'control-label my-between-label']) !!}
                                            <div class="input-group my-inline-input-group">
                                                {!! Form::input('number','aisle_rate',null,['class'=>'form-control my-inline-control  discount-rate', 'min'=>'0.01','step'=>'0.01','max'=>'100',
                                                'required'=>'required','placeholder'=>'e.g. 20']) !!}
                                                <div class="input-group-addon">%</div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr class="submit-top-hr"/>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default trans-process-panel">
                            <a class="panel-heading panel-title collapsed" data-toggle="collapse" role="tab"
                               href="#collapseOne" data-parent="#accordion"
                               aria-expanded="false" aria-controls="collapseOne">
                                Transaction Process Config
                            </a>

                            <div id="collapseOne" class="collapse">
                                <div class="panel-body">
                                    {!! Form::open(['route'=> 'system.settings','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'id' => 'process-config']) !!}
                                    <div class="form-group">
                                        {!! Form::label('time-range','Process customers\' transactions from the last',['class'=>"control-label"]) !!}
                                        {!! Form::input('number','time-rage', null, ['class'=>'form-control', 'id' => 'time-range', 'placeholder'=>'6']) !!}
                                        <span class="unit"> months </span>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('related-item','Use related item suggestion',['class'=>'control-label']) !!}
                                        <div class="my-inline-control">
                                            {!! Form::checkbox('related-item', 0, false, ['id' => 'related-item']) !!}
                                        </div>
                                    </div>
                                    <hr class="submit-top-hr"/>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <a class="collapsed panel-heading panel-title" data-parent="#accordion"
                               href="{{url('/admin/system/settings/category')}}">
                                Category Selection
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<button class="btn btn-primary" id="btnSaveConf">Save config</button>--}}
    </div>
@endsection

@section('body-footer')
    <script src="{{asset('/js/bootbox.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('button#btnReprocess').click(function () {
                //Todo AJAX re-mining
            });
            $('button#btnSaveConf').click(function () {
                //Todo AJX save config
            });

        });
    </script>
@endsection
