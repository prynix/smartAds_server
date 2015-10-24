<?php
$labelClass = "col-sm-3 control-label";
$fromValueGroup = "col-sm-4 col-md-3";
$toRateGroup = "col-sm-5 col-md-6";
$urlGroupClass="col-sm-8 col-md-7";
?>
<fieldset>
    <legend>Promotion Info</legend>
    <div class="form-group">
        <div class="col-sm-3 text-right"><b>ID</b></div>
        <div class="col-sm-9">5</div>
    </div>
    <div class="form-group">
        {!! Form::label('itemsID','Items',['class'=>"$labelClass"]) !!}
        <div class="col-sm-8">
            {!! Form::select('itemsID[]',$items,null,['id'=>'itemsID','class'=>'form-control','multiple','required'=>'required','data-placeholder'=>' e.g. Tide Downy Washing Powder 4.5kg']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('is_whole_system','Apply on whole system?',['class'=>"$labelClass"]) !!}
        <div class="col-sm-9 ">
            <div class="checkbox-inline">
                {!! Form::checkbox('is_whole_system',1,true) !!}
            </div>
        </div>
    </div>
    <div class="form-group" id="target-group">
        {!! Form::label('targetsID','Target Stores/Areas',['class'=>"$labelClass"]) !!}
        <div class="col-sm-7">
            {!! Form::select('targetsID[]',$targets,null,['id'=>'targetsID',
            'class'=>'form-control','multiple','data-placeholder'=>' e.g. Tp. Hồ Chí Minh + Co.opmart Bình Dương']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('start_date','From',['class'=>"$labelClass"]) !!}
        <div class="{{$fromValueGroup}}">
            {!! Form::input('date','start_date',$ads->start_date,['class'=>'form-control my-inline-control','required'=>'required']) !!}
        </div>
        <div class="{{$toRateGroup}}">
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
        {!! Form::label('discount_value','Discount Amount',['class'=>"$labelClass"]) !!}
        <div class="{{$fromValueGroup}}">
            <div class="input-group my-inline-input-group">
                {!! Form::input('number','discount_value',null,['class'=>'form-control my-inline-control','required'=>'required',
                 'min'=>'0.001','step'=>'0.001','placeholder'=>'e.g. 10500']) !!}
                <div class="input-group-addon">VND</div>
            </div>
        </div>
        <div class="{{$toRateGroup}}">
            {!! Form::label('discount_rate','Rate',['class'=>'control-label my-between-label']) !!}
            <div class="input-group my-inline-input-group">
                {!! Form::input('number','discount_rate',null,['class'=>'form-control my-inline-control', 'min'=>'0.01','step'=>'0.01','max'=>'100',
                'required'=>'required','placeholder'=>'e.g. 20']) !!}
                <div class="input-group-addon">%</div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Mobile Display</legend>
    <div class="form-group">
        {!! Form::label('title','Title',['class'=>"$labelClass"]) !!}
        <div class="col-sm-7">
            {!! Form::text('title',null,['class'=>'form-control','required'=>'required','minlength'=>'3','placeholder'=>'e.g. Tide Downy Washing Powder 4.5kg Discount 20%']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('image_display','Display Type',['class'=>"$labelClass"]) !!}
        <div class="col-sm-9">
            <label class="radio-inline">
                {!! Form::radio('image_display',1,true,['id'=>'image_display']) !!} Image
            </label>
            <label class="radio-inline">
                {!! Form::radio('image_display',0,null) !!} Web Page
            </label>
        </div>
    </div>
    <div class="form-group" id="imageInputGroup">
        {!! Form::label(null,'Image',['class'=>"$labelClass"]) !!}
        <div class="{{$urlGroupClass}}">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab-image-link" aria-controls="image-link" role="tab"
                                                          data-toggle="tab">Link</a></li>
                <li role="presentation"><a href="#tab-image-upload" aria-controls="image-upload"
                                           role="tab"
                                           data-toggle="tab">Upload</a></li>
            </ul>
            <input type="hidden" id="provide_image_link" name="provide_image_link" value="1"/>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab-image-link">
                    <br/>
                    {!! Form::url('image_url',null,['class'=>'form-control','placeholder'=>'Image URL']) !!}
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-image-upload">
                    <br/>
                    {!! Form::file('image_file',['id'=>'image_file','accept'=>'image/*']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="form-group myHiddenInputGroup" id="webInputGroup">
        {!! Form::label('web_url','Web Page URL',['class'=>"$labelClass"]) !!}
        <div class="{{$urlGroupClass}}">
            {!! Form::url('web_url',null,['class'=>'form-control','placeholder'=>'eg. http://example.com/ads/a100.html']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('auto_thumbnail','Auto generate thumbnail?',['class'=>"$labelClass"]) !!}
        <div class="col-sm-9 ">
            <div class="checkbox-inline">
                {!! Form::checkbox('auto_thumbnail',1,true) !!}
            </div>
        </div>
    </div>
    <div class="form-group " id="thumbnailInputGroup">
        {!! Form::label(null,'Thumbnail Image',['class'=>"$labelClass"]) !!}
        <div class="{{$urlGroupClass}}">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab-thumbnail-link" aria-controls="thumbnail-link"
                                                          role="tab"
                                                          data-toggle="tab">Link</a></li>
                <li role="presentation"><a href="#tab-thumbnail-upload" aria-controls="thumbnail-upload"
                                           role="tab"
                                           data-toggle="tab">Upload</a></li>
            </ul>
            <input type="hidden" id="provide_thumbnail_link" name="provide_thumbnail_link" value="1"/>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab-thumbnail-link">
                    <br/>
                    {!! Form::url('thumbnail_url',null,['class'=>'form-control','placeholder'=>'Thumbnail URL']) !!}
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-thumbnail-upload">
                    <br/>
                    {!! Form::file('thumbnail_file',['id'=>'thumbnail_file','accept'=>'image/*']) !!}
                </div>
            </div>
        </div>
    </div>
</fieldset>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <input type="submit" class="btn btn-primary" value="{{$btnSubmitName}}"/>
    </div>
</div>