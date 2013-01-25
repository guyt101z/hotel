<?php

class Admin_ArticlesController extends Zend_Controller_Action  
{
    
        public function init()
        {
                $this->view->selectedArticles = true;
                $this->table = new Admin_Model_DbTable_Articles();
        }
}

