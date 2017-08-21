<?php

class usersModel extends IdEnModel
	{
		public function __construct(){
				parent::__construct();
			}

        /* BEGIN SELECT STATEMENT QUERY  */
		public function getUserNameExists($vUserName)
			{
                $vUserName = (string) $vUserName;
            
				$vResultUserExists = $this->vDataBase->query("SELECT
                                                                COUNT(*)
                                                            FROM tb_idenframework_users
                                                            WHERE tb_idenframework_users.c_username = '$vUserName';");
				return $vResultUserExists->fetchColumn();
				$vResultUserExists->close();
			}
    
		public function getUserEmailExists($vUserEmail)
			{
                $vUserEmail = (string) $vUserEmail;
            
				$vResultUserEmailExists = $this->vDataBase->query("SELECT
                                                                COUNT(*)
                                                            FROM tb_idenframework_users
                                                                WHERE tb_idenframework_users.c_email = '$vUserEmail';");
				return $vResultUserEmailExists->fetchColumn();
				$vResultUserEmailExists->close();
			}    
    
		public function getUserName($vUserName)
			{
                $vUserName = (string) $vUserName;
            
				$vResultUserName = $this->vDataBase->query("SELECT
                                                                tb_idenframework_users.c_username
                                                            FROM tb_idenframework_users
                                                                WHERE tb_idenframework_users.n_coduser = $vUserCode;");
				return $vResultUserName->fetchAll();
				$vResultUserName->close();
			}    
    
		public function getUserEmail($vUserName)
			{
                $vUserName = (string) $vUserName;
            
				$vResultUserEmail = $this->vDataBase->query("SELECT
                                                                tb_idenframework_users.c_email
                                                            FROM tb_idenframework_users
                                                                WHERE tb_idenframework_users.n_coduser = $vUserCode;");
				return $vResultUserEmail->fetchAll();
				$vResultUserEmail->close();
			}    
    
		public function getUser($vUserCode)
			{
                $vUserCode = (int) $vUserCode;
            
				$vResult = $this->vDataBase->query("SELECT
                                                        tb_idenframework_users.n_coduser,
                                                        tb_idenframework_users.c_username,
                                                        tb_idenframework_users.c_pass1,
                                                        tb_idenframework_users.c_pass2,
                                                        tb_idenframework_users.c_email,
                                                        tb_idenframework_users.c_userrole,
                                                        tb_idenframework_users.n_activationcode,
                                                        tb_idenframework_users.n_active,
                                                        tb_idenframework_users.c_usercreate,
                                                        tb_idenframework_users.d_datecreate,
                                                        tb_idenframework_users.c_usermod,
                                                        tb_idenframework_users.d_datemod
                                                    FROM tb_idenframework_users
                                                        WHERE tb_idenframework_users.n_coduser = $vUserCode;");
				return $vResult->fetchAll();
				$vResult->close();
			}    

    
		public function getUsers()
			{
				$vResult = $this->vDataBase->query("SELECT
                                                        tb_idenframework_users.n_coduser,
                                                        tb_idenframework_users.c_username,
                                                        tb_idenframework_users.c_pass1,
                                                        tb_idenframework_users.c_pass2,
                                                        tb_idenframework_users.c_email,
                                                        tb_idenframework_users.c_userrole,
                                                        tb_idenframework_users.n_activationcode,
                                                        tb_idenframework_users.n_active,
                                                        tb_idenframework_users.c_usercreate,
                                                        tb_idenframework_users.d_datecreate,
                                                        tb_idenframework_users.c_usermod,
                                                        tb_idenframework_users.d_datemod
                                                    FROM tb_idenframework_users;");
				return $vResult->fetchAll();
				$vResult->close();
			}
    

		public function getUserInfo($vUserCode)
			{
                $vUserCode = (int) $vUserCode;
                
				$vResult = $this->vDataBase->query("SELECT
                                                        tb_idenframework_usernames.n_codusername,
                                                        tb_idenframework_usernames.n_coduser,
                                                        tb_idenframework_usernames.c_names,
                                                        tb_idenframework_usernames.c_lastnames,
                                                        tb_idenframework_usernames.c_othername,
                                                        tb_idenframework_usernames.d_birthdate,
                                                        tb_idenframework_usernames.c_country,
                                                        tb_idenframework_usernames.c_city,
                                                        tb_idenframework_usernames.n_active,
                                                        tb_idenframework_usernames.c_usercreate,
                                                        tb_idenframework_usernames.d_datecreate,
                                                        tb_idenframework_usernames.c_usermod,
                                                        tb_idenframework_usernames.d_datemod
                                                    FROM tb_idenframework_usernames
                                                        WHERE tb_idenframework_usernames.n_coduser = $vUserCode;");
				return $vResult->fetchAll();
				$vResult->close();
			}
    
		public function getUsersInfo()
			{                
				$vResult = $this->vDataBase->query("SELECT
                                                        tb_idenframework_usernames.n_codusername,
                                                        tb_idenframework_usernames.n_coduser,
                                                        tb_idenframework_usernames.c_names,
                                                        tb_idenframework_usernames.c_lastnames,
                                                        tb_idenframework_usernames.c_othername,
                                                        tb_idenframework_usernames.d_birthdate,
                                                        tb_idenframework_usernames.c_country,
                                                        tb_idenframework_usernames.c_city,
                                                        tb_idenframework_usernames.n_active,
                                                        tb_idenframework_usernames.c_usercreate,
                                                        tb_idenframework_usernames.d_datecreate,
                                                        tb_idenframework_usernames.c_usermod,
                                                        tb_idenframework_usernames.d_datemod
                                                    FROM tb_idenframework_usernames;");
				return $vResult->fetchAll();
				$vResult->close();
			}    
        /* END SELECT STATEMENT QUERY  */
    
        /* BEGIN INSERT STATEMENT QUERY  */    
		public function userRegister($vUsername, $vPassword1, $vPassword2, $vEmail, $vRole, $vActivationcode, $vActive){
            
                $vUsername = (string) $vUsername;
                $vPassword1 = (string) IdEnHash::getHash('sha1',$vPassword1,DEFAULT_HASH_KEY);
                $vPassword2 = (string) IdEnHash::getHash('sha1',$vPassword2,DEFAULT_HASH_KEY);
                $vEmail = (string) $vEmail;
                $vRole = (string) $vRole;
                $vActivationcode = (int) $vActivationcode;
                $vActive = (int) $vActive;
            
                $vUserCreate = (string) IdEnSession::getSession('vSessionActiveUserName');

				$vResultUserRegister = $this->vDataBase->prepare("INSERT INTO tb_idenframework_users(c_username, c_pass1, c_pass2, c_email, c_userrole, n_activationcode, n_active, c_usercreate, d_datecreate)
																VALUES(:c_username, :c_pass1, :c_pass2, :c_email, :c_userrole, :n_activationcode, :n_active, :c_usercreate, NOW())")
								->execute(
										array(
                                            ':c_username' => $vUsername,
                                            ':c_pass1' => $vPassword1,
                                            ':c_pass2' => $vPassword2,
                                            ':c_email' => $vEmail,
                                            ':c_userrole' => $vRole,
                                            ':n_activationcode' => $vActivationcode,
                                            ':n_active' => $vActive,
                                            ':c_usercreate' => $vUserCreate,
										));
                return $vResultUserRegister = $this->vDataBase->lastInsertId();
                $vResultUserRegister->close();
			}
    
		public function userInfoRegister($vUserCode, $vNames, $vLastNames, $vOthername, $vBirthDate, $vCountry, $vCity, $vActive){
            
                $vUserCode = (int) $vUserCode;
                $vNames = (string) $vNames;
                $vLastNames = (string) $vLastNames;
                $vOthername = (string) $vOthername;
                $vBirthDate = $vBirthDate;
                $vCountry = (string) $vCountry;
                $vCity = (string) $vCity;
                $vActive = (int) $vActive;
            
                $vUserCreate = (string) IdEnSession::getSession('vSessionActiveUserName');

				$vResultUserInfoRegister = $this->vDataBase->prepare("INSERT INTO tb_idenframework_usernames(n_coduser, c_names, c_lastnames, c_othername, d_birthdate, c_country, c_city, n_active, c_usercreate, d_datecreate)
																VALUES(:n_coduser, :c_names, :c_lastnames, :c_othername, :d_birthdate, :c_country, :c_city, :n_active, :c_usercreate, NOW())")
								->execute(
										array(
                                            ':n_coduser' => $vUserCode,
                                            ':c_names' => $vNames,
                                            ':c_lastnames' => $vLastNames,
                                            ':c_othername' => $vOthername,
                                            ':d_birthdate' => $vBirthDate,
                                            ':c_country' => $vActivationcode,
                                            ':c_city' => $vCity,
                                            ':n_active' => $vActive,
                                            ':c_usercreate' => $vUserCreate,
										));
                return $vResultUserInfoRegister = $this->vDataBase->lastInsertId();
                $vResultUserInfoRegister->close();            
			}
        /* END INSERT STATEMENT QUERY  */
    }
