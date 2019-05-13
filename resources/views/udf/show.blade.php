@extends('layouts.main')

@section('content')
    <div id="editor">
        <div id="udf">
            {!! $udf->toHtml() !!}
        </div>
    </div>
@endsection
