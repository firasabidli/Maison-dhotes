@extends('proprietaire.layouts.content')

@section('title', 'Catégorie')

@section('page-content')


@include('proprietaire.components.categories.modal.create-modal')



<div class="recent--patients">
@include('proprietaire.components.alert')
    <div class="title">
        <h2 class="section--title">Catégories--Maison d'Hôtes</h2>
        <button class="add" data-modal-target="modal-ajout"><i class="ri-add-line"></i> Ajouter Catégorie</button>
        
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->nom }}</td>
                        <td>
                            <span>
                            @if ($category->cree_par == auth()->id())
                                <i class="ri-edit-line edit" data-modal-target="modal-edit-{{ $category->id }}"></i>
                                <i class="ri-delete-bin-line delete" data-modal-target="modal-delete-{{ $category->id }}"></i>
                            @else
                                <i class="ri-edit-line text-muted" style="cursor: not-allowed; opacity: 0.5;"></i>
                                <i class="ri-delete-bin-line text-muted" style="cursor: not-allowed; opacity: 0.5;"></i>
                            @endif
                            </span>
                        </td>

                    </tr>
                   @if ($category->cree_par == auth()->id())
                        @include('proprietaire.components.categories.modal.edit-modal', ['category' => $category])
                        @include('proprietaire.components.categories.modal.delete-modal', ['category' => $category])
                    @endif

                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- Pagination Laravel -->
    {{ $categories->links() }}
</div>

@endsection


