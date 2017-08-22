<?php

class accessModel extends IdEnModel
	{
		public function __construct(){
				parent::__construct();
			}
        
		public function getAccessStatus($vEmail,$vPassword)
			{
				$vEmail = (string) $vEmail;
				$vPassword = (string) IdEnHash::getHash('sha1',$vPassword,DEFAULT_HASH_KEY);

				$vResultAccessStatus = $this->vDataBase->query("SELECT
                                                            tb_idenframework_users.n_coduser,
                                                            tb_idenframework_users.c_username,
                                                            tb_idenframework_users.c_pass1,
                                                            tb_idenframework_users.c_pass2,
                                                            tb_idenframework_users.c_email,
                                                            tb_idenframework_users.c_userrole,
                                                            tb_idenframework_users.c_email,
                                                            tb_idenframework_users.n_active,
                                                            tb_idenframework_usernames.n_codusername,
                                                            tb_idenframework_usernames.c_names,
                                                            tb_idenframework_usernames.c_lastnames,
                                                            tb_idenframework_usernames.c_othername
                                                        FROM tb_idenframework_users, tb_idenframework_usernames
                                                        WHERE tb_idenframework_users.n_coduser = tb_idenframework_usernames.n_coduser
                                                            AND tb_idenframework_users.c_email = '$vEmail'
                                                            AND tb_idenframework_users. c_pass1 = '$vPassword'
                                                            AND tb_idenframework_users. c_pass2 = '$vPassword'
                                                            AND tb_idenframework_users.n_active = 1
                                                            AND tb_idenframework_usernames.n_active = 1;");
				return $vResultAccessStatus->fetch();
				$vResultAccessStatus->close();
			}        
    }