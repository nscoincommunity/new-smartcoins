<?php
class Model_auth extends CI_model{
    function register(){
      $usr = $this->db->query("SELECT * FROM rb_konsumen ORDER BY id_konsumen DESC LIMIT 1");
      $row = $usr->row_array();

      $username = $this->db->escape_str(strip_tags($this->input->post('username'))); 
        $token = create_token(50);
        $datadbd = array( 'sponsor' => $this->db->escape_str(strip_tags($this->input->post('usponsor'))),
                          'username' => $username,
                          'urutan'=> '-',
                          'upline'=> '-',
                          'status' => 0,
                          'password'=>hash("sha512", md5($this->input->post('password'))),
                          'nama_lengkap'=>$this->db->escape_str(strip_tags($this->input->post('namalengkap'))),
                          'email'=>$this->db->escape_str(strip_tags($this->input->post('email'))),
                          'rekning_virtual'=>$this->db->escape_str(strip_tags($this->input->post('vrek'))),
                          'no_ktp'=>$this->db->escape_str(strip_tags($this->input->post('noktp'))),
                          'alamat_lengkap'=>'-',
                          'ahli_waris'=>'-',
                          'kota'=>$this->db->escape_str(strip_tags($this->input->post('kotanya'))),
                          'provinsi'=>'-',
                          'country'=>$this->db->escape_str(strip_tags($this->input->post('country'))),
                          'no_hp'=>$this->db->escape_str(strip_tags($this->input->post('nohpnya'))),
                          'nama_bank'=>$this->db->escape_str(strip_tags($this->input->post('namabank'))),
                          'no_rekening'=>$this->db->escape_str(strip_tags($this->input->post('norek'))),
                          'atas_nama'=>$this->db->escape_str(strip_tags($this->input->post('anrek'))),
                          'token' => $token,
                          'tanggal_daftar'=>date('Y-m-d'));

        $this->db->insert('rb_konsumen',$datadbd);
        $ident = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
        

        //email aktivasi akun
        $email_tujuan   = strip_tags($this->input->post('email'));
        $tglaktif       = date("d-m-Y H:i:s");
        $subject        = 'Activate Your Account!';
        $message        = "<html><body>Hello! 
        <b>".strip_tags($this->input->post('namalengkap'))."</b>
        <br>Your account at $ident[nama_website] has been successfully created. To be able to login to the member area, you must activate your account by clicking the following link :<br>
        <a href='".base_url('auth/activate')."/".$token."'>".base_url('auth/activate')."/".$token."</a><br><br>

        If the link doesn't work, you can copy the link above and paste it into your browser.
        <br><br>
            Admin, $ident[nama_website]
        </body></html> \n";

     
        
        $this->email->from('oursmartcoins.asia@gmail.com', $ident['nama_website']);
        $this->email->to($email_tujuan);
        $this->email->cc('');
        $this->email->bcc('');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();

        //smtp config
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
        
        
    }

    function activate_member($token){
        $datadb = array('status'=>1);
        $this->db->where('token',$token);
        $this->db->update('rb_konsumen',$datadb);
        
    }

    function get_status_member($token){
        $this->db->where('token',$token);
        $query = $this->db->get('rb_konsumen');
        return $query->row();
    }

    function order(){
        $datadb = array('jumlah'=>$this->db->escape_str(strip_tags($this->input->post('jml'))),
                        'nama_lengkap'=>$this->db->escape_str(strip_tags($this->input->post('a'))),
                        'alamat_email'=>$this->db->escape_str(strip_tags($this->input->post('b'))),
                        'no_hp'=>$this->db->escape_str(strip_tags($this->input->post('c'))),
                        'kota'=>$this->db->escape_str(strip_tags($this->input->post('d'))),
                        'nama_bank'=>$this->db->escape_str(strip_tags($this->input->post('e'))),
                        'no_rekening'=>$this->db->escape_str(strip_tags($this->input->post('f'))),
                        'pemilik_rekening'=>$this->db->escape_str(strip_tags($this->input->post('g'))),
                        'waktu_order'=>date('Y-m-d H:i:s'));
        $this->db->insert('rb_order_kode',$datadb);
    }
}
