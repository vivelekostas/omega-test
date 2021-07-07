{{ Form::model($position, ['url' => route('positions.update', $position), 'method' => 'PATCH']) }}
    @include('position.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}
