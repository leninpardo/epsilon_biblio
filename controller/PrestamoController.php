<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/prestamo.php';
require_once 'model/Grid_ps.php';

class PrestamoController extends Controller 
{
	public function Index()
    {
		if (!isset($_GET['p'])){$_GET['p']=1;}//envia p=1 para que se habilite la opcion nuevo en el procedimiento almacenado
		if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new prestamo();
	    $grilla= new  Grilla();
        $data = array();
	   	$cabecera=$obj->getHead('vista_prestamo');
		$data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_prestamo",$_GET['order']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Prestamo&action=Index','query'=>$_GET['q'],'order'=>$_GET['order']));
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
		$columnas=$obj->getHead('vista_prestamo');
		$data = array();
		$view = new View();
		$data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_prestamo");
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
			$data['t_cliente'] = $this->Select(array('id'=>'id_tipo_cliente','name'=>'id_tipo_cliente','table'=>'v_tipo_cliente','code'=>'0'));
                         $data['caja'] = $this->Select(array('id'=>'caja','name'=>'caja','table'=>'vista_caja_movimiento','code'=>'0'));
			$data['p']=1;
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/prestamo/_frm.php');
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
				
			$obj = new prestamo();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=2;    
                        $data['obj_l']=$obj->getLector($datos->lector);
                        $data['libros']=$obj->getLibros($datos->idprestamos);
                        $view = new View();
			$view->setData($data);
			$view->setTemplate( 'view/prestamo/_frm.php' );
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
		$obj = new prestamo();
		print_r(json_encode($obj->save($_POST)));
	}
	public function save_devolucion()
    {
		$obj = new prestamo();
		print_r(json_encode($obj->save_devolucion($_POST)));
	}



	
		public function show()
	{
	  $obj = new prestamo();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=2;    
                        $data['obj_l']=$obj->getLector($datos->lector);
                        $data['libros']=$obj->getLibros($datos->idprestamos);
                        $view = new View();
			$view->setData($data);
	    $view->setTemplate('view/prestamo/_show.php');
		echo $view->renderPartial();
	}
        
        	public function _prinft()
	{
                 
				
			$obj = new prestamo();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=2;    
                        $data['obj_l']=$obj->getLector($datos->lector);
                        $data['libros']=$obj->getLibros($datos->idprestamos);
                        $view = new View();
			$view->setData($data);
			$view->setTemplate( 'view/prestamo/_print.php' );
			echo $view->renderPartial();
		
                    
	}
	


	public function _delete()
    {  
		if($_SESSION['delete']==1)
		{
			$obj = new prestamo_socio();
			$c=$obj->deleteprestamo($_GET['id']);
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

public function devolucion()
{
 $obj = new prestamo();
			$data = array();
			$datos = $obj->edit($_GET['id']);
			$data['obj'] = $datos;
			$data['p']=2;    
                        $data['obj_l']=$obj->getLector($datos->lector);
                        $data['libros']=$obj->getLibros($datos->idprestamos);
                        $view = new View();
			$view->setData($data);
			$view->setTemplate( 'view/prestamo/_frmdevolucion.php' );
			echo $view->renderPartial();
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
	
		public function mostrar_lector()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new prestamo();
        $data = array();
		$cabecera=$obj->getHead('vista_lector');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"vista_lector",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Prestamo&action=mostrar_lector','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
       $view->setTemplate('view/prestamo/_frmlector.php');
        echo $view->renderPartial();
		
    }
     public function search_lector()
    {
	   $obj = new prestamo();
	   $columnas=$obj->getHead('vista_lector');
       $data = array();
       $view = new View();
       $data['value'] = $obj->Search_P($_GET["term"],$columnas,"vista_lector");
       $data['num']=$columnas;
       $view->setData( $data );
       $view->setTemplate( 'view/_Json_producer.php' );
       echo $view->renderPartial();
    }
public function mostrar_libro()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
		if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new prestamo();
        $data = array();
		$cabecera=$obj->getHead('v_libro');
		$data['cabecera']=$cabecera;
        $data['data'] = $obj->index_P($_GET['q'],$_GET['p'],$cabecera,"v_libro",$_GET['order']);
		$data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_l(array('rows'=>$data['data']['rowspag'],'url'=>'controller=Prestamo&action=mostrar_libro','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
       $view->setTemplate('view/prestamo/_frmlibro.php');
        echo $view->renderPartial();
		
    }
     public function search_libro()
    {
	   $obj = new prestamo();
	   $columnas=$obj->getHead('v_libro');
       $data = array();
       $view = new View();
       $data['value'] = $obj->Search_P($_GET["term"],$columnas,"v_libro");
       $data['num']=$columnas;
       $view->setData( $data );
       $view->setTemplate( 'view/_Json_view.php' );
       echo $view->renderPartial();
    }		
	
}
?>

