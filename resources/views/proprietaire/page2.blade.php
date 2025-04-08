@extends('proprietaire.layouts.content')

@section('title', 'Catégorie')

@section('page-content')


@include('proprietaire.components.modal')


<div class="recent--patients">
@include('proprietaire.components.alert')
    <div class="title">
        <h2 class="section--title">Catégories--Maison d'Hôtes</h2>
        <button class="add"><i class="ri-add-line"></i> Ajouter Catégorie</button>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                
                    <th>#</th>
                    <th>Nom</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->nom }}</td>
                        <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- Pagination Laravel -->
    {{ $categories->links() }}
</div>

@endsection


