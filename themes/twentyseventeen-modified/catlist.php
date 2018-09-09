<h2>All Categories</h2>
<?php
  $parent = get_category_by_slug('technique');
  // var_dump( $parent );
  $args = array(
    'child_of'            => $parent->term_id,
    'hierarchical'        => true,
    'order'               => 'ASC',
    'orderby'             => 'name',
    'show_count'          => 1,
    'use_desc_for_title'  => 1,
  );
  echo "<ul>";
  echo wp_list_categories( $args );
  echo "</ul>";
?>
