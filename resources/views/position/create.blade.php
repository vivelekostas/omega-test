@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($position, ['url' => route('positions.store')]) }}
        @include('position.form')
        {{ Form::submit('Создать') }}
        {{ Form::close() }}
    </div>
@endsection

