@extends('app')

@section('content')
 <h1>Phone Book:</h1>
 <a href="{{ url('/contacts/create') }}"><h4>Create New Number</h4></a>
 @include('contacts.search')
 @if (count($contacts))
 <table class="table table-bordered">
 <thead>
  <tr>
  <th>Id</th>
  <th>Name</th>
  <th>Phone</th>
  <th>Black list</th>
  </tr>
  </thead>
  <tbody>

 @foreach($contacts as $contact)
 <tr>
 <td>{{$contact->id}}</td>
 <td>{{$contact->name}}</td>
 <td>{{$contact->phone}}</td>
 <th>{{$contact->black_list}}</th>
 <th><a class="btn btn-link" href="{{ url('/contacts/'.$contact->id) }}">Show</a></th>
 <th><a class="btn btn-link" href="{{ url('/contacts/' . $contact->id .'/edit') }}">Edit</a></th>
 <th>{!! Form::open(['method' => 'DELETE', 'action' => ['PhoneBookController@destroy', $contact->id]]) !!}
 {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
 {!! Form::close() !!}</th>
 </tr>
@endforeach

  </tbody>
 </table>
 @endif
 @stop