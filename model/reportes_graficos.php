<?php

require_once'../../lib/PGSQL_spdo.php';
class reportes_graficos {
  protected $db;
  protected $exec;
  public function __construct()
		{
				$this->db = PGSQL_spdo::singleton();
				$this->exec=PGSQL_spdo::getExec();
		}    
		public function Query($partSQL)
		{
			return $this->exec." ".$partSQL;
		}

                
		public function getList($tabla) 
		{
			$sth = $this->db->prepare("SELECT * FROM {$tabla}");
			$sth->execute();
			return $sth->fetchAll();
		}
		 public function getHead($tabla)
      {
		  $col=new PGSQL_spdo();
		  $bd=$col->db();
		  $sql = "SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA  LIKE '$bd'    AND TABLE_NAME = '$tabla' ";
          //$sql="SELECT COLUMN_NAME FROM information_schema.COLUMNS where table_catalog='$bd' and TABLE_NAME='$tabla'";
	      $sth = $this->db->prepare($sql);
		  $sth->execute();
		  $data=$sth->fetchAll();
		  $fields=array();
		  foreach($data as $rows)
		  {
			array_push($fields,$rows[0]); 
		  }
		 return $fields;
      }	
	
public function getAcopio()
{
 
    //$array['r']=array("productor","comite","comunidad","fecha inspeccion","cafe produccion","cafe en crecimiento");
   	$sth = $this->db->prepare("SELECT sum(acopio.peso_neto_q)  as valor,MONTH(acopio.fecha_pesada)  as mes from acopio
where year(acopio.fecha_pesada)=YEAR(CURDATE())
GROUP BY MONTH(acopio.fecha_acopio)");
			$sth->execute();
		
                return $sth->fetchAll(); 
}
public  function getAcopio2()
{
   
            $sth = $this->db->prepare(" SELECT  sum(acopio.peso_neto_q),comite.descripcion from acopio INNER JOIN productor on(productor.idproductor=acopio.productor)
INNER JOIN comite on(comite.idcomite=productor.comite)
GROUP BY comite.idcomite
ORDER BY comite.descripcion asc");
			$sth->execute();
		
                return $sth->fetchAll(); 
}
public  function getEstimacion()
{
   
            $sth = $this->db->prepare("SELECT sum(inspeccion.estimacion_q),comite.descripcion from inspeccion
INNER JOIN productor on(productor.idproductor=inspeccion.productor)
INNER JOIN comite on(comite.idcomite=productor.comite)
where year(inspeccion.fecha_inspeccion)=YEAR(CURDATE())
GROUP BY comite.descripcion asc");
			$sth->execute();
		
                return $sth->fetchAll(); 
}
public function getCultivos()
{
   
   $sth = $this->db->prepare(" SELECT sum(total_cafe),sum(cacao),sum(otros_cultivos),sum(pastos),sum(purma),sum(bosque) from inspeccion
where year(inspeccion.fecha_inspeccion)=YEAR(CURDATE())");
			$sth->execute();
		
                return $sth->fetchAll(); 
}
public function getHectareas()
{
  $sth = $this->db->prepare("SELECT sum(inspeccion.total_area),comite.descripcion from inspeccion
INNER JOIN productor on(productor.idproductor=inspeccion.productor)
INNER JOIN comite on(comite.idcomite=productor.comite)
where year(inspeccion.fecha_inspeccion)=YEAR(CURDATE())
GROUP BY comite.descripcion asc");
			$sth->execute();
		
                return $sth->fetchAll();  
}
public function getHistorial()
{
  $sth = $this->db->prepare("SELECT  sum(inspeccion.estimacion_q), year(inspeccion.fecha_inspeccion)from inspeccion
GROUP BY year(inspeccion.fecha_inspeccion)
");
			$sth->execute();
		
                return $sth->fetchAll();  
}
}
?>