{{ Form::model($department, ['url' => route('departments.destroy', $department), 'method' => 'DELETE']) }}
    {{ Form::submit('X', ['class' => 'btn btn-danger fa fa-trash-o']) }}
{{ Form::close() }}
