<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/categoria.php';
require_once 'model/Grid.php';

class CategoriaController extends Controller 
{
	public function Index()
    {
		if (!isset($_GET['p'])){$_GET['p']=1;}//envia p=1 para que se habilite la opcion nuevo en el procedimiento almacenado
		if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new categoria();
	    $grilla= new  Grilla();
        $data = array();
	   	$cabecera=$obj->getHead('vista_categoria');
		$data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_categoria",$_GET['order']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Categoria&action=Index','query'=>$_GET['q'],'order'=>$_GET['order']));
		$obj->session($_GET['id']);
	    $titulo='Categorias de libros registrados';
	    $data['grilla'] = $grilla->asign($titulo,$_GET['controller'],$cabecera, $data['data']['rows'],$_GET['p'],$data['pag'],$data['data']['total'],true);
	    $data['controller']=$_GET['controller'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('view/master/grilla.php');
        echo $view->renderPartial();

    }
	public function search()
    {
		$obj = new categoria();
		$columnas=$obj->getHead('vista_categoria');
		$data = array();
		$view = new View();
		$data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_categoria");
		$data['num']=$columnas;
		$view->setData( $data );
		$view->setTemplate( 'view/_Json_view.php' );
		echo $view->renderPartial();
    }
	
	public function create()
    {
		if($_SESSION['insertar']==1)
		{
			$data = array();
                        $data['p']=1;
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/categoria/_frm.php');
			echo $view->renderPartial();
		}
		else
		{
			echo 
				"<script>alert('no tiene permiso para insertar');
				window.location='index.php';</script>";
		}
	}
	
	public function _edit() 
	{
		if($_SESSION['editar']==1)
		{
			$obj = new categoria();
			$data = array();
			$obj = $obj->edit($_GET['id']);
			$data['obj'] = $obj;
			$data['p']=2;
			$view = new View();
			$view->setData($data);
			$view->setTemplate( 'view/categoria/_frm.php' );
			echo $view->renderPartial();
		}
		else
		{
			echo 
			"<script>alert('no tiene permiso para editar');
			window.location='index.php';</script>";
		}
    }
    public function show()
	{
	    $obj = new categoria();
	    $data=array();
		$obj=$obj->edit($_GET['id']);
		$data['obj']=$obj;
                $view = new View();
	    $view->setData($data);
	    $view->setTemplate('view/categoria/_show.php');
		$view->setLayout('template/listas.php');
		echo $view->renderPartial();
	}

	public function save()
    {
		$obj = new categoria();
                //$obj->setInsert(array($_GET['idcomite'],$_GET['comite']), "comite");
                
		print_r(json_encode($obj->save($_POST)));
	}
   
	public function _delete()
    {  
		if($_SESSION['delete']==1)
		{
			$obj = new Categoria();
			$c=$obj->delete($_GET['id']);
			if ($c){echo json_encode(array('rep'=>'1','msg'=>'Eliminado'));} 
			else{echo json_encode(array('rep'=>'2','msg'=>'.::no se pudo eliminar::..'));}
		}
		else
		{
			echo 
			"<script>alert('no tiene permiso para eliminar');
			window.location='index.php';</script>";
		}
    }
}
?>

