<?php

class Admin_Model_DbTable_HotelUsers extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'hotel_user';
        protected $_primary = 'huid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getHotelUsers() 
        {        
                $sql = "SELECT hu.*, hotel.name AS hotel_name, user.email FROM hotel_user AS hu
                        LEFT JOIN hotel on hu.hid = hotel.hid
                        LEFT JOIN user on hu.uid = user.uid";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getHotelNames()
        {
                $sql = "SELECT hid, name FROM hotel";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getHotelName($id)
        {
                $sql = "SELECT name from hotel WHERE hid = $id";
                return $this->_db->query($sql)->fetchColumn();
        }
        
        public function getHotelLeftJoinTranslateHotel($id)
        {
                if ($id && is_numeric($id)) {
                    $sql = "SELECT h1.*, tr_h1.tr_hid, tr_h1.locale, tr_h1.title, tr_h1.content, tr_h1.address, w1.name AS world_name
                            FROM hotel AS h1
                            LEFT JOIN translate_hotel AS tr_h1 ON h1.hid = tr_h1.hid
                            LEFT JOIN world AS w1 ON h1.wid = w1.wid 
                            WHERE h1.hid = $id";
                } else {
                    $sql = "SELECT h1.*, tr_h1.tr_hid, tr_h1.locale, tr_h1.title, tr_h1.content, tr_h1.address, w1.name AS world_name
                            from hotel as h1
                            left join translate_hotel as tr_h1 on h1.hid = tr_h1.hid
                            left join world as w1 on h1.wid = w1.wid";
                }
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTrHotel($id)
        {
                $sql = "select tr.*, h.name from hotel as h
                        LEFT JOIN translate_hotel AS tr on h.hid = tr.hid WHERE tr.tr_hid = $id";
                return $this->_db->query($sql)->fetch();
        }
        
        public function updateTrHotel($id, $data=array()) 
        {
                $sql = "UPDATE `translate_hotel` SET `locale`='".$data['locale']."', `title`='" . $data['title']. "', `content`='". $data['content']."' WHERE `tr_hid`='$id'";
                return $this->_db->query($sql);
        }
        
        public function addTrHotel($data = array()) 
        {
                 $sql = "INSERT INTO `translate_hotel` (`hid`, `locale`, `title`, `content`) VALUES ('" . $data['hid'] .  "', '" . $data['locale'] . "', '" . $data['title'] . "', '" . $data['content'] . "')";
                 return $this->_db->query($sql);
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