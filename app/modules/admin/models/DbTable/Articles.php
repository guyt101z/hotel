<?php

class Admin_Model_DbTable_Articles extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'article';
        protected $_primary = 'aid';

        public function getTableName()
        {
                return $this->_name;
        }
}
