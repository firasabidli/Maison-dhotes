@extends('proprietaire.layouts.content')

@section('title', "Maison d'Hôtes")

@section('page-content')


@include('proprietaire.components.maisons.modal.create-modal')



<div class="recent--patients">
@include('proprietaire.components.alert')
    <div class="title">
        <h2 class="section--title">Maison d'Hôtes</h2>
        <button class="add" data-modal-target="modal-ajout"><i class="ri-add-line"></i> Ajouter Maison d'Hôtes</button>
        
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Description</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Prix par nuit</th>
                    <th>Capacite</th>
                    
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody>
            @foreach($maisons as $maison)
                    <tr>

                        <td>{{ $maison->id }}</td>
                        <td>{{ $maison->nom }}</td>
                        <td>{{ $maison->category_id }}</td>
                        <td>
                            {{ strlen($maison->description) > 40 ? substr($maison->description, 0, 40) . '...' : $maison->description }}
                        </td>

                        <td>{{ $maison->ville }}</td>
                        <td>{{ $maison->adresse }}</td>
                        <td>{{ $maison->prix_par_nuit }}</td>
                        <td>{{ $maison->capacite }}</td>
                        <td>
                            <span>
                                <i class="ri-edit-line edit" data-modal-target="modal-edit-{{ $maison->id }}"></i>
                                <i class="ri-delete-bin-line delete" data-modal-target="modal-delete-{{ $maison->id }}"></i>
                            </span>
                        </td>

                    </tr>
                    @include('proprietaire.components.maisons.modal.edit-modal', ['maison' => $maison])
                    @include('proprietaire.components.maisons.modal.delete-modal', ['maison' => $maison])
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- Pagination Laravel -->
    {{ $maisons->links() }}
</div>

@endsection


