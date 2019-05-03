<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

if ( ! function_exists('is_plugin_active')){ include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }

class HTmega_Admin_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new HTmega_Settings_API;

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ), 220 );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->htmega_admin_get_settings_sections() );
        $this->settings_api->set_fields( $this->htmega_admin_fields_settings() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    // Plugins menu Register
    function admin_menu() {
        add_submenu_page(
            'elementor',
            '',
            esc_html__( 'HTMega Addons', 'htmega-addons' ),
            'manage_options',
            'htmega_addons_options',
            array ( $this, 'plugin_page' )
        );
    }

    // Options page Section register
    function htmega_admin_get_settings_sections() {
        $sections = array(
            
            array(
                'id'    => 'htmega_general_tabs',
                'title' => esc_html__( 'General', 'htmega-addons' )
            ),

            array(
                'id'    => 'htmega_element_tabs',
                'title' => esc_html__( 'Element', 'htmega-addons' )
            ),

            array(
                'id'    => 'htmega_thirdparty_element_tabs',
                'title' => esc_html__( 'Third Party', 'htmega-addons' )
            ),

        );
        return $sections;
    }

    // Options page field register
    protected function htmega_admin_fields_settings() {

        $settings_fields = array(

            'htmega_general_tabs'=>array(

                array(
                    'name'  => 'google_map_api_key',
                    'label' => __( 'Google Map Api Key', 'htmega-addons' ),
                    'desc'  => __( 'Go to <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">https://developers.google.com</a> and generate the API key.', 'htmega-addons' ),
                    'placeholder' => __( 'Google Map Api key', 'htmega-addons' ),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),

                array(
                    'name'    => 'errorpage',
                    'label'   => __( 'Select 404 Page.', 'htmega-addons' ),
                    'desc'    => __( 'You can select 404 page from here.', 'htmega-addons' ),
                    'type'    => 'select',
                    'default' => '0',
                    'options' => htmega_post_name('page')
                ),

            ),

            'htmega_element_tabs'=>array(

                array(
                    'name'  => 'accordion',
                    'label'  => __( 'Accordion', 'htmega-addons' ),
                    'desc'  => __( 'Accordion', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default' => 'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'animatesectiontitle',
                    'label'  => __( 'Animate Heading', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'addbanner',
                    'label'  => __( 'Add Banner', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'blockquote',
                    'label'  => __( 'Blockquote', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'brandlogo',
                    'label'  => __( 'Brands', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'businesshours',
                    'label'  => __( 'Business Hours', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'button',
                    'label'  => __( 'Button', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'calltoaction',
                    'label'  => __( 'Call To Action', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'carousel',
                    'label'  => __( 'Carousel', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'countdown',
                    'label'  => __( 'Countdown', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'counter',
                    'label'  => __( 'Counter', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'customevent',
                    'label'  => __( 'Custom Event', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'dualbutton',
                    'label'  => __( 'Double Button', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'dropcaps',
                    'label'  => __( 'Dropcaps', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'flipbox',
                    'label'  => __( 'Flip Box', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'galleryjustify',
                    'label'  => __( 'Gallery Justify', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'googlemap',
                    'label'  => __( 'Google Map', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'imagecomparison',
                    'label'  => __( 'Image Comparison', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'imagegrid',
                    'label'  => __( 'Image Grid', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'imagemagnifier',
                    'label'  => __( 'Image Magnifier', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'imagemarker',
                    'label'  => __( 'Image Marker', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'imagemasonry',
                    'label'  => __( 'Image Masonry', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'inlinemenu',
                    'label'  => __( 'Inline Navigation', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'instagram',
                    'label'  => __( 'Instagram', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'lightbox',
                    'label'  => __( 'Light Box', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'modal',
                    'label'  => __( 'Modal', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'newtsicker',
                    'label'  => __( 'News Ticker', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'notify',
                    'label'  => __( 'Notify', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'offcanvas',
                    'label'  => __( 'Offcanvas', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'panelslider',
                    'label'  => __( 'Panel Slider', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'popover',
                    'label'  => __( 'Popover', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'postcarousel',
                    'label'  => __( 'Post carousel', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'postgrid',
                    'label'  => __( 'Post Grid', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'postgridtab',
                    'label'  => __( 'Post Grid Tab', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'postslider',
                    'label'  => __( 'Post Slider', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'pricinglistview',
                    'label'  => __( 'Pricing List View', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'pricingtable',
                    'label'  => __( 'Pricing Table', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'progressbar',
                    'label'  => __( 'Progress Bar', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'scrollimage',
                    'label'  => __( 'Scroll Image', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'scrollnavigation',
                    'label'  => __( 'Scroll Navigation', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'search',
                    'label'  => __( 'Search', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'sectiontitle',
                    'label'  => __( 'Section Title', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'service',
                    'label'  => __( 'Service', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'singlepost',
                    'label'  => __( 'Single Post', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),
                
                array(
                    'name'  => 'thumbgallery',
                    'label'  => __( 'Slider Thumbnail Gallery', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'socialshere',
                    'label'  => __( 'Social Shere', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'switcher',
                    'label'  => __( 'Switcher', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'tabs',
                    'label'  => __( 'Tabs', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'datatable',
                    'label'  => __( 'Data Table', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'teammember',
                    'label'  => __( 'Team Member', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'testimonial',
                    'label'  => __( 'Testimonial', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'testimonialgrid',
                    'label'  => __( 'Testimonial Grid', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'toggle',
                    'label'  => __( 'Toggle', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'tooltip',
                    'label'  => __( 'Tooltip', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'twitterfeed',
                    'label'  => __( 'Twitter Feed', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'userloginform',
                    'label'  => __( 'UserLogin Form', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'userregisterform',
                    'label'  => __( 'UserRegister Form', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'verticletimeline',
                    'label'  => __( 'Verticle Timeline', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'videoplayer',
                    'label'  => __( 'Video Player', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'workingprocess',
                    'label'  => __( 'Working Process', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

                array(
                    'name'  => 'errorcontent',
                    'label'  => __( '404 Content', 'htmega-addons' ),
                    'type'  => 'checkbox',
                    'default'=>'on',
                    'class'=>'htmega_table_row',
                ),

            ),
        );
        
        // Third Party Addons
        $third_party_element = array();
        if( is_plugin_active('bbpress/bbpress.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'bbpress',
                'label'    => __( 'bbPress', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('booked/booked.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'bookedcalender',
                'label'    => __( 'Booked Calender', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('buddypress/bp-loader.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'buddypress',
                'label'    => __( 'BuddyPress', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('caldera-forms/caldera-core.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'calderaform',
                'label'    => __( 'Caldera Form', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'contactform',
                'label'    => __( 'Contact form 7', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('download-monitor/download-monitor.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'downloadmonitor',
                'label'    => __( 'Download Monitor', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('easy-digital-downloads/easy-digital-downloads.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'easydigitaldownload',
                'label'    => __( 'Easy Digital Downloads', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('gravityforms/gravityforms.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'gravityforms',
                'label'    => __( 'Gravity Forms', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('instagram-feed/instagram-feed.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'instragramfeed',
                'label'    => __( 'Instragram Feed', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('wp-job-manager/wp-job-manager.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'jobmanager',
                'label'    => __( 'Job Manager', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('LayerSlider/layerslider.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'layerslider',
                'label'    => __( 'Job Manager', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('mailchimp-for-wp/mailchimp-for-wp.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'mailchimpwp',
                'label'    => __( 'Mailchimp for wp', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('ninja-forms/ninja-forms.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'ninjaform',
                'label'    => __( 'Ninja Form', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('quform/quform.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'quforms',
                'label'    => __( 'QU Form', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('wpforms-lite/wpforms.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'wpforms',
                'label'    => __( 'WP Form', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('revslider/revslider.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'revolution',
                'label'    => __( 'Revolution Slider', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('tablepress/tablepress.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'tablepress',
                'label'    => __( 'TablePress', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('awesome-weather/awesome-weather.php') ) {
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'  => 'weather',
                'label'  => __( 'Weather', 'htmega-addons' ),
                'type'  => 'checkbox',
                'default'=>'on',
                'class'=>'htmega_table_row',
            ];
        }

        if( is_plugin_active('woocommerce/woocommerce.php') ) {
           
            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'wcaddtocart',
                'label'    => __( 'WC : Add To cart', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];

            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'categories',
                'label'    => __( 'WC : Categories', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];

            $third_party_element['htmega_thirdparty_element_tabs'][] = [
                'name'    => 'wcpages',
                'label'    => __( 'WC : Pages', 'htmega-addons' ),
                'type'    => 'checkbox',
                'default' => "on",
                'class'=>'htmega_table_row',
            ];

        }

        return array_merge($settings_fields, $third_party_element);
    }


    function plugin_page() {

        echo '<div class="wrap">';
            echo '<h2>'.esc_html__( 'HTMega Addons Settings','htmega-addons' ).'</h2>';
            $this->save_message();
            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();
        echo '</div>';

    }

    function save_message() {
        if( isset($_GET['settings-updated']) ) { ?>
            <div class="updated notice is-dismissible"> 
                <p><strong><?php esc_html_e('Successfully Settings Saved.', 'htmega-addons') ?></strong></p>
            </div>
            
            <?php
        }
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = [];
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }
        return $pages_options;
    }

}

new HTmega_Admin_Settings();