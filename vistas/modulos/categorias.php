<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Escuela


    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Escuelas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          
          Agregar Escuela

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Escuela</th>
           <th>Cuenta</th>
           <th>C.T</th>
           <th>ZT</th>
           <th>Direccion</th>
           <th>Localidad</th>
           <th>Municipio</th>
           <th>Encargado</th>
           <th>Telefono</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

          foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["categoria"].'</td>

                    <td class="text-uppercase">'.$value["cuenta"].'</td>
                    <td class="text-uppercase">'.$value["codigo"].'</td>
                    <td class="text-uppercase">'.$value["ZT"].'</td>

                    <td class="text-uppercase">'.$value["direccion"].'</td>
                    <td class="text-uppercase">'.$value["Localidad"].'</td>
                    <td class="text-uppercase">'.$value["Municipio"].'</td>
                    <td class="text-uppercase">'.$value["Encargado"].'</td>

                    <td class="text-uppercase">'.$value["telefono"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                        }

                      echo '</div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Escuela</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Nombre Oficial según catalogo de Centros de Trabajo" required>

              </div>
              <br>
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <select class="form-control input-lg" id="nuevaCuenta" name="nuevaCuenta" required>
                
                <option value="">Selecionar Cuenta</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCuentas::ctrMostrarCuentas($item, $valor);

                foreach ($categorias as $key => $value) {
                  
                  echo '<option value="'.$value["Cuenta"].'">'.$value["Cuenta"].'</option>';
                }

                ?>

              </select>

            </div>
                <br>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar C. T." required>

              </div>
              <br>

              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="ZT" placeholder="Ingresar Zona de Trabajo" required>

            </div>

            <br>

              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Domicilio de la Escuela" required>

            </div>

            <br>

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Localidad" required>

            </div>

            <br>

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="Municipio" placeholder="Ingresar Municipio" required>

            </div>

            <br>

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevotelefono" placeholder="Ingresar Telefono" required>

            </div>

              <br>

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="Encargado" placeholder="Ingresar Encargado del Centro de Trabajo" required>

            </div>

            <br>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Escuela</button>

        </div>

        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Escuela</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>


