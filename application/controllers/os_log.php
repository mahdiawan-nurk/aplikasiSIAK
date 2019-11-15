

    <?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserDetails extends CI_Controller {

     function index(){

      $this->load->library('user_agent');

      $data['browser'] = $this->agent->browser();

      $data['browser_version'] = $this->agent->version();

      $data['os'] = $this->agent->platform();

      $data['ip_address'] = $this->input->ip_address();

      $this->load->view('user_details', $data);

     }

    }

    ?>
