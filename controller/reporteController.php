<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/comunidad.php';
require_once 'model/Grid.php';

class reporteController extends Controller 
{
	public function Index()
    {
		
	   
       // $data = array();
        $view = new View();
       // $view->setData($data);
        $view->setTemplate('view/reporte_estadistico/_frm.php');
        echo $view->renderPartial();

    }
	
}
?>

