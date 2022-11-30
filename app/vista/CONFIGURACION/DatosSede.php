<main id="main" class="main">
  <br>
  
     <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
               <h1 class="card-title" style="font-size:30px;">SEDE &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary AbrirModalSede" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroSede">AGREGAR</button></h1>
             </div>
           </div>
         </div>
      </div>
     
    
  

  <section class="section">
    
     <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <br>
            <div class="table-responsive">
            <table class="table" id="tablaSede" style="width:100%">
              <thead>
                <tr>
                <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">RESPONSABLE</th>
                  <th scope="col">TELEFONO</th>
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

      </div>
    </div>

    <form action="" method="POST" id="RegistrarSede">
      <div class="modal fade" id="ModalRegistroSede" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR SEDE</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <div class="container">
               <div class="row">
                 <div class="col-12">
                    <b>SELECCIONE UNA REGIONAL:</b> 
                    <select class="selectpicker" data-live-search="true" data-size="3" data-width="100%" name="regional_sede" id="regional_sede"  >                      
                    </select>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                    <b>SELECCIONE UN CENTRO:</b> 
                    <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="centro_sede" id="centro_sede"  >                      
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                 <div class="col-12">
                    <b>NOMBRE DE LA SEDE:</b> 
                    <input type="text" name="nombre_sede" id="nombre_sede" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                </div>
                <br>
                <div class="row">
                 <div class="col-12">
                    <b>RESPONSABLE:</b> 
                    <input type="text" name="responsable_sede" id="responsable_sede" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                </div>
                <br>
                <div class="row">
                 <div class="col-12">
                    <b>TELEFONO:</b> 
                    <input type="number" name="telefono_sede" id="telefono_sede" class="form-control"  required>
                  </div>
                </div>
             </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    <form action="" method="POST" id="EditarSede">
      <div class="modal fade" id="ModalEditSede" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR SEDE</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <div class="container">
               <div class="row">
                 <div class="col-12">
                    <b>REGIONAL:</b> 
                    <input type="text" name="regional_sedee" id="regional_sedee" class="form-control" disabled>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                    <b>CENTRO:</b> 
                    <input type="text" name="centro_sedee" id="centro_sedee" class="form-control" disabled>
                  </div>
                </div>
                
                <div class="row">
                 <div class="col-12">
                    <b>NOMBRE DE LA SEDE:</b> 
                    <input type="text" name="nombre_sedee" id="nombre_sedee" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                </div>
                
                <div class="row">
                 <div class="col-12">
                    <b>RESPONSABLE:</b> 
                    <input type="text" name="responsable_sedee" id="responsable_sedee" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                </div>
                
                <div class="row">
                 <div class="col-12">
                    <b>TELEFONO:</b> 
                    <input type="number" name="telefono_sedee" id="telefono_sedee" class="form-control"  required>
                    <input type="hidden" name="id_sede" id="id_sede" class="form-control">
                  </div>
                </div>
             </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

</main>