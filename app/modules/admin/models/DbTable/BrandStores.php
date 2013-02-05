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
        
        public function getBrandStoreLeftJoinTranslateBrandStore($id)
        {
                if ($id && is_numeric($id)) {
                    $sql = "SELECT bs1.*, tr_bs1.tr_bsid, tr_bs1.locale, tr_bs1.title, tr_bs1.content, w1.name AS world_name, b1.title as brand_name, b1.status as brand_status 
                            FROM brand_store AS bs1 
                            LEFT JOIN translate_brand_store AS tr_bs1 on bs1.bsid = tr_bs1.bsid
                            LEFT JOIN world as w1 on bs1.wid = w1.wid
                            LEFT JOIN brand AS b1 on bs1.bid = b1.bid
                            WHERE bs1.bsid = $id";
                } else {
                    $sql = "SELECT bs1.*, tr_bs1.tr_bsid, tr_bs1.locale, tr_bs1.title, tr_bs1.content, w1.name AS world_name, b1.title as brand_name, b1.status as brand_status 
                            FROM brand_store AS bs1 
                            LEFT JOIN translate_brand_store AS tr_bs1 on bs1.bsid = tr_bs1.bsid
                            LEFT JOIN world as w1 on bs1.wid = w1.wid";
                }
                return $this->_db->query($sql)->fetchAll();
        }
        
        public function getTrBrandStore($id) 
        {
                $sql = "select tr_bs1.*, bs1.name as brand_store_name 
                        from translate_brand_store  as tr_bs1 left join brand_store as bs1 on tr_bs1.bsid = bs1.bsid
                        where tr_bsid = $id";
                return $this->_db->query($sql)->fetch();
        }
        
        public function updateBrandStore($id, $data = array())
        {
                return $this->update($data, 'bsid = ' . $id);
        }
        
        public function updateTrBrandStore($id, $data=array()) 
        {
                $sql = "UPDATE `translate_brand_store` SET `locale`='".$data['locale']."', `title`='" . $data['title']. "', `content`='". $data['content']."' WHERE `tr_bsid`='$id'";
                return $this->_db->query($sql);
        }
        
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