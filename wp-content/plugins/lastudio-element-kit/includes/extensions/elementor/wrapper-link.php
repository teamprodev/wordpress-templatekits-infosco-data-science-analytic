<?php

namespace LaStudioKitExtensions\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Wrapper_Link {
    public function __construct() {
        add_action('elementor/element/after_section_end', [ $this, 'init_module'], 10, 2);
        add_action('elementor/frontend/after_register_styles', [ $this, 'register_enqueue_scripts']);
        add_action('elementor/frontend/before_render', [ $this, 'enqueue_in_widget']);
    }

    public function register_enqueue_scripts(){
        wp_register_script( 'lastudio-kit-wrapper-links', lastudio_kit()->plugin_url('assets/js/addons/wrapper-links.min.js'), [], lastudio_kit()->get_version(), true);
    }

    public function enqueue_in_widget( $element ) {
        $link_settings = $element->get_settings_for_display('lakit_element_link');
        if (!empty($link_settings) && !empty($link_settings['url'])) {
            $element->add_render_attribute('_wrapper', [
                'data-lakit-element-link' => json_encode($link_settings),
                'style' => 'cursor: pointer'
            ]);
            $element->add_script_depends('lastudio-kit-wrapper-links');
        }
    }

    public function init_module( $controls_stack, $section_id ){
        $stack_name = $controls_stack->get_name();

//        $ignore = [
//            'lakit-contactform7',
//            'lakit-addtocart',
//            'lakit-woofilters',
//            'lakit-menucart',
//            'lakit-woopages',
//            'lakit-wooproducts',
//            'lakit-wooproduct-additional-information',
//            'lakit-wooproduct-addtocart',
//            'lakit-wooproduct-content',
//            'lakit-wooproduct-datatabs',
//            'lakit-wooproduct-images',
//            'lakit-wooproduct-meta',
//            'lakit-wooproduct-price',
//            'lakit-wooproduct-rating',
//            'lakit-wooproduct-shortdescription',
//            'lakit-wooproduct-stock',
//            'lakit-wooproduct-title',
//            'lakit-advanced-carousel',
//            'lakit-banner-list',
//            'lakit-breadcrumbs',
//            'lakit-hamburger-panel',
//            'lakit-logo',
//            'lakit-login-frm',
//            'lakit-nav-menu',
//            'column',
//            'section',
//            'container'
//        ];


        if( (($stack_name === 'column' || $stack_name === 'section') && $section_id === 'section_advanced')
            || ($stack_name === 'common' && $section_id === '_section_style')
            || ($stack_name === 'container' && $section_id === 'section_layout_items')
        ){

            $tabs = \Elementor\Controls_Manager::TAB_CONTENT;
            if($stack_name === 'column' || $stack_name === 'section' || $stack_name === 'container'){
                $tabs = \Elementor\Controls_Manager::TAB_LAYOUT;
            }
            $controls_stack->start_controls_section(
                '_section_lakit_wrapper_link',
                [
                    'label' => __( 'LA-Kit Wrapper Link', 'lastudio-kit' ),
                    'tab'   => $tabs,
                ]
            );
            $controls_stack->add_control(
                'lakit_element_link',
                [
                    'label'       => __( 'Link', 'lastudio-kit' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'dynamic'     => [
                        'active' => true,
                    ],
                    'custom_attributes_description' => __( 'Custom Attributes option will not work at this time', 'lastudio-kit' ),
                ]
            );
            $controls_stack->end_controls_section();
        }
    }
}