<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class DashboardsController extends AppController {
	
	public function beforeFilter(){
		 parent::beforeFilter();
				 
	}
	
	
	public function index(){
       $controllers =  App::objects('Controller');
       unset($controllers[0]);
        foreach($controllers as $idx=>$controller){
            $controller_name = substr($controller , 0, -10);
            if(in_array($controller_name,array('App','Dashboards','Pages'))){
                unset($controllers[$idx]);
            }else{
                $controllers[$idx] = $controller_name;
            }
        }

       $this->set(compact('controllers'));

    }
}
