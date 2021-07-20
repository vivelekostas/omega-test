@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($department, ['url' => route('departments.update', $department), 'method' => 'PATCH']) }}
        @include('department.form')
        {{ Form::hidden('department_id', $department->id) }}
        {{ Form::submit('Обновить') }}
        {{ Form::close() }}
    </div>
@endsection
