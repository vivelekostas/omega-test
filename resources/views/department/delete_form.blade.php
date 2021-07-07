{{ Form::model($department, ['url' => route('departments.destroy', $department), 'method' => 'DELETE']) }}
    {{ Form::submit('Удалить', ['class' => 'btn btn-danger btn-sm']) }}
{{ Form::close() }}
