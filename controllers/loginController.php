<?Php

class loginController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
			}
			
		public function index(){
            $this->vView->visualizar('login');
			} 
	}
?>