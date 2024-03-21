<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "sistem_antrian");
 $query = "SELECT * FROM tb_siswa WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
    <tr> 
        <td width="30%"><label>ID user</label></td>  
        <td width="70%">'.$row["nama"].'</td>  
    </tr>
     <tr>  
            <td width="30%"><label>Nama</label></td>  
            <td width="70%">'.$row["username"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>password</label></td>  
            <td width="70%">'.$row["password"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Kegiatan</label></td>  
            <td width="70%">'.$row["kelas"].'</td>  
        </tr>
       
        <tr>  
            <td width="30%"><label>Tanggal</label></td>  
            <td width="70%">'.$row["jk"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Pemasukan</label></td>  
            <td width="70%">'.$row["hp"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>