@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($department, ['url' => route('departments.store')]) }}
        @include('department.form')
        {{ Form::submit('Создать') }}
        {{ Form::close() }}
    </div>
@endsection
