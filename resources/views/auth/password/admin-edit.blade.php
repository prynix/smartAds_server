@extends('admin-master')

@section('title','Change Password')

@section('head-footer')
    <link href="{{asset('css/change-info.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @include('auth.password.partials.password-edit-form',['url'=>'admin/password','home'=>'admin'])
@endsection