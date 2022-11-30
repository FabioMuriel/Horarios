<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">PRODUCTOS &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalAgregarProducto">AGREGAR</button></h1>
        </div>
      </div>
    </div>
  </div>
 <!--modal de agregar producto-->
  <form action="" method="POST" id="AgregarProductos">
  <div class="modal fade" id="ModalAgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <b>PROGRAMA:</b> <select class="form-select" data-size="3" name="ProgramasP" id="ProgramasP">
                  </select>
                </div>
                <div class="col-12">
                  <b>CATEGORIA:</b> <input type="text" name="CategoriaP" id="CategoriaP" class="form-control" onkeyup="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                </div>
                <div class="col-12">
                  <b>PRODUCTO:</b> <input type="text" name="ProductoP" id="ProductoP" class="form-control" onkeyup="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                </div>
            </div>
            <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<div class="card">
    <div class="card-body">
        <br>
        <div class="table-responsive">
            <table class="table" id="tablaProductos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PROGRAMA</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      </div>
      </div>
      
       <form action="" method="POST" id="EditarProductos">
  <div class="modal fade" id="ModalEditarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <b>PROGRAMA:</b> <select class="form-select" data-size="3" name="ProgramasEP" id="ProgramasEP">
                  </select>
                </div>
                <div class="col-12">
                  <b>CATEGORIA:</b> <input type="text" name="CategoriaEP" id="CategoriaEP" class="form-control" onkeyup="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                </div>
                <div class="col-12">
                  <b>PRODUCTO:</b> <input type="text" name="ProductoEP" id="ProductoEP" class="form-control" onkeyup="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                </div>
            </div>
            <br>
      <div class="modal-footer">
          <input type="hidden" name="IDP" id="IDP">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
  </main>