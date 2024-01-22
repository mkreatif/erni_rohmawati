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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Kode
                                Distributor</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                                    <option value="" disabled selected>Pilih Kode Distributor</option>
                                    <?php foreach ($dis_options as $key => $value) {?>
                                    <option value="<?=$key;?>"><?=$key;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-4 col-form-label col-form-label-sm">Distributor</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-4 col-form-label col-form-label-sm">Perusahaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Jarak</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-4 col-form-label col-form-label-sm">Estimasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-4 col-form-label col-form-label-sm">Kapasitas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Biaya</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Skill</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Nilai
                                Akhir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Rank</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    placeholder="">
                            </div>
                        </div>
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
                    <th>KODE DISTRIBUTOR</th>
                    <th>NAMA</th>
                    <th>PERUSAHAAN</th>
                    <th>JARAK</th>
                    <th>ESTIMASI</th>
                    <th>KAPASITAS</th>
                    <th>BIAYA</th>
                    <th>SKILL</th>
                    <th>JUMLAH</th>
                    <th>RANK</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($db_entries as $entry) {?>
                <tr>
                    <td><?=$entry->kode_distributor;?></td>
                    <td><?=$entry->nama;?></td>
                    <td><?=$entry->perusahaan;?></td>
                    <td><?=$entry->N1?></td>
                    <td><?=$entry->N2?></td>
                    <td><?=$entry->N3?></td>
                    <td><?=$entry->N4?></td>
                    <td><?=$entry->N5?></td>
                    <td><?=$entry->N_akhir;?></td>
                    <td><?=$entry->N_ket;?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </Section>
</div>