<?php  
//index.php
$connect = mysqli_connect("localhost", "root", "", "sistem_antrian");
if (isset($_GET['cari'])) {
          //menangkap nilai form
          $nama = $_GET['cari'];
          $query = mysqli_query($connect, "select * from tb_siswa where nama like '%" . $nama . "%'");
        } else {
          $query = mysqli_query($connect, "select * from tb_siswa");
        }
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
    <meta charset="UTF-8">
    <title>Data admin</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Data Siswa</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
 <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Antrian</span>
    </div>
      <ul class="nav-links">
        <!-- <li>
          <a href="../dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li> -->
        <li>
          <a href="../input data/data.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Data Siswa</span>
          </a>
        </li>
        <li>
          <a href="../../../antrian/panggilan-antrian/index.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Antrian Siswa</span>
          </a>
        </li>
        <li>
          <a href="../../../antrian ortu/panggilan-antrian/index.php">
            <i class='bx bx-box' ></i>
            <span class="links_name"> Antrian orang tua</span>
          </a>
        </li>
        <li>
          <a href="../../../loginortu/index.php">
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
        <span class="dashboard">Data Siswa</span>
      </div>
      <div class="search-box">
        <form action="data.php" methode="get">
          <br>
        <input type="text" placeholder="Search..."  name="cari">
        </form>
      </div>
      <div class="profile-details">
        <span class="admin_name">admin</span>
      </div>
    </nav>
    <br><br><br><br>
    <div class="container" width="700px"><br><br>
      <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Tambah Data</button>
      <div class="table-responsive">
        <br />
       <div id="employee_table">
           <table class="table table-bordered">
               <tr>
                   <th width="25%">Nama</th>
                   <th width="25%">uszername</th>
                   <th width="25%">kelas</th> 
                   <th width="25%">No Handphone</th>
                   <th width="15%">Lihat Detail</th>
                   <th width="15%">edit</th>
                   <th width="15%">Hapus</th>
                </tr>
                <?php
      while($row = mysqli_fetch_array($query))
      {
          ?>
      <tr>
          <td><?php echo $row["nama"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["kelas"]; ?></td>
          <td><?php echo $row["hp"]; ?></td>
          <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
          <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-xs edit_data" /></td> 
          <td><input type="button" name="delete" value="Hapus" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs hapus_data" /></td> 
          
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
 
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Nama</label>
     <input type="text" name="nama" id="nama" class="form-control" />
     <br />
     <label>username</label>
     <input type="text" name="username" id="nama" class="form-control" />
     <br />
     <label>password</label>
     <input type="text" name="password" id="nama" class="form-control" />
     <br />
     <label>kelas</label>
     <input type="text" name="kelas" id="nama" class="form-control" />
     <br />
     <label>jenis kelamin</label><br>
     <select name="jk" id="offer-type" class="ht-field" data-dkcacheid="1" required="">
      <option value="pria">pria</option>
      <option value="wanita">wanita</option>
      </select>
     <br /><br>
     <label>No Handphone</label>
     <input type="text" name="hp" id="kegiatan" class="form-control" />
     <input type="hidden" name="akses" value="siswa" class="form-control" />
     <br />  
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
 
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
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
 
 
<div id="editModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Data</h4>
   </div>
   <div class="modal-body" id="form_edit">
     
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
  $(document).on('click', '.edit_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"edit.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#form_edit').html(data);
    $('#editModal').modal('show');
   }
  });
 });
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