<?php
include_once("Main.php");
class libro extends Main
{
	function save($P)
    {
		if($P['oper']==1)
		{    
			$sql =("insert into libro(idlibro,codigo_libro,titulo,
                            descripcion,isbn,editorial,year_Edicion,year_last_edicion,estado,categoria)
                            values(:p0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
                        
			$stmt =$this->db->prepare($sql);
                        $stmt2=  $this->db->prepare("insert into asignacion_libro_autor(autor,libro,estado)
                            values(:p0,:p1,:p2)");
                        $stmt_ul=  $this->db->prepare("update libro set autores=:p1 where idlibro=:id");
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
                $stmt->bindValue(':p0',$id=$this->max_id("libro"), PDO::PARAM_INT);
                $stmt->bindValue(':p1',$P['idcategoria'].$P['ideditorial'].$P['isbn'], PDO::PARAM_STR);
                $stmt->bindValue(':p2',$P['titulo'], PDO::PARAM_STR);
                $stmt->bindValue(':p3',$P['descripcion'], PDO::PARAM_STR);
                $stmt->bindValue(':p4',$P['isbn'], PDO::PARAM_STR);
                 $stmt->bindValue(':p5',$P['ideditorial'], PDO::PARAM_INT);
                $stmt->bindValue(':p6',$P['fecha_p'], PDO::PARAM_STR);
                $stmt->bindValue(':p7',$P['fecha_u'], PDO::PARAM_STR);
                $stmt->bindValue(':p8',1, PDO::PARAM_STR);
                $stmt->bindValue(':p9',$P['idcategoria'], PDO::PARAM_STR);
                  $stmt->execute();
                  $autores="";
                  $i=1;
                  $cont=  count($P['autor']);
                foreach ($P['autor'] as $k)
                {
                $stmt2->bindValue(':p0',$k, PDO::PARAM_INT);
                $stmt2->bindValue(':p1',$id, PDO::PARAM_INT);
                $stmt2->bindValue(':p2',1, PDO::PARAM_INT); 
                 if($cont==$i)
                 {
                     $autores.=$P["autor".$k];
                 }else{$autores.=$P["autor".$k].",";}
                 $i++;
                  $stmt2->execute();
                }
               $stmt_ul->bindValue(':p1',$autores, PDO::PARAM_INT);
                $stmt_ul->bindValue(':id',$id, PDO::PARAM_INT);
                $stmt_ul->execute();
                $this->db->commit();
				$resp = array('rep'=>'1','str'=>'Ok');
				return $resp;
			}
			catch(PDOException $e) 
			{	$this->db->rollBack();
				return array('res'=>"3",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
			}
		}
		else
		{  //update
			$sql =("update libro set codigo_libro=:p1,titulo=:p2,
                            descripcion=:p3,isbn=:p4,editorial=:p5,year_Edicion=:p6,
                            year_last_edicion=:p7,categoria=:p8 where idlibro=:p0");
                        $stmt =$this->db->prepare($sql);
                         $stmt_ul=  $this->db->prepare("update libro set autores=:p1 where idlibro=:id");
                        //eliminamos la antigua asiginacion
                        $stm_a=  $this->db->prepare("delete from asignacion_libro_autor where libro=:id");
                        $stmt2=  $this->db->prepare("insert into asignacion_libro_autor(autor,libro,estado)
                            values(:p0,:p1,:p2)");
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
                $stmt->bindValue(':p0',$P['idlibro'], PDO::PARAM_INT);
                $stmt->bindValue(':p1',$P['idcategoria'].$P['ideditorial'].$P['isbn'], PDO::PARAM_STR);
                $stmt->bindValue(':p2',$P['titulo'], PDO::PARAM_STR);
                $stmt->bindValue(':p3',$P['descripcion'], PDO::PARAM_STR);
                $stmt->bindValue(':p4',$P['isbn'], PDO::PARAM_STR);
                $stmt->bindValue(':p5',$P['ideditorial'], PDO::PARAM_INT);
                $stmt->bindValue(':p6',$P['fecha_p'], PDO::PARAM_STR);
                $stmt->bindValue(':p7',$P['fecha_u'], PDO::PARAM_STR);
                $stmt->bindValue(':p8',$P['idcategoria'], PDO::PARAM_STR);
				$stmt->execute();
                $stm_a->bindValue(':id',$P['idlibro'], PDO::PARAM_INT);
               $stm_a->execute();
               $i=1;
              $cont=  count($P['autor']);
               foreach ($P['autor'] as $k)
                {
                  $stmt2->bindValue(':p0',$k, PDO::PARAM_INT);
                $stmt2->bindValue(':p1',$P['idlibro'], PDO::PARAM_INT);
                $stmt2->bindValue(':p2',1, PDO::PARAM_INT); 
                 if($cont==$i)
                 {
                     $autores.=$P["autor".$k];
                 }else{$autores.=$P["autor".$k].",";}
                 $i++;
                  $stmt2->execute();
                }
                $stmt_ul->bindValue(':p1',$autores, PDO::PARAM_INT);
                $stmt_ul->bindValue(':id',$P['idlibro'], PDO::PARAM_INT);
                $stmt_ul->execute();
				$this->db->commit();
				$resp = array('rep'=>'2','str'=>'Ok');
				return $resp;
			}
			catch(PDOException $e) 
			{
				$this->db->rollBack();
				return array('res'=>"4",'msg'=>'no se pudo realizar la accion de actualizar : '.$e->getMessage());
			}
		}
	}
	
	function newamortizacion($P)
    {
		if($P['oper']==1)
		{    
			$sql =$this->Query("sp_amortizacion(1,0,:p3,:p4,:p5,:p6,:p7)");
			$stmt =$this->db->prepare($sql);
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
                $stmt->bindValue(':p3',$P['idprestamo'], PDO::PARAM_STR);
                $stmt->bindValue(':p4',$P['id_usuario'], PDO::PARAM_INT);
                $stmt->bindValue(':p5',$P['fecha'], PDO::PARAM_STR);
                $stmt->bindValue(':p6',$P['monto'], PDO::PARAM_INT);
                  $stmt->bindValue(':p7',$P['caja'], PDO::PARAM_INT);
                $stmt->execute();
                $this->db->commit();
				$resp = array('rep'=>'1','str'=>'Ok');
				return $resp;
			}
			catch(PDOException $e) 
			{	$this->db->rollBack();
				return array('rep'=>"3",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
			}
		}
	}

	
	function getcategoria($id){
	$stmt = $this->db->prepare("select *from categoria where idcategoria=:id");
    $stmt->bindValue(':id', $id , PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchObject();
	}
	function geteditorial($id)
        {
           $stmt = $this->db->prepare("select *from editorial where ideditorial=:id");
    $stmt->bindValue(':id', $id , PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchObject(); 
        }
	function getautores($id){
	$stmt =$this->db->prepare("SELECT autor.idautor,autor.nombre,autor.nacionalidad from autor INNER JOIN asignacion_libro_autor on(autor.idautor=asignacion_libro_autor.autor)
where asignacion_libro_autor.libro=:id
GROUP BY autor.idautor");
	$stmt->bindValue(':id', $id , PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
	}
	
	/*function datos_a($id){
	$stmt =$this->db->prepare("
	SELECT a.idamortizacion as Id, a.fecha as F_pago,a.monto_pago as Monto
	FROM prestamo as pres, amortizacion as a, productor as pro
	WHERE pro.idproductor = pres.productor_idproductor and pres.idprestamo = a.prestamo and a.prestamo = :id
	");
	$stmt->bindValue(':id', $id , PDO::PARAM_STR);
    $stmt->execute();
    $res=$stmt->fetchAll();
    return $res;
	}*/
	
	function edit($id ) 
	{
	    $stmt = $this->db->prepare("SELECT *from libro where idlibro= :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
		
    }
      
    function delete($id)
    {     $stmt = $this->db->prepare("update libro set estado=0 where idlibro = :id");
    // $stmt = $this->db->prepare("update libro set estado=0 where idlibro = :id");
          $stmt->bindValue(':id', $id , PDO::PARAM_STR);
          $res=$stmt->execute();
        return $res;
    }
	
	
	
	
	
}
?>