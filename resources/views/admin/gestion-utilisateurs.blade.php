@extends('admin.layouts.content')

@section('title', "Gestion des utilisateurs")

@section('page-content')


@include('admin.components.users.modal.create-modal')



<div class="recent--patients">
@include('admin.components.alert')
    <div class="title">
        <h2 class="section--title">Gestion des utilisateurs</h2>
        <button class="add" data-modal-target="modal-ajout"><i class="ri-add-line"></i> Ajouter un utilisateur</button>
        
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Nom</th>
                    <th>email</th>
                    <th>Numéro de téléphone</th>
                    <th>Adresse</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr>

                        <td>{{ $user->id }}</td>
                        <td><img src="{{ $user->avatar ? asset('storage/public/avatars/' . basename($user->avatar)) : asset('img/noprofil.jpg') }}" style="width:50px;height:50px; border-radius:50%; " alt="avatar-{{$user->id}}"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->num_tel }}</td>
                        <td>{{ $user->adresse }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <span>
                                <i class="ri-edit-line edit" data-modal-target="modal-edit-{{ $user->id }}"></i>
                                <i class="ri-delete-bin-line delete" data-modal-target="modal-delete-{{ $user->id }}"></i>
                            </span>
                        </td>

                    </tr>
                    @include('admin.components.users.modal.edit-modal', ['user' => $user])
                    @include('admin.components.users.modal.delete-modal', ['user' => $user])
                @endforeach
            </tbody>
        </table>
        
    </div>
   
</div>

@endsection


