<?php

use YCMS\Extensions\Func;

Func::make('is_element_empty',function(){
    /**
     * @param $element
     * @return bool
     */
    function is_element_empty($element)
    {
        $element = trim($element);
        return !empty($element);
    }
});
