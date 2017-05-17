<?Php

class errorController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
			}
			
		public function index(){
            $this->vView->visualizar('index');
			}
        
		public function controller(){
            $this->vView->visualizar('controller');
			}

		public function view(){
            $this->vView->visualizar('view');
			}        
	}
?>