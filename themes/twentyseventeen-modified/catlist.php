<h2>All Categories</h2>
<?php
  function fn($data) { return $data; } $fn = 'fn';

  $parent = get_category_by_slug('technique');
  // var_dump( $parent );

  $category = get_category( get_query_var( 'cat' ) );
  $args = array(
    'parent'            => $category->term_id,
    'hierarchical'        => true,
    'order'               => 'ASC',
    'orderby'             => 'name',
    'show_count'          => 1,
    'use_desc_for_title'  => 1,
  );

  $categories = get_categories( $args ); // and all children

  $all_args = array(
    'child_of'            => $category->term_id,
    'hierarchical'        => true,
    'order'               => 'ASC',
    'orderby'             => 'name',
    'show_count'          => 1,
    'use_desc_for_title'  => 1,
  );
  $all_categories = get_categories( $all_args );

  $tmpl = '';
  foreach($categories as $cat) {
    $img = z_taxonomy_image_url($cat->term_id);
    $tmp =<<<EOT
<div class="item">
  <h5>$cat->name</h5>
  <img src="$img" alt="" />
</div>
EOT;
   $tmpl = $tmpl . $tmp; 
    // echo z_taxonomy_image($cat->term_id); 
  }

  echo("<div class='items'>$tmpl</div>");

  echo "<ul>";
  echo wp_list_categories( $all_args );
  echo "</ul>";
?>
