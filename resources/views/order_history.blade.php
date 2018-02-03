@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Information / Details</div>
                    <div class="panel-body">
                        
                        <form class="form-horizontal" action="/order_history_post" method="POST">
                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') }}" required>
                                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name') }}" required>
                                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" id="phone_number" required >
                                    {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">address</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                <input type="submit" value="Continue" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
