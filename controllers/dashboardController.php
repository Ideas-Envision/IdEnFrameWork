<?Php

class dashboardController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
            
                if(!IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('access');
                } else {
                    IdEnSession::timeSession();
                }
			}
			
		public function index(){
            
            echo 'DEFAULT_USER_AUTHENTICATE: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE);
            echo '<br/>';
            echo 'DEFAULT_USER_AUTHENTICATECode: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code');
            echo '<br/>';
            echo 'DEFAULT_USER_AUTHENTICATEEmail: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Email');
            echo '<br/>';
            echo 'DEFAULT_USER_AUTHENTICATERole: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Role');
            echo '<br/>';
            echo 'DEFAULT_USER_AUTHENTICATEProfileCode: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'ProfileCode');
            echo '<br/>';
            echo 'vTimeSessionUser: '.IdEnSession::getSession('vTimeSessionUser');
            echo '<br/><br/><br/><br/><br/>';
            echo '<a href="'.BASE_VIEW_URL.'access/LogoutMethod">Salir</a>';
            
            $this->vView->visualizar('index');
			}       
	}
?>