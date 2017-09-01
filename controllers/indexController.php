<?Php

class indexController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
            
				/* BEGIN VALIDATION TIME SESSION USER */
				if(!IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('access');
                } else {
                    IdEnSession::timeSession();
                }
                /* END VALIDATION TIME SESSION USER */            
			}
			
		public function index(){
            //$this->vView->visualizar('index');
            $this->redirect('dashboard');
			}       
	}
?>