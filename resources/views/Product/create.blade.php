@extends('layouts.app')

@section('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
// tinymce.init({ selector:'textarea' });

tinymce.init({
    selector: 'textarea',
    height: 300,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true
});

</script>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Booth</div>
                    <div class="panel-body">
                        <a href="{{ url('/network') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/network', 'class' => 'form-horizontal', 'files' => true]) !!}
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                            {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group {{ $errors->has('select_hotel') ? 'has-error' : ''}}">
                            {!! Form::label('select_hotel', 'Select Hotel', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::select('select_hotel', $hotel , null, ['class' => 'form-control']) }}
                                <!-- {!! Form::text('select_hotel', null, ['class' => 'form-control']) !!} -->
                                {!! $errors->first('select_hotel', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                            {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::select('status',array('0' => 'Disable', '1' => 'Enable'), ['class' => 'form-control']) }}
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <!-- <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus> -->
                                <textarea id="description" class="form-control" name="description" >{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                        <!-- <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">Iamge</label>

                            <div class="col-md-6">
                                <input type="file" name="file" id="file">

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                            {!! Form::label('price', 'Price', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('price', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
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
