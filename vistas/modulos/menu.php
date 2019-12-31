<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php
		if($_SESSION["perfil"] == "Administrador"){
			echo '<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>
			<li>
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>';
		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){
			echo '
			<li>
				<a href="cuentas">
					<i class="fa fa-credit-card-alt "></i>
					<span>Cuenta</span>
					</a>
				</li>
			
			<li>
				<a href="categorias">
					<i class="fa fa-university "></i>
					<span>Escuelas</span>
				</a>
			</li>
			<li>
				<a href="carrera">
					<i class="fa fa-bookmark "></i>
					<span>Modalidades</span>
				</a>
			</li>

			<li>
				<a href="grado">
					<i class="fa fa-graduation-cap "></i>
					<span>Grado</span>
				</a>
			</li>

			<li>
				<a href="grupos">
					<i class="fa fa-users "></i>
					<span>Grupo</span>
				</a>
			</li>

			<li>
			<a href="horarios">
				<i class="fa fa-hourglass "></i>
				<span>Horarios</span>
			</a>
		</li>

		<li>
				<a href="materias">
					<i class="fa fa-flask"></i>
					<span>Materias</span>
				</a>
			</li>

		<li class="treeview">
				<a href="#">
					<i class="fa fa-check-square"></i>
					
					<span>Evaluación</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					
					<li>
						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Evaluación por Materia</span>
						</a>
					</li>
					<li>
						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Calificaciones por Grupo</span>
						</a>
					</li>

					<li>
						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Evaluación Docente</span>
						</a>
					</li>
			
			
			</ul>
			</li>
			<li>
			<a href="crear-venta">
				
				<i class="fa fa-briefcase"></i>
				<span>Trámites</span>
			</a>
		</li>
'

			
			
			;
		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){
			echo '<li>
				<a href="clientes">
					<i class="fa fa-child"></i>
					<span>Gestion de Alumnos</span>
				</a>
			</li>';
		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){
			echo '<li class="treeview">
				<a href="#">
					<i class="fa fa-list-ul"></i>
					
					<span>Cobranza</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					
					<li>
						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar Cobranza</span>
						</a>
					</li>
					<li>
						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Generar Pago</span>
						</a>
					</li>
					<li>
						<a href="productos">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear nuevo Pago</span>
						</a>
					</li>';
					if($_SESSION["perfil"] == "Administrador"){
					echo '<li>
						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de Pagos</span>
						</a>
					</li>';
					}
					echo '<li class="treeview">
					<a href="#">
						<i class="fa fa-list-ul"></i>
						
						<span>Adeudos</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						
						<li>
							<a href="ventas">
								
								<i class="fa fa-circle-o"></i>
								<span>Administrar Adeudos</span>
							</a>
						</li>
						<li>
							<a href="crear-adeudo">
								
								<i class="fa fa-circle-o"></i>
								<span>Crear Adeudo</span>
							</a>
						</li>';
						if($_SESSION["perfil"] == "Administrador"){
						echo '<li>
							<a href="reportes">
								
								<i class="fa fa-circle-o"></i>
								<span>Reporte de Adeudos</span>
							</a>
						</li>';
						}
				
				echo '</ul>
			</li>';
		}
		?>

		</ul>

	 </section>

</aside>