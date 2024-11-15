// Html menu convert into dynamic menu in wordpress 
// Sample HTML Menu : 
<!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
=================================================================
Step : 1)// Open your theme’s functions.php file (wp-content > themes > [your theme folder] > functions.php).
   // Add the following code to register the menu locations:

   // Register Navigation Menus
   function register_navbar(){
       register_nav_menus(array(
           'theme_primary_menu' => 'Primary Menu',
           'theme_footer_menu' => 'Footer Menu',
           'theme_right_sidebar_menu' => 'Right Sidebar Menu'
       ));
   }
   add_action('after_setup_theme', 'register_navbar');
======================================================
Step :2 ) 

    // Open header.php and replace your static HTML menu code with this dynamic menu code:

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container">
           <a class="navbar-brand" href="#!">Start Bootstrap</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <?php
                   wp_nav_menu(array(
                       'theme_location' => 'theme_primary_menu',  // Specify menu location
                       'container' => 'false',                    // Remove the default container
                       'items_wrap' => '<ul class="navbar-nav ms-auto mb-2 mb-lg-0">%3$s</ul>' // Add Bootstrap classes to <ul>
                   ));
               ?>
           </div>
       </div>
   </nav
==============================================================
Step 3: Add Custom Classes to Menu Items

//To style each menu item, you can add classes to the <li> and <a> elements.
// Go back to functions.php and add these functions to apply custom classes:

   // Add class to <li> elements
   function theme_menu_li_class($classes, $item, $args) {
       $classes['class'] = 'nav-item';
       return $classes;
   }
   add_filter('nav_menu_css_class', 'theme_menu_li_class', 1, 3);

   // Add class to <a> elements
   function theme_menu_anchor_link($attributes, $item, $args) {
       $attributes['class'] = 'nav-link';
       return $attributes;
   }
   add_filter('nav_menu_link_attributes', 'theme_menu_anchor_link', 1, 3);

//The theme_menu_li_class function assigns the nav-item class to each <li>, while theme_menu_anchor_link adds the nav-link class to each <a> tag. These classes will style the menu according to Bootstrap’s navbar styles.
