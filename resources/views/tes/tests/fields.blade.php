<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_date', 'Post Date:') !!}
    {!! Form::date('post_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Words Field -->
<div class="form-group col-sm-6">
    {!! Form::label('words', 'Words:') !!}
    {!! Form::number('words', null, ['class' => 'form-control']) !!}
</div>

<!-- Attachment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attachment', 'Attachment:') !!}
    {!! Form::file('attachment') !!}
</div>
<div class="clearfix"></div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Post Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_type', 'Post Type:') !!}
    {!! Form::select('post_type', ['Type1' => 'Type1', 'Type2' => 'Type2', 'Type3' => 'Type3', 'Type4' => 'Type4'], null, ['class' => 'form-control']) !!}
</div>

<!-- Post Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_day', 'Post Day:') !!}
    {!! Form::select('post_day', ['Mon' => 'Mon', 'Tue' => 'Tue', 'Wed' => 'Wed', 'Thu' => 'Thu', 'Fri' => 'Fri', 'Sat' => 'Sat', 'Sun' => 'Sun'], null, ['class' => 'form-control']) !!}
</div>

<!-- Private Post Field -->
<div class="form-group col-sm-6">
    {!! Form::label('private_post', 'Private Post:') !!}<br>
    <label class="checkbox-inline">
        {!! Form::hidden('private_post', false) !!}
        {!! Form::checkbox('private_post', 'Yes', null) !!} Yes
    </label>
</div>

<!-- Post Author Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('post_author_gender', 'Post Author Gender:') !!}
    <label class="radio-inline">
        {!! Form::radio('post_author_gender', "Male", null) !!} Male
    </label>
    <label class="radio-inline">
        {!! Form::radio('post_author_gender', "Female", null) !!} Female
    </label>
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>



<!-- 'bootstrap / Toggle Switch Is Active Field' -->
<div class="form-group col-sm-2">
    {!! Form::label('is_active', 'Is Active:') !!} <br>
    <label class="checkbox-inline">
    {!! Form::checkbox('is_active', 1, true,  ['data-toggle' => 'toggle', 'data-size' => 'small', 'data-onstyle'=>'success', 'data-offstyle' => 'danger', 'data-on' => '<i class="fa fa-check"></i> ON' , 'data-off' => '<i class="fa fa-times"></i> Off']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Published Field' -->
<div class="form-group col-sm-2">
    {!! Form::label('is_published', 'Is Published:') !!} <br>
    <label class="checkbox-inline">
    {!! Form::checkbox('is_published', 1, true,  ['data-toggle' => 'toggle', 'data-size' => 'small', 'data-onstyle'=>'success', 'data-offstyle' => 'danger', 'data-on' => '<i class="fa fa-check"></i> ON' , 'data-off' => '<i class="fa fa-times"></i> Off']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('tes.tests.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
