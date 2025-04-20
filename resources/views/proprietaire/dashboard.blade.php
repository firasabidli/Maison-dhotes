@extends('proprietaire.layouts.content')

@section('title', 'Dashboard')

@section('page-content')
    @include('proprietaire.components.alert')
    @include('proprietaire.components.overview',  ['maisons' => $maisons, 'categories' => $categories, 'reservations' => $reservations,])
    @include('proprietaire.components.maisonsPopulaire', ['maisonsPopulaire' => $maisonsPopulaire])
    @include('proprietaire.components.clients', ['reservations' => $reservations])
@endsection