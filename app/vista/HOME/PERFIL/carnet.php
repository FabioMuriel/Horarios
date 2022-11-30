<main class="main" id="main">
    <div class="content">
        <div class="container">
            <div class="wrapper-carnet">
                <div class="card card-carnet" style="width: 20rem;">
                    <div class="row">
                        <div class="col-4">
                            <img class="logo " src="public/assets/img/logo-sena.png" style="width:80px;" alt="...">
                        </div>

                        <div class="col-4">
                            <img class="perfil" src="public/assets/img/usuario.png" style="width:150px;" alt="...">
                        </div>

                        <div class="col-4">
                            <p class="rol"><?php echo $cargo ?></p>
                        </div>

                        <hr id="divisor">
                        <div class="col-12 body-card">
                            <p id="nombres"><?php echo  strtoupper($datos['nombres']); ?></p>
                            <p id="apellidos"><?php echo  strtoupper($datos['apellidos']); ?></p>
                            <?php
                            if ($cargo== "APRENDIZ") {
                            ?>
                                <h6 class="dni" style="text-align:center;">
                                   <?php echo $datos["tipo_documento_abreviatura"]; ?>
                                    <?php echo $datos["numero_documento"]; ?>
                                </h6>
                            <?php
                            } else {
                            ?>
                                <h6 class="dni" style="text-align:center;">CC <?php echo $datos["cedula"]; ?></h6>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        if ($cargo == "APRENDIZ") {
                        ?>
                            <label style="text-align:center;"> <?php echo $datos["programa"]; ?></label>
                            <label style="text-align:center;"> <?php echo $datos["ficha"]; ?></label>
                        <?php
                        }
                        ?>
                        <div class="col-12 codigo">
                            <svg class="barcode" jsbarcode-format="auto"
                            <?php
                            if ($cargo == "APRENDIZ") {
                            ?> jsbarcode-value="<?php echo $datos["numero_documento"]; ?>" 
                            <?php
                            } else {
                            ?> 
                            jsbarcode-value="<?php echo $datos["cedula"]; ?>"
                            <?php } ?> 
                            jsbarcode-textmargin="0" jsbarcode-fontoptions="bold">
                            </svg>
                        </div>
                        <br>
                        <div class="col-12 pie">
                            <p class="regional">Atlántico</p>
                            <p class="centro">Centro Nacional Colombo Alemán</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>