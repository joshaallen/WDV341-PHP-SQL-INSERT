<?php 
/*is identical to require except PHP will check if the file has already been included, and if so , not require it again
*/
require_once('config.php');

/*
    A data abstraction layer connection that can be changed by opening or closing it
*/
class Connection {
    //instance field created to store PDO abstraction layer connection
    private $conn;
    /** 
    *    Opens the PDO data abstraction layer *  connection
    * @return the connection 
    */
    public function open() {
        try {
            $this->conn = new PDO(
                "mysql:host=".SERVERNAME."; dbname=".DATABASE.";",
                USERNAME,
                PASSWORD
            );
            //set the PDO error mode exception
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            return $this->conn;
            //will only process errors of type PDOExcpetion
        } catch(PDOException $e) {
            $e->getMessage();
                return false;
        }
    }

    public function close() {
        $this->conn = null;
    }
}
?>