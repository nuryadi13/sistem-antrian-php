<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | Ui3 Media </title>-->
    <link rel="stylesheet" href="siswa.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>   
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Antrian</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="siswa/data.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Data Siswa</span>
          </a>
        </li>
        <!-- <li>
          <a href="pengajuan/data.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Kotak Masuk</span>
          </a>
        </li> -->
        <li>
          <a href="../masuk/login.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
      <form action="dashboard.php" methode="get">
          <br>
        <input type="text" placeholder="Search..."  name="cari">
        </form>
      </div>
      <div class="profile-details">
        <span class="admin_name">Admin</span>

      </div>
    </nav>
    <br><br><br><br>
    <center><table class="table1">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>kelas</th>
        <th>tanggal</th>
        <th>telepon</th>
        <th>keterangan</th>
        <th>status</th>
        <th>whatsaap</th>
    </tr>
    <tbody>
        <?php 
            include "koneksi.php";
            $no = 1;
            if (isset($_GET['cari'])) {
              //menangkap nilai form
              $nama = $_GET['cari'];
              $query = mysqli_query($koneksi, "select * from panggilan where nama like '%" . $nama . "%'");
            } else {
              $query = mysqli_query($koneksi, "select * from panggilan");
            }
            while($data = mysqli_fetch_array($query)){
              ?>
        <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['kelas']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['telepon']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td><button class="view"><?php echo $data['status']; ?></button></td> 
                        <td><a href="https://wa.me/<?php echo $data['telepon']; ?>?text=hallo%20<?php echo $data['nama']; ?>%20pesan%20dikirim%20via%20whatsapp"><button class="chat">Chat</button></a></td>

                        

                      </tr>
                      <?php } ?>
    </tbody>
</table></center>	
</section>
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Detail Data </h4>
   </div>
   <div class="modal-body" id="detail_karyawan">
     
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
// Begin Aksi Insert
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#nama').val() == "")  
  {  
   alert("Mohon Isi Nama ");  
  }  
  else if($('#alamat').val() == '')  
  {  
   alert("Mohon Isi Alamat");  
  }  
  
  else 
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
//END Aksi Insert
 
//Begin Tampil Detail Karyawan
 $(document).on('click', '.view_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#detail_karyawan').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
//End Tampil Detail Karyawan
  
//Begin Tampil Form Edit
//End Tampil Form Edit
 
//Begin Aksi Delete Data
 $(document).on('click', '.hapus_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"delete.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
   $('#employee_table').html(data);  
   }
  });
 });
}); 
//End Aksi Delete Data
 </script>
