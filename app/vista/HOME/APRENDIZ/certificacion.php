<main id="main" class="main">

    <section class="section">

        <div class="card">
            <div class="card-header">
                <b style="font-size:20px;">CERTIFICACION</b>
            </div>

            <div class="card-body">

                <br><br>
                <div class="row">
                    <div class="col-6">
                        <b>DOCUMENTO DE IDENTIDAD</b>
                    </div>
                    <div class="col-6">
                        <div class="file-upload" id="fileDI">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">CARGAR</div>
                                <div class="file-select-name" id="noFile1">Ningun Archivo Seleccionado</div>
                                <input type="file" name="certificacion_DI" id="certificacion_DI">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <b>BITACORA</b>
                    </div>
                    <div class="col-6">
                        <div class="file-upload" id="fileBitacora">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">CARGAR</div>
                                <div class="file-select-name" id="noFile2">Ningun Archivo Seleccionado</div>
                                <input type="file" name="certificacion_Bitacora" id="certificacion_Bitacora">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <b>CONSTANCIA DE PRACTICAS</b>
                    </div>
                    <div class="col-6">
                        <div class="file-upload" id="fileConstancia">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">CARGAR</div>
                                <div class="file-select-name" id="noFile3">Ningun Archivo Seleccionado</div>
                                <input type="file" name="certificacion_ConstanciaP" id="certificacion_ConstanciaP">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <b>CARNET DESTRUIDO</b>
                    </div>
                    <div class="col-6">
                        <div class="file-upload" id="fileCarnet">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">CARGAR</div>
                                <div class="file-select-name" id="noFile4">Ningun Archivo Seleccionado</div>
                                <input type="file" name="certificacion_CarnetD" id="certificacion_CarnetD">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">
                <input type="button" value="ENVIAR" class="btn btn-success" id="EnviarCertificacion" disabled style="display:none;">
                <input type="button" value="ACTUALIZAR" class="btn btn-success" id="ActualizarCertificacion" disabled style="display:none;">
            </div>
        </div>


    </section>
</main><!-- End #main -->