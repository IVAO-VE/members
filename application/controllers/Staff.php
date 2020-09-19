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


class Staff extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Cargando el archivo de idioma correspondiente
        $this->phpdebug->debug('[STAFF] -> Determinando el lenguaje para el usuario');
        $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        if (strtoupper(substr($lang, 0, 2)) == 'ES') { //es_ES, en_US
            $this->lang->load('website', 'spanish');
        } else {
            $this->lang->load('website', 'english');
        }
    }

    public function HQaccess()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_HQ'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_HQ/staff_index");
            }
        }
    }

    public function flights()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_FO'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_FO/staff_index");
            }
        }
    }

    public function FO_addCharts(){
        //$this->phpdebug->debug(strtoupper(end(explode(".", $_FILES['filePDF']['name']))));
        //$MyEXPLODE = explode(".", $_FILES['filePDF']['name']);
        //$MyLAST = end($MyEXPLODE);
        $MyFILE = pathinfo($_FILES['filePDF']['name']);
        $MyEXT = strtoupper($MyFILE['extension']);
        $this->phpdebug->debug($MyEXT);        
        if($MyEXT != "PDF"){
            $data['showNOTIFY'][] = array('title' => 'Error fatal.', 
                                          'message' => 'El archivo no es PDF válido.', 
                                          'type' => 4);
            $this->load->view('pages_FO/staff_index', $data);
        }else{
            $dirUPLOAD = FCPATH.'uploads/';
            $dirCHARTS = FCPATH.'uploads/charts/';
            $MyICAO = $_POST['icao'];
            $MyPDF = $_FILES['filePDF']['name'];
            $this->phpdebug->debug('[DEBUG] -> Intentando añadir cata de vuelo para '.$MyICAO);
            
            if(!is_dir($dirUPLOAD)){ //Directorio UPLOADS no existe (hay que crearlo)
                mkdir($dirUPLOAD);
            }
            if(!is_dir($dirCHARTS)){ //Directorio CARTAS no existe (hay que crearlo)
                mkdir($dirCHARTS);
            }
            if(!move_uploaded_file($_FILES['filePDF']['tmp_name'], $dirCHARTS.strtoupper($MyICAO).'.pdf')){
                //Problemas al sibir el archivo.
                $this->phpdebug->debug('[DEBUG] -> Intento fallido.');
                $data['showNOTIFY'][] = array('title' => 'Cartas aéreas', 
                                            'message' => 'Fallo al intentar registrar ésta carta aérea.', 
                                            'type' => 4);
            }else{
                //Archivo subido con éxito
                $this->phpdebug->debug('[DEBUG] -> Intento con éxito.');
                $data['showNOTIFY'][] = array('title' => 'Cartas aéreas', 
                                            'message' => 'Éxito, carta aérea registrada correctamente.', 
                                            'type' => 2);
            }
            $this->load->view('pages_FO/staff_index', $data);
        }
    }    

    public function controllers()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_AO'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_AO/staff_index");
            }
        }
    }

    public function military()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_SO'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_SO/staff_index");
            }
        }
    }

    public function members()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_ME'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_ME/staff_index");
            }
        }
    }

    public function addAward()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('short', 'Titulo evento', 'required|max_length[4]');
        $this->form_validation->set_rules('name', 'Fecha inicio', 'required');
        $this->form_validation->set_rules('max', 'Fecha final', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Asegurate de rellenar correctamente los campos:' . validation_errors());
            redirect(base_url('staff/members'));
        } else {
            $short = $this->input->post('short');
            $name = $this->input->post('name');
            $max = $this->input->post('max');

            //Verificamos que no exista otro con mismo SHORT

            $Sq = $this->db->get_where('awards', array('short' => $short));
            if ($Sq->num_rows() > 0) {
                $this->session->set_flashdata('error', 'Ya existe una medalla con este SHORT');
                redirect(base_url('staff/members'));
            }

            //Verficiamos que no exista otro con mismo NOMBRE

            $Nq = $this->db->get_where('awards', array('name' => $name));
            if($Nq->num_rows() > 0){
                $this->session->set_flashdata('error', 'Ya existe una medalla con este NOMBRE');
                redirect(base_url('staff/members'));
            }

            $data = array(
                'short' => $short,
                'name' => $name,
                'max' => $max
            );

            $query = $this->db->insert('awards', $data);

            $fields = array(
                $short => array('type' => 'VARCHAR',
                                'constraint' => '100')
            );

            $this->load->dbforge();

            $q = $this->dbforge->add_column('members_awards', $fields);

            if ($q) {
                $this->session->set_flashdata('info', 'La medalla se registro correctamente.');
                redirect(base_url('staff/members'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas registrando la medalla.');
                redirect(base_url('staff/members'));
            }
        }
    }

    public function EVinsert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Titulo evento', 'required');
        $this->form_validation->set_rules('start', 'Fecha inicio', 'required');
        $this->form_validation->set_rules('end', 'Fecha final', 'required');
        $this->form_validation->set_rules('Description', 'Descripcion', 'required');
        $this->form_validation->set_rules('img', 'Url Imagen', 'required');
        $this->form_validation->set_rules('foro', 'Url Foro', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Asegurate de rellenar correctamente los campos:' . validation_errors());
            redirect(base_url('staff/EVcalendar'));
        } else {

            $title = $this->input->post('title');
            $start = $this->input->post('start');
            $startTime = $this->input->post('startTime');
            $end = $this->input->post('end');
            $endTime = $this->input->post('endTime');
            $Description = $this->input->post('Description');
            $img = $this->input->post('img');
            $foro = $this->input->post('foro');
            $noticia = $this->input->post('noticia');
            $reportable = $this->input->post('reportable');
            $publico = $this->input->post('publico');


            if ($startTime == '00:00:00') {
                $FinalStart = $start;
            } else {
                $FinalStart = $start . ' ' . $startTime;
            }

            if ($endTime == '00:00:00') {
                $FinalEnd = $end;
            } else {
                $FinalEnd = $end . ' ' . $endTime;
            }

            if ($reportable == 1) {
                $report = 1;
            } else {
                $report = 0;
            }

            if ($publico == 1) {
                $pub = 1;
            } else {
                $pub = 0;
            }


            /* Webhook Discord conectado al Modelo */

            /*            $this->load->model('discord');

            $url = "https://discordapp.com/api/webhooks/746101048921292850/40HJt1yE2saIYBXNVA0U1r10c4zuKO9TjlraAAL7-ME8eIcZUH24mMydcLMTQ3lO9Kws";
            $this->discord->enviarEmbed($url, "", [
                [
                    "title" => $title . "(" . $FinalStart . ")",
                    "description" => $Description,
                    "type" => "rich",
                    "color" => hexdec('58FF0F'),
                    "url" => $foro,
                    "footer" => [
                        "icon_url" => "https://cdn.discordapp.com/embed/avatars/0.png",
                        "text" => "IVAO Venezuela || Departamento de Eventos"
                    ],
                    "image" => [
                        "url" => $img
                    ],
                ]
            ]); */

            $data = array(
                "title" => $title,
                "start" => $FinalStart,
                "end" => $FinalEnd,
                "description" => $Description,
                "img" => $img,
                "foro" => $foro,
                "reportable" => $report,
                "status" => $pub
            );

            if ($noticia) {
                $Ndata = array(
                    "title" => $title,
                    "description" => $Description,
                    "author" => $this->session->userdata('vid'),
                );

                $this->db->insert('news', $Ndata);
            }

            $query = $this->db->insert('events', $data);

            if ($query) {
                $this->session->set_flashdata('info', 'El evento se registro correctamente.');
                redirect(base_url('staff/Events'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas registrando el evento.');
                redirect(base_url('staff/Events'));
            }
        }
    }

    public function EVedit()
    {
        $id = $this->input->post('id');
        $txtTitle = $this->input->post('txtTitle');
        $txtStart = $this->input->post('txtStart');
        $timeStart = $this->input->post('TimeStart');
        $txtEnd = $this->input->post('txtEnd');
        $timeEnd = $this->input->post('TimeEnd');
        $txtDescription = $this->input->post('txtDescription');
        $URLimg = $this->input->post('URLimg');
        $URLforo = $this->input->post('URLforo');

        if ($timeStart == '') {
            $Start = $txtStart;
        } else {
            $Start = $txtStart . 'T' . $timeStart;
        }

        if ($timeEnd == '') {
            $End = $txtEnd;
        } else {
            $End = $txtEnd . 'T' . $timeEnd;
        }

        $data = array(
            'title' => $txtTitle,
            'start' => $Start,
            'end' => $End,
            'description' => $txtDescription,
            'img' => $URLimg,
            'foro' => $URLforo
        );

        $this->db->where('event', $id);
        $query = $this->db->update('events', $data);
        if ($query) {
            redirect(base_url('staff/Events'));
        }
    }

    public function EVdelete()
    {
        $event = $this->input->post('eventID');

        if ($event) {
            $this->db->where('event', $event);
            $query = $this->db->delete('events');

            if ($query) {
                redirect(base_url('staff/Events'));
            }
        }
    }

    public function News()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_PR'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_PR/staff_news");
            }
        }
    }

    public function AddNew()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Titulo noticia', 'required');
        $this->form_validation->set_rules('description', 'Descripcion noticia', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Asegurate de rellenar correctamente los campos:' . validation_errors());
            redirect(base_url('staff/News'));
        } else {

            $title = $this->input->post('title');
            $description = $this->input->post('description');

            if ($this->input->post('status')) {
                $status = 1;
            } else {
                $status = 0;
            }

            $data = array(
                "title" => $title,
                "description" => $description,
                "author" => $this->session->userdata('vid'),
                "status" => $status
            );

            $q = $this->db->insert('news', $data);

            if ($q) {
                $this->session->set_flashdata('info', 'La noticia se registro correctamente.');
                redirect(base_url('staff/News'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas registrando la noticia.');
                redirect(base_url('staff/News'));
            }
        }
    }

    public function DeleteNews($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/News'));
        } else {
            $query = $this->db->delete('news', array('id' => $id));
            if ($query) {
                $this->session->set_flashdata('info', 'La noticia se elimino correctamente.');
                redirect(base_url('staff/News'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas eliminando la noticia.');
                redirect(base_url('staff/News'));
            }
        }
    }

    public function NewEdit($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/News'));
        } else {
            $this->db->where('id', $id);
            $q = $this->db->get('news');
            if ($q->num_rows() > 0) {
                $data['New'] = $q->result();
            } else {
                $data['New'] = false;
            }
            $this->load->view('pages_PR/staff_news', $data);
        }
    }

    public function EditNew()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Titulo noticia', 'required');
        $this->form_validation->set_rules('description', 'Descripcion noticia', 'required');
        $this->form_validation->set_rules('id', 'Identificador', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Asegurate de rellenar correctamente los campos:' . validation_errors());
            redirect(base_url('staff/News'));
        } else {

            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $id = $this->input->post('id');


            $data = array(
                "title" => $title,
                "description" => $description
            );

            $this->db->where('id', $id);
            $q = $this->db->update('news', $data);

            if ($q) {
                $this->session->set_flashdata('info', 'La noticia se edito correctamente.');
                redirect(base_url('staff/News'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas editando la noticia.');
                redirect(base_url('staff/News'));
            }
        }
    }

    public function NewStatus($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/News'));
        } else {
            $this->db->where('id', $id);
            $this->db->select('id, status');
            $query = $this->db->get('news');

            $CurrentStatus = $query->result_array()[0]['status'];

            if ($CurrentStatus == 0) {
                $status = 1;
            } else {
                $status = 0;
            }

            $data = array(
                "status" => $status
            );
            $this->db->where('id', $id);
            $q = $this->db->update('news', $data);

            if ($q) {
                $this->session->set_flashdata('info', 'El estado se edito correctamente.');
                redirect(base_url('staff/News'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas editando el estado.');
                redirect(base_url('staff/News'));
            }
        }
    }

    public function Events()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_EV'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $data['result'] = $this->db->get('events')->result();

                foreach ($data['result'] as $key => $value) {
                    $data['data'][$key]['title'] = $value->title;
                    $data['data'][$key]['start'] = $value->start;
                    $data['data'][$key]['end'] = $value->end;
                    $data['data'][$key]['description'] = $value->description;
                    $data['data'][$key]['img'] = $value->img;
                    $data['data'][$key]['foro'] = $value->foro;
                    $data['data'][$key]['event'] = $value->event;
                    $data['data'][$key]['reportable'] = $value->reportable;
                }
                $this->load->view("pages_EV/staff_events", $data);
            }
        }
    }

    public function ReportStatus($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/Events'));
        } else {
            $this->db->where('event', $id);
            $this->db->select('event, reportable');
            $query = $this->db->get('events');

            $CurrentStatus = $query->result_array()[0]['reportable'];

            if ($CurrentStatus == 0) {
                $status = 1;
            } else {
                $status = 0;
            }

            $data = array(
                "reportable" => $status
            );
            $this->db->where('event', $id);
            $q = $this->db->update('events', $data);

            if ($q) {
                $this->session->set_flashdata('info', 'Ahora es un evento reportable.');
                redirect(base_url('staff/Events'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas Houston.');
                redirect(base_url('staff/Events'));
            }
        }
    }

    public function EvStatus($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/Events'));
        } else {
            $this->db->where('event', $id);
            $this->db->select('event, status');
            $query = $this->db->get('events');

            $CurrentStatus = $query->result_array()[0]['status'];

            if ($CurrentStatus == 0) {
                $status = 1;
            } else {
                $status = 0;
            }

            $data = array(
                "status" => $status
            );
            $this->db->where('event', $id);
            $q = $this->db->update('events', $data);

            if ($q) {
                $this->session->set_flashdata('info', 'Ahora es un evento publicado.');
                redirect(base_url('staff/Events'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas Houston.');
                redirect(base_url('staff/Events'));
            }
        }
    }

    public function Training()
    {
        //Consultado con la DB
        $this->phpdebug->debug('[SEGURIDAD] -> Validando niveles de accesos');
        $query_access  = $this->db->select('*')
            ->from('permisos')
            ->where('vid', $this->session->userdata('vid')) //VID de usuario 
            ->get();
        $access_nivel = $query_access->row_array();
        if (!empty($access_nivel)) { //El usuario está registrado en la db de permisos
            //******************************
            if ($access_nivel['pages_TR'] != 'true') { //NO TIENE ACCESO A LA ZONA
                redirect(base_url());
            } else {
                $this->load->view("pages_TR/staff_index");
            }
        }
    }

    public function asignargca($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/Training'));
        } else {
            $data = array(
                "encargado" => $this->session->userdata('vid'),
                "status" => 1
            );
            $this->db->where('id', $id);
            $q = $this->db->update('gca', $data);
            if ($q) {
                $this->session->set_flashdata('info', 'Se asigno correctamente.');
                redirect(base_url('staff/Training'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas asignando.');
                redirect(base_url('staff/Training'));
            }
        }
    }

    public function pendientegca($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/Training'));
        } else {
            $data = array(
                "encargado" => NULL,
                "status" => 0
            );
            $this->db->where('id', $id);
            $q = $this->db->update('gca', $data);
            if ($q) {
                $this->session->set_flashdata('info', 'Cambio estado correctamente.');
                redirect(base_url('staff/Training'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas cambiando de estado.');
                redirect(base_url('staff/Training'));
            }
        }
    }

    public function aceptadogca($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/Training'));
        } else {
            $data = array(
                "status" => 2
            );
            $this->db->where('id', $id);
            $q = $this->db->update('gca', $data);
            if ($q) {
                $this->session->set_flashdata('info', 'Cambio estado correctamente.');
                redirect(base_url('staff/Training'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas cambiando de estado.');
                redirect(base_url('staff/Training'));
            }
        }
    }

    public function denegadogca($id)
    {
        if ($id == NULL) {
            $this->session->set_flashdata('error', 'No se ha encontrado el ID, contacta con el departamento web.');
            redirect(base_url('staff/Training'));
        } else {
            $data = array(
                "status" => 3
            );
            $this->db->where('id', $id);
            $q = $this->db->update('gca', $data);
            if ($q) {
                $this->session->set_flashdata('info', 'Cambio estado correctamente.');
                redirect(base_url('staff/Training'));
            } else {
                $this->session->set_flashdata('error', 'Tenemos problemas cambiando de estado.');
                redirect(base_url('staff/Training'));
            }
        }
    }
}
