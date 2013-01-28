<?php

class Admin_Model_DbTable_Articles extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'article';
        protected $_primary = 'aid';

        public function getTableName()
        {
                return $this->_name;
        }
        
        public function getArticle($id) 
        {
                $sql = "SELECT * FROM article WHERE aid = " . $id;
                return $this->_db->query($sql)->fetch();
                
        }
        
        public function getArticles()
        {
                $sql = "SELECT * FROM article";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function addArticle($data = array())
        {
                return $this->insert($data);
        }
        
        
        
        public function updateArticle($id, $data = array()) 
        {
                return $this->update($data, 'aid = ' . $id);
        }
}
