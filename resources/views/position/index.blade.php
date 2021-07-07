@extends('layouts.app')

@section('title', 'Должности')

@section('content')
    <div class="container">
        @can('create', \App\Models\Position::class)
            <a class="btn btn-primary btn-sm" href="{{route('positions.create')}}">Создать Должность</a>
        @endcan
        <br>
        <br>
        <h2>Список должностей</h2>
        @foreach ($positions as $position)
            <div class="row">
                <div class="col-sm-8">
                    @if(Auth::user()->role->title != \App\Models\Role::USER)
                    <p>{{$position->title}}: {{$position->salary}}
                        руб.</p>
                    @else
                        <p>{{$position->title}}</p>
                    @endif
                </div>
                @can('update', $position)
                    <div class="col-sm-offset-2">
                        <a class="btn btn-primary btn-sm"
                           href="{{route('positions.edit', $position)}}">Обновить</a>
                    </div>
                @endcan
                @can('delete', $position)
                    <div class="col-sm-2">
                        @include('position.delete_form')
                    </div>
                @endcan
            </div>
        @endforeach
    </div>

    {{$positions->render()}}
@endsection
