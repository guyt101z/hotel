<?php

class Admin_Model_DbTable_Hotels extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'hotel';
        protected $_primary = 'hid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getHotels() 
        {        
                $sql = "select hotel.*, world.`name` as world from hotel left join world on hotel.wid = world.wid";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTranslateHotels($data = null)
        {
                if ($data && is_numeric($data)) {
                    $sql = "SELECT translate_hotel.*, hotel.lat, hotel.lgt, hotel.wid, world.`name` AS world
                            FROM `translate_hotel` LEFT JOIN `hotel` on `translate_hotel`.`hid` = `hotel`.`hid` 
                            LEFT JOIN world on world.wid = hotel.wid";
                } else {
                    $sql = "SELECT * FROM `translate_hotel` LEFT JOIN `hotel` on `translate_hotel`.`hid` = `hotel`.`hid`";
                }
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function addHotel($data = array()) 
        {
                $sql = "INSERT INTO `hotel` (`name`, `lat`, `lgt`) VALUES ('" . $data['name'] . "', '" . $data['lat'] . "', '" . $data['lgt'] . "')";
                return $this->_db->query($sql);             
        }
        
        public function getBrandsNotInBrandStores()
        {
                $sql = "SELECT * FROM brand WHERE bid NOT IN (SELECT bid FROM brand_store)";
                RETURN $this->_db->query($sql)->fetchAll();
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