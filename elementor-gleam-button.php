<?php
/**
 * Plugin Name:     Gleam for Elementor 
 * Plugin URI:      https://github.com/wpbuilt/gleam-button/
 * Description:     This plugin will let you customize button with gleam effect
 * Version:         1.0
 * Author:          WpBuilt
 * Author URI:      https://github.com/wpbuilt/
 **/

namespace WPC;

class Gleam_Widget_Loader{

  private static $_instance = null;

  public static function instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  private function include_widgets_files(){
    require_once(__DIR__ . '/assets/gleam-button.php');
  }

  public function register_widgets(){

    $this->include_widgets_files();

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\GleamButton());

  }

  public function __construct(){
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
  }

}

Gleam_Widget_Loader::instance();