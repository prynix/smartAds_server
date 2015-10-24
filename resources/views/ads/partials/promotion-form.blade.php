<fieldset>
    <legend>Promotion Info</legend>
    <div class="form-group">
        {!! Form::label('itemsID','Items',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-7 col-lg-6">
            {!! Form::select('itemsID[]',$items,null,['id'=>'itemsID','class'=>'form-control','multiple','required'=>'required','data-placeholder'=>' e.g. Tide Downy Washing Powder 4.5kg']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('is_whole_system','Apply on whole system?',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-9 ">
            <div class="checkbox-inline">
                {!! Form::checkbox('is_whole_system',1,true) !!}
            </div>
        </div>
    </div>
    <div class="form-group" id="target-group">
        {!! Form::label('targetsID','Target Stores/Areas',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-7 col-lg-6">
            {!! Form::select('targetsID[]',$targets,null,['id'=>'targetsID',
            'class'=>'form-control','multiple','data-placeholder'=>' e.g. Tp. Hồ Chí Minh + Co.opmart Bình Dương']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('start_date','From',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-4 col-lg-3">
            {!! Form::input('date','start_date',$ads->start_date,['class'=>'form-control my-inline-control','required'=>'required']) !!}
        </div>
        <div class="col-sm-5 col-lg-6">
            {!! Form::label('end_date','To',['class'=>'control-label my-between-label','required'=>'required']) !!}
            {!! Form::input('date','end_date',$ads->end_date,['class'=>'form-control my-inline-control','required'=>'required'
           ]) !!}

            <div id="date-error" style="display: none">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                End Date must not before Start Date
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('discount_value','Discount Amount',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-4 col-lg-3">
            <div class="input-group my-inline-input-group">
                {!! Form::input('number','discount_value',null,['class'=>'form-control my-inline-control','required'=>'required',
                 'min'=>'0.001','step'=>'0.001','placeholder'=>'e.g. 10500']) !!}
                <div class="input-group-addon">VND</div>
            </div>
        </div>
        <div class="col-sm-5 col-lg-6">
            {!! Form::label('discount_rate','Rate',['class'=>'control-label my-between-label']) !!}
            <div class="input-group my-inline-input-group">
                {!! Form::input('number','discount_rate',null,['class'=>'form-control my-inline-control', 'min'=>'0.01','step'=>'0.01','max'=>'100',
                'required'=>'required','placeholder'=>'e.g. 20']) !!}
                <div class="input-group-addon">%</div>
            </div>
        </div>
    </div>
</fieldset>
@include('ads.partials.mobile-display-form')
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <input type="submit" class="btn btn-primary" value="{{$btnSubmitName}}"/>
    </div>
</div>