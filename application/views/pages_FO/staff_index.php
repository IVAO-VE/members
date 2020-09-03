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
    defined('BASEPATH') OR exit('El acceso directo al código no está permitido.');
    //echo BASEPATH; 
    //Cargando la estructura del HEADER
    $this->load->view("_lib/lib.header.php");
    //Cargando la estructura del MENU
    $this->load->view("_lib/lib.menu.php");
?>
<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title text-center text-left-md w-100"><?php echo ucfirst(strtolower($this->lang->line('staff_dpto02_index'))); ?> </br><small><?php echo $this->lang->line('mainversion'); ?></small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="/app/index" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="/app/profile" class="page-link"><?php echo $this->lang->line('staffarea'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('dpto02'); ?></a></li>
            <li class="page-item"><a href="" class="page-link"><?php echo $this->lang->line('airlines_title'); ?></a></li>
        </ul>
    </div>
</div>


<div class="fg-dark container-fluid start-screen h-100">
    <div class="mb-15"></div>   
    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_dpto02_index'); ?>" data-title-icon="<span class='mif-apps'></span>">
        <div class="bg-white h-100">

            <ul data-role="tabs" data-expand="true">
                <li><a href="#airlines"><?php echo $this->lang->line('airlines_title'); ?></a></li>
                <li><a href="#charts"><?php echo $this->lang->line('charts_title'); ?></a></li>
                <li><a href="#meteorologic"><?php echo $this->lang->line('meteorologic_title'); ?></a></li>
                <li><a href="#information"><?php echo $this->lang->line('information_title'); ?></a></li>
                <li><a href="#sceneries"><?php echo $this->lang->line('sceneries_title'); ?></a></li>
                <li><a href="#notams"><?php echo $this->lang->line('notams_title'); ?></a></li>
            </ul>

            <div id="user-profile-tabs-content">
                <div id="airlines">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="charts">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    <div class="p-4">
                        <div class="table-component">
                            <div class="table-top row">
                                <div class="table-search-block cell-md-6">
                                    <div class="input">
                                        <input class="" data-role="input" data-role-input="true" type="text">
                                        <div class="button-group">
                                            <button class="button input-clear-button" tabindex="-1" type="button"><span class="default-icon-cross"></span></button>
                                        </div>
                                        <div class="prepend">
                                            Search:
                                        </div>
                                    </div>
                                </div>
                                <div class="table-rows-block cell-md-6">
                                    <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"><span class="dropdown-toggle"></span><select data-role="select" data-role-select="true">
                                        <option selected="selected" value="5">
                                            5
                                        </option>
                                        <option value="10">
                                            10
                                        </option>
                                    </select></label>
                                    <div class="button-group d-none">
                                        <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"></label>
                                    </div><label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"><input class="select-focus-trigger" id="select-focus-trigger-15991557878661" type="checkbox"></label>
                                    <div class="select-input">
                                        <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814">5</label>
                                    </div>
                                    <div class="drop-container" data-role="dropdown" data-role-dropdown="true" style="display: none;">
                                        <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"></label>
                                        <div style="display: none;">
                                            <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"></label>
                                            <div class="input">
                                                <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"><input class="" data-role="input" data-role-input="true" placeholder="" type="text"></label>
                                                <div class="button-group">
                                                    <label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"><button class="button input-clear-button" tabindex="-1" type="button"><label class="select input-normal" for="select-focus-trigger-15991557878661" id="select-1599155787866814"><span class="default-icon-cross"></span></label></button></label>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="option-list" style="max-height: 200px;">
                                            <li class="active" data-text="5" data-value="5">
                                                <a>5</a>
                                            </li>
                                            <li data-text="10" data-value="10">
                                                <a>10</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prepend">
                                        Show entries:
                                    </div>
                                </div>
                            </div>
                            <div class="table-container horizontal-scroll">
                                <table class="table striped table-border mt-4" data-cls-rows-count="cell-md-6" data-cls-search="cell-md-6" data-cls-table-top="row" data-horizontal-scroll="true" data-role="table" data-role-table="true" data-rows="5" data-rows-steps="5, 10" data-show-activity="false" data-source="data/table.json" id="table-1599155787669557">
                                    <thead>
                                        <tr>
                                            <th class="rownum-cell d-none">#</th>
                                            <th class="check-cell d-none"><label class="checkbox table-service-check-all transition-on" for="checkbox-1599155787897471"><input class="" data-role="checkbox" data-role-checkbox="true" data-style="1" id="checkbox-1599155787897471" type="checkbox"><span class="check"></span><span class="caption"></span></label></th>
                                            <th class="sortable-column sort-asc" data-format="number" data-name="id" style="width: 50px;">ID</th>
                                            <th class="sortable-column" data-name="name">Name</th>
                                            <th class="sortable-column" data-format="date" data-name="start" style="width: 150px;">Start</th>
                                            <th class="sortable-column" data-name="age" style="width: 80px;">Age</th>
                                            <th class="sortable-column" data-format="money" data-name="salary" style="width: 150px;">Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="rownum-cell d-none">1</td>
                                            <td class="check-cell d-none"><label class="checkbox table-service-check transition-on" for="checkbox-1599155787900116"><input class="" data-role="checkbox" data-role-checkbox="true" data-style="1" id="checkbox-1599155787900116" name="table_row_check[]" type="checkbox" value="1"><span class="check"></span><span class="caption"></span></label></td>
                                            <td>1</td>
                                            <td>Aidan</td>
                                            <td>31-12-2017</td>
                                            <td>63</td>
                                            <td>$7,843</td>
                                        </tr>
                                        <tr>
                                            <td class="rownum-cell d-none">2</td>
                                            <td class="check-cell d-none"><label class="checkbox table-service-check transition-on" for="checkbox-1599155787902868"><input class="" data-role="checkbox" data-role-checkbox="true" data-style="1" id="checkbox-1599155787902868" name="table_row_check[]" type="checkbox" value="2"><span class="check"></span><span class="caption"></span></label></td>
                                            <td>2</td>
                                            <td>Ferris</td>
                                            <td>13-06-2018</td>
                                            <td>28</td>
                                            <td>$8,877</td>
                                        </tr>
                                        <tr>
                                            <td class="rownum-cell d-none">3</td>
                                            <td class="check-cell d-none"><label class="checkbox table-service-check transition-on" for="checkbox-1599155787904848"><input class="" data-role="checkbox" data-role-checkbox="true" data-style="1" id="checkbox-1599155787904848" name="table_row_check[]" type="checkbox" value="3"><span class="check"></span><span class="caption"></span></label></td>
                                            <td>3</td>
                                            <td>Joseph</td>
                                            <td>06-02-2018</td>
                                            <td>43</td>
                                            <td>$5,645</td>
                                        </tr>
                                        <tr>
                                            <td class="rownum-cell d-none">4</td>
                                            <td class="check-cell d-none"><label class="checkbox table-service-check transition-on" for="checkbox-1599155787907626"><input class="" data-role="checkbox" data-role-checkbox="true" data-style="1" id="checkbox-1599155787907626" name="table_row_check[]" type="checkbox" value="4"><span class="check"></span><span class="caption"></span></label></td>
                                            <td>4</td>
                                            <td>Troy</td>
                                            <td>11-03-2019</td>
                                            <td>26</td>
                                            <td>$5,405</td>
                                        </tr>
                                        <tr>
                                            <td class="rownum-cell d-none">5</td>
                                            <td class="check-cell d-none"><label class="checkbox table-service-check transition-on" for="checkbox-1599155787909974"><input class="" data-role="checkbox" data-role-checkbox="true" data-style="1" id="checkbox-1599155787909974" name="table_row_check[]" type="checkbox" value="5"><span class="check"></span><span class="caption"></span></label></td>
                                            <td>5</td>
                                            <td>Kennedy</td>
                                            <td>11-02-2018</td>
                                            <td>60</td>
                                            <td>$5,780</td>
                                        </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                            <div class="table-bottom">
                                <div class="table-info">
                                    Showing 1 to 5 of 100 entries
                                </div>
                                <div class="table-pagination">
                                    <ul class="pagination">
                                        <li class="page-item service prev-page disabled">
                                            <a class="page-link">Prev</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">5</a>
                                        </li>
                                        <li class="page-item no-link">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">20</a>
                                        </li>
                                        <li class="page-item service next-page">
                                            <a class="page-link">Next</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="table-skip" style="display: none;">
                                    <input class="input table-skip-input" type="text"><button class="button table-skip-button">Go to page</button>
                                </div>
                            </div>
                            <div class="table-progress" style="visibility: hidden; display: none;">
                                <div class="color-style activity-cycle" data-role="activity" data-role-activity="true">
                                    <div class="cycle"></div>
                                </div>
                            </div>
                        </div>
                    </div>





                    </div>
                    <br>
                </div>
                <div id="meteorologic">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="information">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="sceneries">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>
                <div id="notams">
                    <br>
                    <div data-role="panel" data-title-caption="<?php echo $this->lang->line('staff_HQ_0001'); ?>" data-title-icon="<span class='mif-info'>" data-collapsible="true">

                    </div>
                    <br>
                </div>


            </div>



        </div>
    </div>
</div>

<?php
	$this->load->view("_lib/lib.footer.php");
?>
