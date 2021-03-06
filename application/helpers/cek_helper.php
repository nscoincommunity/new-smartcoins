<?php
error_reporting(0);

function kirim_email($penerima,$judul,$isi,$fromemail='oursmartcoins.asia@gmail.com',$fromname='Our Smart Coins') {

    //smtp config
        $_this = & get_instance();
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'oursmartcoins.asia@gmail.com',
        'smtp_pass' => 'koinsmart@asia',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1' );
        
        $_this->load->library('email', $config);
        $_this->email->set_newline("\r\n");
        $_this->email->initialize($config);

        $_this->email->from($fromemail,$fromname);
        $_this->email->to($penerima);
        $_this->email->cc('');
        $_this->email->bcc('');
        $_this->email->subject($judul);
        $_this->email->message($isi);
        $_this->email->set_mailtype("html");
        $_this->email->send();
    
        //non smtp --------
        /*
                $_this = & get_instance();
                $_this->email->from($fromemail, $fromname);
				$_this->email->to($penerima);
				$_this->email->cc('');
				$_this->email->bcc('');

				$_this->email->subject($judul);
				$_this->email->message($isi);
				$_this->email->set_mailtype("html");
				$_this->email->send();

				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$_this->email->initialize($config);

        */

        // pakai smtp 
        /*$ci = & get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "oursmartcoins.asia@gmail.com";
        $config['smtp_pass'] = "koinsmart@asia";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);

        $ci->email->from($fromemail, $fromname);
        $list = array($penerima);
        $ci->email->to($list);
        $ci->email->subject($judul);
        $ci->email->message($isi);
        if ($ci->email->send()) {
            //echo 'Email sent.';
        } else {
            show_error($ci->email->print_debugger());
        } 
        */

    }

    function cek_session_akses($link,$id){
        $ci = & get_instance();
        $session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
        if ($session == '0' AND $ci->session->userdata('level') != 'admin'){
            redirect(base_url().'administrator/home');
        }
    }

    function cek_session_admin(){
    	$ci = & get_instance();
    	$session = $ci->session->userdata('level');
    	if ($session != 'admin'){
    		redirect(base_url());
    	}
    }

    function cek_session_agen(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'agen'){
            redirect(base_url());
        }
    }

    function cek_session_members(){
        $ci = & get_instance();
        $session = $ci->session->userdata('username');
        if ($session == ''){
            redirect(base_url());
        }
    }

    function cek_session_distributor(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'distributor'){
            redirect(base_url());
        }
    }

    function cek_session_perwakilan(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'perwakilan'){
            redirect(base_url());
        }
    }

    function acakangkahuruf($panjang) {
        $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos};
        }
            return $string;
        }

    function create_token($long) {
        $karakter= 'abcdefghijklmnopqrstuvwxyz1234567890';
        $string = '';
        for ($i = 0; $i < $long; $i++) {
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos};
        }
            return $string;
        }

    function rupiah($total){
        return number_format($total,0);
    }

    function tgl_indo($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;
    }

    function tgl_simpan($tgl){
            $tanggal = substr($tgl,0,2);
            $bulan = substr($tgl,3,2);
            $tahun = substr($tgl,6,4);
            return $tahun.'-'.$bulan.'-'.$tanggal;
    }

    function tgl_view($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = substr($tgl,5,2);
            $tahun = substr($tgl,0,4);
            return $tanggal.'-'.$bulan.'-'.$tahun;
    }

    function tgl_grafik($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.'_'.$bulan;
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function hari_ini($w){
        $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $hari_ini = $seminggu[$w];
        return $hari_ini;
    }

    function tgl_indoo($tgl){
        $bulan = getBulanbaru(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $bulan.' '.$tahun;
    }

    function buat_idr($usd) {
        $ci = & get_instance();
        $kurs = $ci->model_investasi->get_setting_bonus()->kurs;
        $idr = $kurs * $usd;
        return $idr;
    }

    function uang_usd($uang){
        $format = '$ '.number_format( $uang ,2,".",",");
        return $format;
    }

    function tgl_indoos($tgl){
        $bulan = substr($tgl,0,2);
        $tahun = substr($tgl,3,4);
        return $tahun.'-'.$bulan;
    }

    function tgl_indoose($tgl){
        $bulan = substr($tgl,5,2);
        $tahun = substr($tgl,0,4);
        return $bulan.'-'.$tahun;
    }

    function getBulanbaru($bln){
        switch ($bln){
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    function getBulan($bln){
                switch ($bln){
                    case 1:
                        return "Jan";
                        break;
                    case 2:
                        return "Feb";
                        break;
                    case 3:
                        return "Mar";
                        break;
                    case 4:
                        return "Apr";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Jun";
                        break;
                    case 7:
                        return "Jul";
                        break;
                    case 8:
                        return "Agu";
                        break;
                    case 9:
                        return "Sep";
                        break;
                    case 10:
                        return "Okt";
                        break;
                    case 11:
                        return "Nov";
                        break;
                    case 12:
                        return "Des";
                        break;
                }
            }

function cek_terakhir($datetime, $full = false) {
		$today = time();
                 $createdday= strtotime($datetime);
                 $datediff = abs($today - $createdday);
                 $difftext="";
                 $years = floor($datediff / (365*60*60*24));
                 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
                 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                 $hours= floor($datediff/3600);
                 $minutes= floor($datediff/60);
                 $seconds= floor($datediff);
                 //year checker
                 if($difftext=="")
                 {
                   if($years>1)
                    $difftext=$years." Tahun";
                   elseif($years==1)
                    $difftext=$years." Tahun";
                 }
                 //month checker
                 if($difftext=="")
                 {
                    if($months>1)
                    $difftext=$months." Bulan";
                    elseif($months==1)
                    $difftext=$months." Bulan";
                 }
                 //month checker
                 if($difftext=="")
                 {
                    if($days>1)
                    $difftext=$days." Hari";
                    elseif($days==1)
                    $difftext=$days." Hari";
                 }
                 //hour checker
                 if($difftext=="")
                 {
                    if($hours>1)
                    $difftext=$hours." Jam";
                    elseif($hours==1)
                    $difftext=$hours." Jam";
                 }
                 //minutes checker
                 if($difftext=="")
                 {
                    if($minutes>1)
                    $difftext=$minutes." Menit";
                    elseif($minutes==1)
                    $difftext=$minutes." Menit";
                 }
                 //seconds checker
                 if($difftext=="")
                 {
                    if($seconds>1)
                    $difftext=$seconds." Detik";
                    elseif($seconds==1)
                    $difftext=$seconds." Detik";
                 }
                 return $difftext;
	}
