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
      
      Administrar Grupos


    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Grupo</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          
          Agregar Grupo

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Escuela</th>
           <th>Codigo</th>
           <th>Modalidad</th>
           <th>Duracion</th>
           <th>Ciclo Escolar</th>
           <th>Turno</th>
           <th>Tipo Plan</th>
           <th>Generacion</th>
           <th>Cordinador</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCarrera::ctrMostrarCarrera($item, $valor);

          foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["escuela"].'</td>

                    <td class="text-uppercase">'.$value["codigo"].'</td>

                    <td class="text-uppercase">'.$value["carrera"].'</td>

                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>

                    <td class="text-uppercase">'.$value["cordinador"].'</td>

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

          <h4 class="modal-title">Agregar  Grupo</h4>

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

                <input type="text" class="form-control input-lg" name="nuevaCarrera" placeholder="Ingresar ID Grupo" required>

              </div>
              <br>
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevaCarrera" placeholder="Ingresar nombre del Grupo" required>

            </div>
            <br>
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevaCarrera" placeholder="Ingresar ID Grado" required>

            </div>
            
            
          <br>
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                
                <option value="">Selecionar Escuela</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                  
                  echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                }

                ?>

              </select>

            </div>
              <br>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar ID Modalidad" required>

              </div>
<br>


              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar  Cupo" required>

              </div>
         
      
            <br>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Generación" required>

              </div>
         

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Grupo</button>

        </div>

        <?php

          $crearCarrera = new ControladorCarrera();
          $crearCarrera -> ctrCrearCarrera();

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


