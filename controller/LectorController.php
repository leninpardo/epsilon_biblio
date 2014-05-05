<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/lector.php';
require_once 'model/Grid.php';

class LectorController extends Controller 
{
	public function Index()
    {
           
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new lector();
        $data = array();
	    $grilla= new  Grilla();
	    $cabecera=$obj->getHead('vista_lector');
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_lector",$_GET['order']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Lector&action=Index','query'=>$_GET['q'],'order'=>$_GET['order']));
	    $obj->session($_GET['id']);
	    $titulo='Lectores registrados';
	    $data['grilla'] = $grilla->asign($titulo,$_GET['controller'],$cabecera, $data['data']['rows'],$_GET['p'],$data['pag'],$data['data']['total'],true);
	    $data['controller']=$_GET['controller'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('view/master/grilla.php');
        echo $view->renderPartial();

    }
	 public function search()
    {
	   $obj = new lector();
	   $columnas=$obj->getHead('vista_lector');
       $data = array();
       $view = new View();
       $data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_lector");
       $data['num']=$columnas;
       $view->setData( $data );
       $view->setTemplate( 'view/_Json_view.php' );
       echo $view->renderPartial();
    }
	/*muestra el formulario de actualizacion de foto*/
//save_photo_temp
public function save_photo_temp()
	{
		$obj= new lector();
		$imagePath=$obj->save_photo_temp();
		echo "<img width='153px' height='150px' src='" .($imagePath) . "' />";
		//echo $imagePath;
		echo "<script>imagePath='".$imagePath."'; </script>"; 
	
	}

	public function create()
	{
		if($_SESSION['insertar']==1)
		{
			$data=array();
                        $data['p']=1;
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/lector/_frm.php');
			echo $view->renderPartial();
		}
		else
		{
			echo "<script>alert('no tiene permiso para insertar');
			window.location='index.php?controller=Lector';</script>";
		}
	}
		public function create_extend()
	{
		if($_SESSION['insertar']==1)
		{
			$data=array();
                        $data['p']=1;
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/lector/_frm_extend.php');
			echo $view->renderPartial();
		}
		else
		{
			echo "<script>alert('no tiene permiso para insertar');
			window.location='index.php?controller=Lector';</script>";
		}
	}
	
	
	public function _edit() 
	{
		if($_SESSION['editar']==1)
		{
			$obj = new lector();
			$data=array();
			$obj=$obj->edit($_GET['id']);
			$data['obj']=$obj;
			$data['p']=2;
                        $view = new View();
			$view->setData($data);
			$view->setTemplate('view/lector/_frm.php');
			echo $view->renderPartial();
		}
		else
		{
			echo 
			"<script>alert('no tiene permiso para editar');
			window.location='index.php?controller=Lector';</script>";
		}	
	}
	
	
	public function show()
	{
	    	$obj = new lector();
			$data=array();
			$obj=$obj->edit($_GET['id']);
			$data['obj']=$obj;
			$data['p']=2;
			
                        $view = new View();
			$view->setData($data);
	    $view->setTemplate('view/lector/_show.php');
		$view->setLayout('template/listas.php');
		echo $view->renderPartial();
	}
	
	
	public function save()
	{
		$obj = new lector();
                print_r(json_encode($obj->save($_GET)));
               
        }
	public function save_extend()
	{
	   $obj = new lector();
		print_r(json_encode($obj->save_ext($_GET)));
	}
	
	public function _delete()
    { 
		if($_SESSION['delete']==1)
		{
			$obj = new lector();
			$c=$obj->delete($_GET['id']);
			if ($c){echo json_encode(array('rep'=>'1','msg'=>'ELIMINADO'));} 
			else{echo json_encode(array('rep'=>'2','msg'=>'.::no se pudo eliminar::..'));}
		}
		else
		{
			echo "<script>alert('no tiene permiso para eliminar');window.location='index.php';</script>";
		}
    }
	

	public function mostrar()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new productor();
        $data = array();
		$cabecera=$obj->getHead('vista_productor');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_productor",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Productor&action=mostrar','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('view/productor/_lista.php');
        echo $view->renderPartial();
       // $view->setLayout('template/listas.php');
       // $view->render();
           
       
        
    }	
  
}
?>
