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
            <form id="formKriteria">

                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kode Kriteria</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm" id="K_kriteria">
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
                        <select class="form-control form-control-sm" id="N_kriteria">
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
                        <select class="form-control form-control-sm" id="P_kriteria">
                            <option value="" disabled selected>Pilih Nilai Bobot Preferensi</option>
                            <?php foreach ($option_bobot as $value) {?>
                            <option value="<?=$value;?>"><?=$value;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

               <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <input id="generalSubmitBtn" class="btn btn-success btn-sm btn-block" type="submit" value="Simpan" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalDeleteBtn" class="btn btn-danger btn-sm btn-block" type="button" value="Delete" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalEdit" class="btn btn-primary btn-sm btn-block" type="button" value="Edit" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalClear" class="btn btn-secondary btn-sm btn-block" type="button" value="Clear Form" />
                        </div>
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
                <tr id="<?= $entry->id?>">
                    <td><?= $entry->k_kriteria;?></td>
                    <td><?= $entry->n_kriteria;?></td>
                    <td><?= $entry->p_kriteria;?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </Section>
</div>