<?php 

class Api_Form_Request extends Zend_Form 
{	
    public function init() 
    {
        $id = new Zend_Form_Element_Hidden('id');

        $request = new Zend_Form_Element_TextArea('request');
        $request->setRequired(true);
        
        $status = new Zend_Form_Element_Select('status');
        $status->addMultiOptions(array(
            'Pending' => 'Pending',
            'Processing' => 'Processed',
            'deleted' => 'Deleted'
        ));
                
        $this->addElements(array($id, $request, $status));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>