

   // step : 1)  Open your functions.php file.
   // step : 2) Add the following code to create a custom taxonomy:


function create_custom_taxonomy() {
    register_taxonomy(
        'topics',  // Taxonomy key, must be unique
        'posts',   // Object type: post, page, or your custom post type
        array(
            'labels' => array(
                'name' => 'Topics',
                'add_new_item' => 'Add New Topic',
                'new_item_name' => "New Topic"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true  // True for categories-like, false for tags-like
        )
    );
}
add_action('init', 'create_custom_taxonomy');
