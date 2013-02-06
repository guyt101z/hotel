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
        
        public function getArticleTitle($id) 
        {
                $sql = "SELECT title FROM article WHERE aid = $id";
                return $this->_db->query($sql)->fetchColumn();
        }
        
        public function getArticles()
        {
                $sql = "SELECT * FROM article";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTranslateArticle($id)
        {
                $sql = "SELECT * FROM translate_article WHERE tr_aid = " . $id;
                return $this->_db->query($sql)->fetch();
        }
        
        public function getArticleLeftJoinTranslateArticle($id)
        {
                if ($id && is_numeric($id)) {
                    $sql = "SELECT a1.*, tr_a1.tr_aid, tr_a1.locale, tr_a1.title AS tr_title, tr_a1.content 
                            FROM article AS a1 
                            LEFT JOIN translate_article AS tr_a1 on a1.aid = tr_a1.aid
                            WHERE a1.aid = $id";
                } else {
                    $sql = "SELECT a1.*, tr_a1.tr_aid, tr_a1.locale, tr_a1.title AS tr_title, tr_a1.content 
                            FROM article AS a1 
                            LEFT JOIN translate_article AS tr_a1 on a1.aid = tr_a1.aid";
                }
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
        
        public function addTrArticle($data = array()) 
        {
                 $sql = "INSERT INTO `translate_article` (`aid`, `locale`, `title`, `content`) VALUES ('" . $data['aid'] .  "', '" . $data['locale'] . "', '" . $data['title'] . "', '" . $data['content'] . "')";
                 return $this->_db->query($sql);
        }
        
        public function updateArticle($id, $data = array()) 
        {
                return $this->update($data, 'aid = ' . $id);
        }
        
        public function updateTrArticle($id, $data=array()) 
        {
                $sql = "UPDATE `translate_article` SET `locale`='".$data['locale']."', `title`='" . $data['title']. "', `content`='". $data['content']."' WHERE `tr_aid`='$id'";
                return $this->_db->query($sql);
        }
}
