{{-- mon code app --}}

@extends('layouts.base')

@section('content')

    @include('partials.header')
    @yield('ChildContent')
    @include('partials.footer')

@endsection
