<?Php

class accessController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
            
                $this->vUsersData = $this->LoadModel('users');
                $this->vProfileData = $this->LoadModel('profile');
			}
			
		public function index(){
                $this->vView->visualizar('login');
			}
    
		public function LoginMethod(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $vEmail = (string) $_POST['vEmail'];
                    $vPassword = (string) $_POST['vPassword'];
                    echo $vEmail.'-'.$vPassword;
                }
			}
    
		public function register(){
            
                $this->vView->visualizar('register');
			}
    
		public function RegisterMethod(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $vNames = (string) strtolower($_POST['vName']);
                    $vLastNames = (string) strtolower($_POST['vLastNames']);
                    $vEmail = (string) strtolower($_POST['vEmail']);
                    $vPassword = (string) $_POST['vPassword'];
                    $vRePassword = (string) $_POST['vRePassword'];
                    $vRole = (string) 'user';
                    $vActivationcode = rand(10000, 99999);
                    $vActive = (int) 2;
                    
                    if(($this->vUsersData->getUserNameExists($vEmail) == 0) && ($this->vUsersData->getUserEmailExists($vEmail) == 0)){
                        $vUserCode = $this->vUsersData->userRegister($vEmail, $vPassword, $vRePassword, $vEmail, $vRole, $vActivationcode, $vActive);
                        if($vUserCode != 0){
                            $vOthername = (string) $vEmail;
                            $UserNameCode = $this->vUsersData->userInfoRegister($vUserCode, $vNames, $vLastNames, $vOthername, $vBirthDate, $vCountry, $vCity, $vActive);
                            if($UserNameCode != 0){
                                $vProfileName = (string) strtolower(str_replace(' ', '', $vNames).str_replace(' ', '', $vLastNames));
                                $vProfileType = 1;
                                $ProfileCode = $this->vProfileData->profileRegister($vUserCode, $vProfileName, $vProfileType, $vActive);
                                if(($vUserCode != 0) && ($UserNameCode != 0) && ($ProfileCode != 0)){
                                    echo 'El usuario se registro correctamente!';
                                }
                            }
                        }
                    } else {
                        echo 0;
                    }
                }
			}    
	}
?>