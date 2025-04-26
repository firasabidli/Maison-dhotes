@extends('client.layouts.app')

@section('title', 'Accueil')

@section('content')
    {{-- Tu mets ici tout ce qui était dans le `body` après le navbar --}}
    
    {{-- Carousel --}}
    @include('client.sections.home.carousel')

    {{-- About us --}}
    @include('client.sections.home.about')

    {{-- Categories --}}
    @include('client.sections.home.categories')

    {{-- Maisons les plus demandées --}}
    @include('client.sections.home.maison-populaire')
@endsection
