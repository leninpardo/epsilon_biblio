<?php
include_once("Main.php");
class prestamo extends Main
{
	function save($P)
    {
		if($P['oper']==1)
		{    
		$sql =("insert into prestamos(idprestamos,fecha_prestamo,fecha_devolucion,
                    descripcion,lector,estado,usuario)
                    values(:p0,:p1,:p2,:p3,:p4,:p5,:p6)");
		$stmt =$this->db->prepare($sql);
                $stmt2=  $this->db->prepare("insert into detalle_prestamo(prestamo,libro,estado)values(:p0,:p1,:p2)");
		$stmt_ul=  $this->db->prepare("update libro set estado=2 where idlibro=:idl");	
               
                try
			{
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->db->beginTransaction();
                $stmt->bindValue(':p0',  $id=$this->max_id("prestamos"), PDO::PARAM_INT);
                $stmt->bindValue(':p1',$P['fecha_p'], PDO::PARAM_STR);
                $stmt->bindValue(':p2',$P['fecha_d'], PDO::PARAM_STR);
                $stmt->bindValue(':p3',$P['descripcion'], PDO::PARAM_STR);
                $stmt->bindValue(':p4',$P['idlector'], PDO::PARAM_INT);
                $stmt->bindValue(':p5',1, PDO::PARAM_INT);
                 $stmt->bindValue(':p6',$_SESSION['id_usuario'], PDO::PARAM_INT);
                $stmt->execute();
                foreach ($P['lib'] as $k)
                {
                    $stmt2->bindValue(':p0', $id , PDO::PARAM_INT);
                $stmt2->bindValue(':p1',$k, PDO::PARAM_INT);
                $stmt2->bindValue(':p2',1, PDO::PARAM_INT); 
                //se actualiza el libro
                 $stmt_ul->bindValue(':idl',$k, PDO::PARAM_INT); 
                 
                $stmt2->execute();
                $stmt_ul->execute();
                }
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
		{  
			$sql =("update prestamos set fecha_prestamo=:p1,fecha_devolucion=:p2,
                    descripcion=:p3,lector=:p4,usuario=:p5 where idprestamos=:p0");
			$stmt =$this->db->prepare($sql);
                        $stmt_d=  $this->db->prepare("delete from detalle_prestamo where prestamo=:id");
                          $stmt2=  $this->db->prepare("insert into detalle_prestamo(prestamo,libro,estado)values(:p0,:p1,:p2)");
			   $consulta=  $this->db->prepare("SELECT   libro.idlibro,libro.titulo FROM detalle_prestamo INNER JOIN libro on(libro.idlibro=detalle_prestamo.libro)
WHERE detalle_prestamo.prestamo=:idp
GROUP BY detalle_prestamo.libro");
                            $stmt_ul=  $this->db->prepare("update libro set estado=1 where idlibro=:idl");	
			$stmt_ul2=  $this->db->prepare("update libro set estado=2 where idlibro=:idl");	
                            try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
                $stmt->bindValue(':p0',$P['idprestamo'], PDO::PARAM_INT);
                $stmt->bindValue(':p1',$P['fecha_p'], PDO::PARAM_STR);
                $stmt->bindValue(':p2',$P['fecha_d'], PDO::PARAM_STR);
                $stmt->bindValue(':p3',$P['descripcion'], PDO::PARAM_STR);
                $stmt->bindValue(':p4',$P['idlector'], PDO::PARAM_INT);
                 $stmt->bindValue(':p5',$_SESSION['id_usuario'], PDO::PARAM_INT);
				$stmt->execute();
                                //actualizacion de estados de los libros
                 $consulta->bindValue(':idp',$P['idprestamo'], PDO::PARAM_INT);
                 $consulta->execute();
                 $data_libros=$consulta->fetchAll();
                foreach ($data_libros as $dl)
                 {
                     //$stmt_ul->binValue(":idl",$dl[0],PDO::PARAM_INT);
                   $stmt_ul->bindValue(':idl',$dl[0], PDO::PARAM_INT);
                     $stmt_ul->execute();
                 }
                                //delete detalle
                                 $stmt_d->bindValue(':id',$P['idprestamo'], PDO::PARAM_INT);
                                 $stmt_d->execute();
                                 //insertando de nuevo
                foreach ($P['lib'] as $k)
                {
                $stmt2->bindValue(':p0', $P['idprestamo'] , PDO::PARAM_INT);
                $stmt2->bindValue(':p1',$k, PDO::PARAM_INT);
                $stmt2->bindValue(':p2',1, PDO::PARAM_INT); 
                $stmt_ul2->bindValue(":idl",$k,PDO::PARAM_INT);
               
                $stmt2->execute();
                 $stmt_ul2->execute();
                }            
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
	///////////////////////////////////////////////////
        public  function save_devolucion($P)
        {
			$stmt =$this->db->prepare("update prestamos set estado=2 where idprestamos=:p1");
                        $stm2=$this->db->prepare("update lector set estado=:p2 where idlector=:p1");
			    $consulta=  $this->db->prepare("SELECT   libro.idlibro,libro.titulo FROM detalle_prestamo INNER JOIN libro on(libro.idlibro=detalle_prestamo.libro)
WHERE detalle_prestamo.prestamo=:idp
GROUP BY detalle_prestamo.libro");
   $stmt_ul=  $this->db->prepare("update libro set estado=1 where idlibro=:idl");	                           
                        try
			{
              $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $this->db->beginTransaction();
              $stmt->bindValue(':p1',$P['idprestamo'], PDO::PARAM_INT);
                $stmt->execute();
                //////////////////////////////////////////////////////////////
                //poner en estado activo los libros
              
                  $consulta->bindValue(':idp',$P['idprestamo'], PDO::PARAM_INT);
                 $consulta->execute();
                 $data_libros=$consulta->fetchAll();
                foreach ($data_libros as $dl)
                 {
                     //$stmt_ul->binValue(":idl",$dl[0],PDO::PARAM_INT);
                   $stmt_ul->bindValue(':idl',$dl[0], PDO::PARAM_INT);
                     $stmt_ul->execute();
                 }
                  
                //
                   $stm2->bindValue(':p1',$P['idlector'], PDO::PARAM_INT);
                    $stm2->bindValue(':p2',$P['sancion'], PDO::PARAM_INT);
          
                    $stm2->execute();
                $this->db->commit();
				$resp = array('rep'=>'1','str'=>'Ok');
				return $resp;
			}
			catch(PDOException $e) 
			{
				$this->db->rollBack();
				return array('res'=>"3",'msg'=>'no se pudo realizar la accion de devolucion : '.$e->getMessage());
			}  
        }
            ///////////////////////////////////////////////////    
	function getLector($id){
	$stmt = $this->db->prepare("select *from lector where idlector=:id");
    $stmt->bindValue(':id', $id , PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchObject();
	}
	function getLibros($id)
        {
           $stmt = $this->db->prepare("SELECT  libro.idlibro,libro.titulo,categoria.descripcion,editorial.nombre,libro.autores from libro
INNER JOIN detalle_prestamo on(detalle_prestamo.libro=libro.idlibro)
INNER JOIN categoria on(categoria.idcategoria=libro.categoria)
INNER JOIN editorial on(editorial.ideditorial=libro.editorial)
where detalle_prestamo.prestamo=:id");
    $stmt->bindValue(':id', $id , PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(); 
        }
        
	function edit($id ) 
	{
	    $stmt = $this->db->prepare("select * from prestamos where idprestamos=:id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
		
    }
      
    function delete($id)
    {     $stmt = $this->db->prepare("update prestamos set estado=0 WHERE idprestamos = :id");
          $stmt->bindValue(':id', $id , PDO::PARAM_STR);
          $res=$stmt->execute();
        return $res;
    }

}
?>