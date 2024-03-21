<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "sistem_antrian");
 $query = "SELECT * FROM tbl_antrian WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
           while($row = mysqli_fetch_array($result))
           {
        if ($row["status"]=="1") {
        $data ="sudah";
        }else{
         $data ="belum";
        }
     $output .= '
     <tr>  
            <td width="30%"><label>Nama</label></td>  
            <td width="70%">'.$row["nama"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Tanggal</label></td>  
            <td width="70%">'.$row["tanggal"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>telepon</label></td>  
            <td width="70%">'.$row["hp"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>status</label></td>  
            <td width="70%">'.$data.'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>