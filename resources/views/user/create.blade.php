{{ Form::model($user, ['url' => route('users.store')]) }}
    @include('user.form')
    {{ Form::submit('Создать') }}
{{ Form::close() }}
