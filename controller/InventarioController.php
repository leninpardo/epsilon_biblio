<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/reportes.php';
require_once 'model/Grid.php';

class InventarioController extends Controller 
{
	public function Index()
    {
        $data = array();
			$data['p']=1;
                        
			  $data['year'] = $this->Select(array('id'=>'year','name'=>'year','table'=>'vista_year_acopio','code'=>'0'));
			
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/inventario/index.php');
			echo $view->renderPartial();

    }
	
	public function reporte()
    {
		
			$data = array();
			$data['p']=1;
                        $obj=new reporte();
			 // $data['cliente'] = $this->Select(array('id'=>'cliente','name'=>'cliente','table'=>'cliente','code'=>'0'));
			//$data['comite']=$obj->getList("comite");
                        
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/inventario/reporte.php');
			echo $view->renderPartial();
		
    }
       
         	public function stock()
    {
			$data = array();
		
                        $obj=new reporte();
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/kardex/stock.php');
			echo $view->renderPartial();
		
    }
    //
    
}
?>