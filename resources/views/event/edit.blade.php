@extends('layouts.app')

@section('content')
<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->
<script>
// tinymce.init({ selector:'textarea' });

// tinymce.init({
//     selector: 'textarea',
//     height: 300,
//     theme: 'modern',
//     plugins: [
//       'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//       'searchreplace wordcount visualblocks visualchars code fullscreen',
//       'insertdatetime media nonbreaking save table contextmenu directionality',
//       'emoticons template paste textcolor colorpicker textpattern imagetools'
//     ],
//     toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//     toolbar2: 'print preview media | forecolor backcolor emoticons',
//     image_advtab: true
// });

</script>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Booth</div>
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

                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/event', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('event.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
