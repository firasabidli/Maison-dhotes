@extends('admin.layouts.content')

@section('title', 'Dashboard')

@section('page-content')
    @include('admin.components.overview')
    @include('admin.components.doctors')
    @include('admin.components.patients')
@endsection