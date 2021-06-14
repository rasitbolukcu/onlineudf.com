@extends('layouts.main')

@section('content')
    <div id="editor">
        <div id="udf">
            {!! $udf->toHtml() !!}
        </div>
    </div>
    <button class="btn btn-danger" id="goPdf"><i class="fa fa-file-pdf"></i> PDF</button>
@endsection
