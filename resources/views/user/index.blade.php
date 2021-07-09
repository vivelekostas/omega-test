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
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Email</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Должность</th>
                    <th scope="col">Отделы</th>
                    @can('update', auth()->user())
                    <th>Обновить</th>
                    @endcan
                    @can('delete', auth()->user())
                    <th>Удалить</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                            @can('view', $user)
                                <div class="col-sm-8">
                                    <p><a class="fa fa-external-link" href="{{route('users.show', $user)}}">{{$user->last_name}}</a></p>
                                </div>
                            @else
                                <div class="col-sm-8">
                                    <p>{{$user->last_name}}</p>
                                </div>
                            @endcan
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->title}}</td>
                        <td>{{$user->position->title}}</td>
                        <td>
                            @foreach ($user->departments as $department)
                                @if ($loop->last)
                                    <span>{{$department->title}}.</span>
                                    @break
                                @endif
                                <span>{{$department->title}},</span>
                            @endforeach<br>
                        </td>
                        <td>
                            @can('update', $user)
                                    <a class="btn btn-primary fa fa-refresh"
                                       href="{{route('users.edit', $user)}}"></a>
                            @endcan
                        </td>
                        <td>
                            @can('delete', $user)
                                    @include('user.delete_form')
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
                {{$users->links()}}
    </div>
@endsection
