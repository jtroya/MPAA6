<?php
/**
* Menu de opciones del DPA
* Para incluir el menu se debe usar la instruccion: include_once("menu-dpa.php")
* en el fichero donde quiera que se muestre el menu.
**/

?>


<div class="contmenu informacion">
	<div class="icono">
		<i class="icondpa-informacion"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'informacion-general' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'informacion-general' ) ); ?>
	</div>
</div>


<div class="contmenu funcionamiento">
	<div class="icono">
		<i class="icondpa-pfc"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'funcionamiento' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'funcionamiento' ) ); ?>
	</div>
</div>


<div class="contmenu asignaturas">
	<div class="icono-tmp">
		<p>a</p>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'asignaturas' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'asignaturas' ) ); ?>
	</div>
</div>

<div class="contmenu innovacion">
	<div class="icono">
		<i class="icondpa-innovacion"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'innovacion-educativa' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'innovacion-educativa' ) ); ?>
	</div>
</div>

<div class="contmenu profesorado">
	<div class="icono-tmp">
		<p>p</p>
	</div>
	<div class="elements">	
		<p><?php echo dpa_get_theme_menu_name( 'profesorado' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'profesorado' ) ); ?>		
	</div>
</div>


<div class="contmenu oficinas">
	<div class="icono-tmp">
		<p>o</p>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'oficinas' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'oficinas' ) ); ?>
	</div>
</div>


<div class="contmenu tesis">
	<div class="icono">
		<i class="icondpa-tesis"></i>
	</div>
	<div class="elements">
		<p><?php echo dpa_get_theme_menu_name( 'tesis-fin-master' ); ?></p>
		<?php wp_nav_menu( array( 'theme_location' => 'tesis-fin-master' ) ); ?>
	</div>
</div>
