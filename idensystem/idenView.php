<?php

class IdEnView  extends IdEnController
	{				
		private $vController;
		private $vDataFirstItemMenu;
		private $vDataSecondItemMenu;
		
		public function __construct(IdEnRequest $vRequest)
			{
				$this->vController = $vRequest->getController();
				$this->vJavaScript = array();
			}
			
		public function index(){}
			
		public function visualizar($vNameView, $vItem = FALSE)
			{

				$vParamsViewBootstrap = array(
                                        'root_bootstrap_css'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/bootstrap/css/',
                                        'root_bootstrap_fonts'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/bootstrap/fonts/',
                                        'root_bootstrap_js'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/bootstrap/js/'
									 );
                
				$vParamsViewFrontEndLayout = array(
                                        'root_frontend_menu_array'=>$arrayTotalMenu,
                                        'root_frontend_css'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/frontend/css/',
                                        'root_frontend_fonts'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/frontend/fonts/',
										'root_frontend_img'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/frontend/images-web/',
                                        'root_frontend_js'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/frontend/js/',
										'root_frontend_plugins'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/frontend/plugins/'
									 );                

				$vParamsViewBackEndLayout = array(
                                        'root_backend_menu_array'=>$arrayTotalMenu,
										'root_backend_global_css'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/global/css/',
										'root_backend_global_images'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/global/img/',
										'root_backend_global_plugins'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/global/plugins/',
										'root_backend_global_scripts'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/global/scripts/',
										'root_backend_layouts_css'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/layouts/css/',
										'root_backend_layouts_images'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/layouts/img/',
										'root_backend_layouts_scripts'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/layouts/scripts/',
										'root_backend_pages_css'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/pages/css/',
										'root_backend_pages_images'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/pages/img/',
										'root_backend_pages_scripts'=>BASE_VIEW_URL.'views/layout/'.DEFAULT_VIEW_LAYOUT.'/backend/pages/scripts/'
									 );				
									 
				$vRouteViewFrontEnd = ROOT_APPLICATION.'views'.DIR_SEPARATOR.'frontend'.DIR_SEPARATOR.$this->vController.DIR_SEPARATOR.$vNameView.'.php';

				$vRouteViewBackEnd = ROOT_APPLICATION.'views'.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.$this->vController.DIR_SEPARATOR.$vNameView.'.php';
            
                $vRouteViewAccess = ROOT_APPLICATION.'views'.DIR_SEPARATOR.'access'.DIR_SEPARATOR.$this->vController.DIR_SEPARATOR.$vNameView.'.php';
                
                $vRouteViewError = ROOT_APPLICATION.'views'.DIR_SEPARATOR.'error'.DIR_SEPARATOR.$this->vController.DIR_SEPARATOR.$vNameView.'.php';
				
				if(is_readable($vRouteViewFrontEnd))
					{
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'header.frontend.php';
						include_once $vRouteViewFrontEnd;
                        include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'footer.frontend.php';
					}
				elseif(is_readable($vRouteViewBackEnd))
					{
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'header.backend.php';
						include_once $vRouteViewBackEnd;
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'footer.backend.php';
					}
				elseif(is_readable($vRouteViewAccess))
					{
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'header.access.php';
						include_once $vRouteViewAccess;
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'footer.access.php';
					}
				elseif(is_readable($vRouteViewError))
					{
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'header.error.php';
						include_once $vRouteViewError;
						include_once ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.'footer.error.php';
					}                
				else
					{
                        header('Location: '.BASE_VIEW_URL.'error/view');
						exit;
					}								
			}			
	}
?>
