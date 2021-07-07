{{ Form::model($user, ['url' => route('users.update', $user), 'method' => 'PATCH']) }}
    @include('position.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}
