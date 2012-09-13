<?php
class SiteModel extends CI_Model {
private $tableName = 'clientes';
function __construct(){
parent::__construct();
}
// Get number of records in table:
function count_all(){
return $this->db->count_all($this->tableName);
}

}