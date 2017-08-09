<?Php

class modulesController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
			}
			
		public function index(){
            $this->vView->visualizar('index');
			}
    
		public function login(){
            $this->vView->visualizar('login');
			}    
	}
?>