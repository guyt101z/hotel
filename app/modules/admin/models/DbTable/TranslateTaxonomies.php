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
                        LEFT JOIN taxo ON translate_taxo.tid = taxo.tid
                        ORDER BY taxo.name ASC";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTranslateTaxonomy($id)
        {
                $sql = "SELECT translate_taxo.*, taxo.name, taxo.pos, taxo.section 
                        FROM translate_taxo 
                        LEFT JOIN taxo ON translate_taxo.tid = taxo.tid 
                        WHERE tr_tid = " . $id;
                return $this->_db->query($sql)->fetch();
        }
        
        public function addTranslateTaxonomy($data = array())
        {
                return $this->insert($data);
        }
        
        public function updateTranslateTaxonomy($id, $data = array())
        {
                if ($data && $id && is_numeric($id)) {
                    return $this->update($data, 'tr_tid = ' . $id);
                }
                return 0;
        }
        
        public function deleteTranslateWorldSQL($tr_wid)
        {
                $sql = "DELETE FROM `translate_world` WHERE `tr_wid`='$tr_wid'";
                return $this->_db->query($sql);
        }
            
    
}