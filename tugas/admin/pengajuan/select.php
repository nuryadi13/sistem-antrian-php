<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "komisi");
 $query = "SELECT * FROM pengajuan WHERE id_user = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
    <tr> 
        <td width="30%"><label>ID user</label></td>  
        <td width="70%">'.$row["id_user"].'</td>  
    </tr>
     <tr>  
            <td width="30%"><label>Nama</label></td>  
            <td width="70%">'.$row["nama"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Level</label></td>  
            <td width="70%">'.$row["level"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Tanggal</label></td>  
            <td width="70%">'.$row["tanggal"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>telepon</label></td>  
            <td width="70%">'.$row["telepon"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Rekening</label></td>  
            <td width="70%">'.$row["rek"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Keterangan</label></td>  
            <td width="70%">'.$row["ket"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>