@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($user, ['url' => route('users.update', $user), 'method' => 'PATCH']) }}
        @include('user.form')
        {{ Form::submit('Обновить') }}
        {{ Form::close() }}
    </div>
@endsection
