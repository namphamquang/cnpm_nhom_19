<?php
class Database
{
	public $conn;
	function __construct($local, $user, $pass, $dbname)
	{
		$this->conn = mysqli_connect($local, $user, $pass, $dbname);
		if (is_null($this->conn)) {
			echo "Error";
		}
	}

	function showCart()
	{
		$sql = "Select * from cart WHERE quantity >= 1;";
		$result = $this->conn->query($sql);
		return $result;
	}
	function find() {
		$sql = <<<EOT
        SELECT *
        FROM `user` 
        WHERE m_username = 'namnam1130'
EOT; $result = $this->conn->query($sql);
return $result;
	}
	function addPro($name, $size)
	{
		$sql = "UPDATE cart set quantity = quantity + 1 WHERE name = '{$name}' AND size = '{$size}'";
		$result = $this->conn->query($sql);
		return $result;
	}
	function deletePro($name, $size)
	{
		$sql = "UPDATE cart set quantity = 0 WHERE name = '{$name}' AND size = '{$size}'";
		$result = $this->conn->query($sql);
		return $result;
	}
	function updatePro($name, $size, $quantity) 
	{
		$sql = "UPDATE cart set quantity = '{$quantity}' WHERE name = '{$name}' AND size = '{$size}'";
		$result = $this->conn->query($sql);
		return $result;
	}
	function deleteAll() 
	{
		$sql = "UPDATE cart set quantity = 0";
		$result = $this->conn->query($sql);
		return $result;
	}

}