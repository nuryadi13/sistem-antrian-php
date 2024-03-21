<script>
$('#update_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#enama').val() == "")  
  {  
   alert("Mohon Isi Nama ");  
  }  
  else if($('#ealamat').val() == '')  
  {  
   alert("Mohon Isi Alamat");  
  }  
  
  else 
  {  
   $.ajax({  
    url:"update.php",  
    method:"POST",  
    data:$('#update_form').serialize(),  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){  
     $('#update_form')[0].reset();  
     $('#editModal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
</script>
<?php 
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "sistem_antrian");
 $query = "SELECT * FROM tb_siswa WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
     $output .= '
         <form method="post" id="update_form">
     <label>Nama</label>
     <input type="hidden" name="id" id="umur" value="'.$row['id'].'" class="form-control" />
     <textarea name="nama" id="ealamat" class="form-control">'.$row['nama'].'</textarea>
     <br />
     <label>username</label>
     <textarea name="username" id="ealamat" class="form-control">'.$row['username'].'</textarea>
     <br />  
     <label>password</label>
     <input type="text" name="password" id="umur" value="'.$row['password'].'" class="form-control" />
     <br />  
     <label>kelas</label>
     <input type="text" name="kelas" id="umur" value="'.$row['kelas'].'" class="form-control" />
     <br />
     <label>No Handphone</label>
     <input type="text" name="hp" id="umur" value="'.$row['hp'].'" class="form-control" />
     <input type="hidden" name="akses" id="umur" value="siswa" class="form-control" />
     <br />
     <select name="jk" id="offer-type" class="ht-field" data-dkcacheid="1" required="">
     <option value="'.$row['jk'].'">'.$row['jk'].'</option> 
     <option value="pria">pria</option>
      <option value="wanita">wanita</option>
      </select>
     <br /><br /><br /><br /> 
     <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
 
    </form>
     ';
    echo $output;
}
?>