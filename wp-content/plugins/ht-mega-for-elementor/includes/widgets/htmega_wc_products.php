<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_WC_Products extends Widget_Base {

    public function get_name() {
        return 'htmega-products';
    }
    
    public function get_title() {
        return __( 'WC : Products', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-woocommerce';
    }
    
    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_script_depends() {
        return [
            'slick',
            'htmega-widgets-scripts',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'woolentor-products',
            [
                'label' => esc_html__( 'Product Settings', 'htmega-addons' ),
            ]
        );
        
            $this->add_control(
                'woolentor_product_style',
                [
                    'label' => esc_html__( 'Product style', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Product style One', 'htmega-addons' ),
                        '2' => esc_html__( 'Product style Two', 'htmega-addons' ),
                        '3' => esc_html__( 'Product style Three', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'woolentor_product_grid_product_filter',
                [
                    'label' => esc_html__( 'Filter By', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'recent',
                    'options' => [
                        'recent' => esc_html__( 'Recent Products', 'htmega-addons' ),
                        'featured' => esc_html__( 'Featured Products', 'htmega-addons' ),
                        'best_selling' => esc_html__( 'Best Selling Products', 'htmega-addons' ),
                        'sale' => esc_html__( 'Sale Products', 'htmega-addons' ),
                        'top_rated' => esc_html__( 'Top Rated Products', 'htmega-addons' ),
                        'mixed_order' => esc_html__( 'Mixed order Products', 'htmega-addons' ),
                    ],
                ]
            );
            
            $this->add_control(
                'woolentor_product_grid_column',
                [
                    'label' => esc_html__( 'Columns', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '1' => esc_html__( '1', 'htmega-addons' ),
                        '2' => esc_html__( '2', 'htmega-addons' ),
                        '3' => esc_html__( '3', 'htmega-addons' ),
                        '4' => esc_html__( '4', 'htmega-addons' ),
                        '5' => esc_html__( '5', 'htmega-addons' ),
                        '6' => esc_html__( '6', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
              'woolentor_product_grid_row',
              [
                 'label'   => __( 'Rows', 'htmega-addons' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 1,
                 'min'     => 1,
                 'max'     => 20,
                 'step'    => 1,
              ]
            );

            $this->add_control(
              'woolentor_product_grid_products_count',
              [
                 'label'   => __( 'Products Count', 'htmega-addons' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 4,
                 'min'     => 1,
                 'max'     => 100,
                 'step'    => 1,
              ]
            );

            $this->add_control(
                'woolentor_product_grid_categories',
                [
                    'label' => esc_html__( 'Product Categories', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => htmega_get_taxonomies( 'product_cat' ),
                ]
            );

            $this->add_control(
                'custom_order',
                [
                    'label' => esc_html__( 'Custom order', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label' => esc_html__( 'Orderby', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'          => esc_html__('None','htmega-addons'),
                        'ID'            => esc_html__('ID','htmega-addons'),
                        'date'          => esc_html__('Date','htmega-addons'),
                        'name'          => esc_html__('Name','htmega-addons'),
                        'title'         => esc_html__('Title','htmega-addons'),
                        'comment_count' => esc_html__('Comment count','htmega-addons'),
                        'rand'          => esc_html__('Random','htmega-addons'),
                    ],
                    'condition' => [
                        'custom_order' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => esc_html__( 'order', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'DESC'  => esc_html__('Descending','htmega-addons'),
                        'ASC'   => esc_html__('Ascending','htmega-addons'),
                    ],
                    'condition' => [
                        'custom_order' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'producttab',
                [
                    'label' => esc_html__( 'Product Tab', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            
            $this->add_control(
                'proslider',
                [
                    'label' => esc_html__( 'Product slider', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'description' => esc_html__('When product tab is off then task slider.','htmega-addons'),
                ]
            );

        $this->end_controls_section();

        // Tab setting
        $this->start_controls_section(
            'woolentor-products-tab',
            [
                'label' => esc_html__( 'Tab Option', 'htmega-addons' ),
                'condition' => [
                    'producttab' => 'yes',
                ]
            ]
        );

            $this->add_control(
                'tabuniqid',
                [
                    'label' => __( 'Product tab uniqid', 'htmega-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter product tab id', 'htmega-addons' ),
                ]
            );

        $this->end_controls_section(); // Tab option end

        // Product Tab menu setting
        $this->start_controls_section(
            'woolentor-products-tab-menu',
            [
                'label' => esc_html__( 'Tab Menu Style', 'htmega-addons' ),
                'condition' => [
                    'producttab' => 'yes',
                ]
            ]
        );

            $this->start_controls_tabs(
                'product_tab_style_tabs'
            );

                // Tab menu style Normal
                $this->start_controls_tab(
                    'product_tab_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htmega-addons' ),
                    ]
                );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'tabmenutypography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .product-tab-list.nav a',
                        ]
                    );

                    $this->add_control(
                        'tab_menu_color',
                        [
                            'label' => __( 'Color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#23252a',
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'product_tab_menu_bg_color',
                        [
                            'label' => __( 'Product tab menu background', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'tabmenu_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .product-tab-list.nav a',
                        ]
                    );

                    $this->add_responsive_control(
                        'tabmenu_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_tab_menu_padding',
                        [
                            'label' => __( 'Tab Menu padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_tab_menu_margin',
                        [
                            'label' => __( 'Tab Menu margin', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                $this->end_controls_tab();// Normal tab menu style end

                // Tab menu style Hover
                $this->start_controls_tab(
                    'product_tab_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htmega-addons' ),
                    ]
                );


                    $this->add_control(
                        'tab_menu_hover_color',
                        [
                            'label' => __( 'Color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#23252a',
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .product-tab-list.nav a.active' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'product_tab_menu_hover_bg_color',
                        [
                            'label' => __( 'Product tab menu background', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a:hover' => 'background-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .product-tab-list.nav a.active' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'tabmenu_hover_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .product-tab-list.nav a:hover',
                            'selector' => '{{WRAPPER}} .product-tab-list.nav a.active',
                        ]
                    );

                    $this->add_responsive_control(
                        'tabmenu_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .product-tab-list.nav a:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .product-tab-list.nav a.active' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab();// Hover tab menu style end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Tab option end

        // Product slider setting
        $this->start_controls_section(
            'woolentor-products-slider',
            [
                'label' => esc_html__( 'Slider Option', 'htmega-addons' ),
                'condition' => [
                    'proslider' => 'yes',
                ]
            ]
        );

            $this->add_control(
                'slitems',
                [
                    'label' => esc_html__( 'Slider Items', 'htmega-addons' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 4,
                    'condition' => [
                        'proslider' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Slider Arrow', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'proslider' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label' => esc_html__( 'Slider dots', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'proslider' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slpause_on_hover',
                [
                    'type' => Controls_Manager::SWITCHER,
                    'label_off' => __('No', 'htmega-addons'),
                    'label_on' => __('Yes', 'htmega-addons'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'label' => __('Pause on Hover?', 'htmega-addons'),
                ]
            );

            $this->add_control(
                'slautolay',
                [
                    'label' => esc_html__( 'Slider auto play', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator' => 'before',
                    'default' => 'no',
                    'condition' => [
                        'proslider' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautoplay_speed',
                [
                    'label' => __('Autoplay speed', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3000,
                    'condition' => [
                        'slautolay' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'slanimation_speed',
                [
                    'label' => __('Autoplay animation speed', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300,
                    'condition' => [
                        'slautolay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slscroll_columns',
                [
                    'label' => __('Slider item to scroll', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 3,
                ]
            );

            $this->add_control(
                'heading_tablet',
                [
                    'label' => __( 'Tablet', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'sltablet_display_columns',
                [
                    'label' => __('Slider Items', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 8,
                    'step' => 1,
                    'default' => 2,
                ]
            );

            $this->add_control(
                'sltablet_scroll_columns',
                [
                    'label' => __('Slider item to scroll', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 8,
                    'step' => 1,
                    'default' => 2,
                ]
            );

            $this->add_control(
                'sltablet_width',
                [
                    'label' => __('Tablet Resolution', 'htmega-addons'),
                    'description' => __('The resolution to tablet.', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 750,
                ]
            );

            $this->add_control(
                'heading_mobile',
                [
                    'label' => __( 'Mobile Phone', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'slmobile_display_columns',
                [
                    'label' => __('Slider Items', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                    'default' => 1,
                ]
            );

            $this->add_control(
                'slmobile_scroll_columns',
                [
                    'label' => __('Slider item to scroll', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                    'default' => 1,
                ]
            );

            $this->add_control(
                'slmobile_width',
                [
                    'label' => __('Mobile Resolution', 'htmega-addons'),
                    'description' => __('The resolution to mobile.', 'htmega-addons'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 480,
                ]
            );

            $this->end_controls_section(); // Slider Option end

            // Slider Button stle
            $this->start_controls_section(
                'products-slider-controller-style',
                [
                    'label' => esc_html__( 'Slider Controller Style', 'htmega-addons' ),
                    'condition' => [
                        'proslider' => 'yes',
                    ]
                ]
            );

                $this->start_controls_tabs(
                    'product_sliderbtn_style_tabs'
                );

                    // Slider Button style Normal
                    $this->start_controls_tab(
                        'product_sliderbtn_style_normal_tab',
                        [
                            'label' => __( 'Normal', 'htmega-addons' ),
                        ]
                    );

                        $this->add_control(
                            'button_style_heading',
                            [
                                'label' => __( 'Navigation Arrow', 'htmega-addons' ),
                                'type' => Controls_Manager::HEADING,
                            ]
                        );

                        $this->add_control(
                            'button_color',
                            [
                                'label' => __( 'Color', 'htmega-addons' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default' =>'#dddddd',
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow' => 'color: {{VALUE}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_bg_color',
                            [
                                'label' => __( 'Background Color', 'htmega-addons' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default' =>'#ffffff',
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow' => 'background-color: {{VALUE}} !important;',
                                ],
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name' => 'button_border',
                                'label' => __( 'Border', 'htmega-addons' ),
                                'selector' => '{{WRAPPER}} .product-slider .slick-arrow',
                            ]
                        );

                        $this->add_responsive_control(
                            'button_border_radius',
                            [
                                'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                            ]
                        );

                        $this->add_responsive_control(
                            'button_padding',
                            [
                                'label' => __( 'Padding', 'htmega-addons' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_style_dots_heading',
                            [
                                'label' => __( 'Navigation Dots', 'htmega-addons' ),
                                'type' => Controls_Manager::HEADING,
                            ]
                        );

                            $this->add_control(
                                'dots_bg_color',
                                [
                                    'label' => __( 'Background Color', 'htmega-addons' ),
                                    'type' => Controls_Manager::COLOR,
                                    'scheme' => [
                                        'type' => Scheme_Color::get_type(),
                                        'value' => Scheme_Color::COLOR_1,
                                    ],
                                    'default' =>'#ffffff',
                                    'selectors' => [
                                        '{{WRAPPER}} .product-slider .slick-dots li button' => 'background-color: {{VALUE}} !important;',
                                    ],
                                ]
                            );

                            $this->add_group_control(
                                Group_Control_Border::get_type(),
                                [
                                    'name' => 'dots_border',
                                    'label' => __( 'Border', 'htmega-addons' ),
                                    'selector' => '{{WRAPPER}} .product-slider .slick-dots li button',
                                ]
                            );

                            $this->add_responsive_control(
                                'dots_border_radius',
                                [
                                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'selectors' => [
                                        '{{WRAPPER}} .product-slider .slick-dots li button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                    ],
                                ]
                            );

                    $this->end_controls_tab();// Normal button style end

                    // Button style Hover
                    $this->start_controls_tab(
                        'product_sliderbtn_style_hover_tab',
                        [
                            'label' => __( 'Hover', 'htmega-addons' ),
                        ]
                    );


                        $this->add_control(
                            'button_style_arrow_heading',
                            [
                                'label' => __( 'Navigation', 'htmega-addons' ),
                                'type' => Controls_Manager::HEADING,
                            ]
                        );

                        $this->add_control(
                            'button_hover_color',
                            [
                                'label' => __( 'Color', 'htmega-addons' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default' =>'#23252a',
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow:hover' => 'color: {{VALUE}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_hover_bg_color',
                            [
                                'label' => __( 'Background', 'htmega-addons' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default' =>'#ffffff',
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow:hover' => 'background-color: {{VALUE}} !important;',
                                ],
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name' => 'button_hover_border',
                                'label' => __( 'Border', 'htmega-addons' ),
                                'selector' => '{{WRAPPER}} .product-slider .slick-arrow:hover',
                            ]
                        );

                        $this->add_responsive_control(
                            'button_hover_border_radius',
                            [
                                'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                            ]
                        );


                        $this->add_control(
                            'button_style_dotshov_heading',
                            [
                                'label' => __( 'Navigation Dots', 'htmega-addons' ),
                                'type' => Controls_Manager::HEADING,
                            ]
                        );

                            $this->add_control(
                                'dots_hover_bg_color',
                                [
                                    'label' => __( 'Background Color', 'htmega-addons' ),
                                    'type' => Controls_Manager::COLOR,
                                    'scheme' => [
                                        'type' => Scheme_Color::get_type(),
                                        'value' => Scheme_Color::COLOR_1,
                                    ],
                                    'default' =>'#282828',
                                    'selectors' => [
                                        '{{WRAPPER}} .product-slider .slick-dots li button:hover' => 'background-color: {{VALUE}} !important;',
                                        '{{WRAPPER}} .product-slider .slick-dots li.slick-active button' => 'background-color: {{VALUE}} !important;',
                                    ],
                                ]
                            );

                            $this->add_group_control(
                                Group_Control_Border::get_type(),
                                [
                                    'name' => 'dots_border_hover',
                                    'label' => __( 'Border', 'htmega-addons' ),
                                    'selector' => '{{WRAPPER}} .product-slider .slick-dots li button:hover',
                                ]
                            );

                            $this->add_responsive_control(
                                'dots_border_radius_hover',
                                [
                                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'selectors' => [
                                        '{{WRAPPER}} .product-slider .slick-dots li button:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                    ],
                                ]
                            );

                    $this->end_controls_tab();// Hover button style end

                $this->end_controls_tabs();

            $this->end_controls_section(); // Tab option end

            // Style tab section
            $this->start_controls_section(
                'product_style',
                [
                    'label' => __( 'Style', 'elementor' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htmega-addons' ),
                    ]
                );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'product_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .product-item .product-inner',
                        ]
                    );

                    $this->add_responsive_control(
                        'product_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_image_padding',
                        [
                            'label' => __( 'Product image area padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .image-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'product_image_bg_color',
                        [
                            'label' => __( 'Product image background', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .image-wrap' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_content_padding',
                        [
                            'label' => __( 'Product content area padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'product_content_bg_color',
                        [
                            'label' => __( 'Product content background', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'woolentor_product_title_heading',
                        [
                            'label' => __( 'Title', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_responsive_control(
                        'aligntitle',
                        [
                            'label' => __( 'Alignment', 'htmega-addons' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => __( 'Justified', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content .title' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .product-item .product-inner .content .title',
                        ]
                    );

                    $this->add_control(
                        'title_color',
                        [
                            'label' => __( 'Title color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#23252a',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content .title a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'woolentor_product_price_heading',
                        [
                            'label' => __( 'Product Price', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_control(
                        'price_color',
                        [
                            'label' => __( 'Price color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#23252a',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content .price' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'pricetypography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .product-item .product-inner .content .price',
                        ]
                    );

                    $this->add_responsive_control(
                        'alignprice',
                        [
                            'label' => __( 'Alignment', 'htmega-addons' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => __( 'Justified', 'htmega-addons' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );


                $this->end_controls_tab();

                // Hover Style tab
                $this->start_controls_tab(
                    'style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htmega-addons' ),
                    ]
                );

                    $this->add_control(
                        'title_hovercolor',
                        [
                            'label' => __( 'Title color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .content .title a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'product_hoverbg_color',
                        [
                            'label' => __( 'Product content background', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .product_information_area .content' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_hover_content_padding',
                        [
                            'label' => __( 'Product hover content area padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .product-item .product-inner .product_information_area .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();



        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $product_type       = $this->get_settings_for_display('woolentor_product_grid_product_filter');
        $per_page           = $this->get_settings_for_display('woolentor_product_grid_products_count');
        $custom_order_ck    = $this->get_settings_for_display('custom_order');
        $orderby            = $this->get_settings_for_display('orderby');
        $order              = $this->get_settings_for_display('order');
        $columns            = $this->get_settings_for_display('woolentor_product_grid_column');
        $rows               = $this->get_settings_for_display('woolentor_product_grid_row');
        $tabuniqid          = $this->get_settings_for_display('tabuniqid');
        $proslider          = $this->get_settings_for_display('proslider');
        $producttab         = $this->get_settings_for_display('producttab');



        $slider_settings = [
            'arrows' => ('yes' === $settings['slarrows']),
            'dots' => ('yes' === $settings['sldots']),
            'autoplay' => ('yes' === $settings['slautolay']),
            'autoplay_speed' => absint($settings['slautoplay_speed']),
            'animation_speed' => absint($settings['slanimation_speed']),
            'pause_on_hover' => ('yes' === $settings['slpause_on_hover']),
        ];

        $slider_responsive_settings = [
            'product_items' => $settings['slitems'],
            'scroll_columns' => $settings['slscroll_columns'],
            'tablet_width' => $settings['sltablet_width'],
            'tablet_display_columns' => $settings['sltablet_display_columns'],
            'tablet_scroll_columns' => $settings['sltablet_scroll_columns'],
            'mobile_width' => $settings['slmobile_width'],
            'mobile_display_columns' => $settings['slmobile_display_columns'],
            'mobile_scroll_columns' => $settings['slmobile_scroll_columns'],

        ];

        $slider_settings = array_merge($slider_settings, $slider_responsive_settings);

        // WooCommerce Category
        $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $per_page,
        );

        if( $custom_order_ck == 'yes' ){
            $args['orderby'] = $orderby;
            $args['order'] = $order;
        }
        switch( $product_type ){

            case 'sale':
                $args['meta_query'][] = array(
                    'key'           => '_sale_price',
                    'value'        =>  0,
                    'compare'      => '>',
                    'type'         => 'NUMERIC',
                );
            break;

            case 'featured':
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );
            break;

            case 'best_selling':
                $args['meta_key']   = 'total_sales';
                $args['orderby']    = 'meta_value_num';
                $args['order']      = 'desc';
            break;

            case 'top_rated': 
                $args['meta_key']   = '_wc_average_rating';
                $args['orderby']    = 'meta_value_num';
                $args['order']      = 'desc';          
            break;

            case 'mixed_order':
                $args['orderby']    = 'rand';
            break;

            default: /* Recent */
                $args['orderby']    = 'date';
                $args['order']      = 'desc';
            break;
        }

        $get_product_categories = $settings['woolentor_product_grid_categories']; // get custom field value
        $product_cats = str_replace(' ', '', $get_product_categories);

        if ( "0" != $get_product_categories) {
            if( is_array($product_cats) && count($product_cats) > 0 ){
                $field_name = is_numeric($product_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => $product_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        $products = new \WP_Query( $args );

        $tabmenu = 'yes';

        if( ($proslider == 'yes') && ( $producttab != 'yes' ) ){
            $collumval = 'slide-item col';
        }else{
            $collumval = 'col-lg-3 col-md-6 col-12 mb-50';
            if( $columns !='' ){
                if( $columns == 5){
                    $collumval = 'cus-col-5 col-md-6 col-12 mb-50';
                }else{
                    $colwidth = round(12/$columns);
                    $collumval = 'col-lg-'.$colwidth.' col-md-6 col-12 mb-50';
                }
            }
        }

        ?>
          
        <div class="product-style">

            <?php if ( $producttab == 'yes' ) { ?>
                <div class="product-tab-list text-center mb-45 nav">
                    <div class="tab_menu_container">
                        <?php
                            $i=0;
                            if( is_array( $product_cats ) && count($product_cats) > 0 ){

                                // Category retrive
                                $catargs = array(
                                    'orderby'    => 'name',
                                    'order'      => 'ASC',
                                    'hide_empty' => true,
                                    'slug'       => $product_cats,
                                );
                                $prod_categories = get_terms( 'product_cat', $catargs);

                                foreach( $prod_categories as $prod_cats ){
                                    $i++;
                                    ?>
                                        <a class="<?php if($i==1){ echo 'active';}?>" href="#home<?php echo $tabuniqid.esc_attr($i);?>" data-toggle="tab">
                                            <?php echo esc_attr($prod_cats->name,'htmega-addons');?>
                                        </a>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            <?php };?>

            <?php if( is_array( $product_cats ) && (count( $product_cats ) > 0) && ( $producttab == 'yes' ) ): ?>
                <div class="tab-content">
                    <?php
                        $j=0;
                        foreach( $product_cats as $cats ):
                            $j++;
                            $field_name = is_numeric($product_cats[0])?'term_id':'slug';
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'terms' => $cats,
                                    'field' => $field_name,
                                    'include_children' => false
                                )
                            );
                            $products = new \WP_Query( $args );
                            ?>
                            <div class="tab-pane fade <?php if($j==1){echo 'show active';} ?>" id="<?php echo 'home'.$tabuniqid.$j;?>">
                                
                                <div class="row">
                                    <div class="<?php echo esc_attr( $collumval );?>">
                                            <?php
                                                $k=1;
                                                if( $products->have_posts() ):
                                                    while( $products->have_posts() ): $products->the_post();
                                            ?>

                                                <div class="product-item <?php if ( $rows > 1 && ($k % $rows != 0)){ echo 'mb-30 ';} if( $settings['woolentor_product_style'] == 3){echo 'product_style_three'; }?> ">

                                                    <div class="product-inner">
                                                        <div class="image-wrap">
                                                            <a href="<?php the_permalink();?>" class="image">
                                                                <?php 
                                                                    woocommerce_show_product_loop_sale_flash();
                                                                    woocommerce_template_loop_product_thumbnail();
                                                                ?>
                                                            </a>
                                                            <?php
                                                                if( $settings['woolentor_product_style'] == 1){
                                                                    if ( class_exists( 'YITH_WCWL' ) ) {
                                                                        echo woolentor_add_to_wishlist_button();
                                                                    }
                                                                }
                                                            ?>
                                                            <?php if( $settings['woolentor_product_style'] == 3):?>
                                                                <div class="product_information_area">

                                                                    <?php
                                                                        global $product; 
                                                                        $attributes = $product->get_attributes();
                                                                        if($attributes):
                                                                            echo '<div class="product_attribute">';
                                                                            foreach ( $attributes as $attribute ) :
                                                                                $name = $attribute->get_name();
                                                                            ?>
                                                                            <ul>
                                                                                <?php
                                                                                    echo '<li class="attribute_label">'.wc_attribute_label( $attribute->get_name() ).esc_html__(':','htmega-addons').'</li>';
                                                                                    if ( $attribute->is_taxonomy() ) {
                                                                                        global $wc_product_attributes;
                                                                                        $product_terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );
                                                                                        foreach ( $product_terms as $product_term ) {
                                                                                            $product_term_name = esc_html( $product_term->name );
                                                                                            $link = get_term_link( $product_term->term_id, $name );
                                                                                            $color = get_term_meta( $product_term->term_id, 'color', true );
                                                                                            if ( ! empty ( $wc_product_attributes[ $name ]->attribute_public ) ) {
                                                                                                echo '<li><a href="' . esc_url( $link  ) . '" rel="tag">' . $product_term_name . '</a></li>';
                                                                                            } else {
                                                                                                if(!empty($color)){
                                                                                                    echo '<li class="color_attribute" style="background-color: '.$color.';">&nbsp;</li>';
                                                                                                }else{
                                                                                                    echo '<li>' . $product_term_name . '</li>';
                                                                                                }
                                                                                                
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </ul>
                                                                    <?php endforeach; echo '</div>'; endif;?>

                                                                    <div class="actions style_two">
                                                                        <?php
                                                                            woocommerce_template_loop_add_to_cart();
                                                                            if ( class_exists( 'YITH_WCWL' ) ) {
                                                                                echo woolentor_add_to_wishlist_button();
                                                                            }
                                                                        ?>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h4 class="title"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                                                        <?php woocommerce_template_loop_price();?>
                                                                    </div>

                                                                </div>

                                                            <?php else:?>
                                                                <div class="actions <?php if( $settings['woolentor_product_style'] == 2){ echo 'style_two'; }?>">
                                                                    <?php
                                                                        if( $settings['woolentor_product_style'] == 2){
                                                                            woocommerce_template_loop_add_to_cart();
                                                                            if ( class_exists( 'YITH_WCWL' ) ) {
                                                                                echo woolentor_add_to_wishlist_button();
                                                                            }
                                                                        }else{
                                                                            woocommerce_template_loop_add_to_cart(); 
                                                                            if( function_exists('woolentor_compare_button') ){
                                                                                woolentor_compare_button();
                                                                            }
                                                                        }
                                                                    ?>
                                                                </div>
                                                            <?php endif;?>

                                                            
                                                        </div>
                                                        
                                                        <div class="content">
                                                            <h4 class="title"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                                            <?php woocommerce_template_loop_price();?>
                                                        </div>
                                                    </div>

                                                </div>

                                           <?php if ($k % $rows == 0 && ($products->post_count != $k)) { ?>
                                            </div>
                                            <div class="<?php echo esc_attr($collumval );?>">
                                                <?php } $k++; endwhile; wp_reset_postdata();  endif; ?>
                                            </div>
                                </div>

                            </div>
                        <?php endforeach;?>
                </div>
            <?php else:?>
                <div class="row">
                    <?php
                        if( $proslider == 'yes' ){
                            echo '<div id="product-slider-' . uniqid() . '" class="product-slider" data-settings=\'' . wp_json_encode( $slider_settings ) . '\'>';
                        }
                    ?>

                        <div class="<?php echo esc_attr( $collumval );?>">
                            <?php
                                $k=1;
                                if( $products->have_posts() ):
                                    while( $products->have_posts() ): $products->the_post();
                            ?>

                                <div class="product-item <?php if ( $rows > 1 && ($k % $rows != 0)){ echo 'mb-30';} if( $settings['woolentor_product_style'] == 3){echo 'product_style_three'; }?> ">

                                    <div class="product-inner">
                                        <div class="image-wrap">
                                            <a href="<?php the_permalink();?>" class="image">
                                                <?php 
                                                    woocommerce_show_product_loop_sale_flash();
                                                    woocommerce_template_loop_product_thumbnail();
                                                ?>
                                            </a>
                                            <?php
                                                if( $settings['woolentor_product_style'] == 1){
                                                    if ( class_exists( 'YITH_WCWL' ) ) {
                                                        echo woolentor_add_to_wishlist_button();
                                                    }
                                                }
                                            ?>
                                            <?php if( $settings['woolentor_product_style'] == 3):?>
                                                <div class="product_information_area">

                                                    <?php
                                                        global $product; 
                                                        $attributes = $product->get_attributes();
                                                        if($attributes):
                                                            echo '<div class="product_attribute">';
                                                            foreach ( $attributes as $attribute ) :
                                                                $name = $attribute->get_name();
                                                            ?>
                                                            <ul>
                                                                <?php
                                                                    echo '<li class="attribute_label">'.wc_attribute_label( $attribute->get_name() ).esc_html__(':','htmega-addons').'</li>';
                                                                    if ( $attribute->is_taxonomy() ) {
                                                                        global $wc_product_attributes;
                                                                        $product_terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );
                                                                        foreach ( $product_terms as $product_term ) {
                                                                            $product_term_name = esc_html( $product_term->name );
                                                                            $link = get_term_link( $product_term->term_id, $name );
                                                                            $color = get_term_meta( $product_term->term_id, 'color', true );
                                                                            if ( ! empty ( $wc_product_attributes[ $name ]->attribute_public ) ) {
                                                                                echo '<li><a href="' . esc_url( $link  ) . '" rel="tag">' . $product_term_name . '</a></li>';
                                                                            } else {
                                                                                if(!empty($color)){
                                                                                    echo '<li class="color_attribute" style="background-color: '.$color.';">&nbsp;</li>';
                                                                                }else{
                                                                                    echo '<li>' . $product_term_name . '</li>';
                                                                                }
                                                                                
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </ul>
                                                    <?php endforeach; echo '</div>'; endif;?>

                                                    <div class="actions style_two">
                                                        <?php
                                                            woocommerce_template_loop_add_to_cart();
                                                            if ( class_exists( 'YITH_WCWL' ) ) {
                                                                echo woolentor_add_to_wishlist_button();
                                                            }
                                                        ?>
                                                    </div>

                                                    <div class="content">
                                                        <h4 class="title"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                                        <?php woocommerce_template_loop_price();?>
                                                    </div>

                                                </div>

                                            <?php else:?>
                                                <div class="actions <?php if( $settings['woolentor_product_style'] == 2){ echo 'style_two'; }?>">
                                                    <?php
                                                        if( $settings['woolentor_product_style'] == 2){
                                                            woocommerce_template_loop_add_to_cart();
                                                            if ( class_exists( 'YITH_WCWL' ) ) {
                                                                echo woolentor_add_to_wishlist_button();
                                                            }
                                                        }else{
                                                            woocommerce_template_loop_add_to_cart(); 
                                                            if( function_exists('woolentor_compare_button') ){
                                                                woolentor_compare_button();
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            <?php endif;?>

                                            
                                        </div>
                                        
                                        <div class="content">
                                            <h4 class="title"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                            <?php woocommerce_template_loop_price();?>
                                        </div>
                                    </div>

                                </div>

                           <?php if ($k % $rows == 0 && ($products->post_count != $k)) { ?>
                            </div>
                            <div class="<?php echo esc_attr($collumval );?>">
                                <?php } $k++; endwhile; wp_reset_postdata(); wp_reset_query();  endif; ?>
                            </div>
                    <?php if( $proslider == 'yes' ){ echo '</div>';} ?>
                </div>
            <?php endif;?>

        </div>  


        <?php
    }


}