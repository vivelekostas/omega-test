@extends('layouts.app')

@section('title', 'Отделы')

@section('content')
    <div class="container">
        @can('create', \App\Models\Department::class)
            <a class="btn btn-primary btn-sm" href="{{route('departments.create')}}">Создать Отдел</a>
        @endcan
        <br>
        <br>
        <h2>Список отделов</h2>

        @foreach ($departments as $department)
            <div class="row">
                <div class="col-sm-8">
                    <p>{{$department->title}}</p>
                </div>
                @can('update', $department)
                    <div class="col-sm-offset-2">
                        <a class="btn btn-primary  fa fa-refresh"
                           href="{{route('departments.edit', $department)}}"></a>
                    </div>
                @endcan
                @can('delete', $department)
                    <div class="col-sm-2">
                        @include('department.delete_form')
                    </div>
                @endcan
            </div>
        @endforeach
    </div>

    {{$departments->render()}}
@endsection
