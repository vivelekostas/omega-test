@extends('layouts.app')

@section('title', 'Отделы')

@section('content')
    <div class="container">
    <h2>Список отделов</h2>
    @foreach ($departments as $department)
            <p><a href="{{route('departments.show', $department)}}">{{$department->title}}</a></p>
    @endforeach
    </div>

    {{$departments->render()}}
@endsection
