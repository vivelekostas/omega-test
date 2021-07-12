@extends('layouts.app')

@section('title', 'Сотрудник')

@section('content')
    <div class="container">
        @isset($user->image)
            <img class="img-fluid" src="{{asset('/storage/' . $user->image)}}" width="200" height="250">
        @else
            <img class="img-fluid" src="{{asset('/storage/' . 'avatars/avatar.png')}}" width="200" height="250">
        @endisset
        <h2>{{$user->name}} {{$user->last_name}}</h2>
        <p>
            Email: {{$user->email}}<br>
            Должность: {{$user->position->title}}<br>
            Роль: {{$user->role->title}}<br>
            Отдел/лы:
            @foreach ($user->departments as $department)
                @if ($loop->last)
                    <span>{{$department->title}}.</span>
                    @break
                @endif
                <span>{{$department->title}},</span>
            @endforeach<br>
            Зарплата: {{$user->position->salary}}<br>
        </p>
    </div>
@endsection

