@extends('layouts.main')

@section('content')
    <div id="editor">
        <div id="udf">
            {!! $udf->toHtml() !!}
        </div>
    </div>
    <button class="btn btn-danger" id="goPdf"><i class="fa fa-file-pdf"></i></button>
    <button class="btn btn-primary" id="goDocx"><i class="fa fa-file-word-o"></i></button>
@endsection
