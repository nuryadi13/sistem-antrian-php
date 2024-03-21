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
<?php
  session_start();
  $connect = mysqli_connect("localhost", "root", "", "antrian");
  $db = 'SELECT * FROM tb_siswa WHERE id ='.$_SESSION['id'];
  $query = mysqli_query($connect, $db);
  $isi = mysqli_fetch_array($query);
      
  ?>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">user</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="pengajuan/data.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Buat Antrian</span>
          </a>
        </li>
        <li>
          <a href="../../loginsiswa/index.php">
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
      <span class="admin_name"><?php echo $isi["nama"]; ?></span>


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
                        <td><?php echo $data['status']; ?></td>
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

