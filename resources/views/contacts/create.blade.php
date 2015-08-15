@extends('app')

@section('content')
<h1>New Number</h1>

{!! Form::open(['url' => 'contacts']) !!}
    @include('contacts.form' , ['submitButtonText' => 'Add Number'])
{!! Form::close() !!}
@include('errors.list')
@stop