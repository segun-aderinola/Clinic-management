<?php 
	class Db
	{
		protected function connect()
		{
			try
			{
				$conn = PDO("mysql:host=localhost;dbname = kwasu_clinic", "root", "");
				$conn->setAtrribute(PDO::ATTR_MODE, PDO::ERRMODE_EXCEPTION);

				return $conn;
			}

			catch(PDOException $e)
			{
				echo "Error Connection".$e->getMessage();
			}
		}
	}

 ?>