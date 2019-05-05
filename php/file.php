<?php
/*
**************************************
	Name:			file.php
	Programmer:		Clayton Cockrell
	Date:			9/28/17
	Description:	This php library file holds function definition for the MyFile class.
	
	Class:			Vehicle
	
	Functions:		__construct(),
					__destruct(),
					FileCreate(),
					FileInsert(),
					FileRead(),
					FileDelete()
**************************************
*/

/*
	Eliminate Warning and Error messages. I have all sequences that could have
	a warning or error message associated with them caught with a DIE command.
	My error messages from the DIE commands look cleaner than the natural error
	messages.
*/
error_reporting(0);

class MyFile {
	// Global variables
	private $newFile;	
	
	/*
		Name:           __construct
		Parameters:     None
		Returns:        None
		Description:    The constructor for the MyFile class resets the $newFile variable
	*/
	public function __construct() {
		$this->newFile = "";
	}
	
	/*
		Name:           __destruct
		Parameters:     None
		Returns:        None
		Description:    The deconstructor for the MyFile class closes the file handle
	*/
	public function __destruct() {
		if ($this->newFile != "") fclose($this->newFile);
	}
	
	/*
		Name:           FileCreate
		Parameters:     A file name
		Returns:        None
		Description:    The function FileCreate takes in a file name and checks if the file
						already exists. The function will echo a string to let the user
						know if it exists or not.
	*/
	public function FileCreate($filename) {		
		// Check if the file already exists
		if (file_exists($filename)) {
			echo "The file " . $filename . " already exists";
		} else {
			$this->newFile = fopen($filename, "w") or die("Could not open file " . $filename);
			echo "New file " . $filename . " created";
		}
	}
	
	/*
		Name:           FileInsert
		Parameters:     A file name
						Data to be inserted
		Returns:        None
		Description:    The function FileInsert takes in a file name and data to insert.
						The function will try to write to the file. The function will
						echo whether the write failed or succeeded.
	*/
	public function FileInsert($filename, $data) {
		// Open the file
		$this->newFile = fopen($filename, "a") or die("Could not open file " . $filename);
		// End the data with a new line
		$data .= "\n";
		// Write to the file
		if (fwrite($this->newFile, $data)) {
			echo "Wrote to file " . $filename . " successfully";
		} else {
			echo "Unable to write to file " . $filename;
		}
	}
	
	/*
		Name:           FileRead
		Parameters:     A file name
		Returns:        None
		Description:    The function FileRead takes in a file name and attempts to read
						its contents.
	*/
	public function FileRead($filename) {
		// Read the file
		$this->newFile = fopen($filename, "r") or die("Unable to read file " . $filename);
		// Output one line until end-of-file
		while(!feof($this->newFile)) {
			echo fgets($this->newFile) . " ";
		}
	}
	
	/*
		Name:           FileDelete
		Parameters:     A file name
		Returns:        None
		Description:    The function FileDelete takes in a file name and attempts to delete
						the file.
	*/
	public function FileDelete($filename) {
		// Close the handle
		fclose($this->newFile);
		// Delete the file
		if (unlink($filename)) {
			echo "Deleted file " . $filename . " Successfully";
		} else {
			echo "Unable to delete file " . $filename;
		}
	}	
}
?>