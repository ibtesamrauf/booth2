<div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
    {!! Form::label('time', 'Time', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('dateTime-local','time', Carbon\Carbon::parse($user->time)->format('Y-m-d')
        ."T".Carbon\Carbon::parse($user->time)->format('H:i'), ['class' => 'form-control']) !!}
        {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hotel_id') ? 'has-error' : ''}}">
    {!! Form::label('hotel_id', 'Select Hotel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('hotel_id', $hotel , $user->hotel_id , ['class' => 'form-control']) }}
        {!! $errors->first('hotel_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('status',array('0' => 'Disable', '1' => 'Enable') , $user->status , ['class' => 'form-control']) }}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', 'start_date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::input('dateTime-local','start_date', Carbon\Carbon::parse($user->start_date)->format('Y-m-d')
        ."T".Carbon\Carbon::parse($user->start_date)->format('H:i'), ['class' => 'form-control']) }}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    {!! Form::label('end_date', 'end_date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('dateTime-local','end_date', Carbon\Carbon::parse($user->end_date)->format('Y-m-d')
        ."T".Carbon\Carbon::parse($user->end_date)->format('H:i'), ['class' => 'form-control']) !!}
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>