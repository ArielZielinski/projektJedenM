<?php

function printPostCategories($post_id, array $categories = array())
{
    $terms_list = array();
    foreach ($categories as $cname) {
        $tmp = get_the_terms($post_id, $cname);
        if (is_array($tmp)) {
            $terms_list = array_merge($terms_list, $tmp);
        }
    }

    if($terms_list){
        foreach($terms_list as $term){
            echo '<a href="'.get_term_link($term->slug, $term->taxonomy).'">'.$term->name.'</a>';
        }
    }

}
