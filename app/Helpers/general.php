<?php

define('PAGENIATE_COUNT',15);

 function getFolder(){

    return (app()->getLocale()==='ar')?'css-rtl':'css';
}
