<?php

class Admin_Model_DbTable_HotelArticleTaxo extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'hotel_article_taxo';
        protected $_primary = 'hatid';

        public function getTableName()
        {
                return $this->_name;
        }
        
        public function addHotelArticleTaxo($data = array())
        {
                return $this->insert($data);
        }
        
        public function updateArticle($id, $data = array()) 
        {
                return $this->update($data, 'aid = ' . $id);
        }
}
