<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function register() {
		$usersponsor = $this->input->cookie('sponsor',true);

		$data['title'] = 'Registration Form';
		$data['sponsor'] = $this->db->query("SELECT * FROM rb_konsumen where username='".strip_tags($usersponsor)."'")->result_array();
		$data['usponsor'] = $usersponsor;

		$this->load->view('osc-theme/header',$data);
		$this->load->view('osc-theme/register',$data);
		$this->load->view('osc-theme/footer',$data);
		

	}

	public function cek_email() {
		if( $this->input->is_ajax_request() ){ 
		$email = $this->input->post('email');
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response = "<span style='color: green; font-size:10px; '>Yes! This Email Available for use.</span>";
			$cek1 = $this->db->query("SELECT * FROM rb_konsumen where email='".strip_tags($email)."'")->num_rows();

		if ($cek1 > 0 ) {
			$response = "<span style='color: red; font-size:10px;'>Not Available. This email already in use! </span>";
		}

		} else {
			$response = "<span style='color: red; font-size:10px;'>Invalid email format! </span>";
		}
		echo $response;
   		die;

		}
	}

	public function cek_username() {
		if( $this->input->is_ajax_request() ){ 
				$uname = $this->input->post('username');
				if (preg_match("/^[a-z0-9]*$/",$uname)) {

					$response = "<span style='color: green; font-size:10px; '>Yes! Username Available for use.</span>";
					$cek1 = $this->db->query("SELECT * FROM rb_konsumen where username='".strip_tags($uname)."'")->num_rows();
					if ($cek1 > 0 ) {
					$response = "<span style='color: red; font-size:10px;'>Not Available. Username already in use! </span>";
					}
					echo $response;

					} else {

						$response = "<span style='color: red; font-size:10px;'>Not Available. Only lowercase letter and number allowed! </span>";

						echo $response;
						die;

					}
		}
	}


	public function cek_ktp() {
		if( $this->input->is_ajax_request() ){ 
				$noktp = $this->input->post('noktp');
				if (preg_match("/^[0-9]*$/",$noktp)) {

					$response = "<span style='color: green; font-size:10px; '>Available for use.</span>";
					$cek1 = $this->db->query("SELECT * FROM rb_konsumen where no_ktp='".strip_tags($noktp)."'")->num_rows();
					if ($cek1 > 0 ) {
					$response = "<span style='color: red; font-size:10px;'>Not Available. This Identity already in use! </span>";
					}
					echo $response;

					} else {

						$response = "<span style='color: red; font-size:10px;'>Not Available. Only number allowed! </span>";

						echo $response;
						die;

					}
		}
	}

	function activate($token){
		$this->model_auth->activate_member($token);
		$activated = $this->model_auth->get_status_member($token);
		if ($activated->status == 1) {
			$id_member = $activate;
			//kirim email akun sudah aktif ya

			redirect('auth/login');

		}else {
			redirect('main');
		}
		
	}



	public function proses_register() {

		$cekemail = $this->db->query("SELECT * FROM rb_konsumen where email='".strip_tags($this->input->post('email'))."'")->num_rows();

		$cekusername = $this->db->query("SELECT * FROM rb_konsumen where username='".strip_tags($this->input->post('username'))."'")->num_rows();

		$cekktp = $this->db->query("SELECT * FROM rb_konsumen where no_ktp='".strip_tags($this->input->post('noktp'))."'")->num_rows();



		if ($cekemail >= 1){
			echo "<script>window.alert( 'Sorry, this email : ".$this->input->post('email')." has registered. ' );
														window.location=('".base_url()."auth/register')</script>";
		} elseif ($cekusername >=1) {
			echo "<script>window.alert( 'Sorry, this username : ".$this->input->post('username')." already in used.');
														window.location=('".base_url()."auth/register')</script>";

		} elseif ($cekktp >=1 ) {
			echo "<script>window.alert( 'Sorry, this KTP : ".$this->input->post('noktp')." has registered. ' );
														window.location=('".base_url()."auth/register')</script>";

		} else{
			$this->model_auth->register();
			redirect('auth/pendaftaran_sukses');


			//$this->template->load('phpmu-one/template','phpmu-one/view_register_sukses',$data);
			//echo "<script>window.alert( 'Selamat, Data Pendaftaran Anda Berhasil Terkirim!' );
			//										window.location=('".base_url()."')</script>";
		}
	}

	public function pendaftaran_sukses() {
		$data['title'] = 'Pendaftaran Sukses';
		//$this->load->view('osc-theme/header',$data);
		$this->load->view('osc-theme/register_ok',$data);
		$this->load->view('osc-theme/footer',$data);

	}


	public function registerLama(){
		if (isset($_POST['submit'])){
			 $idk = strip_tags($this->input->post('id'));
			$dat = $this->db->query("SELECT * FROM rb_konsumen where kode_konsumen='$idk'");
			$datt = $this->db->query("SELECT * FROM rb_konsumen where kode_konsumen='$idk' AND password=''");
			$total = $datt->num_rows();
			$rows = $dat->row_array();

			if ($total == 0){
			    $data['title'] = 'Formulir Pendaftaran';
					$data['usr'] = $rows;
				  $this->template->load('phpmu-one/template','phpmu-one/view_register',$data);
			}else{
				$cekakun = $this->db->query("SELECT * FROM rb_konsumen where email='".strip_tags($this->input->post('d'))."'")->num_rows();
				if ($cekakun >= 1){
					echo "<script>window.alert('Maaf, Akun dengan Username : ".$this->input->post('a').", No KTP : ".$this->input->post('g').", Email : ".$this->input->post('d')." sudah Terdaftar,..!');
	                              window.location=('".base_url()."')</script>";
				}else{
					$this->model_auth->register();
					$this->session->set_userdata(array('id_konsumen'=>$rows['id_konsumen'],
				                                        'kode_konsumen'=>$this->input->post('id'),
				                                        'username'=>$this->input->post('a'),
				                                        'sponsor'=>''));
					redirect('members/profile');
				}
			}

		}else{
			$idk = $this->input->post('kode');
			$dat = $this->db->query("SELECT * FROM rb_konsumen where kode_konsumen='$idk'");
		  $row = $dat->result();
		  $total = $dat->num_rows();
		        if ($total == 0){
                    redirect('main');
		        }

			$data['title'] = 'Formulir Pendaftaran';
			$data['uname'] = $row;
			$this->template->load('phpmu-one/template','phpmu-one/view_register',$data);
		}
	}



	public function order(){
		if (isset($_POST['submit'])){
			$data['title'] = 'Success Order Kode Aktivasi';
			$cek = $this->db->query("SELECT * FROM rb_order_kode where alamat_email='".$this->input->post('b')."' AND waktu_order LIKE '".date('Y-m-d H:i')."%'")->num_rows();
			$identitass = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
			$rekeninggg = $this->db->query("SELECT * FROM rb_rekening");
			if ($cek >= 1){
				redirect('main');
			}
				$this->model_auth->order();
				$set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
				$harga = $this->input->post('jml') * $set['harga_pin'];

				$email_tujuan = strip_tags($this->input->post('b'));
				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Pemesanan Kode Aktivasi ...';
				$message      = "<html><body>Halooo! <b>".strip_tags($this->input->post('a'))."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan Permohonan Untuk Pembelian Kode Aktivasi di $identitass[nama_website],..
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi Anda : </b></td></tr>
						<tr><td><b>Jumlah Pin</b></td>			<td> : ".strip_tags($this->input->post('jml'))." Pin * $set[harga_pin]</td></tr>
						<tr><td><b>Nama Lengkap</b></td>		<td> : ".strip_tags($this->input->post('a'))."</td></tr>
						<tr><td><b>Alamat Email</b></td>		<td> : ".strip_tags($this->input->post('b'))."</td></tr>
						<tr><td><b>No Handphone</b></td>		<td> : ".strip_tags($this->input->post('c'))."</td></tr>
						<tr><td><b>Kota</b></td>				<td> : ".strip_tags($this->input->post('d'))." </td></tr>
						<tr><td><b>Nama Bank</b></td>			<td> : ".strip_tags($this->input->post('e'))." </td></tr>
						<tr><td><b>No Rekening</b></td>			<td> : ".strip_tags($this->input->post('f'))." </td></tr>
						<tr><td><b>Pemilik Rekening</b></td>	<td> : ".strip_tags($this->input->post('g'))." </td></tr>
						<tr><td colspan='2'>Silahkan Transfer : <b style='color:red'>Rp ".rupiah($harga)." </b>
											<br>dan selanjutnya orderran anda segera kami proses, salam success..</td></tr>
					</table><br>

					<table style='width:100%; margin-left:25px'>
	                  		<tr><td style='background:#337ab7; color:#fff; pading:20px' colspan='2'><b>Rekening Perusahaann : </b></td></tr>";
	                  		foreach ($rekeninggg->result_array() as $rows){
			                   $message .= "<tr bgcolor=#e3e3e3><td width=150px><b>Nama Bank</b></td> <td>$rows[nama_bank]</td></tr>
					                  <tr><td><b>No Rekening</b></td>       					<td>$rows[no_rekening]</td></tr>
					                  <tr><td><b>Pemilik Rekening</b></td>  					<td>$rows[pemilik_rekening]</td></tr>
					                  <tr><td colspan='2'><br></td></tr>";
		                    	}
	                		$message .= "</table><br>

					Admin, $identitass[nama_website]
					</body></html> \n";


				$this->email->from($identitass['email'], $identitass['nama_website']);
				$this->email->to($email_tujuan);
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

			$data['email'] = $this->input->post('b');
			$this->template->load('phpmu-one/template','phpmu-one/view_order_success',$data);
		}else{
			$data['jml'] = $this->input->post('jml');
			$data['title'] = 'Formulir Order Kode Aktivasi';
			$this->template->load('phpmu-one/template','phpmu-one/view_order',$data);
		}
	}

	public function login(){
		if (isset($_POST['login'])){
			if ($this->input->post('email') == '' OR $this->input->post('password') == ''){
				echo "<script>window.alert('Maaf, Inputan Tidak Boleh Kosong!!');
                                  window.location=('".base_url()."')</script>";
			}else{
				$email = $this->input->post('email');
				$password = hash("sha512", md5(strip_tags($this->input->post('password'))));
				$cek = $this->db->query("SELECT * FROM rb_konsumen where email='".$this->db->escape_str($email)."' AND password='".$this->db->escape_str($password)."'AND status ='1' ");
			    $row = $cek->row_array();
			    $total = $cek->num_rows();
				if ($total > 0){
					$this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'],
									   'username'=>$row['username'],
									   'nama_lengkap'=>$row['nama_lengkap']));
					redirect('members');
				}else{
					$data['title'] = 'Failed Login';
					$this->load->view('osc-theme/header',$data);
					$this->load->view('osc-theme/login_gagal',$data);
					$this->load->view('osc-theme/footer',$data);
					//$this->template->load('phpmu-one/template','phpmu-one/view_login_error',$data);
				}
			}
		}else{
			$data['title'] = 'User Login';
			$this->load->view('osc-theme/header',$data);
			$this->load->view('osc-theme/login',$data);
			$this->load->view('osc-theme/footer',$data);
			//$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
		}
	}

// 	public function reg(){
// 	    redirect('auth/voucher');
	   // if(isset($voucher)){
		  //$this->register();
	   // }
	/*
		if ($this->uri->segment(3)=='order'){
			$data['title'] = 'Order Kode Aktivasi';
			$this->template->load('phpmu-one/template','phpmu-one/view_order_code',$data);
		}else{
			$data['title'] = 'Input Kode Aktivasi';
			$this->template->load('phpmu-one/template','phpmu-one/view_reg',$data);
		}
	*/

// 	}

	public function lupass(){
		if (isset($_POST['lupa'])){
			$email = strip_tags($this->input->post('a'));
			$username = strip_tags($this->input->post('username'));
			$cek = $this->db->query("SELECT * FROM rb_konsumen where email='".$this->db->escape_str($email)."' AND username='$username'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
				$randompass = generateRandomString(10);
				$passwordbaru = hash("sha512", md5($randompass));
				$this->db->query("UPDATE rb_konsumen SET password='$passwordbaru' where email='".$this->db->escape_str($email)."' AND username='$username'");

				if ($row['jenis_kelamin']=='Laki-laki'){ $panggill = 'Bpk.'; }else{ $panggill = 'Ibuk.'; }
				$email_tujuan = $row['email'];
				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Permintaan Reset Password ...';
				$message      = "<html><body>Halooo! <b>$panggill ".$row['nama_lengkap']."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan Permintaan untuk Reset Password
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi akun Anda : </b></td></tr>
						<tr><td><b>Kode Konsumen</b></td>			<td> : ".$row['kode_konsumen']."</td></tr>
						<tr><td><b>Nama Lengkap</b></td>			<td> : ".$row['nama_lengkap']."</td></tr>
						<tr><td><b>Alamat Email</b></td>			<td> : ".$row['email']."</td></tr>
						<tr><td><b>No Telpon</b></td>				<td> : ".$row['no_hp']."</td></tr>
						<tr><td><b>Jenis Kelamin</b></td>			<td> : ".$row['jenis_kelamin']." </td></tr>
						<tr><td><b>Tanggal Lahir</b></td>			<td> : ".$row['tanggal_lahir']." </td></tr>
						<tr><td><b>Nomor KTP</b></td>				<td> : ".$row['no_ktp']." </td></tr>
						<tr><td><b>Alamat Lengkap</b></td>			<td> : ".$row['alamat_lengkap']." </td></tr>
						<tr><td><b>Ahli Waris</b></td>				<td> : ".$row['ahli_waris']." </td></tr>
						<tr><td><b>Kota</b></td>					<td> : ".$row['kota']." </td></tr>
						<tr><td><b>Provinsi</b></td>				<td> : ".$row['provinsi']." </td></tr>
						<tr><td><b>Nama Bank</b></td>				<td> : ".$row['nama_bank']." </td></tr>
						<tr><td><b>No Rekening</b></td>				<td> : ".$row['no_rekening']." </td></tr>
						<tr><td><b>Atas Nama</b></td>				<td> : ".$row['atas_nama']." </td></tr>
						<tr><td><b>Waktu Daftar</b></td>			<td> : ".$row['tanggal_daftar']."</td></tr>
					</table>
					<br> Member ID      : <b style='color:red'>$row[username]</b>
					<br> Password Login : <b style='color:red'>$randompass</b>
					<br> Silahkan Login di : <a href='https://cryptotrend.id/'>$identitas[url]</a> <br>
					Admin, $identitas[nama_website] </body></html> \n";

				$this->email->from($identitas['email'], $identitas['nama_website']);
				$this->email->to($email_tujuan);
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

				$data['email'] = $email;
				$data['title'] = 'Permintaan Reset Password Sudah Terkirim...';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupass_success',$data);
			}else{
				$data['email'] = $email;
				$data['title'] = 'Email Tidak Ditemukan...';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupass_error',$data);
			}
		}
	}
	
	public function reg($voucher){
	    if(isset($voucher)){
		    $this->register($voucher);
	    }else{
	        redirect('auth/voucher');
	    }
	}
	
	public function sponsor(){
		$data['title'] = 'Input Your Sponsor';

		$this->load->view('sewudesain/header',$data);
		$this->load->view('sewudesain/voucher',$data);
		$this->load->view('sewudesain/footer',$data);

	}
	
	public function proses_voucher() {

		$cekvoucherkosong = $this->db->query("SELECT * FROM voucher where kode_voucher='".strip_tags($this->input->post('txtVoucher'))."'")->num_rows();
		$cekvoucher = $this->db->query("SELECT * FROM voucher where kode_voucher='".strip_tags($this->input->post('txtVoucher'))."' AND status_pakai='1'")->num_rows();

		if ($cekvoucherkosong == 0){
			echo "<script>window.alert( 'Maaf, Voucher : ".$this->input->post('txtVoucher')." tidak Terdaftar. Hubungi Fouder Anda!' );
														window.location=('/auth/voucher')</script>";
		}elseif ($cekvoucher>=1){
		    echo "<script>window.alert( 'Maaf, Voucher : ".$this->input->post('txtVoucher')." sudah Terpakai. Hubungi Fouder Anda!' );
														window.location=('/auth/voucher')</script>";
		}else{
			redirect('auth/reg/'.$this->input->post('txtVoucher'));

			//$this->template->load('phpmu-one/template','phpmu-one/view_register_sukses',$data);
			//echo "<script>window.alert( 'Selamat, Data Pendaftaran Anda Berhasil Terkirim!' );
			//										window.location=('".base_url()."')</script>";
		}
	}
	
	
}
