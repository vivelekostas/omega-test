@extends('layouts.app')

@section('title', 'Сотрудники')

@section('content')
    <div class="container">
    <h2>Список сотрудников</h2>
    @foreach ($users as $user)
            <p><a href="{{route('users.show', $user)}}">{{$user->name}} {{$user->last_name}}</a></p>
    @endforeach
    </div>

    {{$users->render()}}
@endsection
