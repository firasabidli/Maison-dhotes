@extends('admin.layouts.content')

@section('title', 'Dashboard')

@section('page-content')
    @include('admin.components.alert')
    @include('admin.components.overview',  ['maisons' => $maisons, 'categories' => $categories, 'users' => $users, 'usersP' => $usersP, 'usersC' => $usersC])
    @include('admin.components.maisonsPopulaire', ['maisonsPopulaire' => $maisonsPopulaire])
    
@endsection