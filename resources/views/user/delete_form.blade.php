{{ Form::model($user, ['url' => route('users.destroy', $user), 'method' => 'DELETE']) }}
    {{ Form::submit('Х', ['class' => 'btn btn-danger fa fa-trash-o']) }}
{{ Form::close() }}
