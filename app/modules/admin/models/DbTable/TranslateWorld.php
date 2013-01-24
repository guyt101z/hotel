<?php

class Admin_Model_DbTable_TranslateWorld extends Zend_Db_Table_Abstract
{

        protected $_name = 'translate_world';
        protected $_primary = 'wid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getTranslateWorld() 
        {        
                $sql = "SELECT distinct translate_world.*, w1.`name`, w1.parent_id, w1.lat, w1.lgt, w2.`name` as parent FROM translate_world 
                        LEFT JOIN world as w1 ON translate_world.wid = w1.wid 
                        LEFT JOIN world AS w2 ON w1.parent_id = w2.wid
                        ORDER BY w1.`name` ASC, translate_world.locale ASC";
                return $this->_db->query($sql)->fetchAll();
        }
    
        public function addLocale($tr_wid, $locale) 
        {
                $sql = "SELECT * FROM translate_world WHERE tr_wid = " . $tr_wid;
                $trw = $this->_db->query($sql)->fetch();
                die(print_r($trw));
                return;
                //$sql = "INSERT INTO `translate_world` (`wid`, `locale`, `title`) VALUES (``, ``, ``)";
        }
        
        public function deleteTranslateWorldSQL($tr_wid)
        {
                $sql = "DELETE FROM `translate_world` WHERE `tr_wid`='$tr_wid'";
                return $this->_db->query($sql);
        }
            
    
}