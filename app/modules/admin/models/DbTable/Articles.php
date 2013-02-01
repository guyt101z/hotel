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
        
        public function getTranslateArticle($id)
        {
                $sql = "SELECT * FROM translate_article WHERE aid = " . $id;
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getArticlesFullJoinTranslateArticles($id)
        {
                if ($id && is_numeric($id)) {
                     $sql = "SELECT * FROM article LEFT Join translate_article ON article.aid = translate_article.aid 
                             WHERE translate_article.aid = $id 
                             UNION
                             SELECT * FROM article RIGHT JOIN translate_article ON article.aid = translate_article.aid 
                             WHERE translate_article.aid = $id";
                } else {
                    $sql = "SELECT * FROM article LEFT Join translate_article ON article.aid = translate_article.aid 
                            UNION
                            SELECT * FROM article RIGHT JOIN translate_article ON article.aid = translate_article.aid";
                }
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
