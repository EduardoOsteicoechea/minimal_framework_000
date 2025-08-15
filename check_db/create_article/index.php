<?php

try
{

  include '../_/db/actions/create_article_001.php';
  create_article_001("test_article", '
  
  {
    "title":"test article",
    "content":"test content"
    }
    
    '); 
    
  } catch (Exception $e) {
    echo $e->getMessage();
}