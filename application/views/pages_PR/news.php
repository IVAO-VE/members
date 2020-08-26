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
        Metro 4 InMemory table
        <p class="text-leader2">
            Turn your table interactive with search, sorting, filtering, rows counting, pagination and table inspector features with a single attribute <code>data-role="table"</code>
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
        <table id="t1" class="table table-border cell-border">
            <thead>
                <tr>
                    <th class="sortable-column">ID</th>
                    <th class="sortable-column">Titulo</th>
                    <th class="sortable-column">Descripcion</th>
                    <th>URL Foro</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
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
                            <td></td>
                            <td></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            </thead>
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