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
                $sql = 'SELECT * FROM translate_taxo left join taxo on translate_taxo.tid = taxo.tid';
                return $this->_db->query($sql)->fetchAll();
        }

        public function addTaxonomy($data = array())
        {
                // add to taxo table
                $tid = $this->insert(array(
                    'parent_id' => $data['parent_id'],
                    'pos' => $data['pos'],
                    'section' => $data['section']
                ));

                if ($tid) {
                    // add to translate taxo table iff the entry does not exist
                    $data['tid'] = $tid;
                    if ($this->getTranslateTaxo($data)) {   
                        $this->delete('tid='.$tid);
                    } else {
                        $sql = "INSERT INTO `translate_taxo` (`tid`, `locale`, `content`) VALUES ('" . $data['tid'] . "', '" . $data['locale'] . "', '" . $data['content'] . "')";
                        return $this->_db->query($sql);
                    }
                }

                return null;             
        }
        
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

    /**
     * Update a job type.
     * 
     * @param array $data
     * @param int $id
     */
    public function updateJobCategory($data, $where) 
    {
        if ($data && $where) {
            if (is_numeric($where)) {
                return $this->update($data, 'job_category_id = ' . $where);
            }
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