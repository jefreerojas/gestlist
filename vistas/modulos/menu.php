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

			</li>
			
			
				

			<li>

				<a href="casos">

					<i class="fa fa-sticky-note"></i>
					<span>Casos</span>

				</a>

			</li>
			';

		}
		

		?>

		</ul>

	 </section>

</aside>