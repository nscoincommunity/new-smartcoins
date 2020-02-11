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

    //dari id investor itu ambil data id sponsornya
    $carim = $this->model_investasi->get_id_memberx($i_investor);
    $i_row = $carim->row();
    $i_sponsor = $i_row->sponsor;
    $jml_i = $row->jumlah_inv;
    $setting_bonus = $this->model_investasi->get_setting_bonus();

      
    //bonus khusus admin tanpa batas level
      $persen_admin = $setting_bonus->admin / 100;
      $jumlah = $persen_admin * $jml_i;
      $databonus_sp = array('id_penerima'=> 1, //$i_sponsor,
                         'jumlah' => $jumlah,
                         'tanggal' => date('Y-m-d'),
                         'jenis' => 'bonus admin',
                          'dari_investor'=> $i_investor,
                          'dari_investasi' => $i_investasinya );
        $this->model_investasi->insert_b_admin($databonus_sp);

    
        //jika id sponsor tidak sama dengan 0, berikan bonus level 1
    if ($i_sponsor != 0) {
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

              }
            }
          }
        }
    }
    
		redirect('administrator/investasi');
  }

  
	function delete_investasi($id) {
    $this->model_investasi->delete_investasi($id);
		redirect('administrator/investasi');
  }

/*
|  methode "profitshare()" akan dijalankan oleh cron job, sehari sekali
|  /usr/local/bin/php /home/u4433219/public_html/cryptotrend.id/index.php investasi profitshare   
*/

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
          $profit = $jumlah * $persen_harian /100; 
          // cekdata -> memastikan setiap paket investasi hanya sekali dpt profit dalam sehari.
          $cekdata = $this->db->query("SELECT * FROM sw_profit 
                     where id_investasti='".$id_i."' AND tanggal='".$today."' ")->num_rows();
          if ($cekdata == 0 ) {
            $this->model_investasi->bagi_hasil($profit,$id_inv,$id_i);
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
    $data['bonuss'] = $this->model_investasi->bonus_by_member($id);

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

        $tot = $this->model_investasi->jumlah_profit_per_member($id_member);
          foreach ($tot as $row) { $profit = $row['jumlah']; }
          $totwd = $this->model_investasi->jumlah_wd_per_member($id_member);
          foreach ($totwd as $rows) { $wd = $rows['jumlah_diminta']; } 
          
          $inv  = $this->model_investasi->jumlah_inv_balik($id_member);
          foreach ($inv as $balik) {
            $modal = $balik['jumlah_inv'];
          }

          $bonus = $this->model_investasi->jumlah_bonus_per_member($id_member)->jumlah; 

          $subsaldo = $row['jumlah'] + $modal + $bonus;
          $saldo = $subsaldo - $rows['jumlah_diminta'];

        if( $jumlah > $saldo ) {
          echo "<script>
          window.alert('Cannot withdraw funds more than the balance.' );
          window.location=('".base_url()."investasi/withdraw')

          </script> ";
        } elseif ($jumlah < 10 ) {
          echo "<script>
          window.alert('Minimum Withdraw $10' );
          window.location=('".base_url()."investasi/withdraw')

          </script> ";

        } 
        else  {

          $this->model_investasi->insert_withdraw($datainput);
          
           $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
              $idadmin = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
              $idmember = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$id_member'")->row_array();

              
              $subject      = 'Halo Admin, Ada Permintaan Withdraw!';
              $message      = "<html><body>

              
                  <table style='width:100%; margin-left:25px'>
                      <tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut ini data permintaan Withdraw yang masuk pada $tgl : </b></td></tr>
                      <tr><td><b>Nama Member </b></td>  <td> : $idmember[nama_lengkap] </td></tr>
                      <tr><td><b>Jumlah yang harus ditransfer </b></td>        <td> : $jumlah_ditransfer</td></tr>
                      <tr><td><b>Rekening </b></td>        <td> : $idmember[nama_bank] - $idmember[no_rekening] - $idmember[atas_nama]</td></tr>

                      <tr><td colspan='2'>
                      Informasi selengkapnya dan untuk membuat status WD menjadi TERKIRIM silakan login ke ADMINISTRATOR WEB KoinPintarKita.id
                      </td></tr>
                  </table><br>
                  </body></html> \n";

              $this->email->from($idadmin['email'], 'Permintaan WD Baru');
              $this->email->to('aan.ahmads78@gmail.com');
              $this->email->cc('');
              $this->email->bcc('');

              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->set_mailtype("html");
              $this->email->send();

              $config['protocol'] = 'sendmail';
              $config['mailpath'] = '/usr/sbin/sendmail';
              $config['charset'] = 'utf-8';
              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';
              $this->email->initialize($config);
          
          
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

              
              $subject      = 'Dana Anda Sudah Ditransfer!';
              $message      = "<html><body>
                  <table style='width:100%; margin-left:10px'>
                      <tr><td cellpadding=6 colspan='2'>
                      Halo $datamember[nama_lengkap], Penarikan Dana (Withdrawal) Anda sudah berhasil ditransfer ke nomor rekening yang terdaftar di akun Anda. </td></tr>
                      <tr><td><b>Jumlah yg ditransfer </b></td>   <td><b> : $jumlah_ditransfer</b></td></tr>
                      <tr><td><b>Rekening </b></td>        <td><b> : $datamember[nama_bank] - $datamember[no_rekening] - $datamember[atas_nama] </b></td></tr>

                      <tr><td colspan='2'>
                  Demikian yang dapat kami informasikan, terima kasih.    
                      </td></tr>
                  </table><br><br>
                  
                  Admin KoinPintarKita.id
                  </body></html> \n";

              $this->email->from($idadmin['email'], 'Dana sudah berhasil ditransfer');
              $this->email->to($datamember['email']);
              $this->email->cc('');
              $this->email->bcc('');

              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->set_mailtype("html");
              $this->email->send();

              $config['protocol'] = 'sendmail';
              $config['mailpath'] = '/usr/sbin/sendmail';
              $config['charset'] = 'utf-8';
              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';
              $this->email->initialize($config);
              
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

              
              $subject      = 'Dana Anda Sudah Ditransfer!';
              $message      = "<html><body>
                  <table style='width:100%; margin-left:10px'>
                      <tr><td cellpadding=6 colspan='2'>
                      Halo $datamember[nama_lengkap], Penarikan Dana (Withdrawal) Anda sudah berhasil ditransfer ke nomor rekening yang terdaftar di akun Anda. </td></tr>
                      <tr><td><b>Jumlah yg ditransfer </b></td>   <td><b> : $jumlah_ditransfer</b></td></tr>
                      <tr><td><b>Rekening </b></td>        <td><b> : $datamember[nama_bank] - $datamember[no_rekening] - $datamember[atas_nama] </b></td></tr>

                      <tr><td colspan='2'>
                  Demikian yang dapat kami informasikan, terima kasih.    
                      </td></tr>
                  </table><br><br>
                  
                  Admin KoinPintarKita.id
                  </body></html> \n";

              $this->email->from($idadmin['email'], 'Dana sudah berhasil ditransfer');
              $this->email->to($datamember['email']);
              $this->email->cc('');
              $this->email->bcc('');

              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->set_mailtype("html");
              $this->email->send();

              $config['protocol'] = 'sendmail';
              $config['mailpath'] = '/usr/sbin/sendmail';
              $config['charset'] = 'utf-8';
              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';
              $this->email->initialize($config);
              
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
              $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
              $idadmin = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
              //$getidmember = $this->db->query("SELECT * FROM sw_tarik_modal where id_penarikan='$idccm'")->row_array();
              //$idm = $getidmember['id_investor'];
              
              $datamember = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$idmember'")->row_array();

              
              $subject      = 'Permintaan Penarikan Dana CCM';
              $message      = "<html><body>
                  <table style='width:100%; margin-left:10px'>
                      <tr><td cellpadding=6 colspan='2'>
                      Halo Admin, ada permintaan penarikan Dana CCM. Berikut ini datanya  </td></tr>
                      <tr><td><b>Nama  </b></td>   <td><b> : $datamember[nama_lengkap]</b></td></tr>
                      <tr><td><b>Jumlah Penarikan </b></td>   <td><b> : $jumlah</b></td></tr>
                      <tr><td><b>Rekening </b></td>        <td><b> : $datamember[nama_bank] - $datamember[no_rekening] - $datamember[atas_nama] </b></td></tr>

                      <tr><td colspan='2'>
                  Untuk informasi selengkapnya serta untuk membuat status penarikan ini berhasil ditransfer, silahkan login ke Administrator web dan cek pada menu Penarikan CCM.    
                      </td></tr>
                  </table><br><br>
                  
                  
                  </body></html> \n";

              $this->email->from($idadmin['email'], 'Penarikan Dana CCM');
              $this->email->to('jianrapemda@gmail.com');
              $this->email->cc('');
              $this->email->bcc('');

              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->set_mailtype("html");
              $this->email->send();

              $config['protocol'] = 'sendmail';
              $config['mailpath'] = '/usr/sbin/sendmail';
              $config['charset'] = 'utf-8';
              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';
              $this->email->initialize($config);


    
            
      echo json_encode(array("status" => TRUE));
        }
  }

  function trf_danaccm(){
    $id = $this->uri->segment(4);
    $id_inv = $this->uri->segment(3);
    $this->model_investasi->transfer_danaccm($id);
    $this->model_investasi->update_status_inv_trf($id_inv);

    //kirim email ke user
              $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
              $idadmin = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
              $getidmember = $this->db->query("SELECT * FROM sw_tarik_modal where id_penarikan='$id'")->row_array();
              $idm = $getidmember['id_investor'];
              
              $datamember = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$idm'")->row_array();

              $subject      = 'Dana CCM Anda sudah Ditransfer!';
              $message      = "<html><body>
                  <table style='width:100%; margin-left:10px'>
                      <tr><td cellpadding=6 colspan='2'>
                      Halo $datamember[nama_lengkap], Dana CCM Anda sudah berhasil ditransfer ke rekening Anda. Berikut rinciannya  </td></tr>
                      
                      <tr><td><b>Jumlah Ditransfer </b></td>   <td><b> : $jumlah</b></td></tr>
                      <tr><td><b>Rekening Tujuan </b></td>        <td><b> : $datamember[nama_bank] - $datamember[no_rekening] - $datamember[atas_nama] </b></td></tr>
                      

                      <tr><td colspan='2'>
                  Demikian yang dapat kami informasikan. Terima kasih atas kerjasamanya.    
                      </td></tr>
                  </table><br><br>
                  - Admin -
                  
                  </body></html> \n";

              $this->email->from($idadmin['email'], 'Dana CCM Sudah Ditransfer');
              $this->email->to($datamember['email']); 
              $this->email->cc('');
              $this->email->bcc('');

              $this->email->subject($subject);
              $this->email->message($message);
              $this->email->set_mailtype("html");
              $this->email->send();

              $config['protocol'] = 'sendmail';
              $config['mailpath'] = '/usr/sbin/sendmail';
              $config['charset'] = 'utf-8';
              $config['wordwrap'] = TRUE;
              $config['mailtype'] = 'html';
              $this->email->initialize($config);


     
    redirect('administrator/penarikan_ccm');

  }













} // --> end of controller
