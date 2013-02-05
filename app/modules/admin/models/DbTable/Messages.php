<?php

class Admin_Model_DbTable_Messages extends Zend_Db_Table_Abstract
{
    
    protected $_name = 'message';
    protected $_primary = 'msgid';

    public function getTableName()
    {
        return $this->_name;
    }

    public function getMessages() 
    {        
        $sql = 'SELECT * FROM message';
        return $this->_db->query($sql)->fetchAll();
    }
    
    public function getMessagesByHotelId($id, $status = null) 
    {
        $sql = 'SELECT * FROM ' . $this->_name . ' WHERE hid ='. $id;
        
        if ($status && ($status == 'on' || $status == 'done')) 
            $sql .= ' AND status = ' . $this->_db->quote($status); 
        
        return $this->_db->query($sql)->fetchAll();
    }
   
}