<?php

class Admin_Model_DbTable_Languages extends Zend_Db_Table_Abstract
{
    
    protected $_name = 'lang';
    protected $_primary = 'lid';

    public function getTableName()
    {
        return $this->_name;
    }

    public function getLanguages() 
    {        
        $sql = 'SELECT * FROM ' . $this->_name;
        return $this->_db->query($sql)->fetchAll();
    }
    
    public function getLanguagesByHotelId($id) 
    {
        $sql = 'SELECT lang.locale, lang.title FROM hotel LEFT JOIN world on hotel.wid = world.wid ' . 
                'RIGHT JOIN translate_world ON translate_world.wid = hotel.wid ' .
                'LEFT JOIN lang ON translate_world.locale = lang.locale ' .
                'WHERE hotel.hid = ' . $id;
        return $this->_db->query($sql)->fetchAll();
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