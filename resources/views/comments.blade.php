@extends('layouts.base')

@section('content')
    <div class="container my-4">
        <comments :comments="{{ $comments }}"> </comments>
    </div>
@endsection
