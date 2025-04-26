<div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtre par Prix</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('maisonList.maisonList') }}" method="GET">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" name="prix[]" class="custom-control-input" {{ $filtre=='non'? 'checked' : '' }} id="price-all" value="">
                         <label class="custom-control-label" for="price-all">Tous</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('0-50', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-1" value="0-50">
                            <label class="custom-control-label" for="price-1">0DTN - 50DTN</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('50-100', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-2" value="50-100">
                            <label class="custom-control-label" for="price-2">50DTN - 100DTN</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]"{{ is_array(request()->prix) && in_array('100-200', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-3" value="100-200">
                            <label class="custom-control-label" for="price-3">100DTN - 200DTN</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('200-300', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-4" value="200-300">
                            <label class="custom-control-label" for="price-4">200DTN - 300DTN</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('300-400', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-5" value="300-400">
                            <label class="custom-control-label" for="price-5">300DTN - 400DTN</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('400-500', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-6" value="400-500">
                            <label class="custom-control-label" for="price-6">400DTN - 500DTN</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                        <div style="text-align:center; margin-top:20px">
                            <button class="btn btn--primary w-100"  type="submit"> Filtrer </button>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Ville Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtre par Ville</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('maisonList.maisonList') }}" method="GET" class="form-scroll" id="maison-filter-form" >
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" value="" class="custom-control-input"  {{ $filtre=='non'? 'checked' : '' }} id="ville-all"   >
                                <label class="custom-control-label" for="ville-all">Tous</label>
                                <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="villes-container">
                            <!-- Colonne 1 -->
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="tunis"  {{  in_array('Tunis', request()->input('villes', [])) ? 'checked' : '' }}  value="Tunis">
                                <label class="custom-control-label" for="tunis">Tunis</label>
                                <span class="badge border font-weight-normal">150</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="sfax"  {{  in_array('Sfax', request()->input('villes', [])) ? 'checked' : '' }} value="Sfax">
                                <label class="custom-control-label" for="sfax">Sfax</label>
                                <span class="badge border font-weight-normal">120</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="sousse"  {{  in_array('Sousse', request()->input('villes', [])) ? 'checked' : '' }} value="Sousse">
                                <label class="custom-control-label" for="sousse">Sousse</label>
                                <span class="badge border font-weight-normal">110</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="kairouan"  {{  in_array('Kairouan', request()->input('villes', [])) ? 'checked' : '' }}   value="Kairouan">
                                <label class="custom-control-label" for="kairouan">Kairouan</label>
                                <span class="badge border font-weight-normal">90</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="bizerte"  {{  in_array('Bizerte', request()->input('villes', [])) ? 'checked' : '' }}   value="Bizerte">
                                <label class="custom-control-label" for="bizerte">Bizerte</label>
                                <span class="badge border font-weight-normal">85</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="gabes"  {{  in_array('Gabès', request()->input('villes', [])) ? 'checked' : '' }}  value="Gabès">
                                <label class="custom-control-label" for="gabes">Gabès</label>
                                <span class="badge border font-weight-normal">80</span>
                            </div>
                            
                            <!-- Colonne 2 -->
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="ariana"  {{  in_array('Ariana', request()->input('villes', [])) ? 'checked' : '' }}  value="Ariana">
                                <label class="custom-control-label" for="ariana">Ariana</label>
                                <span class="badge border font-weight-normal">75</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="monastir"  {{  in_array('Monastir', request()->input('villes', [])) ? 'checked' : '' }} value="Monastir">
                                <label class="custom-control-label" for="monastir">Monastir</label>
                                <span class="badge border font-weight-normal">70</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="nabeul"  {{  in_array('Nabeul', request()->input('villes', [])) ? 'checked' : '' }}  value="Nabeul">
                                <label class="custom-control-label" for="nabeul">Nabeul</label>
                                <span class="badge border font-weight-normal">65</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="beja"  {{  in_array('Béja', request()->input('villes', [])) ? 'checked' : '' }}  value="Béja">
                                <label class="custom-control-label" for="beja">Béja</label>
                                <span class="badge border font-weight-normal">60</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="jendouba"  {{  in_array('Jendouba', request()->input('villes', [])) ? 'checked' : '' }}  value="Jendouba">
                                <label class="custom-control-label" for="jendouba">Jendouba</label>
                                <span class="badge border font-weight-normal">55</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="kef"  {{  in_array('Le Kef', request()->input('villes', [])) ? 'checked' : '' }}  value="Le Kef">
                                <label class="custom-control-label" for="kef">Le Kef</label>
                                <span class="badge border font-weight-normal">50</span>
                            </div>
                            
                            <!-- Colonne 3 -->
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="mahdia"  {{  in_array('Mahdia', request()->input('villes', [])) ? 'checked' : '' }}  value="Mahdia">
                                <label class="custom-control-label" for="mahdia">Mahdia</label>
                                <span class="badge border font-weight-normal">45</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="medenine"  {{  in_array('Médenine', request()->input('villes', [])) ? 'checked' : '' }}  value="Médenine">
                                <label class="custom-control-label" for="medenine">Médenine</label>
                                <span class="badge border font-weight-normal">40</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="tataouine"  {{  in_array('Tataouine', request()->input('villes', [])) ? 'checked' : '' }}  value="Tataouine">
                                <label class="custom-control-label" for="tataouine">Tataouine</label>
                                <span class="badge border font-weight-normal">35</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="tozeur"  {{  in_array('Tozeur', request()->input('villes', [])) ? 'checked' : '' }}  value="Tozeur">
                                <label class="custom-control-label" for="tozeur">Tozeur</label>
                                <span class="badge border font-weight-normal">30</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="kebili"  {{  in_array('Kébili', request()->input('villes', [])) ? 'checked' : '' }}  value="Kébili">
                                <label class="custom-control-label" for="kebili">Kébili</label>
                                <span class="badge border font-weight-normal">25</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="zaghouan"  {{  in_array('Zaghouan', request()->input('villes', [])) ? 'checked' : '' }}  value="Zaghouan">
                                <label class="custom-control-label" for="zaghouan">Zaghouan</label>
                                <span class="badge border font-weight-normal">20</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="benarous"  {{  in_array('Ben Arous', request()->input('villes', [])) ? 'checked' : '' }} value="Ben Arous">
                                <label class="custom-control-label" for="benarous">Ben Arous</label>
                                <span class="badge border font-weight-normal">15</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="manouba"  {{  in_array('La Manouba', request()->input('villes', [])) ? 'checked' : '' }}  value="La Manouba">
                                <label class="custom-control-label" for="manouba">La Manouba</label>
                                <span class="badge border font-weight-normal">10</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="seliana"  {{  in_array('Siliana', request()->input('villes', [])) ? 'checked' : '' }}  value="Siliana">
                                <label class="custom-control-label" for="seliana">Siliana</label>
                                <span class="badge border font-weight-normal">8</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="gafsa"  {{  in_array('Gafsa', request()->input('villes', [])) ? 'checked' : '' }}  value="Gafsa">
                                <label class="custom-control-label" for="gafsa">Gafsa</label>
                                <span class="badge border font-weight-normal">6</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="sidi"  {{  in_array('Sidi Bouzid', request()->input('villes', [])) ? 'checked' : '' }}  value="Sidi Bouzid">
                                <label class="custom-control-label" for="sidi">Sidi Bouzid</label>
                                <span class="badge border font-weight-normal">5</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="djerba"  {{  in_array('Djerba', request()->input('villes', [])) ? 'checked' : '' }}  value="Djerba">
                                <label class="custom-control-label" for="djerba">Djerba</label>
                                <span class="badge border font-weight-normal">3</span>
                            </div>
                        </div>
                        
                    </form>

                    <div style="text-align:center; margin-top:20px; ">
                            <button class="btn btn--primary w-100"  type="submit" form="maison-filter-form"> Filtrer </button>
                        </div>
                </div>
                <!-- Ville End -->

                
            </div>