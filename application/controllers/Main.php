<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index(){
		$this->load->helper('cookie');

		$reff = $this->input->get('ref', TRUE);

		if($reff !='') {
					$ceksponsor = $this->db->query("SELECT * FROM rb_konsumen where username='".strip_tags($reff)."'")->num_rows();

					if ($ceksponsor>=1 ) {

						$cookie = array(
        				'name'   => 'sponsor',
        				'value'  => $reff,
						'expire' => 31104000 ); 
						set_cookie($cookie);
					} else {

						echo "<script>  
        window.onload = function() {
  document.getElementById('sponsorerror').className = 'active account--section sign-up-section';
};
    </script>";

						//echo "<script>
          				//	window.alert('Your Sponsor username invalid. Please contact your sponsor! ' );
          				//	window.location=('".base_url()."') </script> ";

						$cookie = array(
        				'name'   => 'sponsor',
        				'value'  => 'admin',
						'expire' => 31104000 ); 
						set_cookie($cookie);
					}

		} else {
			$cookie = array(
        			'name'   => 'sponsor',
        			'value'  => 'admin',
        			'expire' => 31104000,
    
        ); 
       set_cookie($cookie);

		}

		$data['ref'] = $this->input->cookie('sponsor',true); 

		$data['title'] = 'Our Smart Coins | Official Website';
		$data['infoterbaru'] = $this->model_berita->info_terbaru(3);
		$data['iklantengah'] = $this->model_iklan->iklan_tengah();
		$data['kategori_utama'] = $this->model_berita->kategori_utama();

		
		$this->load->view('osc-theme/header',$data);
		$this->load->view('osc-theme/home',$data);
		$this->load->view('osc-theme/footer',$data);

	}
}
