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
        </ul>
    </nav>

    <Section class="mt-2">
        <div class="card p-3">
            <h4>Form <?= $title?></h4>
            <hr />
            <form id="formEigenVektor">

                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Kriteria</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm" id="nama" required>
                            <option value="" disabled selected>Pilih Nama Kriteria</option>
                            <?php foreach ($default_kriteria as $value) {?>
                            <option value="<?=$value['name'];?>"><?=$value['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <?php for ($i=1; $i <=5 ; $i++) { ?>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">A<?=$i?></label>
                    <div class="col-sm-5">
                        <input type="number" min="0" max="1" class="form-control form-control-sm" id="N<?=$i?>" step="0.001" required />
                    </div>
                </div>
                <?php }?>

                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> Prioritas</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="prioritas" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Eigen Vektor</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="N_akhir" readonly>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <input id="generalKalkulasi" class="btn btn-info btn-sm btn-block" type="button"
                                value="Submit" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalSubmitBtn" class="btn btn-success btn-sm btn-block" type="submit"
                                value="Simpan" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalDeleteBtn" class="btn btn-danger btn-sm btn-block" type="button"
                                value="Delete" />
                        </div>
                        <!-- <div class="col-md-2">
                            <input id="generalEdit" class="btn btn-primary btn-sm btn-block" type="button"
                                value="Edit" />
                        </div> -->
                        <div class="col-md-2">
                            <input id="generalClear" class="btn btn-secondary btn-sm btn-block" type="button"
                                value="Clear Form" />
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
                    <th>NAMA</th>
                    <th>A1</th>
                    <th>A2</th>
                    <th>A3</th>
                    <th>A4</th>
                    <th>A5</th>
                    <th>Prioritas</th>
                    <th>Eigen Vektor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($db_entries as $entry) {?>
                <tr id="<?= $entry->id?>">
                    <td><?= $entry->nama;?></td>
                    <td><?= $entry->N1?></td>
                    <td><?= $entry->N2?></td>
                    <td><?= $entry->N3?></td>
                    <td><?= $entry->N4?></td>
                    <td><?= $entry->N5?></td>
                    <td><?= $entry->prioritas;?></td>
                    <td><?= $entry->N_akhir?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </Section>
</div>