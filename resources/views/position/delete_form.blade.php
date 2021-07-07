{{ Form::model($position, ['url' => route('positions.destroy', $position), 'method' => 'DELETE']) }}
    {{ Form::submit('Удалить', ['class' => 'btn btn-danger btn-sm']) }}
{{ Form::close() }}
