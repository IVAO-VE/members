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
                    $data['data'][$key]['event'] = $value->event;
                }
                $this->load->view("pages_EV/staff_calendar", $data);
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
            

            if ($startTime == '00-00-00') {
                $FinalStart = $start;
            } else {
                $FinalStart = $start . ' ' . $startTime;
            }

            if ($endTime == '00-00-00') {
                $FinalEnd = $end;
            } else {
                $FinalEnd = $end . ' ' . $endTime;
            }


            $this->load->model('discord');

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
            ]);

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
                $this->session->set_flashdata('info', 'La aeronave se ha registrado correctamente.'. $startTime);
                redirect(base_url('staff/calendarEV'));
            }
        }
    }

    public function EVedit()
    {
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

        $this->db->where('event', $id);
        $query = $this->db->update('events', $data);
        if ($query) {
            redirect(base_url('staff/EVcalendar'));
        }
    }

    public function EVdelete()
    {
        $event = $this->input->post('eventID');

        if ($event) {
            $this->db->where('event', $event);
            $query = $this->db->delete('events');

            if ($query) {
                redirect(base_url('staff/EVcalendar'));
            }
        }
    }
}
