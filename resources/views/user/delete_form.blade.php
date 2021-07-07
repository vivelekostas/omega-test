{{ Form::model($user, ['url' => route('users.destroy', $user), 'method' => 'DELETE']) }}
    {{ Form::submit('Удалить', ['class' => 'btn btn-danger btn-sm']) }}
{{ Form::close() }}
