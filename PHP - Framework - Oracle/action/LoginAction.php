<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");

	class LoginAction extends CommonAction {
		public $wrongLogin;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			$this->wrongLogin = false;

			if (isset($_POST["username"])) {
				$user = UserDAO::authenticate($_POST["username"], $_POST["pwd"]);

				if (!empty($user)) {
					$_SESSION["name"] = $user["FIRST_NAME"];
					$_SESSION["visibility"] = $user["VISIBILITY"];

					header("location:home.php");
					exit;
				}
				else {
					$this->wrongLogin = true;
				}
			}
		}
	}
