
<?php 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporte_prestamo.xls"');
header('Cache-Control: max-age=0');
$fi=$_GET['fi'];$ff=$_GET['ff'];
?>
<table  class="table"  border="1" >
    <tr>  <th colspan="7">Prestamos de libros</th></tr>
    <tr>
        <th>nro</th>
        <th>fecha prestamo</th>
        <th>fecha Devolucion</th>
        <th>descripcion</th>
        <th>lector</th>
       <th>estado</th>
    </tr>
       
    <?php

   $reporte=new reporte();
   $sql="SELECT fecha_prestamo,fecha_devolucion,descripcion,lector.nombre,case prestamos.estado  when 1 then 'prestamo activo' when 2 then 'prestamo devuelto' END as estado from prestamos
INNER JOIN lector on(lector.idlector=prestamos.lector)
WHERE prestamos.estado<>0 and prestamos.fecha_prestamo >'$fi' and prestamos.fecha_prestamo<'$ff'
";
 
  $i=1;
   foreach ($reporte->consulta($sql) as $k)
   {
       echo "<tr>";
      
        echo "<td>$i</td>";
              echo "<td>".$k[0]."</td>";
         echo "<td>".$k[1]."</td>";
          echo "<td>". $k[2]."</td>";
          echo "<td>".$k[3]."</td>";
       echo "<td>".$k[4]."</td>";
        //echo "<td>".$k[5]."</td>";
   $i++;
   }
   
      ?>
</table>
