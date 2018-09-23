<?
/**
 * 20180823 _vp_
 *
 * The right-side list of categories
 */
?>

<h2>2Technique</h2>

<?php

function pparent( $input, $tails=[] ) {
  $i = $input->category_parent;
  array_unshift( $tails, $input );
  if ($i==0) {
    foreach($tails as $tail) {
      $link = get_category_link( $tail );
      echo(" <a href=$link>{$tail->name}</a> ::");
    }
  } else {
    $i = get_category( $i );
    pparent( $i, $tails );
  }
}

  // echo(is_category() ? "in category" : "in a post");echo("<hr />");

  if (is_category()) { 
    $category = get_category( get_query_var('cat') );
  } else {
    $category = get_the_category()[0];
  }
  $img = z_taxonomy_image_url($category->term_id);
  echo( "<img src=$img alt='' /><br />" );

  $parent = $category->category_parent;
  $parent = get_term( $parent, 'category');
  pparent( $category );echo("<hr />");

  $immediate_args = array(
    'parent'            => $category->term_id,
    'hierarchical'        => true,
    'order'               => 'ASC',
    'orderby'             => 'name',
    'show_count'          => 1,
    'use_desc_for_title'  => 1,
  );
  $immediate_categories = get_categories( $immediate_args ); // and no children
  $tmpl = '';
  foreach($immediate_categories as $cat) {
    $img = z_taxonomy_image_url($cat->term_id);
    $link = get_category_link( $cat );
    $tmp =<<<EOT
<div class="item">
  <h5><a href="$link">$cat->name</a></h5>
  <img src="$img" alt="" />
</div>
EOT;
   $tmpl = $tmpl . $tmp; 
  }
  echo("children:<div class='items'>$tmpl</div>");
  echo("<hr />");

  $all_args = array(
    'child_of'            => $category->term_id,
    'hierarchical'        => true,
    'order'               => 'ASC',
    'orderby'             => 'name',
    'show_count'          => 1,
    'use_desc_for_title'  => 1,
  );
  $all_categories = get_categories( $all_args ); // and no children
  $tmpl = '';
  foreach($all_categories as $cat) {
    $img = z_taxonomy_image_url($cat->term_id);
    $tmp =<<<EOT
<div class="item">
  <h5>$cat->name</h5>
  <img src="$img" alt="" />
</div>
EOT;
   $tmpl = $tmpl . $tmp; 
  }
  if ($category->name != 'Technique' ) {
    // echo("siblings:<div class='items'>$tmpl</div>");
  }

  echo "<ul>"; echo wp_list_categories( $all_args ); echo "</ul>";
?>
