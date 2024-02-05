<script>
function getDefaultMetrix() {
    return [
        [1, 0, 0, 0, 0],
        [0, 1, 0, 0, 0],
        [0, 0, 1, 0, 0],
        [0, 0, 0, 1, 0],
        [0, 0, 0, 0, 1],
    ];
}

let metrix = getDefaultMetrix();
</script>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

    <Section class="my-3">
        <div class="card p-2">
            <div class="row">
                <div class="col-md-8">
                    <form id="matrix">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2"></th>
                                <th>A1</th>
                                <th>A2</th>
                                <th>A3</th>
                                <th>A4</th>
                                <th>A5</th>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < 5; $i++) {$subs = $main_kriteria[$i];
    $renderInput = false;?>
                                <tr>
                                    <td><?=$subs[0]?></td>
                                    <td width="50"><?=$subs[1]?></td>
                                    <!-- This for is for rendering html Objec -->
                                    <?php for ($j = 2; $j < 7; $j++) {?>
                                    <td><input type="number" step="0.001"
                                            class="form-control <?=$renderInput == true ? 'metrix' : '';?>"
                                            id="<?=$i . "_" . ($j - 2);?>" value="<?=$subs[$j];?>"
                                            <?=$renderInput == false ? "readonly" : "";?> /></td>
                                    <?php if ($subs[$j] == 1) {$renderInput = true;}}?>
                                </tr>
                                <?php }?>

                                <tr>
                                    <td colspan="2">Jml Baris</td>
                                    <?php for ($i = 0; $i < 5; $i++) {?>
                                    <td><input class="form-control" type="text" id="add_<?=$i;?>" readonly /></td>
                                    <?php }?>

                                </tr>

                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nilai Eigen</th>
                            <th>Rata-rata Eigen</th>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 5; $i++) {?>
                            <tr>
                                <td><input class="form-control" type="text" id="eigen_<?=$i;?>" readonly /></td>
                                <td><input class="form-control" type="text" id="average_<?=$i;?>" readonly /></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </Section>
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card  p-2">
                    <h4>Nilai Consistency Ratio (CR)</h4>
                    <table>
                        <tbody>
                            <tr>
                                <td>CI (Consistency Index)</td>
                                <td><input class="form-control" type="text" id="nilai_ci" readonly /></td>
                            </tr>
                            <tr>
                                <td>RI (Random Index) untuk n=5 (jumlah kriteria)</td>
                                <td><input class="form-control" type="text" id="nilai_ri" readonly /></td>
                            </tr>
                            <tr>
                                <td>CR (Consistency Ratio)</td>
                                <td><input class="form-control" type="text" id="nilai_cr" readonly /></td>
                            </tr>
                            <tr>
                                <td>Keputusan Rasio</td>
                                <td><input class="form-control" type="text" id="keputusan" readonly /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card p-2">
                    <div class="btn btn-primary btn-sm" id="btnHitung">Hitung</div><br />
                    <div class="btn btn-secondary btn-sm" id="btnReset">Reset</div>
                </div>
            </div>
        </div>
    </section>
</div>