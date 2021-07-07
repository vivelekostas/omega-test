{{ Form::model($department, ['url' => route('departments.store')]) }}
    @include('department.form')
    {{ Form::submit('Создать') }}
{{ Form::close() }}

