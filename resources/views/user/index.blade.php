@extends('layouts.app')

@section('title', 'Сотрудники')

@section('content')
    <div class="container">
        @can('create', \App\Models\User::class)
            <a class="btn btn-primary btn-sm" href="{{route('users.create')}}">Добавить Сотрудника</a>
        @endcan
        <br>
        <br>
        <h2>Список сотрудников</h2>
        @foreach ($users as $user)
            <div class="row">
                @can('view', $user)
                    <div class="col-sm-8">
                        <p><a href="{{route('users.show', $user)}}">{{$user->name}} {{$user->last_name}}</a></p>
                    </div>
                @else
                    <div class="col-sm-8">
                        <p>{{$user->name}} {{$user->last_name}}</p>
                    </div>
                @endcan
                @can('update', $user)
                    <div class="col-sm-offset-2">
                        <a class="btn btn-primary btn-sm"
                           href="{{route('users.edit', $user)}}">Обновить</a>
                    </div>
                @endcan
                @can('delete', $user)
                    <div class="col-sm-2">
                        @include('user.delete_form')
                    </div>
                @endcan
            </div>
        @endforeach
    </div>

    {{$users->render()}}
@endsection
