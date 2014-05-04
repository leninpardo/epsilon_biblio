<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/libro.php';
require_once 'model/Grid.php';

class LibroController extends Controller 
{
	public function Index()
    {
		if (!isset($_GET['p'])){$_GET['p']=1;}//envia p=1 para que se habilite la opcion nuevo en el procedimiento almacenado
		if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new libro();
	    $grilla= new  Grilla();
        $data = array();
	   	$cabecera=$obj->getHead('vista_libro');
		$data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_libro",$_GET['order']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Libro&action=Index','query'=>$_GET['q'],'order'=>$_GET['order']));
		$obj->session($_GET['id']);
	    $titulo='Prestamos de Libros';
	    $data['grilla'] = $grilla->asign($titulo,$_GET['controller'],$cabecera, $data['data']['rows'],$_GET['p'],$data['pag'],$data['data']['total'],true,true);
	    $data['controller']=$_GET['controller'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('view/master/grilla.php');
        echo $view->renderPartial();

    }
	public function search()
    {
		$obj = new prestamo_socio();
		$columnas=$obj->getHead('vista_libro');
		$data = array();
		$view = new View();
		$data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_libro");
		$data['num']=$columnas;
		$view->setData( $data );
		$view->setTemplate( 'view/_Json_prestamo_s.php' );
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
			$view->setTemplate('view/libro/_frm.php');
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
				
			$obj = new libro();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=2;    
                       $data['obj_c']=$obj->getcategoria($datos->categoria);
                         $data['obj_e']=$obj->geteditorial($datos->editorial);
                         $data['autores']=$obj->getautores($datos->idlibro);
                        $view = new View();
			$view->setData($data);
			$view->setTemplate( 'view/libro/_frm.php' );
			echo $view->renderPartial();
		}
		else
		{
			echo 
			"<script>alert('no tiene permiso para editar');
			window.location='index.php';</script>";
		}
    }

	public function save()
    {
		$obj = new libro();
		print_r(json_encode($obj->save($_GET)));
	}
	
	
		public function show()
	{
	   	$obj = new libro();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=3;    
                       $data['obj_c']=$obj->getcategoria($datos->categoria);
                         $data['obj_e']=$obj->geteditorial($datos->editorial);
                         $data['autores']=$obj->getautores($datos->idlibro);
                        $view = new View();
			$view->setData($data);
			$view->setTemplate( 'view/libro/_frm.php' );
			echo $view->renderPartial();
	}
        
        	public function _prinft()
	{
	   $obj = new libro();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=3;    
                       $data['obj_c']=$obj->getcategoria($datos->categoria);
                         $data['obj_e']=$obj->geteditorial($datos->editorial);
                         $data['autores']=$obj->getautores($datos->idlibro);
                        $view = new View();
			$view->setData($data);
	    $view->setTemplate('view/libro/_print.php');
		echo $view->renderPartial();
	}
	


	public function _delete()
    {  
		if($_SESSION['delete']==1)
		{
			$obj = new libro();
			$c=$obj->delete($_GET['id']);
			if ($c){echo json_encode(array('rep'=>'1','msg'=>'Eliminado'));} 
			else{echo json_encode(array('rep'=>'2','msg'=>'.::Imposible Eliminar, el Prestamo tiene Registrado Amortizaciones::..'));}
		}
		else
		{
			echo 
			"<script>alert('no tiene permiso para eliminar');
			window.location='index.php';</script>";
		}
    }


	
	public function mostrar()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new prestamo_socio();
        $data = array();
		$cabecera=$obj->getHead('sv_cliente');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"sv_cliente",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=prestamo_socio&action=mostrar','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('view/prestamo_socio/_lista.php');
        //$view->setLayout('template/listas.php');
        echo $view->renderPartial();
    }
	
		public function mostrar_categoria()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new libro();
        $data = array();
		$cabecera=$obj->getHead('vista_categoria');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_categoria",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Libro&action=mostrar_categoria','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
       $view->setTemplate('view/libro/_frmcategoria.php');
        echo $view->renderPartial();
		
    }
     public function search_categoria()
    {
	   $obj = new libro();
	   $columnas=$obj->getHead('vista_categoria');
       $data = array();
       $view = new View();
       $data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_categoria");
       $data['num']=$columnas;
       $view->setData( $data );
       $view->setTemplate( 'view/_Json_producer.php' );
       echo $view->renderPartial();
    }
public function mostrar_editorial()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new libro();
        $data = array();
		$cabecera=$obj->getHead('vista_editorial');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_editorial",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Libro&action=mostrar_editorial','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
       $view->setTemplate('view/libro/_frmeditorial.php');
        echo $view->renderPartial();
		
    }
     public function search_editorial()
    {
	   $obj = new libro();
	   $columnas=$obj->getHead('vista_editorial');
       $data = array();
       $view = new View();
       $data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_editorial");
       $data['num']=$columnas;
       $view->setData( $data );
       $view->setTemplate( 'view/_Json_producer.php' );
       echo $view->renderPartial();
    }		
public function mostrar_autor()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new libro();
        $data = array();
		$cabecera=$obj->getHead('vista_autor');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_autor",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Libro&action=mostrar_autor','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
       $view->setTemplate('view/libro/_frmautor.php');
        echo $view->renderPartial();
		
    }
     public function search_autor()
    {
	   $obj = new libro();
	   $columnas=$obj->getHead('vista_autor');
       $data = array();
       $view = new View();
       $data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_autor");
       $data['num']=$columnas;
       $view->setData( $data );
       $view->setTemplate( 'view/_Json_producer.php' );
       echo $view->renderPartial();
    }		
}
?>

