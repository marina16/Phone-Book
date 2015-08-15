<div>
{!! Form::open(['route'=>'contacts.index', 'method'=>'GET']) !!}
{!! Form::text('keyword') !!}
{!! Form::submit('Search') !!}
{!! Form::close() !!}
</div>