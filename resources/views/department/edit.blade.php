{{ Form::model($department, ['url' => route('departments.update', $department), 'method' => 'PATCH']) }}
    @include('department.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}
