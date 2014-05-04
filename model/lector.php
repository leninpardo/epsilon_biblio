<?php
include_once("Main.php");
require_once("lib/class.upload.php");
require_once("lib/funciones.php");
class lector extends Main 
{
	function save_photo_temp()
	{
		$fotof =$_FILES["archivo"]["name"];
		$i=0;
		$tam=0;
		while($i<strlen($fotof))
		{
			if($fotof[$i]=='.')
			{
				$i=strlen($fotof);
			}
			else
			{
				$tam++;
				$i++;
			}
		}
		$foto=strtolower(substr($fotof,0,$tam));
		$foo = new Upload($_FILES['archivo']);// nombre del objeto file 
		if ($foo->uploaded) 
		{   
			$foo->file_new_name_body = $foto;// nombre de la imagen...
			$foo->image_resize = false; // autoriza que si se redimensione
			$foo->image_x = 153; // Tama�o en pixeles - Ancho
			$foo->image_y = 180; // Tama�o en pixeles - Alto
			$foo->Process('view/fotostem/'); // Carpeta donde se va grabar la imagen
			if ($foo->processed) 
			{ 
				$foo-> clean();
				$Upload=true;
			} 
			else 
			{
				$Upload=false;
			}
		}
		$f ="view/fotostem/". basename($fotof);
		return $f;
	}
	
	
	
	function show($id)
	{
	 $stmt = $this->db->prepare("SELECT * FROM lector WHERE idlector = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
	}
	
	public function save($P)
    {
   
      // echo $P['foto'];
		if($P['oper']==1)
		{ 
                   
                            // echo $P['oper'];
			$Photo = $P['dni'].date('dmYhms');
			$foo = new Upload($P['foto']);// nombre del objeto file 
			if ($foo->uploaded) 
			{   
				$foo->file_new_name_body = $Photo;// nombre de la imagen...
				$foo->image_resize = false; // autoriza que si se redimensione
				//$foo->image_convert = jpg; // formato a convertir
				$foo->image_x = 153; // Tama�o en pixeles - Ancho
				$foo->image_y = 180; // Tama�o en pixeles - Alto
				$foo->Process('view/fotos_lector/'); // Carpeta donde se va grabar la imagen
				if ($foo->processed) 
				{ 
					if($P['flag']==0){
					$foo-> clean();
				   }
					$Upload=true;
				} 
				else 
				{
					$Upload=false;
				}
			}
			if($Upload)
			{
                       
				$sql =("insert into lector (idlector,nombre,dni,direccion,telefono,tipo,estado,fotografia,sexo) 
                                    values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
				$stmt =$this->db->prepare($sql);
				try
				{
					$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db->beginTransaction();
					$stmt->bindValue(':p1', $this->max_id("lector"), PDO::PARAM_INT);
					$stmt->bindValue(':p2',$P['nombres'], PDO::	PARAM_STR);
					$stmt->bindValue(':p3',$P['dni'], PDO::PARAM_STR);
					$stmt->bindValue(':p4',$P['direccion'], PDO::PARAM_STR);
					$stmt->bindValue(':p5',$P['telef'], PDO::PARAM_STR);
					$stmt->bindValue(':p6',$P['tipo'], PDO::PARAM_STR);
					$stmt->bindValue(':p7',1, PDO::PARAM_INT);
					$stmt->bindValue(':p8',$Photo, PDO::PARAM_STR);
					$stmt->bindValue(':p9',$P['sexo'], PDO::PARAM_STR);
                                        $stmt->execute();
					$this->db->commit();
					$resp = array('rep'=>'1','str'=>'Ok');
					return $resp;
				}
				catch(PDOException $e) 
				{
					$this->db->rollBack();
					return array('rep'=>"3",'msg'=>'no... se pudo realizar la accion de insertar : '.$e->getMessage());
				} 
                                
				if (file_exists($P['foto'])) 
				{
					unlink($P['foto']);
					//return "hola";
				}
                                //echo $r[1];
                                //return $resp;
			} 
		}//fin de insert
                
		else
		{  
			//if(isset($P['estado']) && $P['estado']== "on"){$estado="1";}else{$estado="0";}
			if($P['band']==0)
			{
				 $Photo=$P['foto'];
				
                         $Upload=true;				
			}else
			{
				
				if (file_exists($P['fotoq'])) 
				{
					unlink($P['fotoq']);
					//return "hola";
				}
				
				$Photo = $P['dni'].date('dmYhms');
				$foo = new Upload($P['foto']);// nombre del objeto file 
				if ($foo->uploaded) 
				{   
					$foo->file_new_name_body = $Photo;// nombre de la imagen...
					$foo->image_resize = false; // autoriza que si se redimensione
					//$foo->image_convert = jpg; // formato a convertir
					$foo->image_x = 153; // Tama�o en pixeles - Ancho
					$foo->image_y = 180; // Tama�o en pixeles - Alto
					$foo->Process('view/fotos_lector/'); // Carpeta donde se va grabar la imagen
					if ($foo->processed) 
					{ 
						$foo-> clean();
						$Upload=true;
					} 
					else 
					{
						$Upload=false;
					}
				}
			}
			
			if($Upload)
			{
			
				$sql =("update lector set nombre=:p2,dni=:p3,direccion=:p4,telefono=:p5,tipo=:p6,estado=:p7,fotografia=:p8,sexo=:p9 where idlector=:p1");
				$stmt =$this->db->prepare($sql);
				try
				{
					$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db->beginTransaction();
                                        $stmt->bindValue(':p1', $P['idlector'], PDO::PARAM_INT);
					$stmt->bindValue(':p2',$P['nombres'], PDO::	PARAM_STR);
					$stmt->bindValue(':p3',$P['dni'], PDO::PARAM_STR);
					$stmt->bindValue(':p4',$P['direccion'], PDO::PARAM_STR);
					$stmt->bindValue(':p5',$P['telef'], PDO::PARAM_STR);
					$stmt->bindValue(':p6',$P['tipo'], PDO::PARAM_STR);
					$stmt->bindValue(':p7',1, PDO::PARAM_INT);
					$stmt->bindValue(':p8',$Photo, PDO::PARAM_STR);
					$stmt->bindValue(':p9',$P['sexo'], PDO::PARAM_STR);
					
					$stmt->execute();
					$this->db->commit();
					$resp = array('rep'=>'2','str'=>'Ok');
					return $resp;
				}
				catch(PDOException $e) 
				{
					$this->db->rollBack();
					return array('res'=>"4",'msg'=>'no se pudo realizar la accion de actualizar : '.$e->getMessage());
				} 
				if (file_exists($P['foto'])) 
				{
					unlink($P['foto']);
					//return "hola";
				}
			}
		}
	}
	
	function edit($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM lector WHERE idlector = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	
	function _ver($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM lector WHERE idlector = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	
	function deleteproductor($id)
    {
		$stmt1 = $this->db->prepare("SELECT imagen FROM productor WHERE idproductor = :id");
		$stmt1->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt1->execute();
		$set = $stmt1->fetchAll();
		foreach($set as $val)
		{
		  $c=$val[0];
		}
		$c=$c.'.jpg';
		  unlink("view/fotos_lector/". basename($c));
		$stmt = $this->db->prepare("delete from productor WHERE idproductor = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
		$res=$stmt->execute();
		return $res;
    }
	
	function _list($query , $p ) 
	{
		$stmt = $this->db->prepare("select * FROM sv_detalle_cultivo where  cast( id_det_cultivo as char(10))
            like :query or productor like :query or nombre_previo like :query");
        $stmt->bindValue(':query', $query , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
        $data['total'] = $this->getTotal( $stmt, $stmt->bindValue );
        $data['rows'] =  $this->getRow($stmt, $stmt->bindValue , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
		return $data;
    }
	function save_ext($P)
	{
	   $sql =$this->Query("sp_productor_ext(:p1,:p2,:p3)");
				$stmt =$this->db->prepare($sql);
				try
				{
					$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db->beginTransaction();
					$stmt->bindValue(':p1',$P['dni'], PDO::	PARAM_STR);
					$stmt->bindValue(':p2',$P['nombres'], PDO::PARAM_STR);
					$stmt->bindValue(':p3',$P['apellidos'], PDO::PARAM_STR);
					$stmt->execute();
					$this->db->commit();
					$resp = array('rep'=>'1','str'=>'Ok');
					return $resp;
				}
				catch(PDOException $e) 
				{
					$this->db->rollBack();
					return array('rep'=>"3",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
				} 
	}
	function ver_ext($dni)
	{
	    $stmt = $this->db->prepare("SELECT * FROM productor WHERE dni = :id");
        $stmt->bindValue(':id', $dni , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
	}
}
?>