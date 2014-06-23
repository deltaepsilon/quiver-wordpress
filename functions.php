<?php

/*
 * Register Menus
 */

function register_my_menus() {
    register_nav_menus(array(
        'top-menu' => __('Top Menu'),
        'nav-menu' => __('Nav Menu'),
        'sidebar-menu' => __('Sidebar Menu'),
        'footer-menu' => __('Footer Menu'),
    ));
}
add_action('init', 'register_my_menus');

/*
 * Register Sidebars
 */

function register_my_sidebars() {
    register_sidebar(array(
        'id' => 'top-sidebar',
        'name' => 'Top Sidebar',
        'description' => "This sidebar is above all site header.",
        'before_widget' => "",
        'after_widget' => ""
    ));

    register_sidebar(array(
        'id' => 'right-top-sidebar',
        'name' => 'Right Top Sidebar',
        'description' => 'This sidebar is to the right of the post content and above the Sidebar Menu'
    ));

    register_sidebar(array(
        'id' => 'right-bottom-sidebar',
        'name' => 'Right Bottom Sidebar',
        'description' => 'This sidebar is to the right of the post content and below the Sidebar Menu'
    ));

    register_sidebar(array(
        'id' => 'footer-sidebar',
        'name' => 'Footer Sidebar',
        'description' => "It's the footer, just below the Footer Menu."
    ));
}

add_action('init', 'register_my_sidebars');

/*
 * Custom Header
 */

add_theme_support('custom-header');

/*
 * Theme Widgets
 */

class Social_Widget extends WP_Widget {
    /**
     * Some private codes
     */
    private $services = array(
        'facebook' => 'facebook',
        'twitter' => 'Twitter',
        'instagram' => 'Instagram',
        'pinterest' => 'Pinterest',
        'youtube' => 'YouTube',
        'tumblr' => 'Tumblr',
        'rss' => 'RSS',
        'envelope' => 'Email',
    );

    private  function getIndex($instance, $index) {
        if (isset($instance[$index])) {
            return $instance[$index];
        }
        return null;
    }


    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        parent::__construct(
            'social-widget',
            __('Social Widget'),
            array(
                'description' => __('Social Widget', 'text_domain')
            )
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo "<ul class='social-widget'>";

        foreach ($this->services as $key => $service) {
            $value = $this->getIndex($instance, $key);
            if (isset($value)) {

                echo <<<SOCIAL
<li>
    <a href="$value">
        <i class="fa fa-$key"></i>
    </a>
</li>
SOCIAL;

            }

        }


        echo "</ul>";
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */

    public function form( $instance ) {



        foreach ($this->services as $key => $service) {
            $value = $this->getIndex($instance, $key);
            $fieldName = $this->get_field_name($key);
            echo <<<FORM
<p>
    <label for="$key-url">$service</label>
    <input class="widefat" id="$key-url" name="$fieldName" type="text" placeholder="$service url..." value="$value"/>
</p>

FORM;


        }

        return $instance;

    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        foreach ($this->services as $key => $service) {
            $instance[$key = $this->getIndex($new_instance, $key)];
        }

        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('Social_Widget');
});