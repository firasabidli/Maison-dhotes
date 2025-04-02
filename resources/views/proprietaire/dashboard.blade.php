@extends('proprietaire.layouts.content')

@section('title', 'Dashboard')

@section('page-content')
    @include('proprietaire.components.overview')
    @include('proprietaire.components.doctors')
    @include('proprietaire.components.patients')
@endsection