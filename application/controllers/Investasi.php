<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Investasi extends CI_Controller {

	function index() {
		cek_session_members();
		$id = $this->session->userdata('id_konsumen');
		$data['daftarinvestasi'] = $this->model_investasi->daftar_investasi($id);

		$this->load->view('sw-member/header',$data);
		$this->load->view('sw-member/investasi',$data);
		$this->load->view('sw-member/footer',$data);
  }
  
  function cek_jumlah() {
    if( $this->input->is_ajax_request() ){ 
        $jumlah = $this->input->post('jumlah');
        $fee = $this->model_investasi->get_setting_bonus()->fee_maintenance;
        $status = 'salah';
        

			 if ($jumlah >= 100 ) {
                      
                      $total = $jumlah + $fee;
                      $status = 'benar';
                    
					         	echo json_encode(array('status'=>$status,'jumlah'=>$jumlah,'total'=>$total,'fee'=>$fee)); 
                  
          } else {

          $status = 'salah';
          $total = $jumlah ;
					echo json_encode(array('status'=>$status,'total'=>$total,'jumlah'=>$jumlah,'fee'=>$fee)); 

					} 
    }
  }

  

	function investasi_add() {
    cek_session_members();
    if ($this->input->is_ajax_request()) {
        //$kode       = $this->input->post('voucher');
        $jumlah     = $this->input->post('jumlah');
        $fee        = $this->model_investasi->get_setting_bonus()->fee_maintenance;
        $id_inv 		= $this->input->post('id_investor');
        
        if($jumlah >= 100 ) {
          $input = $this->model_investasi->insert_investasi($id_inv,$jumlah,$fee);
         // $this->model_investasi->insert_fee($id_inv,$fee);

              echo json_encode(array('status'=>TRUE,'pesan'=>'OK'));
        } else {
          echo json_encode(array('status'=>FALSE,'pesan'=>'Minimum Deposit is $100'));
        }
        
        //$kode       = acakangkahuruf(8);
        
    }

  }


  function info_transfer() {
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/investasi_sukses',$data);
    $this->load->view('sw-member/footer',$data);
  }

  function acc_investasi($id) {
    
    $hold = $this->model_investasi->get_setting_bonus()->hold;
    $end = $this->model_investasi->get_setting_bonus()->masa_kontrak;

    $xx = $hold + 1 ;
    $zz = $end - $xx;

    $dayhold1 ='P'.$hold.'D';  
    $dayhold2 = 'P'.$zz.'D';

    $tgl_acc  = date('Y-m-d');
    $date_1   = new DateTime($tgl_acc);
    $date_1->add(new DateInterval($dayhold1));

    $date_2   = new DateTime($date_1->format('Y-m-d'));
    $date_2->add(new DateInterval($dayhold2));

    $data_update = array (
      'tgl_acc' => $tgl_acc,
      'tgl_mulai_hitung' => $date_1->format('Y-m-d'),
      'tgl_akhir_hitung' => $date_2->format('Y-m-d'),
      'status' => 1
      );
    $this->model_investasi->acc_investasi($id,$data_update);

    //cari id investornya
    $invx = $this->model_investasi->get_id_invest($id);
    $row = $invx->row();
    $i_investor = $row->id_investor;
    $i_investasinya = $row->id_inv;
    $fee_x = $row->fee;

    //dari id investor itu ambil data id sponsornya
    $carim = $this->model_investasi->get_id_memberx($i_investor);
    $i_row = $carim->row();
    $i_sponsor = $i_row->sponsor;
    $jml_i = $row->jumlah_inv;
    $setting_bonus = $this->model_investasi->get_setting_bonus();

    // insert fee $10 
    $this->model_investasi->insert_fee_maintetance($fee_x,$i_investor,$i_investasinya);

      
    //bonus khusus admin tanpa batas level
      $persen_admin = $setting_bonus->admin / 100;
      $bonusadmin = $persen_admin * $jml_i;
      $databonusadmin = array('id_penerima'=> 1, //ini ID khusus unutk Admin
                         'jumlah' => $bonusadmin,
                         'tanggal' => date('Y-m-d'),
                         'jenis' => 'bonus admin',
                          'dari_investor'=> $i_investor,
                          'dari_investasi' => $i_investasinya );
        $this->model_investasi->insert_b_admin($databonusadmin);

    

      //jika id sponsor tidak sama dengan 0, berikan bonus level 1
  if ($i_sponsor != 0) {

      //Deposit $ 100 to $ 999 Compensation bonus sponsorship level 1 - 2
        if ($jml_i >= 100 && $jml_i <= 999 ) {

                          //bonus level 1
                      $persen_l1 = $setting_bonus->level1 / 100;
                      $bonus_l1 = $persen_l1 * $jml_i;
                      $databonus_l1 = array('id_penerima' => $i_sponsor,
                                            'jumlah' => $bonus_l1,
                                            'tanggal' => date('Y-m-d'),
                                            'jenis' => 'bonus level 1',
                                          'dari_investor'=> $i_investor,
                                        'dari_investasi' => $i_investasinya);
                      $this->model_investasi->insert_b_level1($databonus_l1);

                      // cari L2
                      $cari_l2 = $this->model_investasi->get_id_memberx($i_sponsor);
                      $l2_row = $cari_l2->row();
                      $id_level2 = $l2_row->sponsor;

                      if ($id_level2 != 0) {
                        //bonus level 2
                        $persen_l2 = $setting_bonus->level2 / 100;
                        $bonus_l2 = $persen_l2 * $jml_i;
                        $databonus_l2 = array('id_penerima' => $id_level2,
                                              'jumlah' => $bonus_l2,
                                              'tanggal' => date('Y-m-d'),
                                              'jenis' => 'bonus level 2',
                                            'dari_investor'=> $i_investor,
                                        'dari_investasi' => $i_investasinya);
                        $this->model_investasi->insert_b_level2($databonus_l2);

                      }

          } else {

                      //bonus level 1
                      $persen_l1 = $setting_bonus->level1 / 100;
                      $bonus_l1 = $persen_l1 * $jml_i;
                      $databonus_l1 = array('id_penerima' => $i_sponsor,
                                            'jumlah' => $bonus_l1,
                                            'tanggal' => date('Y-m-d'),
                                            'jenis' => 'bonus level 1',
                                          'dari_investor'=> $i_investor,
                                        'dari_investasi' => $i_investasinya);
                      $this->model_investasi->insert_b_level1($databonus_l1);

                      // cari L2
                      $cari_l2 = $this->model_investasi->get_id_memberx($i_sponsor);
                      $l2_row = $cari_l2->row();
                      $id_level2 = $l2_row->sponsor;

                      if ($id_level2 != 0) {
                        //bonus level 2
                        $persen_l2 = $setting_bonus->level2 / 100;
                        $bonus_l2 = $persen_l2 * $jml_i;
                        $databonus_l2 = array('id_penerima' => $id_level2,
                                              'jumlah' => $bonus_l2,
                                              'tanggal' => date('Y-m-d'),
                                              'jenis' => 'bonus level 2',
                                            'dari_investor'=> $i_investor,
                                        'dari_investasi' => $i_investasinya);
                        $this->model_investasi->insert_b_level2($databonus_l2);


                        // cari L3
                        $cari_l3 = $this->model_investasi->get_id_memberx($id_level2);
                        $l3_row = $cari_l3->row();
                        $id_level3 = $l3_row->sponsor;

                        if($id_level3 != 0) {
                          //bonus level 3
                          $persen_l3 = $setting_bonus->level3 / 100;
                          $bonus_l3  = $persen_l3 * $jml_i;
                          $databonus_l3 = array('id_penerima' => $id_level3,
                                                'jumlah' => $bonus_l3,
                                                'tanggal' => date('Y-m-d'),
                                                'jenis' => 'bonus level 3',
                                              'dari_investor'=> $i_investor,
                                        'dari_investasi' => $i_investasinya);
                          $this->model_investasi->insert_b_level3($databonus_l3);

                          //cari L4
                          $cari_l4 = $this->model_investasi->get_id_memberx($id_level3);
                          $l4_row = $cari_l4->row();
                          $id_level4 = $l4_row->sponsor;

                          if($id_level4 != 0) {
                            //bonus Level 4
                            $persen_l4 = $setting_bonus->level4 / 100;
                            $bonus_l4 = $persen_l4 * $jml_i;
                            $databonus_l4 = array('id_penerima' => $id_level4,
                                                  'jumlah' => $bonus_l4,
                                                  'tanggal' => date('Y-m-d'),
                                                  'jenis' => 'bonus level 4',
                                                'dari_investor'=> $i_investor,
                                        'dari_investasi' => $i_investasinya);
                            $this->model_investasi->insert_b_level4($databonus_l4);

                              //cari L5
                            $cari_l5 = $this->model_investasi->get_id_memberx($id_level4);
                            $l5_row = $cari_l5->row();
                            $id_level5 = $l5_row->sponsor;

                            if($id_level5 != 0){
                              //bonus level 5
                              $persen_l5 = $setting_bonus->level5 / 100;
                              $bonus_l5 = $persen_l5 * $jml_i;
                              $databonus_l5 = array('id_penerima'=> $id_level5,
                                                    'jumlah' => $bonus_l5,
                                                    'tanggal' => date('Y-m-d'),
                                                    'jenis'=>'bonus level 5',
                                                  'dari_investor'=> $i_investor,
                                          'dari_investasi' => $i_investasinya);
                              $this->model_investasi->insert_b_level5($databonus_l5);
                            
                            } // close level 5
                        } // close level 4
                   } // close level 3
               } // close level 2
            } // else lebih dari 999 

      } //close if sponsor !=''
    
    redirect('administrator/investasi');
    
  } // close methode 


  
	function delete_investasi($id) {
    $this->model_investasi->delete_investasi($id);
		redirect('administrator/investasi');
  }


  function profitshare() {
    $investasi = $this->db->query("SELECT * FROM sw_investasi where status=1")->result_array();
    
    foreach ($investasi as $row ) {
      $today      = date('Y-m-d'); 
      $tgl_hitung = $row['tgl_mulai_hitung'];
      $tgl_stop   = $row['tgl_akhir_hitung'];
      $jumlah     = $row['jumlah_inv'];
      $id_inv     = $row['id_investor'];
      $id_i       = $row['id_inv'];

      if ($tgl_hitung <= $today && $tgl_stop >= $today) {
          $persen_harian = $this->model_investasi->get_setting_bonus()->persen_harian;
          
          $masa_kontrak = $this->model_investasi->get_setting_bonus()->masa_kontrak;
          $masa_hold = $this->model_investasi->get_setting_bonus()->hold;
          $pembagi_rod = $masa_kontrak - $masa_hold;

          $profit = $jumlah * $persen_harian /100; 
          $rod_harian = $jumlah / $pembagi_rod;

          // cekdata -> memastikan setiap paket investasi hanya sekali dpt profit dalam sehari.
          $cekprofit = $this->db->query("SELECT * FROM sw_profit 
                     where id_investasti='".$id_i."' AND tanggal='".$today."' ")->num_rows();

          $cekrod = $this->db->query("SELECT * FROM sw_rod 
                     where id_investasi='".$id_i."' AND tanggal='".$today."' ")->num_rows();


          if ($cekprofit == 0 && $cekrod == 0 ) {
            $this->model_investasi->bagi_hasil($profit,$id_inv,$id_i); 
            $this->model_investasi->daily_rod($rod_harian,$id_inv,$id_i);

            if ($today == $tgl_stop ) { 
              $this->model_investasi->update_status($id_i);
            } 
          }
      }    
  }
}

  function get_data_investasi_json($id){
	//if( $this->input->is_ajax_request() ){

		header('Content-Type: application/json');
		$datat = $this->model_investasi->daftar_investasi($id);
		echo $datat;

	//	}
	}

  function myprofit() {
  // menampilkan data profit harian untuk member 
  // seleksi dari teble sw_profit berdasarkan ID member yg login.
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['myprofit'] = $this->model_investasi->daftar_profit($id);
    $data['jum'] = count($data['myprofit']);
   // $data['total_profit'] = $this->model_investasi->jumlah_profit_per_member($id);
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/profit',$data);
    $this->load->view('sw-member/footer',$data);


}

  function mybonus(){
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['listbonus'] = $this->model_investasi->bonus_by_member($id);

    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/list_bonus',$data);
    $this->load->view('sw-member/footer',$data);


  }

  function withdraw() {
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['daftar_withdraw'] = $this->model_investasi->daftar_withdraw($id);

    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/withdraw',$data);
    $this->load->view('sw-member/footer',$data);

  }

  function tarik_dana() {
    cek_session_members();
        $id_member      = $this->input->post('id_member');
        $jumlah         = $this->input->post('jumlah_penarikan');
        $tgl            = date('Y-m-d');
        $fee_admin      = 0;
        $jumlah_ditransfer = $jumlah - $fee_admin;

        $datainput = array ('id_member' => $id_member,
                            'jumlah_diminta' => $jumlah,
                            'fee_admin' => $fee_admin,
                            'jumlah_ditransfer' => $jumlah_ditransfer,
                            'tgl_diminta' => $tgl,
                            'status' => 0
        );
        
        $totprofit = $this->model_investasi->jumlah_profit_per_member($id_member)->jumlah;
        $rod = $this->model_investasi->return_of_deposit($id_member)->jumlah_rod;
        $bonus = $this->model_investasi->jumlah_bonus_per_member($id_member)->jumlah;
        $totwd = $this->model_investasi->jumlah_wd_per_member($id_member)->jumlah_diminta;

        $saldo = $totprofit + $rod + $bonus - $totwd;

        if( $jumlah > $saldo ) {
          echo "<script>
          window.alert('Cannot withdraw funds more than the balance.' );
          window.location=('".base_url()."investasi/withdraw')

          </script> ";
        } elseif ($jumlah < 50 ) {
          echo "<script>
          window.alert('Minimum Withdraw $50' );
          window.location=('".base_url()."investasi/withdraw')

          </script> ";

        } 
        else  {
          $this->model_investasi->insert_withdraw($datainput);

          /* kirim Email pakai SMTP*/
        $email_tujuan   = $this->model_investasi->get_info_member($id_member)->email;
        $inforek        = $this->model_investasi->get_info_member($id_member)->nama_bank. ' - '
                          .$this->model_investasi->get_info_member($id_member)->no_rekening.' - '
                          .$this->model_investasi->get_info_member($id_member)->atas_nama;
        $vrek           = $this->model_investasi->get_info_member($id_member)->rekning_virtual;
        $tglaktif       = date("d-m-Y H:i:s");
        $subject        = 'Permintaan WD dari Member OSC!';
        $message        = "<html><body>
        Hello Admin!</b> 
        <br>ada permintaan penarikan dana dari member OurSmartCoins.<br>
        Jumlah Penarikan : ".$jumlah."<br>
        Tujuan Transfer ke : ".$inforek. " <br> atau <br> ".$vrek."
        <br><br><br>
            <b>Our Smart Coins System</b>
        </body></html> \n";

        $this->email->from('oursmartcoins.asia@gmail.com', 'Our Smart Coins');
        $this->email->to('oursmartcoin@gmail.com');
        $this->email->cc('');
        $this->email->bcc('');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'oursmartcoins.asia@gmail.com',
        'smtp_pass' => 'koinsmart@asia',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1' );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);
        /* End of Kirim Email */

        redirect('investasi/withdraw');

        }
        
      
  }
function cek_saldo() {
  if( $this->input->is_ajax_request() ){ 
   $id = $this->session->userdata('id_konsumen');
          $tot = $this->model_investasi->jumlah_profit_per_member($id);
          foreach ($tot as $row) { $profit = $row['jumlah']; }
          $totwd = $this->model_investasi->jumlah_wd_per_member($id);
          foreach ($totwd as $rows) { $wd = $rows['jumlah_diminta']; } 
          $saldo = $profit - $wd;
    if($saldo < 100000 ) {
      echo json_encode(array("status" => FALSE));
    } 
  }
}

  function trf_profit($id){

              $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
              $idadmin = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
              $getidmember = $this->db->query("SELECT * FROM sw_withdraw where id='$id'")->row_array();
              $idm = $getidmember['id_member'];

              $jumlah_ditransfer = rupiah($getidmember['jumlah_ditransfer']);
              $datamember = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$idm'")->row_array();
              

              $banknya = $datamember['nama_bank'].' - '.$datamember['no_rekening'].' - '.$datamember['atas_nama'];

              $this->model_investasi->transfer_profit_kebank($id,$banknya);


          /* kirim Email pakai SMTP*/
        $emailnya = $this->model_investasi->get_info_member($idm)->email;
        $namanya = $this->model_investasi->get_info_member($idm)->nama_lengkap;

        $tglaktif       = date("d-m-Y H:i:s");
        $subject        = 'Your withdrawal has been processed!';
        $message        = "<html><body>
        Hello ".$namanya."!</b> 
        <br> Your withdrawal has been processed. <br>
        Amount : ".$jumlah_ditransfer."<br>
        Pay To : ".$banknya. " <br> 

        Thank you for your cooperation.
        <br><br><br>
            <b>Admin Our Smart Coins</b>
        </body></html> \n";

        $this->email->from('oursmartcoins.asia@gmail.com','Our Smart Coins');
        $this->email->to($emailnya);
        $this->email->cc('');
        $this->email->bcc('');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'oursmartcoins.asia@gmail.com',
        'smtp_pass' => 'koinsmart@asia',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1' );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);
        /* End of Kirim Email */

    redirect('administrator/permintaan_wd');

  }

  function trf_profit_crypto($id){

              $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
              $idadmin = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
              $getidmember = $this->db->query("SELECT * FROM sw_withdraw where id='$id'")->row_array();
              $idm = $getidmember['id_member'];
              $jumlah_ditransfer = rupiah($getidmember['jumlah_ditransfer']);
              $datamember = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$idm'")->row_array();

              $banknya = $datamember['rekning_virtual'];
              $this->model_investasi->transfer_profit_crypto($id,$banknya);

               /* kirim Email pakai SMTP*/
        $emailnya = $this->model_investasi->get_info_member($idm)->email;
        $namanya = $this->model_investasi->get_info_member($idm)->nama_lengkap;

        $tglaktif       = date("d-m-Y H:i:s");
        $subject        = 'Your withdrawal has been processed!';
        $message        = "<html><body>
        Hello ".$namanya."!</b> 
        <br> Your withdrawal has been processed. <br>
        Amount : ".$jumlah_ditransfer."<br>
        Pay To : ".$banknya. " <br> 

        Thank you for your cooperation.
        <br><br><br>
            <b>Admin Our Smart Coins</b>
        </body></html> \n";

        $this->email->from('oursmartcoins.asia@gmail.com','Our Smart Coins');
        $this->email->to($emailnya);
        $this->email->cc('');
        $this->email->bcc('');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'oursmartcoins.asia@gmail.com',
        'smtp_pass' => 'koinsmart@asia',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1' );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);
        /* End of Kirim Email */


              
    redirect('administrator/permintaan_wd');

  }

  public function tarik_modalku($id) {
    if( $this->input->is_ajax_request() ){
            $id = $this->uri->segment(3);
            $data = $this->model_investasi->get_data_tarik_modal($id);

            echo json_encode($data);
        }

  }

  public function form_tarik_modalku(){
    if( $this->input->is_ajax_request() ){
      $idccm = $this->input->post('id_inv');
      $idmember = $this->session->userdata('id_konsumen');
      $jumlah = $this->input->post('jumlah');
      $tgl_minta = date('Y-m-d');
      $data_insert = array(
                    'id_investasi' => $idccm,
                    'id_investor' => $idmember,
                    'jumlah' => $jumlah,
                    'tgl_penarikan' => $tgl_minta,
                    'status' => 0
      );
      $this->model_investasi->tarik_dana_ccm($data_insert);
      $this->model_investasi->update_status_inv($idccm);
      //kirim email ke admin
             

    
            
      echo json_encode(array("status" => TRUE));
        }
  }

  function trf_danaccm(){
    $id = $this->uri->segment(4);
    $id_inv = $this->uri->segment(3);
    $this->model_investasi->transfer_danaccm($id);
    $this->model_investasi->update_status_inv_trf($id_inv);

    
 
    redirect('administrator/penarikan_ccm');

  }

  function level_1() {
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');

    $data['sp_level1'] = $this->model_investasi->get_sponsor($id)->result_array();
    $data['tot_bonus_l1'] = $this->model_investasi->total_bonus($id,$jenis='bonus level 1');
    
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/level_1',$data);
    $this->load->view('sw-member/footer',$data);
  }

  function level_2($id_upline) {
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['sp_level2'] = $this->model_investasi->get_sponsor($id_upline)->result_array();
    
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/level_2',$data);
    $this->load->view('sw-member/footer',$data);
  }

  function level_3($id_upline) {
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['sp_level3'] = $this->model_investasi->get_sponsor($id_upline)->result_array();
    
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/level_3',$data);
    $this->load->view('sw-member/footer',$data);
  }


  function level_4($id_upline) {
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['sp_level4'] = $this->model_investasi->get_sponsor($id_upline)->result_array();
    
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/level_4',$data);
    $this->load->view('sw-member/footer',$data);
  }


  function level_5($id_upline) {
    cek_session_members();
    $id = $this->session->userdata('id_konsumen');
    $data['sp_level5'] = $this->model_investasi->get_sponsor($id_upline)->result_array();
    
    $this->load->view('sw-member/header',$data);
    $this->load->view('sw-member/level_5',$data);
    $this->load->view('sw-member/footer',$data);
  }















} // --> end of controller
