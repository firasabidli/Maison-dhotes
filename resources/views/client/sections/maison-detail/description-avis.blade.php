<div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Avis ({{ $maisondet->avis->count() }})</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Maison Description</h4>
                            <p>{{ $maisondet->description }}</p>
                          
                        </div>
                        
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">{{ $maisondet->avis->count() }} avis pour <strong>{{ $maisondet->nom }}</strong></h4>
                                    
                                    @forelse ($maisondet->avis as $avis)
                                        <div class="media mb-4">
                                            <img src="{{ $avis->user->avatar ? asset('storage/public/avatars/' . basename($avis->user->avatar)) : asset('img/noprofil.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>
                                                    {{ $avis->user->name ?? 'Utilisateur' }}
                                                    <small> - <i>{{ $avis->created_at->format('d M Y') }}</i></small>
                                                </h6>
                                                <div class="text--primary mb-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $avis->note)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p>{{ $avis->commentaire }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Aucun avis pour le moment.</p>
                                    @endforelse
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mb-4">Laisser un avis</h4>
                                    <small> Champ Obligatoire *</small>
                                    
                                    <form method="POST" action="{{ route('avis.store') }}">
                                    @csrf
                                        <input type="hidden" name="maison_id" value="{{ $maisondet->id }}">
    
                                        

                                        <div class="d-flex my-4 ">
                                            <p class="mb-0 mr-2">Votre Note *</p>
                                            <div class="star-rating d-flex flex-row-reverse justify-content-start">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <input type="radio" id="star{{ $i }}" name="note" value="{{ $i }}">
                                                    <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Votre Commentaire *</label>
                                            <textarea name="commentaire" id="commentaire"  cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                        
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Laisser un avis" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>