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
        <table class="table" data-role="table">
            <thead>
                <tr>
                    <th data-sortable="true" data-sort-dir="asc">ID</th>
                    <th data-sortable="true">Titulo</th>
                    <th data-sortable="true">Descripcion</th>
                    <th data-sortable="true" data-format="date" data-format-mask="%d-%m-%y">Fecha creacion</th>
                    <th data-sortable="true">Creado por</th>
                    <th data-sortable="true">Estado</th>
                    <th data-sortable="true">Acciones</th>
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
                            <td><?php echo '<a href="https://www.ivao.aero/Member.aspx?Id=' . $fila->author . '">' . $fila->author . '</a>' ?></td>
                            <td><?php
                                switch ($fila->status) {
                                    case '0':
                                        echo '<span class="mif-not fg-red"></span> Oculto';
                                        break;
                                    case '1':
                                        echo '<span class="mif-checkmark fg-green"></span> Publicado';
                                        break;
                                }
                                ?></td>
                            <td>
                                <span class="mif-bin"></span>
                                <span class="mif-pencil"></span>
                            </td>
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
    <div class="gird">
        <div class="row">
            <div class="cell-11"></div>
            <div class="cell-1">
                <a href="" class="button primary cycle ">
                    <span class="mif-plus"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view("_lib/lib.footer.php");
?>