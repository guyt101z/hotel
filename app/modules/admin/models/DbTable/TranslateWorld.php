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
                return $this->fetchAll();
        }
    
        public function addLocale($tr_wid, $locale) 
        {
                $sql = "SELECT * FROM translate_world WHERE tr_wid = " . $tr_wid;
                $trw = $this->_db->query($sql)->fetch();
                die(print_r($trw));
                return;
                //$sql = "INSERT INTO `translate_world` (`wid`, `locale`, `title`) VALUES (``, ``, ``)";
        }
    
}