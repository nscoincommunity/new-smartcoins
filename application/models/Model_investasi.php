<?php
class Model_investasi extends CI_model {

  function insert_investasi ($idk,$jumlah,$fee){
      $code = acakangkahuruf(4);
      $datadb = array('id_investor'=>$idk,
                      'jumlah_inv'=>$jumlah,
                      'tgl_dibuat'=>date('Y-m-d H:i:s'),
                      'status'=>0,
                      'fee' => $fee,
                      'kode_unik'=>$code
                      );
      $this->db->insert('sw_investasi',$datadb);

  }

  function acc_investasi($id,$data_update) {
    $this->db->where('id_inv',$id);
    $this->db->update('sw_investasi',$data_update);
  }

  function update_status($id_i) {
   // $today = date('Y-m-d');
   $update = array ('status' => 2 );
   $this->db->where('id_inv',$id_i);
   // $this->db->where('tgl_akhir_hitung',$today);
   $this->db->update('sw_investasi', $update);
    

  }

  function transfer_profit_kebank($id,$banknya){
    
    $today = date('Y-m-d');
    $datadb = array('status' => 1,
                    'tujuan_transfer' => $banknya,
                    'tgl_ditransfer' => $today);

    $this->db->where('id',$id);
    $this->db->update('sw_withdraw',$datadb);
  }

  function transfer_profit_crypto($id,$banknya){
    
    $today = date('Y-m-d');
    $datadb = array('status' => 1,
                    'tujuan_transfer' => $banknya,
                    'tgl_ditransfer' => $today);

    $this->db->where('id',$id);
    $this->db->update('sw_withdraw',$datadb);
  }


  function bagi_hasil($profit,$id_inv,$id_i) {
    $tanggal  = date('Y-m-d');
    $datadb   = array ('id_member' => $id_inv,
                        'id_investasti' => $id_i,
                       'tanggal' => $tanggal,
                       'jumlah' => $profit,
                       'status' => 0);
    $this->db->insert('sw_profit',$datadb);
    
  }

  function daily_rod($rod_harian,$id_inv,$id_i) {
    $tanggal  = date('Y-m-d');
    $datadb   = array ('id_investor' => $id_inv,
                        'id_investasi' => $id_i,
                       'tanggal' => $tanggal,
                       'jumlah_rod' => $rod_harian,
                       'status' => 0);
    $this->db->insert('sw_rod',$datadb);
    
  }


  function daftar_investasi($id){
    $this->db->select('sw_investasi.status AS statusnya,sw_investasi.kode_unik AS kode_uniknya,sw_investasi.tgl_dibuat AS tgl_dibuatnya,sw_investasi.tgl_acc AS tgl_accnya,sw_investasi.tgl_mulai_hitung AS tgl_mulai_hitungnya,sw_investasi.tgl_akhir_hitung AS tgl_akhir_hitungnya,sw_investasi.id_inv AS idnya,sw_tarik_modal.tgl_ditransfer AS ditransfernya,sw_investasi.jumlah_inv AS jumlahnya');
    $this->db->from('sw_investasi');
    $this->db->join('sw_tarik_modal','sw_tarik_modal.id_investasi=sw_investasi.id_inv','left');
    $this->db->where('sw_investasi.id_investor',$id);
    $this->db->order_by("sw_investasi.id_inv","desc");
    $query = $this->db->get();
    return $query->result_array();

	}

  function daftar_profit($id){
    $this->db->select('*');
    $this->db->where('id_member',$id);
    $this->db->order_by("id","desc");
    $query = $this->db->get('sw_profit');
    return $query->result_array();

  }

  function jumlah_profit_per_member($id){
    $this->db->select_sum('jumlah');
    $this->db->where('id_member',$id);
    $query = $this->db->get('sw_profit');
    return $query->row();
  }

  function return_of_deposit($id){
    $this->db->select_sum('jumlah_rod');
    $this->db->where('id_investor',$id);
    $query = $this->db->get('sw_rod');
    return $query->row();
  } 

  function jumlah_bonus_per_member($id){
    $this->db->select_sum('jumlah');
    $this->db->where('id_penerima',$id);
    $query = $this->db->get('sw_bonus');
    return $query->row();
  }


  function jumlah_inv_balik($id){
    $this->db->select_sum('jumlah_inv');
    $this->db->where('id_investor',$id);
    $this->db->where('status',2);
    $query = $this->db->get('sw_investasi');
    return $query->result_array();
  }

  function list_investasi(){
      return $this->db->query("SELECT * FROM sw_investasi a JOIN rb_konsumen b ON a.id_investor=b.id_konsumen WHERE a.status=0 ORDER BY id_inv DESC");
  }

  function voucher_new() {
    $this->db->select('*');
    $this->db->from('sw_investasi');
    $this->db->join('rb_konsumen','sw_investasi.id_investor=rb_konsumen.id_konsumen','left');
    $this->db->where('sw_investasi.status',0);
    $this->db->where('sw_investasi.status_kode',0);
    $query = $this->db->get();
    return $query;
  }

  function list_voucher_new(){
      return $this->db->query("SELECT * FROM sw_investasi a JOIN rb_konsumen b ON a.id_investor=b.id_konsumen WHERE a.status=0  ORDER BY id_inv DESC");
  }

  function list_voucher_sold(){
    $this->db->select('*');
    $this->db->from('sw_investasi');
    $this->db->join('rb_konsumen','sw_investasi.id_investor=rb_konsumen.id_konsumen','left');
    $this->db->where('sw_investasi.status',0);
    $this->db->where('sw_investasi.status_kode',1);
    $query = $this->db->get();
    return $query;
  }


  function list_investasi_aktif(){
      return $this->db->query("SELECT * FROM sw_investasi a JOIN rb_konsumen b ON a.id_investor=b.id_konsumen WHERE a.status=1 ORDER BY id_inv DESC");
  }
  

  function list_investasi_berakhir(){
      return $this->db->query("SELECT * FROM sw_investasi a JOIN rb_konsumen b ON a.id_investor=b.id_konsumen WHERE a.status=2 ORDER BY id_inv DESC");
  }

  function list_profit_harian(){
      return $this->db->query("SELECT * FROM sw_profit a JOIN rb_konsumen b ON a.id_member=b.id_konsumen  ORDER BY id DESC");
  }


  function delete_investasi($id) {
    $this->db->delete('sw_investasi', array('id_inv' => $id));
  }

  function insert_withdraw($datainput) {
    $this->db->insert('sw_withdraw',$datainput);
  }

  function daftar_withdraw($id){
    $this->db->select('*');
    $this->db->where('id_member',$id);
    $this->db->order_by("id","desc");
    $query = $this->db->get('sw_withdraw');
    return $query->result_array();

  }

  function list_wd_baru(){
    return $this->db->query("SELECT * FROM sw_withdraw a JOIN rb_konsumen b ON a.id_member=b.id_konsumen WHERE a.status=0  ORDER BY id DESC");

  }

  function list_wd_terkirim(){
    return $this->db->query("SELECT * FROM sw_withdraw a JOIN rb_konsumen b ON a.id_member=b.id_konsumen WHERE a.status=1  ORDER BY id DESC");

  }


  function jumlah_wd_per_member($id){
    $this->db->select_sum('jumlah_diminta');
    $this->db->where('id_member',$id);
    $query = $this->db->get('sw_withdraw');
    return $query->row();
  }
  
  function harike($id_member, $id_inves, $tanggal){
    // $this->db->query("SELECT * FROM sw_profit WHERE id_member = '".$id_member."' AND id_investasti = '".$id_inves."'");
    $this->db->select('*');
    $this->db->where('id_member',$id_member);
    $this->db->where('id_investasti',$id_inves);
    $this->db->where('tanggal <',$tanggal);
    $query = $this->db->get('sw_profit');
    return $query->num_rows();
  }

  public function get_data_tarik_modal($id){
		$this->db->from('sw_investasi');
    $this->db->where('id_inv',$id);
    $query = $this->db->get();

    return $query->row();
  }
  
  public function tarik_dana_ccm($data_insert){
    $this->db->insert('sw_tarik_modal',$data_insert);
  }

  public function update_status_inv($idccm){
    $datadb = array('status' => 3);
    $this->db->where('id_inv',$idccm);
    $this->db->update('sw_investasi',$datadb);
  }

  public function update_status_inv_trf($id_inv){
    $datadb = array('status' => 4);
    $this->db->where('id_inv',$id_inv);
    $this->db->update('sw_investasi',$datadb);
  }


  public function list_penarikan_ccm(){
    return $this->db->query("SELECT * FROM sw_tarik_modal a JOIN rb_konsumen b ON a.id_investor=b.id_konsumen WHERE a.status=0  ORDER BY id_penarikan DESC");
  }

  public function list_ccm_dikembalikan(){
    return $this->db->query("SELECT * FROM sw_tarik_modal a JOIN rb_konsumen b ON a.id_investor=b.id_konsumen WHERE a.status=1  ORDER BY id_penarikan DESC");
  }

  function transfer_danaccm($id){
    $today = date('Y-m-d');
    $datadb = array('status' => 1,
                    'tgl_ditransfer' => $today);

    $this->db->where('id_penarikan',$id);
    $this->db->update('sw_tarik_modal',$datadb);
  }


  function get_id_invest($id) {
    $this->db->where('id_inv',$id);
    $query = $this->db->get('sw_investasi');

    return $query;
  }

  function get_setting_bonus(){
    $id = 1;
    $this->db->where('id',$id);
    $query = $this->db->get('sw_setting_bonus');
    return $query->row();
  }
 
  function setting_bonus_update(){
    $id = 1;
    $dataupdate = array(
      'kurs'   => $this->input->post('kurs'),
      'admin' => $this->input->post('admin'),
      'level1' => $this->input->post('level1'),
      'level2' => $this->input->post('level2'),
      'level3' => $this->input->post('level3'),
      'level4' => $this->input->post('level4'),
      'level5' => $this->input->post('level5'),
      'bank'   => $this->input->post('bank'),
      'crypto' => $this->input->post('crypto'),
      'wa_konfirm' => $this->input->post('wa'),
      'persen_harian' => $this->input->post('persen_harian'),
      'hold'  => $this->input->post('hold'),
      'masa_kontrak' => $this->input->post('masa_kontrak')
    );

    $this->db->where('id',$id);
    $this->db->update('sw_setting_bonus',$dataupdate);
  }

  function get_id_memberx($id) {
    $this->db->where('id_konsumen',$id);
    $query = $this->db->get('rb_konsumen');
    return $query;
  }

  function cek_kode($kode) {
    $this->db->where('kode_unik',$kode);
    $query = $this->db->get('sw_investasi');
    return $query->num_rows();
  }

  function status_kode($kode) {
    $this->db->where('kode_unik',$kode);
    $query = $this->db->get('sw_investasi');
    return $query->row();
  }



  function insert_b_admin($databonus_sp){
    $this->db->insert('sw_bonus',$databonus_sp);
  }

  function insert_b_level1($databonus_l1){
    $this->db->insert('sw_bonus',$databonus_l1);
  }

  function insert_b_level2($databonus_l2){
    $this->db->insert('sw_bonus',$databonus_l2);
  }

  function insert_b_level3($databonus_l3){
    $this->db->insert('sw_bonus',$databonus_l3);
  }

  function insert_b_level4($databonus_l4){
    $this->db->insert('sw_bonus',$databonus_l4);
  }

  function insert_b_level5($databonus_l5){
    $this->db->insert('sw_bonus',$databonus_l5);
  }

  function list_bonus_all(){
    $this->db->select('*');
    $this->db->from('sw_bonus');
    $this->db->join('rb_konsumen','sw_bonus.id_penerima=rb_konsumen.id_konsumen', 'left');
    $this->db->join('sw_investasi','sw_bonus.dari_investasi=sw_investasi.id_inv','left');
    $query = $this->db->get();
    return $query->result_array();
  }

  function bonus_by_member($id) {
    $this->db->select('*');
    $this->db->from('sw_bonus');
    $this->db->join('rb_konsumen','sw_bonus.dari_investor=rb_konsumen.id_konsumen','left');
    $this->db->where('id_penerima',$id);
    $query = $this->db->get();
    return $query->result_array();

  }

  function kode_voucher_tambah(){
        for ($i = 1; $i <= $this->input->post('kode'); $i++){
            $kode=acakangkahuruf(8);

            $datadb   = array('kode_unik'=>$kode,
                              'jumlah_inv'=>0,
                              'id_investor' => 0,
                              'status'=>0,
                              'status_kode'=>0,
                              'tgl_dibuat'=> date('Y-m-d'));
            $this->db->insert('sw_investasi',$datadb);
        }
    }
  
  function voucher_terjual($id){
    $dataup = array('status_kode'=>1);
    $this->db->where('id_inv',$id);
    $this->db->update('sw_investasi',$dataup);

  }

  function get_member_by_email($email){
    $this->db->where('email',$email);
    $query = $this->db->get('rb_konsumen');
    return $query;
  } 

  function get_by_token($token){
    $this->db->where('token',$token);
    $query = $this->db->get('rb_konsumen');
    return $query;
  } 

  function updatepass($email,$pass) {
    $data = array('password'=>$pass);
    $this->db->where('email',$email);
    $this->db->update('rb_konsumen',$data);

  }

  function get_sponsor($id){
    $this->db->where('sponsor',$id);
    $query = $this->db->get('rb_konsumen');
    return $query;
  }

  function get_total_depo($id) {
    $this->db->select_sum('jumlah_inv');
    $this->db->where('id_investor',$id);
    $query = $this->db->get('sw_investasi');
    return $query->row();
  }

  function get_total_bonus_dari($id,$penerima) {
    $this->db->select_sum('jumlah');
    $this->db->where('dari_investor',$id);
    $this->db->where('id_penerima',$penerima);
    $query = $this->db->get('sw_bonus');
    return $query->row();

  }

  function total_bonus($id,$jenis) {
    $this->db->select_sum('jumlah');
    $this->db->where('id_penerima',$id);
    $this->db->where('jenis',$jenis);
    $query = $this->db->get('sw_bonus');
    return $query->row();
  }

  function total_bonus_admin(){
    $this->db->select_sum('jumlah');
    $this->db->where('jenis','bonus admin');
    $query = $this->db->get('sw_bonus');
    return $query->row();

  }

  function cek_edit_profile($id_ini){
    $this->db->where('id_konsumen',$id_ini);
    $query = $this->db->get('rb_konsumen');
    return $query->row();
  }

  function get_info_user($token) {
    $this->db->where('token',$token);
    $query = $this->db->get('rb_konsumen');
    return $query->row();
  }

  function get_info_member($id) {
    $this->db->where('id_koneumen',$id);
    $query = $this->db->get('rb_konsumen');
    return $query->row();
  }

  function insert_fee_maintetance($fee_x,$i_investor,$i_investasinya){
    $date = date('Y-m-d');
    $datax = array('tanggal'=>$date,
                    'jumlah_fee'=>$fee_x,
                    'dari_investor'=>$i_investor,
                    'dari_deposit'=>$i_investasinya);

    $this->db->insert('sw_fee',$datax);
  }




}
