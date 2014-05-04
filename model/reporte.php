<?php

require_once'../lib/PGSQL_spdo.php';
class reporte {
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
	
public function getInspeccion($id)
{
    $array=array();
    $array['r']=array("productor","comite","comunidad","fecha inspeccion","cafe produccion","cafe en crecimiento");
   	$sth = $this->db->prepare("select pr.nombre as nombre_productor,co.descripcion as comite,ca.descripcion as comunidad,i.fecha_inspeccion,i.cafe_produccion,i.cafe_crecimiento,i.total_cafe,i.total_cafe,i.otros_cultivos,i.pastos,i.purma,i.bosque,i.total_area,
(CASE i.erosion WHEN 1 then 'si' WHEN 2 then 'no' when 3 then 'regular' END) as erosion,(CASE i.reforestacion WHEN 1 then 'si' WHEN 2 then 'no' when 3 then 'regular' END) as reforestacion
from inspeccion i inner join productor pr on(i.productor=pr.idproductor)
inner join comite co on(pr.comite=co.idcomite)
inner join comunidad ca on(pr.comunidad=ca.idcomunidad)
where pr.idproductor=$id");
			$sth->execute();
		$array['list']=$sth->fetchAll(); 
                return $array;
}
public function getEntradas()
{
    
}
}
?>