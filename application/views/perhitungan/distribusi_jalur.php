<!-- global variable -->
<script> 
var generateSerialID = generateSerialID('DS', <?= count($db_entries)+1   ;?>);
</script>

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
    <section class="mt-4">
        <div class="row">
            <div class="col-md-2 ml-auto">
                <button id="value-barchart" class="btn btn-block btn-primary btn-sm">Value Barchart</button>
            </div>
            <div class="col-md-2">
                <button id="barchart" class="btn btn-block btn-secondary btn-sm">Barchart</button>
            </div>
        </div>

    </section>

    <Section class="my-4">
        <table id="RekomendasiJalurDataTable" class="table table-striped table-bordered" style="width:100%">
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
                <tr id="<?=$entry->id;?>">
                    <td><?=$entry->kode_distributor;?></td>
                    <td><?=$entry->nama;?></td>
                    <td><?=$entry->distributor;?></td>
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

    <!-- This Modal Used For Rendering Chart-->
    <div class="modal" id="modal-chart">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 id="modalChartTitle" class="modal-title">
                        <!-- Modal Title -->
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" id="modalChartBody">
                    <canvas id="myChart" width="1000" height="400"></canvas>
                </div>

            </div>
        </div>
    </div>
</div>