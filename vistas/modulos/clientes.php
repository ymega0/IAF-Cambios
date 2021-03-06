<?php
if($_SESSION["perfil"] == "Especial"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}
?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar  Estudiante
    
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Estudiante</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar Estudiante

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Apellido Paterno</th>
           <th>Apellido Materno</th>
           <th>Fecha nacimiento</th> 
           <th>Lugar Nacimiento</th>
           <th>Nacionalidad</th>
           <th>CURP</th>
           <th>Dirección</th>
           <th>Entre Calles</th>
           <th>Municipio</th>
           <th>Estado</th>
           <th>Codigo Postal</th>
           <th>Tutor</th>
           <th>Genero</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Nivel Educativo</th>
           <th>Grado</th>
           <th>Grupo</th>
           <th>MatriculaInterna</th>
           <th>MatriculaOficial</th>
           <th>Escuela</th>
           <th>Modalidad</th>
           <th>Ingreso al sistema</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
          $item = null;
          $valor = null;
          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
          foreach ($clientes as $key => $value) {
            
            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellido_paterno"].'</td>
                    <td>'.$value["apellido_materno"].'</td>
                    <td>'.$value["fecha_nacimiento"].'</td>  
                    <td>'.$value["LugarNacimiento"].'</td>
                    <td>'.$value["Nacionalidad"].'</td>
                    <td>'.$value["CURP"].'</td>
                    <td>'.$value["Direccion"].'</td> 
                    <td>'.$value["EntreCalles"].'</td>
                    <td>'.$value["Municipio"].'</td>
                    <td>'.$value["Estado"].'</td>
                    <td>'.$value["CodigoPostal"].'</td>
                    <td>'.$value["Tutor"].'</td>
                    <td>'.$value["Genero"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["telefono"].'</td> 
                    <td>'.$value["NivelEducativo"].'</td>
                    
                    <td>'.$value["Grado"].'</td>
                    <td>'.$value["Grupo"].'</td>
                    <td>'.$value["MatriculaInterna"].'</td>
                    <td>'.$value["MatriculaOficial"].'</td>
                    <td>'.$value["Escuela"].'</td>
                    <td>'.$value["Modalidad"].'</td>
                    <td>'.$value["fecha"].'</td>
                    <td>
                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';
                      if($_SESSION["perfil"] == "Administrador"){
                          echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';
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
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Estudiante</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL Apellido Parterno -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoapellido_paterno" placeholder="Ingresar Apellido Paterno" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL Apellido Materno -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoapellido_materno" placeholder="Ingresar Apellido Materno" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL FECHA NACIMIENTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA Lugar de Nacimiento -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoLugarNacimiento" placeholder="Ingresar Lugar Nacimiento" required>

              </div>

            </div>

            <!-- ENTRADA PARA NACIONALIDAD -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-flag"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNacionalidad" placeholder="Ingresar Nacionalidad" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CURP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCURP" placeholder="Ingresar CURP" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección" required>

              </div>

            </div>

            <!-- ENTRADA PARA ENTRE CALLES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaEntreCalles" placeholder="Ingresar Entre Calles" required>

              </div>

            </div>

            <!-- ENTRADA PARA Municipio -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoMunicipio" placeholder="Ingresar Municipio" required>

              </div>

            </div>

            <!-- ENTRADA PARA Estado -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoEstado" placeholder="Ingresar Estado" required>

              </div>

            </div>

            <!-- ENTRADA PARA CODIGO POSTAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigoPostal" placeholder="Ingresar Codigo Postal" required>

              </div>

            </div>

            <!-- ENTRADA PARA TUTOR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTutor" placeholder="Ingresar Tutor" required>

              </div>

            </div>

            <!-- ENTRADA PARA Genero -->
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <select class="form-control input-lg" id="nuevoGenero" name="nuevoGenero" required>
                
                <option value="">Seleccionar Genero</option>

                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              

                

              </select>


            </div>
            <br>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA Nivel Educativo -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNivelEducativo" placeholder="Ingresar Nivel Educativo" required>

              </div>

            </div>

            <!-- ENTRADA PARA Grado -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoGrado" placeholder="Ingresar Grado" required>

              </div>

            </div>

            <!-- ENTRADA PARA Grupo -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoGrupo" placeholder="Ingresar Grupo" required>

              </div>

            </div>

            <!-- ENTRADA PARA Matricula Interna -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoMatriculaInterna" placeholder="Ingresar Matricula Interna" required>

              </div>

            </div>

            <!-- ENTRADA PARA Matricula Oficial -->
                        
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoMatriculaOficial" placeholder="Ingresar Matricula Oficial" required>

              </div>

            </div>

              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

              <select class="form-control input-lg" id="Escuela" name="Escuela" required>
                
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

              <select class="form-control input-lg" id="Modalidad" name="Modalidad" required>
                
                <option value="">Selecionar Modalidad</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCarrera::ctrMostrarCarrera($item, $valor);

                foreach ($categorias as $key => $value) {
                  
                  echo '<option value="'.$value["carrera"].'">'.$value["carrera"].'</option>';
                }

                ?>

              </select>

            </div>

            

            


            <!-- ENTRADA PARA LA DIRECCIÓN -->

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Estudiante</button>

        </div>

      </form>

      <?php
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();
      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Estudiante</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

             <!-- ENTRADA PARA EL Apellido Paterno -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarapellido_paterno" id="editarapellido_paterno" required>
                
              </div>

            </div>

            <!-- ENTRADA PARA EL Apellido Materno -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarapellido_materno" id="editarapellido_materno" required>
                
              </div>

            </div>


            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA Lugar de Nacimiento -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarLugarNacimiento" id="editarLugarNacimiento"  required>

              </div>

            </div>

            <!-- ENTRADA PARA NACIONALIDAD -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-flag"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNacionalidad" id="editarNacionalidad"  required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCURP" id="editarCURP" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

              </div>

            </div>

            <!-- ENTRADA PARA ENTRE CALLES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEntreCalles" id="editarEntreCalles"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Municipio -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarMunicipio" id="editarMunicipio"  required>

              </div>

            </div>

            <!-- ENTRADA PARA ESTADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEstado" id="editarEstado"  required>

              </div>

            </div>

            <!-- ENTRADA PARA CODIGO POSTAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCodigoPostal" id="editarCodigoPostal"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Tutor -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTutor" id="editarTutor"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Genero -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGenero" id="editarGenero"  required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA Nivel Educativo -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNivelEducativo" id="editarNivelEducativo"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Nivel Grado -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGrado" id="editarGrado"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Grupo -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGrupo" id="editarGrupo"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Matricula Interna -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarMatriculaInterna" id="editarMatriculaInterna"  required>

              </div>

            </div>

            <!-- ENTRADA PARA Matricula Oficial -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarMatriculaOficial" id="editarMatriculaOficial"  required>

              </div>

            </div>

            

            <!-- ENTRADA PARA LA DIRECCIÓN -->

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php
        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();
      ?>

    

    </div>

  </div>

</div>

<?php
  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();
?>
+ 