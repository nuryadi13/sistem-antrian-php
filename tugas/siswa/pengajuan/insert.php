<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "sistem_antrian");
if(!empty($_POST))
{
 $output = ''; 
    $nama = mysqli_real_escape_string($connect, $_POST["nama"]);  
    $kelas = mysqli_real_escape_string($connect, $_POST["kelas"]);  
    $tanggal = mysqli_real_escape_string($connect, $_POST["tanggal"]);
    $telepon = mysqli_real_escape_string($connect, $_POST["telepon"]);  
    $keterangan = mysqli_real_escape_string($connect, $_POST["keterangan"]);
    $status = mysqli_real_escape_string($connect, $_POST["status"]);
    $query = "
    INSERT INTO panggilan(nama, kelas, tanggal, telepon, keterangan, status)  
     VALUES('$nama', '$kelas', '$tanggal','$telepon','$keterangan', '$status')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Masuk</label>';
     $select_query = "SELECT * FROM panggilan ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="55%">Nama</th>
                         <th width="55%">kelas</th>
                         <th width="55%">Tanggal</th>
                         <th width="15%">Lihat</th>    
                         <th width="15%">Hapus</th>  
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["nama"] . '</td> 
                         <td>' . $row["kelas"] . '</td>  
                         <td>' . $row["tanggal"] . '</td>  
                        <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>       
                         <td><input type="button" name="delete" value="Hapus" id="' . $row["id"] . '" class="btn btn-danger btn-xs hapus_data" /></td>
                  
                    </tr>
      ';
     }
     $output .= '</table>';
    }else{
        $output .= mysqli_error($connect);
    }
    echo $output;
}
?>