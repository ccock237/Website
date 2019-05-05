<?php
/*
**************************************
	Name:			mysql.php
	Programmer:		Clayton Cockrell
	Date:			10/2/17
	Description:	This php library file holds function definition for the MySQLStream class.
	
	Class:			MySQLStream
	
	Functions:		__construct(),
					__destruct(),
					SQLConnect(),
					SQLCreate(),
					SQLAlter(),
					SQLDrop(),
					SQLSelect(),
					SQLInsert(),
					SQLUpdate(),
					SQLDelete(),
					SQLCustomQuery()
**************************************
*/

class MySQLStream {

	private $myConn;
	
	/*
		Name:           __construct
		Parameters:     Server name, username, password, and database
		Returns:        None
		Description:    The constructor for the MySQLStream class tries to connect to
						a mysql database.
	*/
	public function __construct($useServer, $useUser, $usePassword, $useDatabase) {
		$success = false;
		if ($this->SQLConnect($useServer, $useUser, $usePassword, $useDatabase))
			$success = true;
		
		return $success;
	}
	
	/*
		Name:           __destruct
		Parameters:     None
		Returns:        None
		Description:    The deconstructor for the MySQLStream class closes the connection
						to the database.
	*/
	public function __destruct() {
		mysqli_close($this->myConn);
	}

	/*
		Name:           SQLConnect
		Parameters:     Server name, username, password, and database
		Returns:        True or False
		Description:    The function SQLConnect takes in information for connection to a
						mysql database and attempts to do so.
	*/
	public function SQLConnect($servername, $username, $password, $database) {
		$this->myConn = mysqli_connect($servername, $username, $password, $database);
		$success = false;
		
		if ($this->myConn) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLCreate
		Parameters:     Table name and fields
		Returns:        True or False
		Description:    The function SQLCreate takes in a table name and fields for that
						table. The function then attempts to create the table.
	*/
	public function SQLCreate($tablename, $fields) {
		$sendSQL = "CREATE TABLE $tablename ($fields)";
		$success = false;

		if (mysqli_query($this->myConn, $sendSQL)) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLAlter
		Parameters:     Table name and what is to be altered
		Returns:        True or False
		Description:    The function SQLAlter takes in a table name and what is to
						be altered. The function attemps to alter a table.
	*/
	public function SQLAlter($tablename, $altered) {
		$sendSQL = "SQLAlter TABLE $tablename $altered";
		$success = false;

		if (mysqli_query($this->myConn, $sendSQL)) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLDrop
		Parameters:     Table name
		Returns:        True or False
		Description:    The function SQLDrop takes in a table name to be
						dropped. The function attemps to drop the table.
	*/
	public function SQLDrop($tablename) {
		$sendSQL = "SQLDrop TABLE $tablename";
		$success = false;

		if (mysqli_query($this->myConn, $sendSQL)) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLSelect
		Parameters:     Table name and fields
		Returns:        "No Data" or the data from the table
		Description:    The function SQLSelect takes in a table name and the fields
						to be selected. The function attemps to select all the data
						from the specified fields in the table.
	*/
	public function SQLSelect($tablename, $fields) {
		$sendSQL = "SELECT $fields FROM $tablename";
		
		$content = mysqli_query($this->myConn, $sendSQL);
		// Multidimensional array
		$data = array(array());
		// Setup a row and col (multidimensional) array to return
		if (mysqli_num_rows($content) > 0) {
			$colNum = 0;
			while ($row = mysqli_fetch_array($content, MYSQLI_NUM)) {
				for ($rowNum = 0; $rowNum < sizeof($row); $rowNum++) {
					$data[$colNum][$rowNum] = $row[$rowNum];
				}
				$colNum++;
			}
		} else {
			$data[0][0] = "No Data";
		}
		
		
		return $data;
	}
	
	/*
		Name:           SQLInsert
		Parameters:     Table name, fields, and values
		Returns:        True or False
		Description:    The function SQLInsert takes in a table name, the fields, and the
						values to be inserted. The function attemps to insert the values
						into the fields of the table.
	*/
	public function SQLInsert($tablename, $fields, $values) {
		$sendSQL = "INSERT INTO $tablename ($fields) VALUES ($values)";
		$success = false;
		
		if (mysqli_query($this->myConn, $sendSQL)) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLUpdate
		Parameters:     Table name, update field, and condition
		Returns:        True or False
		Description:    The function SQLUpdate takes in a table name, the field to update, 
						and the condition. The function attempts to update the values
						of the selected field in the table.
	*/
	public function SQLUpdate($tablename, $updateVal, $condition) {
		$sendSQL = "UPDATE $tablename SET $updateVal WHERE $condition";
		$success = false;
		
		if (mysqli_query($this->myConn, $sendSQL)) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLDelete
		Parameters:     Table name and condition
		Returns:        True or False
		Description:    The function SQLDelete takes in a table name and a condition.
						The function attempts to delete the tables data where the
						condition is true.
	*/
	public function SQLDelete($tablename, $condition) {
		$sendSQL = "DELETE FROM $tablename WHERE $condition";
		
		if ($condition == "") $sendSQL = "DELETE FROM $tablename";
		$success = false;
		
		if (mysqli_query($this->myConn, $sendSQL)) $success = true;
		
		return $success;
	}
	
	/*
		Name:           SQLCustomQuery
		Parameters:     The query to send
		Returns:        The result returned from mysql database
		Description:    The function SQLCustomQuery allows a custom query to be sent to
						the database and it returns what the database returns.
	*/
	public function SQLCustomQuery($sqlQuery) {
		return mysqli_query($this->myConn, $sqlQuery);
	}
}
?>