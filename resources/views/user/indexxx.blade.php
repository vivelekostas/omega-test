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
                    <th scope="col">Должность</th>
                    <th scope="col">Отделы</th>
                    @can('update', auth()->user())
                    <th>Обновление</th>
                    @endcan
                    @can('delete', auth()->user())
                    <th>Удаление</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->title}}</td>
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
{{--                                <div class="col-sm-offset-2">--}}
                                    <a class="btn btn-primary btn-sm fa fa-refresh"
                                       href="{{route('users.edit', $user)}}"></a>
{{--                                </div>--}}
                            @endcan
                        </td>
                        <td>
                            @can('delete', $user)
{{--                                <div class="col-sm-2">--}}
                                    @include('user.delete_form')
{{--                                </div>--}}
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
                {{$users->links()}}
    </div>
@endsection
