@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($user, ['url' => route('users.update', $user), 'method' => 'PATCH', 'files' => true]) }}
        @include('user.form')
        {{ Form::hidden('user_id', $user->id) }}
        {{ Form::submit('Обновить') }}
        {{ Form::close() }}
    </div>
@endsection
