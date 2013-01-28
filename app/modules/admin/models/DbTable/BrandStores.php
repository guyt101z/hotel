<?php

class Admin_Model_DbTable_BrandStores extends Zend_Db_Table_Abstract
{
    
        protected $_name = 'brand_store';
        protected $_primary = 'bsid';

        public function getTableName()
        {
                return $this->_name;
        }

        public function getBrandStores() 
        {
                $sql = "SELECT bs.bsid, bs.bid, bs.wid, world.name as world, bs.name, bs.lat, bs.lgt, bs.status AS brand_store_status, 
                        brand.title AS brand, brand.status AS brand_status 
                        FROM brand_store AS bs
                        LEFT JOIN brand on bs.bid = brand.bid
                        LEFT JOIN world on bs.wid = world.wid";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getBrandStoreNames() 
        {
                $sql = "SELECT bsid, name FROM brand_store";
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getBrandStore($id) 
        {
                return $this->fetchRow('bsid = ' . $id)->toArray();
        }
        
        public function updateBrandStore($id, $data = array())
        {
                return $this->update($data, 'bsid = ' . $id);
        }
        
        // =============================
        public function getBrandStoresOlddddddd()
        {
            /*
                $sql = "SELECT translate_brand_store.*, brand_store.*, translate_world.title AS world, brand.title AS brand FROM brand_store ";
                $sql .= " LEFT JOIN translate_brand_store ON brand_store.bsid = translate_brand_store.bsid";
                $sql .= " LEFT join translate_world ON brand_store.wid = translate_world.wid ";
                $sql .= " AND translate_brand_store.locale = translate_world.locale";
                $sql .= " LEFT JOIN brand on brand_store.bid = brand.bid";
             * 
             */
        }
        /*
        public function getTranslateBrandStore($data) 
        {
                if ($data) {
                    $sql = "SELECT * FROM translate_brand_store LEFT JOIN brand_store ON translate_brand_store.bsid = brand_store.bsid ";
                    if (is_numeric($data)) {
                        $sql .= " WHERE tr_bsid = '$data'";
                    } else {
                        $sql .= " WHERE `translate_brand_store`.`bsid` = '" . $data['bsid'] . "' AND `locale` = '" . $data['locale'] . "' AND `title` = '" . $data['title'] . "'";
                   }
                   return $this->_db->query($sql)->fetchAll();
                } 
                return null;
        }
        */
        public function addBrandStore($data = array()) 
        {
                $bsid = $this->insert(array(
                    'bid' => $data['bid'],
                    'lat' => $data['lat'],
                    'lgt' => $data['lgt'],
                    'wid' => $data['wid'],
                    'status' => $data['status']
                ));
                
                if ($bsid) {
                    $data['bsid'] = $bsid;
                    if ($this->getTranslateBrandStore($data)) {
                        // remove bsid from brand_store
                        $this->delete('bsid='.$bsid);
                        // next, alert user that insertion failed.
                    } else {
                        $sql = "INSERT INTO `translate_brand_store` (`bsid`, `locale`, `title`, `content`) VALUES ('" . $bsid .  "', '" . $data['locale'] . "', '" . $data['title'] . "', '" . $data['content'] . "')";
                        return $this->_db->query($sql);
                    }
                }
                return null;
        }
        
        public function addTranslateBrandStore($data = array()) 
        {
                 $sql = "INSERT INTO `translate_brand_store` (`bsid`, `locale`, `title`, `content`) VALUES ('" . $data['bsid'] .  "', '" . $data['locale'] . "', '" . $data['title'] . "', '" . $data['content'] . "')";
                 return $this->_db->query($sql);
        }
        
        public function updateLanguage($id, $data = array()) 
        {
                $sql = "UPDATE `lang` SET ";
                
                $i = 0;
                foreach ($data as $k => $v) {
                    if ($i == 0) {
                        $sql .= " `" . $k . "`='". $v ."' ";
                    } else {
                        $sql .= ", `" . $k . "`='". $v ."' ";
                    }
                    $i++;
                }
                
                $sql .= " WHERE `lid` = " . $id;
                return $this->_db->query($sql);
        }
        
        public function deleteLanguageById($id)
        {
                $sql = "DELETE FROM `lang` WHERE `lid`=".$id;
                return $this->_db->query($sql);
        }
        
}