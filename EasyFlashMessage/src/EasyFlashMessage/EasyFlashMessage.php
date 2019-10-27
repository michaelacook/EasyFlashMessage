<?php

/**
* Create a flash message and add it to the active session
*
* PHP version > 7.1.27
* @category PHP
* @author Michael Cook <mcook0775@gmail.com>
* @copyright 2019 Michael Cook
* @license https://en.wikipedia.org/wiki/MIT_License MIT License
*/


namespace EasyFlashMessage\EasyFlashMessage;


class EasyFlashMessage
{

    public $markup;

    public function __construct($type, $message)
    {
        $this->add($type, $message);
    }


    /**
    * save flash message to session
    * @param $type is a standard bootstrap 4 colour https://getbootstrap.com/docs/4.3/utilities/colors/
    * primary, secondary, success, danger, warning, info, light, dark
    * @param $message is the content of the flash message
    */
    private function add($type, $message)
    {
        $markup = $this->createMarkup($type, $message);
        $this->markup = $markup;
        $_SESSION['easyFlash'] = $markup;
    }


    /**
    * Generate markup for flash message
    * @return string
    */
    private function createMarkup($type, $message)
    {
        return '<div class="container alert alert-'. $type . ' border border-' . $type . '" role="alert" id="alert">
                <span class="sr-only">Close</span></button>' . $message . '</div>';
    }
}
