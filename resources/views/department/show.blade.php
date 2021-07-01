@extends('layouts.app')

@section('title', $department->title)

@section('content')
    <div>
        <p>{{$department->title}}</p>
    </div>
@endsection
