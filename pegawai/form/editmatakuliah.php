<?php	
require_once "../config/conect.php";
// get value of id that sent from address bar
$id=$_GET['id'];

// Retrieve data from database 
$sql="SELECT * FROM matkul WHERE indeks='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
                     	                      	
?>

<script type="text/javascript">
    function digitsOnly(obj){
      obj.value=obj.value.replace(/[^\d]/g,'');
    }
</script>

<div class="grid_container">
<div class="grid_12">
<div class="widget_wrap">
<div class="widget_top"> <span class="h_icon list"></span>
<h6>Edit Matakuliah</h6>
</div>
<div class="widget_content">
<form action="" method="post" id="form103" class="form_container left_label valid_tip"><!--belu dikasih mmethod-->

<ul>
<li>
<div class="form_grid_12"> <label class="field_title"
id="llastname" for="lastname">Kode Matakuliah<span class="req">*</span></label>
<div class="form_input"> <input id="kode" name="kode"
value="<?php echo $rows['Kode']; ?>" maxlength="100"class="limiter required" type="text"> </div>
</div>
</li>

<li>
<div class="form_grid_12"> <label class="field_title"
id="llastname" for="lastname">Nama Matakuliah<span class="req">*</span></label>
<div class="form_input"> <input id="matkul" name="matkul"
value="<?php echo $rows['Matkul']; ?>" maxlength="100" class="limiter required" type="text"> </div>
</div>
</li>

<li>
<div class="form_grid_12"> <label class="field_title"
id="llastname" for="lastname">Jumlah SKS<span class="req">*</span></label>
<div class="form_input">
<select name="sks" value="<?php echo $rows['SKS']; ?>">
  					<option value="1">1</option>
  					<option value="2">2</option>
  					<option value="3">3</option>
  					<option value="4">4</option>
  					</select>

</div>
</li>

<li>
<div class="form_grid_12"> <label class="field_title"
id="llastname" for="lastname">Semester<span class="req">*</span></label>
<div class="form_input">
<select name="semester" value="<?php echo $rows['Semester']; ?>">
  					<option value="1">Semester 1</option>
  					<option value="2">Semester 2</option>
  					<option value="3">Semester 3</option>
  					<option value="4">Semester 4</option>
					<option value="5">Semester 5</option>
  					<option value="6">Semester 6</option>
  					<option value="7">Semester 7</option>
  					<option value="8">Semester 8</option>
  					</select>
 </div>
</div>
</li>

<li>
<div class="form_grid_12">
<div class="form_input"> 
<button type="submit" name="submit" value="Update Data" class="btn_small btn_blue"><span>Update</span></button>
<button type="reset"  name="reser" value="Reset Data" class="btn_small btn_blue"><span>Reset</span></button> </div>
</div>
</li>
</ul>
</form>


<?php 

	include "../config/conect.php";
if(isset($_POST['kode'])){
$id=$_GET['id'];
$Kode = $_POST['kode'];
$Matkul = $_POST['matkul'];
$SKS = $_POST['sks'];
$Semester = $_POST['semester'];
$query = mysql_query("UPDATE matkul SET Kode='$Kode', Matkul='$Matkul', SKS='$SKS', Semester='$Semester' WHERE indeks='$id'");
			if($query){
				echo "<br>";
			echo "<script>alert('Berhasil Update Data');document.location.href='index.php?page=matakuliah'</script>";
				
			}else{
				//echo "gagal";
			echo "<script>alert('Gagal Update Data ');document.location.href='index.php?page=matakuliah'</script>";
				
				echo mysql_error();
			} 
		}else{
			unset($_POST['kode']);
		}
?>

</div>
</div>
</div>
