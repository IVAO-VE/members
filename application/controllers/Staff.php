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

    public function EVcalendar()
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
                }
                $this->load->view("pages_EV/staff_calendar", $data);
            }
        }
    }

    public function EVinsert()
    {
        $title = $this->input->post('title');
        $start = $this->input->post('start');
        $startTime = $this->input->post('startTime');
        $end = $this->input->post('end');
        $endTime = $this->input->post('endTime');
        $Description = $this->input->post('Description');
        $img = $this->input->post('img');
        $foro = $this->input->post('foro');

        $FinalEnd = $end . ' ' . $endTime;
        $FinalStart = $start . ' ' . $startTime;

        $data = array(
            "title" => $title,
            "start" => $FinalStart,
            "end" => $FinalEnd,
            "description" => $Description,
            "img" => $img,
            "foro" => $foro
        );

        $query = $this->db->insert('events', $data);

        if ($query) {
            redirect(base_url('staff/EVcalendar'));
        } else {
            redirect(base_url('staff/calendarEV'));
        }
    }

    public function EVedit(){
        $id = $this->input->post('id');
        $txtTitle = $this->input->post('txtTitle');
        $txtStart = $this->input->post('txtStart');
        $txtEnd = $this->input->post('txtEnd');
        $txtDescription = $this->input->post('txtDescription');
        $URLimg = $this->input->post('URLimg');
        $URLforo = $this->input->post('URLforo');

        $data = array(
            'title' => $txtTitle,
            'start' => $txtStart,
            'end' => $txtEnd
        );

        $this->db->where('id', $id);
        $query = $this->db->update('events', $data);
        if($query){
            redirect(base_url('staff/EVcalendar'));
        }
    }
}
