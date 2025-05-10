@extends('admin.layouts.content')

@section('title', "Contrôle des avis maisons")

@section('page-content')






<div class="recent--patients">
@include('admin.components.alert')
    <div class="title">
        <h2 class="section--title">Contrôle des avis maisons</h2>
       
    </div>
    <div class="table">
        <table>
            <thead>
            <tr>
                
                <th>Nom Utilisateur</th>
                <th>Email Utilisateur</th>
                <th>Maison d'Hôte</th>
                <th>Adresse Maison d'Hôte</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($avis as $a)
                    <tr>
                        
                        <td >{{ $a->user->name }}</td>
                        <td >{{ $a->user->email }}</td>
                        <td >{{ $a->maison->nom }}</td>
                        <td >{{ $a->maison->adresse . ' ' . $a->maison->ville }}</td>
                        <td >{{ $a->note }}</td>
                        <td >{{ $a->commentaire }}</td>
                        <td >{{ $a->created_at }}</td>
                        <td>
                            <span>
                                <i class="ri-delete-bin-line delete" data-modal-target="modal-delete-{{ $a->id }}"></i>
                            </span>
                        </td>

                    </tr>
                   @include('admin.components.avis.modal.delete-modal', ['avis' => $a])
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- Pagination Laravel -->
    {{ $avis->links() }}
</div>

@endsection


