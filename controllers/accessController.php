<?Php

class accessController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
			}
			
		public function index(){
                $this->vView->visualizar('login');
			}
    
		public function LoginMethod(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $vEmail = $_POST['vEmail'];
                    $vPassword = $_POST['vPassword'];
                    echo $vEmail.'-'.$vPassword;
                }
			}
    
		public function register(){
                $this->vView->visualizar('register');
			}
    
		public function RegisterMethod(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $vName = $_POST['vName'];
                    $vLastNames = $_POST['vLastNames'];
                    $vEmail = $_POST['vEmail'];
                    $vPassword = $_POST['vPassword'];
                    $vRePassword = $_POST['vRePassword'];
                    
                    echo $vName.'-'.$vLastNames.'-'.$vEmail.'-'.$vPassword.'-'.$vRePassword;
                }
			}    
	}
?>