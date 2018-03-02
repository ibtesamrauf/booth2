@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Booth</div>
                    <div class="panel-body">
                        <a href="{{ url('/event') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/event', 'class' => 'form-horizontal', 'files' => true]) !!}
                            <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                                {!! Form::label('time', 'Time', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('dateTime-local','time', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('hotel_id') ? 'has-error' : ''}}">
                                {!! Form::label('hotel_id', 'Select Hotel', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {{ Form::select('hotel_id', $hotel , null, ['class' => 'form-control']) }}
                                    {!! $errors->first('hotel_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
                                {!! Form::label('start_date', 'start_date', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {{ Form::input('dateTime-local','start_date', null, ['class' => 'form-control']) }}
                                    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
                                {!! Form::label('end_date', 'end_date', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('dateTime-local','end_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
