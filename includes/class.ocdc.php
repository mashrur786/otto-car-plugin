<?php


class OCDC {

    private $url;
    public $agreement;

	public function __construct() {

	     $this->url = file_get_contents(OCDC__PLUGIN_DIR . "public/agreements.json");
	     $this->ocdc_parse_agreement_json();

	     //wordpress actions
	     add_shortcode( 'OCDC', array( $this, 'ocdc_shortcode') );

	     /* Registers  */
        add_action( 'wp_enqueue_scripts', array( $this,'ocdc_register_styles') );

	}


    /**
    * output shortcode
    *
    * @return null
    */
    function ocdc_shortcode($args){

    	 $args = shortcode_atts( array(
            'title' => '',
       ), $args);

    	$title = $args['title'];
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'ocdc_styles' );
        wp_enqueue_script ( 'ocdc_jquery');
        wp_enqueue_script ( 'bootstrap');
        wp_enqueue_script ( 'match_height');
        wp_enqueue_script ( 'ocdc_script');
        ob_start();
        require_once( OCDC__PLUGIN_DIR . 'public/shortcode.php' );
        return ob_get_clean();

    }

    public function ocdc_register_styles() {
        wp_register_style( "bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" );
        wp_register_style( "ocdc_styles", OCDC__PLUGIN_URL . "public/css/style.css" );
		wp_register_script( "ocdc_jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js" );
		wp_register_script( "bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" );
		wp_register_script( "match_height",  OCDC__PLUGIN_URL . "public/js/match-height.js" );
		wp_register_script( "ocdc_script", OCDC__PLUGIN_URL . "public/js/ocdc.js" );
	}

	public function ocdc_parse_agreement_json() {

        if ($this->url === false ) {
            return false;
        }

        $agreements = json_decode($this->url , true);
        if($agreements === null) {
            return false;
        }

        $this->agreements = $agreements;

    }


}