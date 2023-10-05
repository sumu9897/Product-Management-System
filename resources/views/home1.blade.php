@extends('layouts.app')

@section('content')

<h4>Admin Page</h4>
<h1>Home : {{ Auth::user()->name }}</h1>


@endsection