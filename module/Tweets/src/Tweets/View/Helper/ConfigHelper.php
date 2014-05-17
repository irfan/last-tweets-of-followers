<?php

namespace Tweets\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ConfigHelper extends AbstractHelper
{

    /**
     * @array
     */
    protected $config = null;
    
    
    public function __invoke()
    {
        if (!$this->config) {
            $this->config = $this->getServiceLocator()->get('config');
        }
        return $this;
    }


    /**
     * @return String
     */
    public function getTwitterUsername()
    {
        return $this->config['twitter']['username'];
    }
    
    /**
     * @return ServiceLocator
     */
    public function getServiceLocator()
    {
        return $this->view->getHelperPluginManager()->getServiceLocator();
    }
    

}
