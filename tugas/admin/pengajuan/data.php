<?php  
//index.php
$connect = mysqli_connect("localhost", "root", "", "komisi");
$query = "SELECT * FROM pengajuan ORDER BY id_user DESC";
$result = mysqli_query($connect, $query);
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | Ui3 Media </title>-->
    <link rel="stylesheet" href="../dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> tambah data barang</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
 <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Ui3 Media</span>
    </div>
      <ul class="nav-links">
      <li>
          <a href="../dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../input data/data.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Input Data</span>
          </a>
        </li>
        <li>
          <a href="../pengajuan/data.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Kotak Masuk</span>
          </a>
        </li>
        <li>
          <a href="../../masuk/login.php">
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
        <span class="dashboard">Kotak Masuk</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="foto.jpg" alt="">
        <span class="admin_name">admin</span>
      </div>
    </nav>
    <br><br><br><br>
  <div class="container" style="width:700px;"> 
   <br />  
   <div class="table-responsive">
       <br />
       <div id="employee_table">
           <table class="table table-bordered">
               <tr>
                   <th width="25%">Nama</th>
                   <th width="25%">Keterangan</th>  
                   <th width="25%">Tanggal</th>  
                   <th width="15%">Lihat Detail</th>
                </tr>
                <?php
      while($row = mysqli_fetch_array($result))
      {
          ?>
      <tr>
          <td><?php echo $row["nama"]; ?></td>
          <td><?php echo $row["ket"]; ?></td>
          <td><?php echo $row["tanggal"]; ?></td>
          <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id_user"]; ?>" class="btn btn-info btn-xs view_data" /></td>
          
        </tr>
        <?php
      }
      ?>
     </table>
    </div>
   </div> 
  </div>
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