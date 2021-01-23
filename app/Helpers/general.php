<?php

define('PAGENIATE_COUNT',15);

 function getFolder(){

    return (app()->getLocale()==='ar')?'css-rtl':'css';
}
  function uploadImage($folder,$image){
     $image->store('/',$folder);
  return   $fileName=$image->hashName();

  }
