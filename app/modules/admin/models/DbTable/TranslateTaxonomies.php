<?php

class Admin_Model_DbTable_TranslateTaxonomies extends Zend_Db_Table_Abstract
{

        protected $_name = 'translate_taxo';
        protected $_primary = 'tr_tid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getTranslateTaxonomies() 
        {        
                $sql = "SELECT translate_taxo.*, taxo.name, taxo.pos, taxo.section 
                        FROM translate_taxo 
                        LEFT JOIN taxo ON translate_taxo.tid = taxo.tid";
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