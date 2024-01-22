<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#"><?=$title;?></a>

        <!-- Navbar items on the right -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('dashboard')?>" style="padding:0px;">
                    <img src="<?=base_url('assets/images/arrow_back.png')?>" alt="arrow_back"
                        style="width:30px; height:auto;" />
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="<?=base_url('assets/images/close.png')?>" alt="arrow_back" />
                </a>
            </li> -->
        </ul>
    </nav>

    <Section class="mt-2">
        <div class="card p-3">
            <h4>Form <?= $title?></h4>
            <hr />
            <form action="#">

                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kode Kriteria</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Pilih Kode Kriteria</option>
                            <?php foreach ($option_kode as$value) {?>
                            <option value="<?=$value;?>"><?=$value;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Kriteria</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Pilih Nama Kriteria</option>
                            <?php foreach ($option_nama as $value) {?>
                            <option value="<?=$value;?>"><?=$value;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nilai Bobot
                        Preferensi</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Pilih Nilai Bobot Preferensi</option>
                            <?php foreach ($option_bobot as $value) {?>
                            <option value="<?=$value;?>"><?=$value;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col md-12">
                        <input id="generalSubmitBtn" class="btn btn-success btn-sm" type="submit" value="Simpan" />
                        <input id="generalDeleteBtn" class="btn btn-danger btn-sm" type="button" value="Delete" />
                        <input id="generalEdit" class="btn btn-primary btn-sm" type="button" value="Edit" />
                    </div>
                </div>
            </form>
        </div>

    </Section>

    <Section class="my-4">
        <table id="GeneralDataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>KODE KRITERIA</th>
                    <th>NAMA KRITERIA</th>
                    <th>PREFERENSI BOBOT</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($db_entries as $entry) {?>
                <tr>
                    <td><?= $entry->K_kriteria;?></td>
                    <td><?= $entry->N_kriteria;?></td>
                    <td><?= $entry->P_kriteria;?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </Section>
</div>