<?php
	
require_once "../config/conect.php";
                     	                      	
?>
<div class='grid_12'>
<div class='widget_wrap'>
<div class='widget_top'> <span class='h_icon blocks_images'></span>
<h6>Master Dosen<br></h6>
</div><div class='widget_content'>
<table class='display data_tbl'>
<thead> <tr>
<th style='text-align: justify;'>&nbsp; No<br>
</th>
<th style='text-align: justify;'> Jam <br>
</th>

<th style='text-align: justify;'> Aksi <br>
</th>
</tr>
</thead> 
<tbody> 
	
<?php 
	$data1 = mysql_query("select * from jam");
while($r = mysql_fetch_array($data1)){ 
		       		$n++;
	?>
<?php
  echo "<tr class='gradeC'>
  <td>$n</td>
                                    <td><a class=s href=?page=editjam&indeks=$r[indeks]>$r[Jam]</td>
                        		          <td><a class=s href=?page=hapusjam&indeks=$r[indeks]><img src=images/error.png></td>
                                    
                                     </tr>
                                     ";?>
 <?php } ?>
</tbody>
<tfoot> <tr>
<th><br>
</th>
<th><br>
</th>
<th><br>
</th>
<th><br>
</th>
<th><br>
</th>
<td style='vertical-align: top;'><br>
</td>
<td style='vertical-align: top;'><br>
</td>
</tr>
</tfoot>
</table>

</div>
</div>
</div>
