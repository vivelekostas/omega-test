@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($position, ['url' => route('positions.update', $position), 'method' => 'PATCH']) }}
        @include('position.form')
        {{ Form::hidden('position_id', $position->id) }}
        {{ Form::submit('Обновить') }}
        {{ Form::close() }}
    </div>
@endsection
