<script>
    var dis_option_ci = <?php echo json_encode($dis_options); ?>;
    var dbentries = <?php echo json_encode($db_entries); ?>;
    var count = 0;
    if (dbentries.length > 0) {
        var lastElement = dbentries[dbentries.length - 1];
        count = getNumericFromStr(lastElement.id);
    }
    if(count==0){
        count++;
    }
    var generateSerialID = generateSerialID('DS', count);
</script>
<!-- Main Content -->
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
            <form id="formDistributor">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kode
                        Distributor</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="kode"
                            placeholder="Kode Distributor">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Distributor</label>
                    <div class="col-sm-5">
                        <select class="form-control form-control-sm" id="distributor" required>
                            <option value="" disabled selected>Pilih Distributor</option>
                            <?php foreach ($dis_options as $key => $value) {?>
                            <option value="<?=$key;?>"><?=$key;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Perusahaan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="nama" placeholder="Nama Perusahaan"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No Telepon</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="no_tlp" placeholder="081234567890" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                    <div class="col-sm-5">
                        <textarea name="alamat" id="alamat" cols="30" rows="4" placeholder="Alamat"
                            class="form-control form-control-sm" required></textarea>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <input id="generalSubmitBtn" class="btn btn-success btn-sm btn-block" type="submit"
                                value="Simpan" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalDeleteBtn" class="btn btn-danger btn-sm btn-block" type="button"
                                value="Delete" />
                        </div>
                        <div class="col-md-2">
                            <input id="generalEdit" class="btn btn-primary btn-sm btn-block" type="button"
                                value="Edit" />
                        </div>
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
                    <th>ID</th>
                    <th>DISTRIBUTOR</th>
                    <th>NAMA</th>
                    <th>NO.TELEPON</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($db_entries as $entry) {?>
                <tr id="<?= $entry->id;?>">
                    <td><?= $entry->id;?></td>
                    <td><?= $entry->distributor;?></td>
                    <td><?= $entry->nama;?></td>
                    <td><?= $entry->no_tlp;?></td>
                    <td><?= $entry->alamat;?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </Section>
</div>