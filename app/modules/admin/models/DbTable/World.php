<?php

class Admin_Model_DbTable_World extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'world';
        protected $_primary = 'wid';

        public function getTableName()
        {
            return $this->_name;
        }

        public function getWorld($data = null)
        {
            /*
                $sql = "SELECT DISTINCT trw1.*, world.*, trw2.title as parent FROM translate_world as trw1 ";
                $sql .= " LEFT JOIN world on trw1.wid = world.wid ";
                $sql .= " LEFT JOIN translate_world AS trw2 ON world.parent_id = trw2.wid ";
                $sql .= " ORDER BY trw1.title ASC, trw1.locale ASC";
             */
                $sql = "SELECT w1.*, w2.name as parent FROM world AS w1 LEFT JOIN world as w2 on w1.parent_id = w2.wid";
                if ($data) {
                    if (is_numeric($data)) {
                        $sql .= " WHERE w1.wid = " . $data;
                    }
                }
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getWorldById($id) 
        {
                $sql = '';
                $sql .= ' SELECT w1.*, trw1.title, trw1.locale, trw2.title as parent FROM world as w1 ';
                $sql .= ' LEFT JOIN translate_world as trw1 ON w1.wid = trw1.wid ';
                $sql .= ' LEFT JOIN translate_world as trw2 ON w1.parent_id = trw2.wid ';
                $sql .= ' WHERE w1.wid = ' . $id;
                return $this->_db->query($sql)->fetch();
        }
        
        public function addWorldSingleLocale($data = array()) 
        {
                //$sql = "INSERT INTO `world` (`parent_id`, `lat`, `lgt`) VALUES ('" . $data['parent_id'] . "', '" . $data['lat'] . "', '" . $data['lgt'] . "')";
                $wid = $this->insert(array(
                    'parent_id'=>$data['parent_id'],
                    'lat'=>$data['lat'],
                    'lgt'=>$data['lgt']
                ));
                
                if ($wid) {
                    $data['wid'] = $wid;
                    if ($this->getTranslateWorld($data)) {
                        // remove wid from world
                        $this->delete('wid='.$wid);
                        // alert user that insertion failed.
                        // implement it later
                    } else {
                        $sql2 = "INSERT INTO `translate_world` (`wid`, `locale`, `title`) VALUES ('" . $wid .  "', '" . $data['locale'] . "', '" . $data['title'] . "')";
                        return $this->_db->query($sql2);
                    }
                }

                return null;             
        }
        
        public function addTranslateWorld($data = array())
        {
                if ($this->getTranslateWorld2($data)) {
                    // alert user that insertion failed.
                    // implement it later
                    return null;
                } else {
                    $sql2 = "INSERT INTO `translate_world` (`wid`, `locale`, `title`) VALUES ('" . $data['wid'] .  "', '" . $data['locale'] . "', '" . $data['title'] . "')";
                    return $this->_db->query($sql2);
                }
        }
        
        public function getParents()
        {
                $sql = "SELECT w1.wid, w1.parent_id, w2.name AS parent 
                        FROM world AS w1 
                        LEFT JOIN world AS w2 
                        ON w1.parent_id = w2.wid";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getLocaleByWid($wid)
        {
               // $sql = 'SELECT * FROM '
        }
        
        public function getTranslateWorldById($id) 
        {
                $sql = 'SELECT * FROM translate_world LEFT JOIN world ON translate_world.wid = world.wid WHERE tr_wid = ' . $id;
                return $this->_db->query($sql)->fetch();
        }
        
        public function getTranslateWorld($data = array()) 
        {
                $sql = "SELECT * FROM translate_world WHERE `wid` = '" . $data['wid'] . "'";
                $sql .= " AND `locale` = '" . $data['locale'] . "' AND `title` = '" . $data['title'] . "'";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTranslateWorld2($data = array()) 
        {
                $sql = "SELECT * FROM translate_world ";
                $sql .= " LEFT JOIN world ON translate_world.wid = world.wid ";
                $sql .= " WHERE `parent_id` = '" . $data['parent_id'] . "'";
                $sql .= " AND `locale` = '" . $data['locale'] . "' AND `title` = '" . $data['title'] . "'";
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

        public function updateWorld($wid, $data) 
        {
            if ($data && $wid) {
                if (is_numeric($wid)) {
                    return $this->update($data, 'wid = ' . $wid);
                }
            }
            return 0;
        }
    
        public function updateWorldSQL($wid, $data=array())
        {
                $sql = "UPDATE `world` SET ";
                $i = 0;
                foreach($data as $k=>$v) {
                    if ($i == 0) {
                        $sql .= " `$k`='$v' ";
                        $i++;
                    } else {
                        $sql .= ", `$k`='$v' ";
                    }
                }
                $sql .= " WHERE wid= " . $wid;
                return $this->_db->query($sql);
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