<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><?= $title; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         <!-- Navbar items on the right -->
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" id="sign-out" href="#" style="padding:0px;">
                    <img src="<?=base_url('assets/images/close.png')?>" alt="arrow_back"
                        style="width:30px; height:auto;" />
                </a>
            </li>
        </ul>
    </nav>

    <Section>
        <div class="row justify-content-center mt-4">
            <div class="col-md-2">
                <div class="card card-dashboard" onclick="toggleCardClass(0)">
                    <img class="card-img-top" src="<?=base_url("assets/images/icon_data_distributor.png");?>"
                        alt="image_d1" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Data Distributor</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-dashboard" onclick="toggleCardClass(1)">
                    <img class="card-img-top" src="<?=base_url("assets/images/icon_data_perhitungan.png");?>"
                        alt="image_d2" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Data Perhitungan</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-dashboard" onclick="toggleCardClass(2)">
                    <img class="card-img-top" src="<?=base_url("assets/images/icon_eigen_vector.png");?>"
                        alt="image_d3" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Eigen Vektor</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-dashboard"onclick="toggleCardClass(3)">
                    <img class="card-img-top" src="<?=base_url("assets/images/icon_criteria.png");?>"
                        alt="image_d1" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Kriteria</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-dashboard" onclick="toggleCardClass(4)">
                    <img class="card-img-top" src="<?=base_url("assets/images/icon_recomendation_route.png");?>"
                        alt="image_d2" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Rekomendasi Jalur</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-dashboard" onclick="toggleCardClass(5)">
                    <img class="card-img-top" src="<?=base_url("assets/images/icon_input_bobot_kriteria.png");?>"
                        alt="image_d3" />
                    <div class="card-body">
                        <h5 class="card-title text-center">Bobot Kriteria</h5>
                    </div>
                </div>
            </div>
        </div>
    </Section>
</div> 