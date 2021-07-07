{{ Form::model($position, ['url' => route('positions.store')]) }}
    @include('position.form')
    {{ Form::submit('Создать') }}
{{ Form::close() }}


