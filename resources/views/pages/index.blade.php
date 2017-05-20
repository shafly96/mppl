@extends('master.master')

@section('content')
@if (session('failed'))
    <div class="alert alert-error">
        {{ session('failed') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@stop
@include('master.script')
