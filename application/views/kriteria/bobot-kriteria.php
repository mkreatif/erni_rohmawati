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
                                <?php for ($i = 0; $i < 5; $i++) {$subs = $main_kriteria[$i]; $renderInput = false;?>
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
                                        <td><input class="form-control" type="text"  id="eigen_<?= $i;?>" readonly /></td>
                                        <td><input class="form-control" type="text"  id="average_<?= $i;?>" readonly /></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table> 
                </div>
            </div>

        </div>
    </Section>
</div>