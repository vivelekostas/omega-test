{{ Form::model($position, ['url' => route('positions.destroy', $position), 'method' => 'DELETE']) }}
    {{ Form::submit('X', ['class' => 'btn btn-danger fa fa-trash-o']) }}
{{ Form::close() }}
