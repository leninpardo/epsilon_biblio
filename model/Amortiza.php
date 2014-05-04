<?php
include_once("Main.php");
class Amortiza extends Main
{
  function generapago($P)
    {
           
      	         
                     $stmt =$this->db->prepare("SELECT MIN(id_amortiza) as id_amortiza FROM amortiza where id_plan=:id and estado='0' ");
                     $stmt2=$this->db->prepare("UPDATE amortiza set estado='1' where id_amortiza=:d1");
                     $stmt3=$this->db->prepare("SELECT count(id_amortiza) as numero from amortiza WHERE id_plan=:id2 and estado='1'");
                     $stmt4=$this->db->prepare("SELECT cuotas from plan_cobro WHERE id_plan=:id3");
                 try{
                       $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       $this->db->beginTransaction();
                       $stmt->bindValue(':id',$P['id'], PDO::PARAM_INT);
                       $stmt->execute();
                       $row = $stmt->fetchAll();
                       $id_amortiza = $row[0][0];
                       $stmt2->bindValue(':d1',$id_amortiza, PDO::PARAM_INT);
                       $stmt2->execute();
                       $stmt3->bindValue(':id2',$P['id'] , PDO::PARAM_INT);
                       $stmt3->execute();
                       $row2 = $stmt3->fetchAll();
                       $num = $row2[0][0];
                       $stmt4->bindValue(':id3',$P['id'] , PDO::PARAM_INT);
                       $stmt4->execute();
                       $row3 = $stmt4->fetchAll();
                       $cuotas = $row3[0][0];
                        $resp = array('rep'=>'1','str'=>$id_amortiza);
                       if($num==$cuotas)
                        {
                          $stmtp=$this->db->prepare("UPDATE  plan_cobro set estado='1' where id_plan=:id4");
                          $stmtp->bindValue(':id4',$P['id']  , PDO::PARAM_INT);
                          $stmtp->execute();
                          $resp = array('rep'=>'2','str'=>$id_amortiza);
                        }
                       $this->db->commit();
                        
                        return $resp;
              }
              catch(PDOException $e) {
                  $this->db->rollBack();
                  return array('rep'=>"3",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
              }
      		
     }
    
    function viewA($cod,$p)
    {
         $sql="SELECT * FROM amortiza WHERE id_plan = '".$cod."' order by id_amortiza asc ";
       //  $param = array(array('key'=>':query' , 'value'=>$cod , 'type'=>'INT' ));
         $data['total'] = $this->getTotal( $sql);
         $data['rows'] =  $this->getRow($sql, $p );
         $data['rowspag'] =  $this->getRowPag($data['total'], $p );
         return $data;
    }


}
?>