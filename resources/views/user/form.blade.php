@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('image', 'Аватар') }}
{{ Form::file('image')}}<br>

{{ Form::label('name', 'Имя')}}
{{ Form::text('name')}}<br>


{{ Form::label('last_name', 'Фамилия') }}
{{ Form::text('last_name')}}<br>

{{ Form::label('email', 'Email') }}
{{ Form::text('email') }}<br>

@if($is_user_create_page === true)
    {{ Form::label('password', 'Пароль') }}
    {{ Form::password('password') }}<br>
@endif

{{ Form::label('position_id', 'Должность') }}
{{ Form::select('position_id', $positions, null, [
    'id' => 'positions',
    ])}}<br>

{{ Form::label('role_id', 'Роль') }}
{{--todo получить из бд--}}
{{ Form::select('role_id', [1 => 'Admin', 2 => 'Manager', 3 => 'User']) }}<br>

{{ Form::label('department_id', 'Отдел') }}
{{ Form::select('department_id[]', $departments, null, [
    'id' => 'departments',
    'multiple' => 'multiple',
     ]) }}<br>

