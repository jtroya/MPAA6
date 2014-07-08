
<div class="my_meta_control"> 
    <p>
        <label >Abreviatura Número de la Unidad Docente (Ej. 01, 02, gm 123, etc.)</label>
        <input type="text" name="_my_meta[numero_ud]" id="numero_ud" value="<?php if(!empty($meta['numero_ud'])) echo $meta['numero_ud']; ?>">
    </p>
</div>

<div class="my_meta_control"> 
    <p>
        <label>Abreviatura Nombre de la Unidad Docente (Ej. ud.nombre, gm.nombre, etc.)</label>
        <input type="text" class="widefat" name="_my_meta[nombre_corto_ud]" id="nombre_corto_ud" value="<?php if(!empty($meta['nombre_corto_ud'])) echo $meta['nombre_corto_ud']; ?>">
    </p>
</div>


<div class="my_meta_control"> 
     <p>
        <label>Director de la  Unidad Docente</label>
        <input type="text" class="widefat" name="_my_meta[director_ud]" id="director_ud" value="<?php if(!empty($meta['director_ud'])) echo $meta['director_ud']; ?>" />        
     </p>       
   
</div>

<div class="my_meta_control"> 
    <p>
        <label style="padding-top:7px;">Miembros de la Unidad Docente</label>
    </p>

    <p><input type="text" class="widefat" name="_my_meta[miembro_ud_2]" id="miembro_ud_2" value="<?php if(!empty($meta['miembro_ud_2'])) echo $meta['miembro_ud_2']; ?>"> </p>
    <p><input type="text" class="widefat" name="_my_meta[miembro_ud_3]" id="miembro_ud_3" value="<?php if(!empty($meta['miembro_ud_3'])) echo $meta['miembro_ud_3']; ?>"> </p>   
    <p><input type="text" class="widefat" name="_my_meta[miembro_ud_4]" id="miembro_ud_4" value="<?php if(!empty($meta['miembro_ud_4'])) echo $meta['miembro_ud_4']; ?>"> </p>   
    <p><input type="text" class="widefat" name="_my_meta[miembro_ud_5]" id="miembro_ud_5" value="<?php if(!empty($meta['miembro_ud_5'])) echo $meta['miembro_ud_5']; ?>"> </p>   
    <p><input type="text" class="widefat" name="_my_meta[miembro_ud_6]" id="miembro_ud_6" value="<?php if(!empty($meta['miembro_ud_6'])) echo $meta['miembro_ud_6']; ?>"> </p>   
    <p><input type="text" class="widefat" name="_my_meta[miembro_ud_7]" id="miembro_ud_7" value="<?php if(!empty($meta['miembro_ud_7'])) echo $meta['miembro_ud_7']; ?>"> </p>   
</div>    

<div class="my_meta_control">
    <p><label style="padding-top:7px;">Sitio web (Blog) de la Unidad docente (incluir "http://")</label></p>
    <p><input type="text"  class="widefat" name="_my_meta[sitio_web_ud]" id="sitio_web_ud" value="<?php if(!empty($meta['sitio_web_ud'])) echo $meta['sitio_web_ud']; ?>"> </p>    
    <p><label style="padding-top:7px;">Información Adicional (Teléfono, Email, etc)</label></p>
    <p><textarea name="_my_meta[info_contacto_adicional_ud]" class="widefat" id="info_contacto_adicional_ud"><?php if(!empty($meta['info_contacto_adicional_ud'])) echo $meta['info_contacto_adicional_ud']; ?></textarea></p>
</div>

<div class="my_meta_control">
    <p><label style="padding-top:7px;">Horario de Atención</label></p>    
    <p><textarea name="_my_meta[horario_ud]" class="widefat" id="horario_ud"><?php if(!empty($meta['horario_ud'])) echo $meta['horario_ud']; ?></textarea></p>

</div>

<div class="my_meta_control">
    <p><label style="padding-top:7px;">Número de Plazas</label></p>
    <p><input type="text" name="_my_meta[nro_plazas_ud]" id="nro_plazas_ud" value="<?php if(!empty($meta['nro_plazas_ud'])) echo $meta['nro_plazas_ud']; ?>"> </p>  
</div>




