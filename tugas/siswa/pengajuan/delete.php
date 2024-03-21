<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "sistem_antrian");
if(isset($_POST["employee_id"]))
{
 $output = '';
    $query = "
    DELETE from tbl_antrian where id = '".$_POST["employee_id"]."'
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Dihapus</label>';
     $select_query = "SELECT * FROM tbl_antrian WHERE nama ";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="55%">Nama</th> 
                         <th width="55%">Keterangan</th> 
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
                         <td>' . $row["ket"] . '</td>  
                         <td>' . $row["tanggal"] . '</td>  
            <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id_user"] . '" class="btn btn-info btn-xs view_data" /></td>                    
            <td><input type="button" name="delete" value="Hapus" id="' . $row["id_user"] . '" class="btn btn-danger btn-xs hapus_data" /></td>
                      
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