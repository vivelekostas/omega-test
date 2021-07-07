@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('title', 'Название') }}
{{ Form::text('title') }}<br>
{{ Form::label('salary', 'Зарплата') }}
{{ Form::text('salary') }}<br>
