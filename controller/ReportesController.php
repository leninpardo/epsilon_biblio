<?php
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'model/reportes.php';
require_once 'model/Grid.php';

class   ReportesController extends Controller 
{
	public function Index()
    {
        $data = array();
			$data['p']=1;
                        
			  $data['year'] = $this->Select(array('id'=>'year','name'=>'year','table'=>'vista_year_acopio','code'=>'0'));
			
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/reportes/index.php');
			echo $view->renderPartial();

    }
	
	public function reporte_prestamos()
    {
		
			$data = array();
			$data['p']=1;
                        $obj=new reporte();
			 // $data['cliente'] = $this->Select(array('id'=>'cliente','name'=>'cliente','table'=>'cliente','code'=>'0'));
			//$data['comite']=$obj->getList("comite");
                        
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/reportes/reporte_prestamo.php');
			echo $view->renderPartial();
		
    }
    	public function reporte_sancionados()
    {
		
			$data = array();
			$data['p']=1;
                        $obj=new reporte();
			 // $data['cliente'] = $this->Select(array('id'=>'cliente','name'=>'cliente','table'=>'cliente','code'=>'0'));
			//$data['comite']=$obj->getList("comite");
                        
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/reportes/acopio.php');
			echo $view->renderPartial();
		
    }
        
	public function salida()
    {
		
			$data = array();
			$data['p']=1;
                     
			$view = new View();
			$view->setData($data);
                        if($_GET['tip']==2)
                        {
			$view->setTemplate('view/kardex/tostado.php');
                        }else if($_GET['tip']==1){
                          $view->setTemplate('view/kardex/local.php');  
                        }
                        else if($_GET['tip']==3){
                          $view->setTemplate('view/kardex/planta.php');  
                        }
			echo $view->renderPartial();
    }

    //
      	public function record()
    {
			$data = array();
		
                        $obj=new reporte();
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/kardex/record.php');
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
    	public function proceso()
    {
		
			$data = array();
			$data['p']=1;
                        $obj=new reporte();
			$view = new View();
			$view->setData($data);
			$view->setTemplate('view/kardex/proceso.php');
			echo $view->renderPartial();
		
    }
}
?>