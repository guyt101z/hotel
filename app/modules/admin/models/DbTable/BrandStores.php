<?php

class Admin_Model_DbTable_BrandStores extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'brand_store';
        protected $_primary = 'bsid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getBrandStores() 
        {        
                $sql = "SELECT * FROM brand_store LEFT JOIN translate_brand_store ON brand_store.bsid = translate_brand_store.bsid";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function addBrandStore($data = array()) 
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