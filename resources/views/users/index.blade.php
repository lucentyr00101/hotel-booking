@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->fullName }}</li>
        @endforeach
    </ul>
@endsection