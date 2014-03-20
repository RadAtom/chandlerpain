<?php

class HeaderCTA
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {

    	//since this class also acts as a helper we dont want to put this just here cuz we dont need to call it thousands of darned times!
        //add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        //add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function doNonHelperThings(){
    	add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_theme_page(
            'Header', 
            'Header', 
            'manage_options', 
            'chandlerpain-cta-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'chandlerpain_options' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Header Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'chandlerpain_header_cta_group' );   
                do_settings_sections( 'chandlerpain-cta-settings' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'chandlerpain_header_cta_group', // Option group
            'chandlerpain_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'chandlerpain_header_cta_section', // ID
            'Header Call To Action Settings', // Title
            array( $this, 'print_header_settings_info' ), // Callback
            'chandlerpain-cta-settings' // Page
        );  

        add_settings_field(
            'call-to-action-text', // ID
            'Call to action text', // Title 
            array( $this, 'ctaTexoptionRender' ), // Callback
            'chandlerpain-cta-settings', // Page
            'chandlerpain_header_cta_section' // Section           
        );      

        add_settings_field(
            'call-to-action-page', 
            'What Page Describes the CTA', 
            array( $this, 'ctaPageSelectionRender' ), 
            'chandlerpain-cta-settings', 
            'chandlerpain_header_cta_section'
        );      
    }

    public function getActionPageURLSetting(){
        $this->options = get_option( 'chandlerpain_options' );
        return get_permalink( $this->options['call-to-action-page'] );
    }

    public function getActoinTextSetting(){
        $this->options = get_option( 'chandlerpain_options' );
        return $this->options['call-to-action-text'];
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['call-to-action-text'] ) )
            $new_input['call-to-action-text'] = stripslashes(wp_filter_post_kses(addslashes($input['call-to-action-text'])));

        if( isset( $input['call-to-action-page'] ) )
            $new_input['call-to-action-page'] = intval( $input['call-to-action-page'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_header_settings_info()
    {
        print 'These settings manage the section of the header that should be used as a call to action. The first setting allows you to edit the text which is displayed under the header image. All of that text will be used to link to the page that is selected in the second setting. It is highly recommended that you do not use any links in the first setting.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ctaTexoptionRender()
    {
        $settings = array(
                'media_buttons'=>false,
                'textarea_name'=>'chandlerpain_options[call-to-action-text]',
                'teeny'=>true,
            );
        wp_editor( $this->options['call-to-action-text'], 'call-to-action-text', $settings );
        //<textarea rows="10" cols="50" id="call-to-action-text" name="chandlerpain_options[call-to-action-text]"><?php echo esc_textarea($this->options['call-to-action-text']); </textarea>
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ctaPageSelectionRender()
    {
        $args = array(
            'sort_order' => 'ASC' ,
            'sort_column' => 'id' ,
            'post_type' => 'page' ,
            'post_status' => 'publish'); 
        $pages = get_pages($args);
        $selected = get_option( 'chandlerpain_options', 0);
        if ($pages) {
            ?><select id="call-to-action-page" name="chandlerpain_options[call-to-action-page]"><?php
            foreach ($pages as $page) {
                ?><option <?php selected( $page->ID == $selected['call-to-action-page']); ?> value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option><?php

            }
            ?></select><?php
        } else {
            ?>
            <p>No pages were returned, either something is wrong or you need to create some pages. If you for sure have pages report this problem!</p>
            <?php
        }
    }

    /*
	These are the actual helper functions of this helper class
    */
    public function get_nav_menu_text(){
        $this->options = get_option( 'chandlerpain_options' );
        if($this->options){
            if(array_key_exists('call-to-action-text', $this->options)){
                return $this->options['call-to-action-text'];
            }
        }
        return '';
    }

    public function get_social_menu_text(){
        $this->options = get_option( 'chandlerpain_options' );
        if($this->options){
            if(array_key_exists('call-to-action-page', $this->options)){
                return $this->options['call-to-action-page'];
            }
        }
        return '';
    }
}

$header = new HeaderCTA;
$header->doNonHelperThings();