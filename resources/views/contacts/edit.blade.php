@extends('app')

@section('content')
<h1>Edit</h1>

{!! Form::model($contact, ['method' => 'PATCH', 'action' => ['PhoneBookController@update', $contact->id]]) !!}
    @include('contacts.form' , ['submitButtonText' => 'Edit Number'])
{!! Form::close() !!}
@include('errors.list')
@stop