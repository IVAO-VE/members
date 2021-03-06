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


class App extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                //$this->phpdebug->debug('[LOAD] -> Cargando el controlador de la aplicación');
                //Cargando la librería de sesiones
                //$this->phpdebug->debug('[LOAD] -> Cargando la sesión');
                //$this->load->library('session');
                //Cargando ayudante de redirecciones
                //$this->phpdebug->debug('[LOAD] -> Cargando ayudantes de la aplicación');
                //$this->load->helper('url');
                //Cargando el archivo de idioma correspondiente
                //$this->phpdebug->debug('[LOAD] -> Determinando el lenguaje para el usuario');
                $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
                if (strtoupper(substr($lang, 0, 2)) == 'ES') { //es_ES, en_US
                        $this->lang->load('website', 'spanish');
                } else {
                        $this->lang->load('website', 'english');
                }
        }


        public function index()
        {
                if ($this->session->userdata('vid') == "") {
                        //Validando el acceso en IVAO
                        $this->phpdebug->debug('[APP] -> Validando la seguridad dentro de IVAO');
                        $xMIEMBRO = $this->myfunctions->valida_API();
                        if (($xMIEMBRO->result == 1) && (!empty($xMIEMBRO->vid))) {
                                $this->phpdebug->debug('[APP] -> Miembro detactado y validado');
                                //Verificando los permisos de usuario
                                $this->phpdebug->debug('[APP] -> Determinando el nivel de acceso');
                                /*if (!$this->model_access->get_access($xMIEMBRO->vid, 'pages_PR')) {
                                        exit('Usted no tiene permisos para acceder a este sitio.');
                                }*/
                                //Consultado con la DB
                                $this->phpdebug->debug('[APP] -> Traduciendo su ubicación');
                                $query  = $this->db->select('*')
                                        ->from('paises')
                                        ->where('code', $xMIEMBRO->country) //Código de país 
                                        ->get();
                                $country_name = $query->row_array();
                                $query  = $this->db->select('*')
                                        ->from('paises')
                                        ->where('code', $xMIEMBRO->division) //Código de país 
                                        ->get();
                                $division_name = $query->row_array();
                                //Analizando el rango del miembro piloto 
                                $this->phpdebug->debug('[APP] -> Validando el rango de piloto');
                                switch ($xMIEMBRO->ratingpilot) {
                                        case 1: //
                                                $pilot_rating = 'Newbie Pilot';
                                                break;
                                        case 2: //
                                                $pilot_rating = 'Basic Flight Student';
                                                break;
                                        case 3: //
                                                $pilot_rating = 'Flight Student';
                                                break;
                                        case 4: //
                                                $pilot_rating = 'Advanced Flight Student';
                                                break;
                                        case 5: //
                                                $pilot_rating = 'Private Pilot';
                                                break;
                                        case 6: //
                                                $pilot_rating = 'Senior Private Pilot';
                                                break;
                                        case 7: //
                                                $pilot_rating = 'Commercial Pilot';
                                                break;
                                        case 8: //
                                                $pilot_rating = 'Airline Transport Pilot';
                                                break;
                                        case 9: //
                                                $pilot_rating = 'Senior Flight Instructor';
                                                break;
                                        case 10: //
                                                $pilot_rating = 'Chief Flight Instructor';
                                                break;
                                }
                                $pilot_rating_image = 'https://ivao.aero/data/images/ratings/pilot/' . $xMIEMBRO->ratingpilot . '.gif';
                                //Analizando el rango del miembro controlador
                                $this->phpdebug->debug('[APP] -> Validando el rango de controlador');
                                switch ($xMIEMBRO->ratingatc) {
                                        case 1: //
                                                $atc_rating = 'Newbie Controller';
                                                break;
                                        case 2: //
                                                $atc_rating = 'ATC Applicant';
                                                break;
                                        case 3: //
                                                $atc_rating = 'ATC Trainee';
                                                break;
                                        case 4: //
                                                $atc_rating = 'Advanced ATC Trainee';
                                                break;
                                        case 5: //
                                                $atc_rating = 'Aerodrome Controller';
                                                break;
                                        case 6: //
                                                $atc_rating = 'Approach Controller';
                                                break;
                                        case 7: //
                                                $atc_rating = 'Center Controller';
                                                break;
                                        case 8: //
                                                $atc_rating = 'Senior Controller';
                                                break;
                                        case 9: //
                                                $atc_rating = 'Senior ATC Instructor';
                                                break;
                                        case 10: //
                                                $atc_rating = 'Chief ATC Instructor';
                                                break;
                                }
                                $atc_rating_image = 'https://ivao.aero/data/images/ratings/atc/' . $xMIEMBRO->ratingatc . '.gif';
                                //Buscando la imagen de perfil del usuario.
                                $this->phpdebug->debug('[APP] -> Asignando la imagen de perfil');
                                if (file_exists(FCPATH . "_include/images/perfiles/" . $xMIEMBRO->vid . ".jpg")) {
                                        $member_image = base_url("_include/images/perfiles/") . $xMIEMBRO->vid . ".jpg";
                                } else {
                                        $member_image = base_url('_include/images/perfiles/') . "ve.png";
                                }
                                //Generando arreglo con datos del miembro detectado
                                $this->phpdebug->debug('[APP] -> Asignando variables globales de aplicación');
                                $arraymember = array(
                                        'result'            => $xMIEMBRO->result,
                                        'vid'               => $xMIEMBRO->vid,
                                        'firstname'         => $xMIEMBRO->firstname,
                                        'lastname'          => $xMIEMBRO->lastname,
                                        'fullname'          => $xMIEMBRO->firstname . ' ' . $xMIEMBRO->lastname,
                                        'member_img'        => $member_image,
                                        'rating'            => $xMIEMBRO->rating,
                                        'ratingatc'         => $xMIEMBRO->ratingatc,
                                        'ratingatc_name'    => $atc_rating,
                                        'ratingatc_img'     => $atc_rating_image,
                                        'ratingpilot'       => $xMIEMBRO->ratingpilot,
                                        'ratingpilot_name'  => $pilot_rating,
                                        'ratingpilot_img'   => $pilot_rating_image,
                                        'division_code'     => $xMIEMBRO->division,
                                        'division_name'     => $division_name['pais'],
                                        'country_code'      => $xMIEMBRO->country,
                                        'country_name'      => $country_name['pais'],
                                        'skype'             => $xMIEMBRO->skype,
                                        'hours_atc'         => $xMIEMBRO->hours_atc,
                                        'hours_pilot'       => $xMIEMBRO->hours_pilot,
                                        'fullhours'         => ($xMIEMBRO->hours_pilot + $xMIEMBRO->hours_atc), //Solo tiempo de vuelo y control ([ OJO ])
                                        'staff'             => $xMIEMBRO->staff,
                                        'va_staff_ids'      => $xMIEMBRO->va_staff_ids,
                                        'va_staff'          => $xMIEMBRO->va_staff,
                                        'va_staff_icaos'    => $xMIEMBRO->va_staff_icaos,
                                        'isNpoMember'       => $xMIEMBRO->isNpoMember,
                                        'va_member_ids'     => $xMIEMBRO->va_member_ids,
                                        'hq_pilot'          => $xMIEMBRO->hq_pilot
                                );
                                //print_r($arraymember);
                                //Cargando los datos de sesión
                                $this->session->set_userdata($arraymember);
                                //Atualizando datos del miembro en la DB
                                if ($this->db->simple_query('SELECT * FROM members_data WHERE vid=' . $this->session->userdata('vid'))) { //El usuario es de la división
                                        $query = $this->db->query("UPDATE members_data SET name='" . $this->session->userdata('fullname') . "', ip_access='" . $this->myfunctions->get_cliente_ip() . "', time_access='" . time() . "'  WHERE vid=" . $this->session->userdata('vid'));
                                }
                                //Cargando la vista inicial
                                $this->load->view('app_start');
                        }
                } else {
                        //Cargando la vista inicial
                        $this->load->view('app_start');
                }
        }

        public function logout()
        {
                $this->session->sess_destroy();
                set_cookie('ivao_token', "", time() - 3600);
                unset($_GET['IVAOTOKEN']); //Elimina TOKEN de ivao
                unset($_COOKIE['__cfduid']); //Elimina cookies
                unset($_COOKIE['ivao_token']);
                unset($_COOKIE['ci_session']);
                delete_cookie('__cfduid');
                delete_cookie('remember');
                delete_cookie('ivao_token');
                delete_cookie('ci_session');
                delete_cookie('IVAOTOKEN');
                $arraymember = array(
                        'result',
                        'vid',
                        'firstname',
                        'lastname',
                        'fullname',
                        'member_img',
                        'rating',
                        'ratingatc',
                        'ratingatc_name',
                        'ratingatc_img',
                        'ratingpilot',
                        'ratingpilot_name',
                        'ratingpilot_img',
                        'division_code',
                        'division_name',
                        'country_code',
                        'country_name',
                        'skype',
                        'hours_atc',
                        'hours_pilot',
                        'fullhours',
                        'staff',
                        'va_staff_ids',
                        'va_staff',
                        'va_staff_icaos',
                        'isNpoMember',
                        'va_member_ids',
                        'hq_pilot'
                );
                $this->session->unset_userdata($arraymember);
                redirect('https://ve.ivao.aero');
        }

        public function profile()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('app_profile');
                } else {
                        redirect(base_url());
                }
        }

        /** ************************************************************************
         *  Funciones de control para el departamento de Eventos
         */

        public function calendar()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->db->where('status', 1);
                        $q = $this->db->get('events');
                        if ($q->num_rows() > 0) {
                                $data['result'] =    $q->result();
                        } else {
                                $data['result'] = false;
                        }


                        foreach ($data['result'] as $key => $value) {
                                $data['data'][$key]['title'] = $value->title;
                                $data['data'][$key]['start'] = $value->start;
                                $data['data'][$key]['end'] = $value->end;
                                $data['data'][$key]['description'] = $value->description;
                                $data['data'][$key]['img'] = $value->img;
                                $data['data'][$key]['foro'] = $value->foro;
                        }
                        $this->load->view('pages_EV/calendar', $data);
                } else {
                        redirect(base_url());
                }
        }

        public function events()
        {
                if ($this->session->userdata('vid') != "") {
                     $this->load->view('pages_EV/events');
                } else {
                        redirect(base_url());
                }
        }
        /** ************************************************************************/

        /** ************************************************************************
         *  Funciones de control para el departamento de Operaciones de Vuelo
         */
        public function airlines()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_FO/airlines_index');
                } else {
                        redirect(base_url());
                }
        }

        public function charts()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_FO/charts_index');
                } else {
                        redirect(base_url());
                }
        }

        public function meteorologic()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_FO/meteorologic_index');
                } else {
                        redirect(base_url());
                }
        }

        public function information()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_FO/information_index');
                } else {
                        redirect(base_url());
                }
        }


        public function sceneries()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_FO/sceneries_index');
                } else {
                        redirect(base_url());
                }
        }

        public function notams()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_FO/notams_index');
                } else {
                        redirect(base_url());
                }
        }
        /** *************************************************************************/

        /** ************************************************************************
         *  Funciones de control para el departamento de Operaciones de Control
         */
        public function sectors()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_AO/sectors_index');
                } else {
                        redirect(base_url());
                }
        }

        public function transponders()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_AO/transponders_index');
                } else {
                        redirect(base_url());
                }
        }

        public function guests()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_AO/guests_index');
                } else {
                        redirect(base_url());
                }
        }

        public function facilitys()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_AO/facilitys_index');
                } else {
                        redirect(base_url());
                }
        }
        /** *************************************************************************/

        /** ************************************************************************
         *  Funciones de control para el departamento de Entrenamiento
         */
        public function documents()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_TR/documents_index');
                } else {
                        redirect(base_url());
                }
        }
        /** *************************************************************************/

        /** ************************************************************************
         *  Funciones de control para el departamento de Relaciones Publicas
         */
        public function discord()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_PR/discord_index');
                } else {
                        redirect(base_url());
                }
        }
        /** *************************************************************************/

        /** ************************************************************************
         *  Funciones de control para el departamento de Web y Sistemas
         */
        public function support()
        {
                if ($this->session->userdata('vid') != "") {
                        $this->load->view('pages_WM/support_index');
                } else {
                        redirect(base_url());
                }
        }
        /** *************************************************************************/

        /** ************************************************************************
         *  Funciones de control para actualizar el correo del miembro
         */
        public function email_up()
        {
                try{
                        if ($this->session->userdata('vid') != "") {
                                $MyMAIL = trim($_POST['email']);
                                $this->db->query('UPDATE members_data SET mail="'.$MyMAIL.'" WHERE vid='.$this->session->userdata('vid'));
                        }
                        redirect(base_url());
                } catch (Exception $e) {
                    //Problema detetado
                    $this->phpdebug->debug('[DEBUG] -> Excepción: '.$e->getMessage());
                    $this->myfunctions->showDIALOG(false, "Control de errores", $e->getMessage(), 5);
                }
        }
        /** *************************************************************************/

        
}
