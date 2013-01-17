<?php

class Admin_Model_DbTable_Languages extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'lang';
        protected $_primary = 'lid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getLanguages() 
        {        
                $sql = 'SELECT * FROM ' . $this->_name;
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getLanguageById($id)
        {
                $sql = 'SELECT * FROM lang WHERE lid = ' . $id;
                return $this->_db->query($sql)->fetch();
        }

        public function getLanguagesByHotelId($id) 
        {
                $sql = 'SELECT lang.locale, lang.title FROM hotel LEFT JOIN world on hotel.wid = world.wid ' . 
                        'RIGHT JOIN translate_world ON translate_world.wid = hotel.wid ' .
                        'LEFT JOIN lang ON translate_world.locale = lang.locale ' .
                        'WHERE hotel.hid = ' . $id;
                return $this->_db->query($sql)->fetchAll();
        }
  
        public function addLanguage($data = array()) 
        {
                $sql = "INSERT INTO `lang` (`locale`, `title`) VALUES ('" . $data['locale'] . "', '" . $data['title'] . "')";
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