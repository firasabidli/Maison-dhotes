
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">Dashboard</h2>
                   
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Catégories</h5>
                                <h1>{{count($categories)}}</h1>
                            </div>
                            <i class="ri-home-gear-fill card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i></span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i></span>
                        </div>
                    </div>
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Maisons</h5>
                                <h1>{{count($maisons)}}</h1>
                            </div>
                            <i class="ri-home-heart-fill card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i></span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i></span>
                        </div>
                    </div>
                    <div class="card card-4">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Utilisateurs</h5>
                                <h1>{{count($users)}}</h1>
                            </div>
                            <i class="ri-group-2-fill card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i></span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i></span>
                        </div>
                    </div>
                    <div class="card card-3">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Proprietaires</h5>
                                <h1>{{count($usersP)}}</h1>
                            </div>
                            <i class="ri-presentation-fill card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i></span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i></span>
                        </div>
                    </div>
                    <div class="card card-5">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Clients</h5>
                                <h1>{{count($usersC)}}</h1>
                            </div>
                            <i class="ri-user-follow-fill card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i></span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i></span>
                        </div>
                    </div>
                </div>
            </div>

