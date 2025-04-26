@extends('client.layouts.app')

@section('title', 'paramaitre')


@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/templateSettings.css') }}"> 
@endsection

@section('content')

<div class="profil-settings">
    <div class="setting-p">
    @include('client.components.modal.edit-profil-modal', ['user' => $user])
    @include('client.components.modal.edit-password-modal', ['user' => $user])
        <div class="card-p1">
            <div class="card-p">
                <div class="left-container">
                  <img class="avatarP" src="{{ $user->avatar ? asset('storage/public/avatars/' . basename($user->avatar)) : asset('img/noprofil.jpg') }}" alt="Profile Image">
                  <h2 class="gradienttext">{{$user->name}}</h2>
                  
                </div>
                <div class="right-container">
                  <h3 class="gradienttext">Détails du profil</h3>
                  <table class="tab">
                      <tr>
                          <td>Nom {{$user->role}} :</td>
                          <td>{{$user->name}}</td>
                        </tr>
                    
                    <tr>
                      <td>Numéro du téléphone:</td>
                      <td>{{$user->num_tel}}</td>
                    </tr>
                    <tr>
                      <td>Email :</td>
                      <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                      <td>Addresse :</td>
                      <td>{{$user->adresse}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"> <h3 class="gradienttext">Modifier Profil</h3></td>
                    </tr>
                    <tr>
                        <td><button class="btn btn--primary" data-modal-target="modal-edit-profil-{{ $user->id }}"><i class="ri-pencil-fill"></i> Profil</button></td>
                        <td><button class="btn btn--primary" data-modal-target="modal-edit-password-{{ $user->id }}"><i class="ri-pencil-fill"></i> Mot de Passe</button></td>
                    </tr>
                  </table>
                  <div class="d-flex " style=" align-items: center; gap:10px;">
                    
                    
                    
                  </div>

                </div>
              </div>
        </div>
</div>
   </div>

@endsection
