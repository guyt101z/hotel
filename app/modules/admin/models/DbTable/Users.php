<?php

class Admin_Model_DbTable_Users extends Zend_Db_Table_Abstract 
{
    protected $_name = 'user';
    protected $_primary = 'uid';
    protected $_email = 'email';
    protected $_pwd = 'pwd';

    public function getTableName() 
    {
        return $this->_name;
    }

    public function getPrimaryKey() 
    {
        return $this->_primary;
    }

    /**
     * Retrieve the name of the identity column
     * 
     * @return string
     */
    public function getIdentityColumn() 
    {
        return $this->_email;
    }

    /**
     * Retrieve the name of the credential column
     * 
     * @return string
     */
    public function getCredentialColumn() 
    {
        return $this->_pwd;
    }

    /** 
     * Get user by username
     * 
     * @param string $username
     * 
     */
    public function getUserByEmail($email) {
        return $this->fetchRow('email = ' . $email);
    }


    /**
     * Get user.
     * 
     * @param array $where
     */
    public function getUserBy($where = array()) {
            $select = $this->select();
            if (count($where) > 0) {
                    foreach ($where as $key=>$value)
                            $select->where($key . ' = ?', $value);
            }

            return $this->fetchRow($select);
    }

        /**
         * Get user by id.
         * 
         * @param int $id
         * @return the user row or null 
         */
        public function getUser($id) 
        {
                return $this->fetchRow('uid = ' . (int)$id);
        }
    
       

        /**
         * Update a user profile
         * 
         * @param int $id
         * @param array $data 
         * 
         * @return true if sucessful otherwise false
         */
        public function updateUser($id, $data) 
        {
                if ($data) {
                        $where = $this->getAdapter()->quoteInto('uid = ?', (int)$id);
                        return $this->update($data, $where);
                }
                return false;
        }
        
        public function getUsers() 
        {
                $sql = 'SELECT * FROM user';
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function addUser($data = array())
        {
                $sql = "INSERT INTO `user` (`first_name`, `last_name`, `company_name`, `email`, `power`, `user_type`, `status`) VALUES ("
                        . "'" . $data['first_name'] . "', "
                        . "'" . $data['last_name'] . "', "
                        . "'" . $data['company_name'] . "', "
                        . "'" . $data['email'] . "', "
                        . "'" . $data['power'] . "', " 
                        . "'" . $data['user_type'] . "', '" . $data['status'] . "')";
                return $this->_db->query($sql);
        }
        
        public function deleteUser($id)
        {
                return $this->delete('uid = ' . $id);
        }
}