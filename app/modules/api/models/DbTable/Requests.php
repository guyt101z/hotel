<?php

class Api_Model_DbTable_Requests extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'requests';
        protected $_primary = 'request_id';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getRequests() 
        {        
                $sql = 'SELECT * FROM ' . $this->_name;
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function addRequest($data = array()) 
        {
                return $this->insert($data);
        }
  
        
}