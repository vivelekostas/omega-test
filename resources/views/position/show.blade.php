@extends('layouts.app')

@section('title', $position->title)

@section('content')
    <div>
        <p>
            Дожность: {{$position->title}} <br>
            Зарплата: {{$position->salary}}
        </p>
    </div>
@endsection
