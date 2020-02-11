<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Setting System</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/sw_setting_bonus',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='1'>

                    <tr><th width='120px' scope='row'>Kurs Dollar </th>
                    <td><input type='number' step='any' class='form-control' name='kurs' value='$record->kurs'></td>
                    <td> IDR / 1 USD  </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bank Lokal </th>
                    <td><input type='text' step='any' class='form-control' name='bank' value='$record->bank'></td>
                    <td> Rekening Bank untuk transfer deposit  </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Crypto </th>
                    <td><input type='text' step='any' class='form-control' name='crypto' value='$record->crypto'></td>
                    <td>  Akun crypto untuk tujuan transfer deposit </td>
                    </tr>

                    <tr><th width='120px' scope='row'>WA Konfirm </th>
                    <td><input type='number' step='any' class='form-control' name='wa' value='$record->wa_konfirm'></td>
                    <td> Nomor WA untuk konfirmasi setelah transfer deposit </td>
                    </tr>

                    <tr><th width='120px' scope='row'>WA Beli Voucher </th>
                    <td><input type='number' step='any' class='form-control' name='beli_voucher' value='$record->beli_voucher'></td>
                    <td> Nomor WA untuk pembelian voucher maintenance. Akan dimunculkan di halaman saat akan deposit. </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Masa Kontrak </th>
                    <td><input type='number' step='any' class='form-control' name='masa_kontrak' value='$record->masa_kontrak'></td>
                    <td> Hari </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Hold Deposit </th>
                    <td><input type='number' step='any' class='form-control' name='hold' value='$record->hold'></td>
                    <td> Hari </td>
                    </tr>


                    <tr><th width='120px' scope='row'>Bagi Hasil Harian </th>
                    <td><input type='number' step='any' class='form-control' name='persen_harian' value='$record->persen_harian'></td>
                    <td> % </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bonus Admin </th>
                    <td><input type='number' step='any' class='form-control' name='sponsor' value='$record->sponsor'></td>
                    <td> % </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bonus Level 1 </th>
                    <td><input type='number' step='any' class='form-control' name='level1' value='$record->level1'></td>
                    <td> % </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bonus Level 2 </th>
                    <td><input type='number' step='any' class='form-control' name='level2' value='$record->level2'></td>
                    <td> % </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bonus Level 3 </th>
                    <td><input type='number' step='any' class='form-control' name='level3' value='$record->level3'></td>
                    <td> % </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bonus Level 4 </th>
                    <td><input type='number' step='any' class='form-control' name='level4' value='$record->level4'></td>
                    <td> % </td>
                    </tr>

                    <tr><th width='120px' scope='row'>Bonus Level 5 </th>
                    <td><input type='number' step='any' class='form-control' name='level5' value='$record->level5'></td>
                    <td> % </td>
                    </tr>

                    


                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
        
            
