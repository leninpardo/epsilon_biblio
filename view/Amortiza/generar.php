<table width="550" >
<table width="80%" style="border:1px solid #666; font-size:12px; margin-bottom:5px;" align="center" >
		<tr style='border-bottom:1px solid #666;background:#92da36'>
			<td align="center">Codigo</td>
			<td align="center">Cuotas</td>
			<td align="center">Monto</td>
			<td align="center">Estado</td>
		</tr>
	
		
	 <?php 
	 
    $x=0;
	  foreach ($data['rows'] as  $r)
	 { 
	
	 $x++;
	 ?>
	 <tr >
		  <td style="text-align: center;" ><?php echo $r[0]?></td>
		  
		  <td style="text-align: center;" ><?php echo $x;?></td>
		  <td style="text-align: center;" ><?php echo $r[2]?></td>
		  <td ><?php if($r[3]==1){
		  echo "<img src='web/images/accept.png'/>PAGADO";}
		  else{echo"<img src='web/images/delete.png'/>POR PAGAR";} ?>
		  </td>
	 </tr>
	 <?php 
	 }
	 ?>
	</table>
	<?php echo $pag;?>