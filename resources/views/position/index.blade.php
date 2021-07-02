@extends('layouts.app')

@section('title', 'Должности')

@section('content')
    <div class="container">
    <h2>Список должностей</h2>
    @foreach ($positions as $position)
            <p><a href="{{route('positions.show', $position)}}">{{$position->title}}</a></p>
    @endforeach
    </div>

    {{$positions->render()}}
@endsection
