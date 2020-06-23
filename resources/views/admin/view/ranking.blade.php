@extends('../layouts.master')

@section('pwd', 'Insert')

@section('url', url('/perhitungan') )

@section('icon', 'icon-user')

@section('now', 'Perhitungan')

@section('view', 'active')

@section('content')
    @foreach ($data as $data)
        {{ $data }}
    @endforeach

@endsection