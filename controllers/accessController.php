<?Php

class accessController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();         
            
                $this->vAccessData = $this->LoadModel('access');
                $this->vUsersData = $this->LoadModel('users');
                $this->vProfileData = $this->LoadModel('profile');
			}
			
		public function index(){
            
				/* BEGIN VALIDATION TIME SESSION USER */
				if(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('dashboard');
                }
                /* END VALIDATION TIME SESSION USER */            
            
                $this->vView->visualizar('login');
			}
    
		public function LoginMethod(){
            
				/* BEGIN VALIDATION TIME SESSION USER */
				if(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('dashboard');
                }
                /* END VALIDATION TIME SESSION USER */            
            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $vEmail = (string) strtolower($_POST['vEmail']);
                    $vPassword = (string) $_POST['vPassword'];
                    
                    //echo $vEmail.'-'.$vPassword;
                    $vVerifyUserStatus = $this->vUsersData->getUserEmailExists($vEmail);
                    
                    if($vVerifyUserStatus == 0){
                        // Email not register in database.
                        echo '0';
                    } elseif($vVerifyUserStatus == 1){
                        // Email exists in database.
                        $vUserAccountStatus = $this->vUsersData->getUserAccountStatus($vEmail);
                        
                        if($vUserAccountStatus == 0){
                            echo '3';
                        } elseif($vUserAccountStatus == 1){
                            $vAccessStatus = $this->vAccessData->getAccessStatus($vEmail,$vPassword);
                            $vProfileType = 1;
                            $vProfileCode = $this->vProfileData->getProfileCodeFromUserCode($vAccessStatus['n_coduser'], $vProfileType);
                            
                            IdEnSession::setSession(DEFAULT_USER_AUTHENTICATE, true);
                            IdEnSession::setSession(DEFAULT_USER_AUTHENTICATE.'Code', $vAccessStatus['n_coduser']);
                            IdEnSession::setSession(DEFAULT_USER_AUTHENTICATE.'Email', $vAccessStatus['c_email']);
                            IdEnSession::setSession(DEFAULT_USER_AUTHENTICATE.'Role', $vAccessStatus['c_userrole']);
                            IdEnSession::setSession(DEFAULT_USER_AUTHENTICATE.'ProfileCode', $vProfileCode);
                            IdEnSession::setSession('vTimeSessionUser', time());
                
                            /*$arrayUserData = array(
                                                    'vUserCode' => $vUserLoginStatus['n_coduser'],
                                                    'vUserName' => $this->vLoginData->getUserCompleteNames($vUserLoginStatus['n_coduser'])
                                                );
                                
                            echo json_encode($arrayUserData);*/
                            
                            echo '1';
                            
                        } elseif($vUserAccountStatus == 2){
                            echo '2';
                        }
                    }
                }
			}
        
		public function LogoutMethod(){								
				IdEnSession::sessionDestroy();
				$this->redirect('access','index');
			}      
    
		public function register(){
            
				/* BEGIN VALIDATION TIME SESSION USER */
				if(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('dashboard');
                }
                /* END VALIDATION TIME SESSION USER */
            
            
                $this->vView->visualizar('register');
			}
    
		public function RegisterMethod(){

                /* BEGIN VALIDATION TIME SESSION USER */
				if(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('dashboard');
                }
                /* END VALIDATION TIME SESSION USER */
            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $vFormProceed = 0;
                    
                    $vNames = (string) strtolower($_POST['vName']);
                    $vLastNames = (string) strtolower($_POST['vLastNames']);
                    $vEmail = (string) strtolower($_POST['vEmail']);
                    $vPassword = (string) $_POST['vPassword'];
                    $vRePassword = (string) $_POST['vRePassword'];
                    $vRole = (string) 'user';
                    $vActivationcode = rand(10000, 99999);
                    $vActive = (int) 2;
                   
                    if(strlen($vNames) <= 3){
                        $vFormProceed = 1;
                    } else if(strlen($vLastNames) <= 3){
                        $vFormProceed = 2;
                    } else if($this->isValidEmail($vEmail) == false){
                        $vFormProceed = 3;
                    } else if($this->vUsersData->getUserEmailExists($vEmail) != 0){
                        $vFormProceed = 4;
                    } else if($vPassword != $vRePassword){
                        $vFormProceed = 5;
                    }
                       
                    if($vFormProceed == 0){
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
                                        //echo 'El usuario se registro correctamente!';
                                        
                                            $vTextMessage = '<p>Sigue el siguiente enlace para confirmar tu correo electrónico <a href="'.BASE_VIEW_URL.'access/validateEmailAccount/'.$vEmail.'/'.$vUserActivationCode.'/'.$vState.'">Validar mi cuenta!</a></p>.';

                                            $this->getLibrary('class.phpmailer');
                                            $this->vMail = new PHPMailer();								
                                            //$this->vMail->IsSMTP();
                                            $this->vMail->SMTPAuth = true;
                                            $this->vMail->Host = '********';
                                            $this->vMail->Username = '********';
                                            $this->vMail->Password = '********';
                                            $this->vMail->SMTPSecure = 'ssl';
                                            $this->vMail->Port = 25;
                                            $this->vMail->SetFrom('informaciones@ideas-envision.com', 'Ideas-Envision Servicios Integrales');
                                            $this->vMail->AddAddress(strtolower(trim($vEmail)));
                                            $this->vMail->Subject = 'Validación de cuenta Ideas-Envision';
                                            $this->vMail->MsgHTML($vTextMessage);											

                                            $exito = $this->vMail->Send();

                                            if($exito){
                                                $this->vMail->ClearAddresses();
                                                //echo 'El usuario se registro correctamente; Las instrucciones de validación de cuenta se han enviado al correo a '.$vEmail.', gracias!';
                                                echo $vFormProceed = 6
                                            } else {
                                                //echo 'No se ha enviado el correo a '.$email;
                                                echo $vFormProceed = 7;
                                            }
                                    }
                                }
                            }
                        }
                    } else {
                        echo $vFormProceed;
                    }
                }
			}
    
		public function sendEmailValidation(){
            
				/* BEGIN VALIDATION TIME SESSION USER */
				if(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('dashboard');
                }
                /* END VALIDATION TIME SESSION USER */
            
            
                $this->vView->visualizar('sendemailvalidation');
			}    
    
		public function sendEmailForValidation()
			{
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$vEmail = (string) $_POST['vEmail'];
                    
                        if($this->vUsersData->getUserEmailExists($vEmail) == 1){
                            $vState = $this->vUsersData->getUserState($vEmail);
                            if($vState == 2){
                                $vUserActivationCode = $this->vUsersData->getUserActivationCode($vEmail);
                                
                                $vTextMessage = '<p>Sigue el siguiente enlace para confirmar tu correo electrónico <a href="'.BASE_VIEW_URL.'access/validateEmailAccount/'.$vEmail.'/'.$vUserActivationCode.'/'.$vState.'">Validar mi cuenta!</a></p>.';

                                $this->getLibrary('class.phpmailer');
                                $this->vMail = new PHPMailer();								
                                //$this->vMail->IsSMTP();
                                $this->vMail->SMTPAuth = true;
                                $this->vMail->Host = '**********';
                                $this->vMail->Username = '***********';
                                $this->vMail->Password = '***********';
                                $this->vMail->SMTPSecure = 'ssl';
                                $this->vMail->Port = 25;
                                $this->vMail->SetFrom('informaciones@ideas-envision.com', 'Ideas-Envision Servicios Integrales');
                                $this->vMail->AddAddress(strtolower(trim($vEmail)));
                                $this->vMail->Subject = 'Validación de cuenta Ideas-Envision';
                                $this->vMail->MsgHTML($vTextMessage);											

                                $exito = $this->vMail->Send();

                                if($exito)
                                    {
                                         $this->vMail->ClearAddresses();
                                         echo 'Las instrucciones de validación de cuenta se han enviado al correo a '.$vEmail.', gracias!';
                                         //echo 'true';
                                    }
                                else
                                    {
                                         //echo 'No se ha enviado el correo a '.$email;
                                        echo 'false';
                                    }                                
                                
                                
                            } else {
                                echo 'La cuenta ya esta activada!, por favor inicie sesión.';
                            }
                        } else {
                           echo 'El correo electrónico '.$vEmail.', no esta registrado, por favor registre sus datos.'; 
                        }
					}
			}    
        
		public function validateEmailAccount($vEmail, $vActivationCode, $vState){
            
                /* BEGIN VALIDATION TIME SESSION USER */
				if(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('dashboard');
                }
                /* END VALIDATION TIME SESSION USER */            
            
                $vStatusValidateEmailAccount = 0;
            
                $vEmail = (string) strtolower($vEmail);
                $vActivationCode = (int) $vActivationCode;
                $vState = (int) $vState;

                $vUserEmailExists = $this->vUsersData->getUserEmailExists($vEmail);
                $vUserActivationCode = $this->vUsersData->getUserActivationCode($vEmail);
                $vUserAccountStatus = $this->vUsersData->getUserAccountStatus($vEmail);

                if(($vUserEmailExists == 1) && ($vUserActivationCode == $vActivationCode) && ($vUserAccountStatus == $vState)){
                    // Email not register in database.
                    $vUserCode = $this->vUsersData->getUserCodeFromEmailActivationCode($vActivationCode, $vEmail);
                    $vActive = 1;
                    $vProfileType = 1;
                    
                    $vUpdateUserStatus = $this->vUsersData->updateUserStatus($vUserCode, $vActive);
                    $vUpdateUserInfoStatus = $this->vUsersData->updateUserInfoStatus($vUserCode, $vActive);
                    $vUpdateProfileStatus = $this->vProfileData->updateProfileStatus($vUserCode, $vProfileType, $vActive);
                    
                    $vStatusValidateEmailAccount = 1;
                    //echo 'ok activación realizada - '.$vUpdateUserStatus;
                } else {
                    $vStatusValidateEmailAccount = 2;
                }
            
                if($vStatusValidateEmailAccount == 1){
                    $this->vView->vStatusValidateEmailAccount = 'La cuenta se habilitó correctamente, ahora puedes iniciar sesión.';
                } elseif($vStatusValidateEmailAccount == 2){
                    $this->vView->vStatusValidateEmailAccount = '¡UPS! Existe un error al habilitar la cuenta, intenta nuevamente. Sí el error persiste por favor envianos un mensaje aquí';
                } else {
                    $this->vView->vStatusValidateEmailAccount = '¡UPS! Algo sucedio mal, por favor envianos un mensaje aquí';
                }
            
                $this->vView->visualizar('validateAccount');
			}
	}
?>