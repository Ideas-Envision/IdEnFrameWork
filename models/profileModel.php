<?php

class profileModel extends IdEnModel
	{
		public function __construct(){
				parent::__construct();
			}

        /* BEGIN SELECT STATEMENT QUERY  */
		public function getProfileNameExists($vProfileName)
			{
                $vProfileName = (string) $vProfileName;
            
				$vResultProfileNameExists = $this->vDataBase->query("SELECT
                                                                COUNT(*)
                                                            FROM tb_idenframework_profiles
                                                            WHERE tb_idenframework_profiles.tb_idenframework_profiles = '$vProfileName';");
				return $vResultProfileNameExists->fetchColumn();
				$vResultProfileNameExists->close();
			}
    
		public function getProfileFromUserCode($vUserCode)
			{
                $vUserCode = (int) $vUserCode;
            
				$vResultProfileFromUserCode = $this->vDataBase->query("SELECT
                                                                            tb_idenframework_profiles.n_codprofile,
                                                                            tb_idenframework_profiles.n_coduser,
                                                                            tb_idenframework_profiles.c_profilename,
                                                                            tb_idenframework_profiles.n_profiletype,
                                                                            tb_idenframework_profiles.n_active,
                                                                            tb_idenframework_profiles.c_usercreate,
                                                                            tb_idenframework_profiles.d_datecreate,
                                                                            tb_idenframework_profiles.c_usermod,
                                                                            tb_idenframework_profiles.d_datemod
                                                                        FROM tb_idenframework_profiles
                                                                            WHERE tb_idenframework_profiles.n_coduser = $vUserCode;");
				return $vResultProfileFromUserCode->fetchAll();
				$vResultProfileFromUserCode->close();
			}    
    
		public function getProfile($vProfileCode)
			{
                $vProfileCode = (int) $vProfileCode;
            
				$vResultProfile = $this->vDataBase->query("SELECT
                                                                    tb_idenframework_profiles.n_codprofile,
                                                                    tb_idenframework_profiles.n_coduser,
                                                                    tb_idenframework_profiles.c_profilename,
                                                                    tb_idenframework_profiles.n_profiletype,
                                                                    tb_idenframework_profiles.n_active,
                                                                    tb_idenframework_profiles.c_usercreate,
                                                                    tb_idenframework_profiles.d_datecreate,
                                                                    tb_idenframework_profiles.c_usermod,
                                                                    tb_idenframework_profiles.d_datemod
                                                                FROM tb_idenframework_profiles
                                                                    WHERE tb_idenframework_profiles.n_codprofile = $vProfileCode;");
				return $vResultProfile->fetchAll();
				$vResultProfile->close();
			}
    
		public function getProfiles()
			{            
				$vResultProfiles = $this->vDataBase->query("SELECT
                                                                tb_idenframework_profiles.n_codprofile,
                                                                tb_idenframework_profiles.n_coduser,
                                                                tb_idenframework_profiles.c_profilename,
                                                                tb_idenframework_profiles.n_profiletype,
                                                                tb_idenframework_profiles.n_active,
                                                                tb_idenframework_profiles.c_usercreate,
                                                                tb_idenframework_profiles.d_datecreate,
                                                                tb_idenframework_profiles.c_usermod,
                                                                tb_idenframework_profiles.d_datemod
                                                            FROM tb_idenframework_profiles;");
				return $vResultProfiles->fetchAll();
				$vResultProfiles->close();
			}    
        /* END SELECT STATEMENT QUERY  */
    
        /* BEGIN INSERT STATEMENT QUERY  */
		public function profileRegister($vUserCode, $vProfileName, $vProfileType, $vActive){
            
                $vUserCode = (int) $vUserCode;
                $vProfileName = (string) $vProfileName;
                $vProfileType = (int) $vProfileType;
                $vActive = (int) $vActive;
            
                $vUserCreate = (string) IdEnSession::getSession('vSessionActiveUserName');

				$vResultProfileRegister = $this->vDataBase->prepare("INSERT INTO tb_idenframework_profiles(n_coduser, c_profilename, n_profiletype, n_active, c_usercreate, d_datecreate)
																VALUES(:n_coduser, :c_profilename, :n_profiletype, :n_active, :c_usercreate, NOW())")
								->execute(
										array(
                                            ':n_coduser' => $vUserCode,
                                            ':c_profilename' => $vProfileName,
                                            ':n_profiletype' => $vProfileType,
                                            ':n_active' => $vActive,
                                            ':c_usercreate' => $vUserCreate,
										));
                return $vResultProfileRegister = $this->vDataBase->lastInsertId();
                $vResultProfileRegister->close();            
			}
        /* END INSERT STATEMENT QUERY  */
    }
