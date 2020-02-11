<?php 
class Model_voucher extends CI_model{
    function voucher_data(){
        return $this->db->query("SELECT voucher.*, founder.*, kota_founder.* FROM voucher
                                 INNER JOIN founder ON voucher.kode_founder = founder.kode_founder
                                 INNER JOIN kota_founder ON founder.kode_kota_founder = kota_founder.kode_kota_founder
                                 ORDER BY voucher.id_voucher DESC");
    }
    
    function founder_data(){
        return $this->db->query("SELECT founder.*, kota_founder.* FROM founder
                                 INNER JOIN kota_founder ON founder.kode_kota_founder = kota_founder.kode_kota_founder");
    }
    
    function voucher_kirim(){
        return $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    }
    
    function voucher_bayar($kode){
        return $this->db->query("UPDATE voucher SET status_bayar = '1' WHERE kode_voucher = '".$kode."'");
    }
    
    function voucher_kirim_tambah(){
        $cmdKodeFounder = $this->input->post('cmdKodeFounder');
        $txtJumlah = $this->input->post('txtJumlah');
        
        for ($a=1;$a<=$txtJumlah;$a++){
            // $qryV = $this->db->query("SELECT id_voucher, kode_voucher FROM voucher ORDER BY id_voucher DESC LIMIT 1");
            // $dataV = $qryV->row_array();
            
            $create_kode_voucher = "APIK".rand(100000,999999);
            $cekvoucher = $this->db->query("SELECT * FROM voucher where kode_voucher='".$create_kode_voucher."'")->num_rows();
            
            // substr($dataV,6);
            
            if ($cekvoucher!=0){
                $a = $a-1;
            }else{
                $datadb = array('kode_founder'=>$cmdKodeFounder,
                        'kode_voucher'=>$create_kode_voucher);
                $this->db->insert('voucher',$datadb);
            }
            
            // if ($no['id_voucher']==null) {
            //   $create_kode_voucher = "akademipintarkita".'00001';
            // } else{
            //   $index = $no['id_voucher']+1;
            //   $pisah     = str_pad($index, 5, "0", STR_PAD_LEFT);
            //   $create_kode_voucher = "akademipintarkita".$pisah;
            // }

        }
    }
    
    function info_terbaru($limit){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where berita.utama='Y' ORDER BY id_berita DESC LIMIT 0,$limit");
    }

    function kategori_utama(){
        return $this->db->query("SELECT * FROM kategori where sidebar != '0' ORDER BY sidebar ASC");
    }

    function kategori_content($id,$dari,$sampai){
        return $this->db->query("SELECT * FROM berita where id_kategori='$id' ORDER BY id_berita DESC LIMIT $dari,$sampai");
    }

    function semua_berita($start, $limit){
        return $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $start,$limit");
    }

    function berita_detail($id){
        return $this->db->query("SELECT * FROM berita a LEFT JOIN users b ON a.username=b.username LEFT JOIN kategori c ON a.id_kategori=c.id_kategori where a.id_berita='".$this->db->escape_str($id)."' OR a.judul_seo='".$this->db->escape_str($id)."'");
    }

    function berita_dibaca_update($id){
        return $this->db->query("UPDATE berita SET dibaca=dibaca+1 where id_berita='".$this->db->escape_str($id)."' OR judul_seo='".$this->db->escape_str($id)."'");
    }

    function detail_kategori($id, $limit){
        return $this->db->query("SELECT * FROM berita where id_kategori='".$this->db->escape_str($id)."' ORDER BY id_berita DESC LIMIT $limit");
    }

    function list_berita(){
        return $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC");
    }

    function kategori_berita(){
        return $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    }

    function kategori_berita_tambah(){
        $datadb = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'aktif'=>$this->db->escape_str($this->input->post('b')),
                        'sidebar'=>$this->db->escape_str($this->input->post('c')));
        $this->db->insert('kategori',$datadb);
    }

    function kategori_berita_edit($id){
        return $this->db->query("SELECT * FROM kategori where id_kategori='$id'");
    }

    function kategori_berita_update(){
        $datadb = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'aktif'=>$this->db->escape_str($this->input->post('b')),
                        'sidebar'=>$this->db->escape_str($this->input->post('c')));
        $this->db->where('id_kategori',$this->input->post('id'));
        $this->db->update('kategori',$datadb);
    }

    function kategori_berita_delete($id){
        return $this->db->query("DELETE FROM kategori where id_kategori='$id'");
    }



    function tag_berita(){
        return $this->db->query("SELECT * FROM tag ORDER BY id_tag DESC");
    }

    function tag_berita_tambah(){
        $datadb = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')),
                        'count'=>'0');
        $this->db->insert('tag',$datadb);
    }
    
    function tag_berita_tambah_test(){
        $datadb = array('nama_tag'=>'test cron',
                        'username'=>'test cron',
                        'tag_seo'=>'testing',
                        'count'=>'0');
        $this->db->insert('tag',$datadb);
    }


    function tag_berita_edit($id){
        return $this->db->query("SELECT * FROM tag where id_tag='$id'");
    }

    function tag_berita_update(){
        $datadb = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')));
        $this->db->where('id_tag',$this->input->post('id'));
        $this->db->update('tag',$datadb);
    }

    function tag_berita_delete($id){
        return $this->db->query("DELETE FROM tag where id_tag='$id'");
    }




    function list_berita_tambah(){
        $config['upload_path'] = 'asset/foto_berita/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('k');
        $hasil=$this->upload->data();
            if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('j') != ''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else{
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
        $this->db->insert('berita',$datadb);
    }

    function list_berita_cepat(){
        if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
        $datadb = array('id_kategori'=>'0',
                        'username'=>$this->session->username,
                        'judul'=>$this->db->escape_str($this->input->post('a')),
                        'judul_seo'=>seo_title($this->input->post('a')),
                        'isi_berita'=>$this->db->escape_str($this->input->post('b')),
                        'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
                        'dibaca'=>'0',
                        'status'=>$status);
        $this->db->insert('berita',$datadb);
    }

    function list_berita_edit($id){
        return $this->db->query("SELECT * FROM berita where id_berita='$id'");
    }

    function list_berita_update(){
        $config['upload_path'] = 'asset/foto_berita/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('k');
        $hasil=$this->upload->data();
            if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('j') != ''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }
            if ($hasil['file_name']==''){
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else{
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
        $this->db->where('id_berita',$this->input->post('id'));
        $this->db->update('berita',$datadb);
    }

    function list_berita_delete($id){
        return $this->db->query("DELETE FROM berita where id_berita='$id'");
    }

}