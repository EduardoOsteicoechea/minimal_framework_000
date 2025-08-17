<?php

function generate_article_markup(string $article_name)
{
  include 'include.php';
  
  $result = "<article>";

  $article_data = get_json_article_as_associative_array($article_name);
  $title = $article_data['title'];
  $articles = $article_data['articles'];

  for ($a = 0; $a < count($articles); $a++) {
    $article = $articles[$a];
    $title = $article['title'];
    $ideas = $article['ideas'];

    $result .= add($result, "h1", $title);

    for ($b = 0; $b < count($ideas); $b++) {
      $idea = $ideas[$b];
      $heading = isset($idea['heading']) ? $idea['heading'] : null;
      $subideas = $idea['subideas'];

      if(isset($heading)) $result .= add($result, "h2", $heading);

      for ($c = 0; $c < count($subideas); $c++) {
        $subidea = $subideas[$c];
        $content = $subidea['content'];
        if($content) $result .= add($result, "p", $content);
      }
    }
  }

  $result .= "</article>";
  return $result;
}

function add($result, $tag, $content, $is_simple = false)
{
  if($is_simple){

  }

  return '
    <'.$tag.'>'.$content.'</'.$tag.'>
  ';
}
