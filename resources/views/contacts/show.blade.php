@extends('app')

@section('content')

 <table class="table table-bordered">
 <thead>
  <tr>
  <th>Id</th>
  <th>Name</th>
  <th>Phone</th>
  </tr>
  </thead>
  <tbody>
  <tr>
 <td>{{$contact->id}}</td>
 <td>{{$contact->name}}</td>
 <td>{{$contact->phone}}</td>
 <th><a href="{{ url('/contacts/' . $contact->id .'/edit') }}">Edit</a></th>
 <th>Delete</th>
 </tr>
 </tbody>
 </table>
 @stop