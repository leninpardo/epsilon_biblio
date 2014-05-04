
<?php 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="inventario.xls"');
header('Cache-Control: max-age=0');
?>
<table  class="table"  border="1" >
    <tr>  <th colspan="7">INVENTARIO DE LIBROS</th></tr>
    <tr>
        <th>nro</th>
        <th>titulo</th>
        <th>editorial</th>
        <th>categoria</th>
        <th>autor</th>
       <th>estado</th>
    </tr>
       
    <?php

   $reporte=new reporte();
   $sql="select *from vista_libro";
  $total_kg=0;$total_q=0;
  $i=1;
   foreach ($reporte->consulta($sql) as $k)
   {
       echo "<tr>";
      
        echo "<td>$i</td>";
         echo "<td>".$k[1]."</td>";
          echo "<td>". $k[2]."</td>";
          echo "<td>".$k[3]."</td>";
       echo "<td>".$k[4]."</td>";
        echo "<td>".$k[5]."</td>";
   $i++;
   }
   
      ?>
</table>
