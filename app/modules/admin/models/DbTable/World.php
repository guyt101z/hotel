<?php

class Admin_Model_DbTable_World extends Zend_Db_Table_Abstract
{
    
    protected $_name = 'world';
    protected $_primary = 'wid';

    public function getTableName()
    {
        return $this->_name;
    }

    /**
     * retrieve world types. i.e. region, country, state, city.
     * @return type
     */
    public function getRegions() 
    {        
        $result = $this->_db->query(
                'SELECT * FROM world left join translate_world on world.wid = translate_world.wid where parent_id = 0'
                )->fetchAll();
        return $result;
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