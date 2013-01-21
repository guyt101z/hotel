<?php

class Admin_Model_DbTable_Brands extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'brand';
        protected $_primary = 'bid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getBrands() 
        {        
                $sql = 'SELECT * FROM ' . $this->_name;
                $sql .= ' ORDER BY title ASC';
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function addBrand($data = array()) 
        {
                $sql = "INSERT INTO `brand` (`title`, `status`) VALUES ('" . $data['title'] . "', '" . $data['status'] . "')";
                return $this->_db->query($sql);             
        }
        
        public function updateLanguage($id, $data = array()) 
        {
                $sql = "UPDATE `lang` SET ";
                
                $i = 0;
                foreach ($data as $k => $v) {
                    if ($i == 0) {
                        $sql .= " `" . $k . "`='". $v ."' ";
                    } else {
                        $sql .= ", `" . $k . "`='". $v ."' ";
                    }
                    $i++;
                }
                
                $sql .= " WHERE `lid` = " . $id;
                return $this->_db->query($sql);
        }
        
        public function deleteLanguageById($id)
        {
                $sql = "DELETE FROM `lang` WHERE `lid`=".$id;
                return $this->_db->query($sql);
        }
        
}