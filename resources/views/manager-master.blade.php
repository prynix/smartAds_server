@extends('user-master')

@section('navbar')
    @include('partials.manager-navbar')
@endsection

@section('home',url('/manager'))