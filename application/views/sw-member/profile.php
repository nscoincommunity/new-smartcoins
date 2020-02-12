<main class="app-content">
  <div class="row user">

    <div class="col-md-3">
      <div class="tile p-0">
        <ul class="nav flex-column nav-tabs user-tabs">
          <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Detail Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Edit Profile</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline">
          <div class="timeline-post">
            <?php
              echo "
                    <h4>Profile Detail</h4>
                       </p>";
                              echo "<table class='table table-hover table-condensed'>
                                    <thead>
                                      <tr><td width='170px'><b>Username</b></td> <td><b style='color:red'>$row[username]</b></td></tr>
                                      <tr><td><b>Full Name</b></td>           <td>$row[nama_lengkap]</td></tr>
                                      <tr><td><b>Phone Number</b></td>                  <td>$row[no_hp]</td></tr>
                                      <tr><td><b>Email</b></td>           <td>$row[email]</td></tr>
                                      <tr><td><b>Gender</b></td>          <td>$row[jenis_kelamin]</td></tr>
                                      
                                      <tr><td><b>Identity Number</b></td>              <td>$row[no_ktp]</td></tr>
                                      <tr><td><b>Address</b></td>         <td>$row[alamat_lengkap]</td></tr>

                                      <tr><td><b>City</b></td>                   <td>$row[kota]</td></tr>
                                      <tr><td><b>Country</b></td>               <td>$row[provinsi]</td></tr>

                                      <tr><td><b>Bank Name</b></td>              <td>$row[nama_bank]</td></tr>
                                      <tr><td><b>Account </b></td>            <td>$row[no_rekening]</td></tr>
                                      <tr><td><b>Holder Name</b></td>              <td>$row[atas_nama]</td></tr>
                                      <tr><td><b>Virtual Account / Crypto Payment </b></td>              <td>$row[rekning_virtual]</td></tr>
                                    </thead>
                                </table>";
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="user-settings">
          <div class="tile user-settings">
            
            <?php
              echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> Edit Profile</p>
                    ";
                              if ($row['posisi']=='0'){ $penempatan = 'Kiri'; }elseif($row['posisi']=='1'){ $penempatan = 'Kanan'; }
                              $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                              echo form_open_multipart('members/edit_profile',$attributes);
                              echo "<table class='table table-hover table-condensed'>
                                    <thead>
                                      <tr><td width='170px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' type='text' value='$row[username]' disabled> <small style='color:red'><i>Cannot change username.</i></small></td></tr>
                                      <tr><td><b>Password</b></td>               <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a'> <small style='color:red'><i>Left blank if will not change</i></small></td></tr>

                                      <tr><td><b>Full Name</b></td>           <td><input class='required form-control' type='text' name='b' value='$row[nama_lengkap]'></td></tr>
                                      <tr><td><b>Email Addres</b></td>           <td><input class='required email form-control' type='email' name='c' value='$row[email]'></td></tr>
                                      <tr><td><b>Gender</b></td>          <td>"; if ($row['jenis_kelamin']=='Laki-laki'){ echo "<input type='radio' value='Male' name='d' checked> Male <input type='radio' value='Female' name='d'> Female "; }else{ echo "<input type='radio' value='Male' name='d'> Male <input type='radio' value='Female' name='d' checked> Female "; } echo "</td></tr>
                                      
                                      <tr><td><b>Identity Number</b></td>              <td><input style='width:60%' class='required number form-control' type='number' name='f' value='$row[no_ktp]'></td></tr>
                                      <tr><td><b>Address</b></td>         <td><input class='required form-control' type='text' name='g' value='$row[alamat_lengkap]'></td></tr>

                                      <tr><td><b>City</b></td>                   <td><input class='required form-control' type='text' name='i' value='$row[kota]'></td></tr>
                                      <tr><td><b>Country</b></td>               <td><input class='required form-control' type='text' name='j' value='$row[provinsi]'></td></tr>
                                      <tr><td><b>Phone Number</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='k' value='$row[no_hp]'></td></tr>
                                      <tr><td><b>Bank Name</b></td>              <td><input style='width:60%; color:red' class='required form-control' type='text' name='l' value='$row[nama_bank]' ></td></tr>
                                      <tr><td><b>Account Number</b></td>            <td><input style='width:60%; color:red' class='required number form-control' type='number' name='m' value='$row[no_rekening]' ></td></tr>
                                      
                                      <tr><td><b>Account Holder</b></td>              <td><input style='color:red' class='required form-control' type='text' name='n' value='$row[atas_nama]' ></td></tr>
                                      
                                      <tr><td><b>Virtual Account / Crypto Payment </b></td>              <td><input style='color:red' class='required form-control' type='text' name='vrek' value='$row[rekning_virtual]' ></td></tr>

                                      </td></tr>

                                      <tr class='danger'><td colspan='2'><p style='padding:6px'><i><b></b>  </i></p></td></tr>
                                      <tr><td></td><td><input class='btn btn-sm btn-primary' type='submit' name='submit' value='Save'  ></td></tr>
                                    </thead>
                                </table>";
                              echo form_close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
