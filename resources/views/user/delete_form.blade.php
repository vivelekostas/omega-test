{{ Form::model($user, ['url' => route('users.destroy', $user), 'method' => 'DELETE']) }}
    {{ Form::submit('Уд', ['class' => 'btn btn-danger btn-sm fa fa-trash-o', 'aria-hidden'=>"true"]) }}
{{ Form::close() }}
