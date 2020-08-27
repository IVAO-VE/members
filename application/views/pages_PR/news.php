<?php

/**
 * @autor Rixio Iguarán y Simón Cardona.
 * @Departamento Sistemas y Webmaster
 * @Licencia Exclusivo sistemas IVAO.AERO
 * @Licencia División Venezuela.
 * @Correo ve-web@ivao.aero
 * 
 **/

//Asegurando el acceso directo al script
defined('BASEPATH') or exit('El acceso directo al código no está permitido.');
//echo BASEPATH; 
//Cargando la estructura del HEADER
$this->load->view("_lib/lib.header.php");
//Cargando la estructura del MENU
$this->load->view("_lib/lib.menu.php");
?>
<div class="">
    <div class="bg-white p-6 text-center text-leader">
        Panel de noticias
        <p class="text-leader2">
            En este panel podras ver las noticias creadas y publicadas.
        </p>
    </div>
    <br>
    <div class="bg-white p-4">
        <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
            <div class="w-100 mb-2 mb-0-lg" id="t1_search"></div>
            <div class="ml-2 mr-2" id="t1_rows"></div>
            <div class="" id="t1_actions">
                <button class="button square" onclick="$('#t1').data('table').toggleInspector()"><span class="mif-cog"></span></button>
            </div>
        </div>
        <table class="table" data-role="table">
            <thead>
                <tr>
                    <th data-sortable="true" data-sort-dir="asc">ID</th>
                    <th data-sortable="true">Titulo</th>
                    <th data-sortable="true">Descripcion</th>
                    <th data-sortable="true" data-format="date" data-format-mask="%d-%m-%y">Fecha creacion</th>
                    <th data-sortable="true">Creado por</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $q = $this->db->get("news");
                if ($q->result() > 0) {
                    foreach ($q->result() as $fila) {
                ?>
                        <tr>
                            <td><?php echo $fila->id; ?></td>
                            <td><?php echo $fila->title; ?></td>
                            <td><?php echo $fila->description; ?></td>
                            <td><?php echo $fila->date; ?></td>
                            <td><a href="https://www.ivao.aero/Member.aspx?Id=.'<?php echo $fila->author ?>'."><?php echo $fila->author ?></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex flex-column flex-justify-center">
            <div id="t1_info"></div>
            <div id="t1_pagination"></div>
        </div>
    </div>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>