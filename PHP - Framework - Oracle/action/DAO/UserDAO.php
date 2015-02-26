<?php 
	
	class UserDAO {

		public static function authenticate($username, $pwd) {
			$connection = Connection::getConnection();
			$pwd = sha1($pwd);
			$statement = $connection->prepare("SELECT * FROM USERS WHERE USERNAME = ? AND PASSWORD = ?");
			$statement->bindParam(1, $username);
			$statement->bindParam(2, $pwd);

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			// connexion à la BD, fichier texte, serveur externe, ...
			$user = null;

			if ($row = $statement->fetch()) {
				$user = $row;
				// unset($user["PASSWORD"]);
			}

			return $user;
		}

		public function updateProfile($row) {
			$connection = Connection::getConnection();

			//...
		}

	}