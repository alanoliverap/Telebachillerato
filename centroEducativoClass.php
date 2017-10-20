<?php
class centroEducativoClass
{

	/* User Registration */
	public function userRegistration($numero_centro,$nombre_centro,$direccion_centro,$telefono_centro,$zona_edu)
	{
		try{
				$db = getDB();
				$stmt = $db->prepare("INSERT INTO public.centro_educativo(numero_centro, nombre_centro, direccion_centro, telefono_centro,zona_edu) VALUES (:numero_centro, :nombre_centro, :direccion_centro, :telefono_centro, :zona_edu)");
				$zona_edu  = '1';
				$stmt->bindParam("numero_centro", $numero_centro,PDO::PARAM_STR) ;
				$stmt->bindParam("nombre_centro", $nombre_centro,PDO::PARAM_STR) ;
				$stmt->bindParam("direccion_centro", $direccion_centro,PDO::PARAM_STR) ;
				$stmt->bindParam("telefono_centro", $telefono_centro,PDO::PARAM_STR) ;
				$stmt->bindParam("zona_edu", $zona_edu,PDO::PARAM_STR) ;
				$stmt->execute();
				$uid=$db->lastInsertId(); // Last inserted row id
				$db = null;
				return true;
				
			
		} 
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}

	/* User Details */
	public function userDetails($uid)
	{
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT email,username,name FROM users WHERE uid=:uid"); 
			$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
			return $data;
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
}
?>