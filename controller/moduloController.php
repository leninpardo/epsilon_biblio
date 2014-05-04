<?php
/**
 * @autor ANDRES GARCIA
 *
 * @desarrollador PEDRO ARMANDO
 */
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/modulo.php';
require_once 'model/Grid.php';


class moduloController extends Controller {
  public function Index()
    {
      if (!isset($_GET['p'])){$_GET['p']=1;}
      if(!isset($_GET['q'])){$_GET['q']="";}
      if(!isset($_GET['order'])){$_GET['order']="";}
      $obj = new modulo();
      $data = array();
	  $grilla= new  Grilla();
	  $cabecera=$obj->getHead('v_modulos');
      $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"seguridad.v_modulos",$_GET['order']);
      $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'controller=modulo&action=Index','query'=>$_GET['q'],'order'=>$_GET['order']));
	  $obj->session($_GET['id']);
	  $titulo=$_GET['controller'].' registrados';
	  $data['grilla'] = $grilla->asign($titulo,$_GET['controller'],$cabecera, $data['data']['rows'],$_GET['p'],$data['pag'],$data['data']['total'],false);
	  $data['controller']=$_GET['controller'];
      $view = new View();
      $view->setData($data);
      $view->setTemplate('view/master/grilla.php');
      echo $view->renderPartial();

    }
  public function search()
    {
	  $obj = new modulo();
	  $columnas=$obj->getHead('v_modulos');
      $data = array();
      $view = new View();
      $data['value'] = $obj->Search_P($_GET["term"],$columnas,"seguridad.v_modulos");
      $data['num']=$columnas;
      $view->setData( $data );
      $view->setTemplate( 'view/_Json.php' );
      echo $view->renderPartial();
    }
	
	
	/*public function search()
    {
	 
        $obj = new modulo();
        $data = array();
        $view = new View();
        $data['value'] = $obj->Search($_GET["term"]);
		$data['num']=2;
        $view->setData( $data );
        $view->setTemplate( 'view/_Json.php' );
        echo $view->renderPartial();
    }*/
  public function create()
    { 
      if($_SESSION['insertar']==1)
	  {
         $data = array();
         $data['ModulosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'seguridad.vista_modulo','code'=>'0'));
         $data['p']=1;
		 $view = new View();
         $view->setData($data);
         $view->setTemplate('view/modulo/_frm.php');
         echo $view->renderPartial();
	  }else
	  {
		echo "<script>alert('no tiene permiso para insertar');
		window.location='index.php';
		</script>";
	  }
    }
  public function _edit() 
  {
	  if($_SESSION['editar']==1)
	  {
         $obj = new Modulo();
         $data = array();
         $view = new View();
         $obj = $obj->editmodulo($_GET['id']);
         $data['obj'] = $obj;
         $data['ModulosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'seguridad.vista_modulo','code'=>$obj->idpadre));
         $data['p']=2;
		 $view->setData($data);
         $view->setTemplate( 'view/Modulo/_frm.php' );
        echo $view->renderPartial();
	  }else
	  {
	   echo "<script>alert('no tiene permiso para editar');window.location='index.php';</script>";
	  }
    }

  public function save()
    {
      $obj = new modulo();
      print_r(json_encode($obj->newmodulo($_POST)));

    }
 public function _delete()
    { if($_SESSION['delete']==1)
	  {
         $obj = new modulo();
         $c=$obj->deleteModulo($_GET['id']);
	     if ($c){echo json_encode(array('rep'=>'1','msg'=>'ELIMINADO'));} 
		 else{echo json_encode(array('rep'=>'2','msg'=>'.::no se pudo eliminar::..'));}
		
	   }else
	   {
	   echo "<script>alert('no tiene permiso para eliminar');window.location='index.php';</script>";
	   }
    }
	
    
}
?>

