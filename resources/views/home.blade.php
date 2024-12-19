@extends('layouts.dashboard')

@section('content')
    <h1>Bienvenido, {{ $user->nombre }} {{ $user->apellido_paterno }}</h1>
@endsection