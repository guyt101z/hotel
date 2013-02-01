<?php

class Admin_Model_DbTable_Taxonomies extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'taxo';
        protected $_primary = 'tid';

        public function getTableName()
        {
            return $this->_name;
        }

        public function getTaxonomies() 
        {        
                $sql = "SELECT t1.*, t2.name as parent FROM taxo as t1 LEFT JOIN taxo as t2 on t1.parent_id = t2.tid";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTaxonomy($id)
        {
                $sql = "SELECT * FROM taxo WHERE tid = " . $id;
                return $this->_db->query($sql)->fetch();
        }
        
        public function getTaxonomyNames() 
        {
                $sql = "SELECT tid, name FROM taxo";
                return $this->_db->query($sql)->fetchAll();
        }

        public function addTaxonomy($data = array())
        {
                return $this->insert($data);
        }
        
        public function updateTaxonomy($id, $data = array()) 
        {
                return $this->update($data, 'tid = ' . $id);
        }
        
        public function deleteTaxonomy($id) 
        {
                return $this->delete('tid = ' . $id);
        }
        
        //============================ FUNCTIONS NOT USED ===============================================================================================
        
        public function editTranslateTaxoById($data)
        {
            /*
                if ($data) {
                        if (is_numeric($data)) 
                } 
        if ($data && $where) {
            if (is_numeric($where)) {
                return $this->update($data, 'job_category_id = ' . $where);
            }
        }
        return 0;
             * 
             */
        }

        public function getTranslateTaxo($data) 
        {
            
                $sql = "SELECT translate_taxo.* FROM translate_taxo ";
                $sql .= " LEFT JOIN taxo ON translate_taxo.tid = taxo.tid ";
                
                if (is_numeric($data)) {
                    $sql .= " WHERE `translate_taxo`.`tr_tid` = " . $data;
                    return $this->_db->query($sql)->fetch();
                    
                } else {
                    $sql .= " WHERE `translate_taxo`.`tid` = '" . $data['tid'] . "'";
                    $sql .= " AND `locale` = '" . $data['locale'] . "' AND `content` = '" . $data['content'] . "'";
                    return $this->_db->query($sql)->fetchAll();
                }
                
        }
        
        public function getTaxonomyByTid($id)
        {
            $sql = 'SELECT * FROM translate_taxo left join taxo on translate_taxo.tid = taxo.tid ';
            $sql = ' WHERE taxo.tid =' . $id;
            return $this->_db->query($sql)->fetchAll();
        }
    
    public function getWorldRightJoinTranslateWorld($id) 
    {
        $result =  $this->_db->query(
                'SELECT * ' .
                ' FROM ' . $this->_name . 
                ' RIGHT JOIN ' . Admin_Model_DbTable_TranslateWorld::TABLE_NAME . 
                ' ON ' . $this->_name . '.wid = ' . Admin_Model_DbTable_TranslateWorld::TABLE_NAME . '.wid ' .
                ' WHERE ' . $this->_name . '.parent_id'  .  '=' . $id 
                )->fetchAll();
        return $result;
    }
    
    /**
     * Get job type rows.
     * 
     * @return Zend_Db_Table_Rowset_Abstract 
     */
    public function getJobCategories($order = null) 
    {
        $select = $this->select();
        
        if ($order) {
            $select->order($order);
        } else {
            $select->order('name asc');
        }
        
        return $this->fetchAll($select);
    }

    /**
     * Get job type titles.
     * 
     * @return array
     */
    public function getJobCategoryTitles() {
            $rows = $this->fetchAll();
            $titles = array();
            foreach ($rows as $row)
                    $titles[$row->job_category_id] = $row->name;
            return $titles;
    }


    /**
     * Add a new job category.
     * 
     * @param string name
     */
    public function addJobCategory($data) 
    {
        if (is_string($data)) {
            $row = $this->createRow();
            $row->name = $data;
            $row->save();
            return $row->job_category_id;
        } 
        
        if (is_array($data)) {
            return $this->insert($data);
        }
        
        return 0;
    }


    
    public function deleteJobCategory($where) {
        if ($where == null)
            return 0;
        
        if (is_numeric($where)) {
            return $this->delete('job_category_id = ' . $where);
        }
        if (is_string($where)) {
            return $this->delete($where);
        }
        return 0;
    }
}