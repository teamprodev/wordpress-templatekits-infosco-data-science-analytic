<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class LaStudioKit_Woo_Wishlist_Compare extends Widget_Button {
	public function get_name() {
		return 'lakit-action-btn';
	}
    public function get_categories() {
        return [ 'lastudiokit-woo-product' ];
    }
	public function get_title() {
		return esc_html__( 'Wishlist/Compare button', 'lastudio-kit' );
	}
	public function get_icon() {
		return 'eicon-button';
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_product',
			[
				'label' => esc_html__( 'Product', 'lastudio-kit' ),
			]
		);

		$this->add_control(
			'product_id',
			[
				'label' =>  esc_html__( 'Product', 'lastudio-kit' ),
                'type' => 'lastudiokit-query',
				'options' => [],
				'label_block' => true,
				'autocomplete' => [
					'object' => 'post',
					'query' => [
						'post_type' => [ 'product' ],
					],
				],
			]
		);

		$this->add_control(
			'la_btn_type',
			array(
				'label'     => esc_html__( 'Action Type', 'lastudio' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'wishlist',
				'options'   => [
                    'wishlist' => 'Wishlist',
                    'compare' => 'Compare',
                ],
			)
		);

		$this->end_controls_section();

		parent::register_controls();

		$this->update_control(
			'link',
			[
				'type' => Controls_Manager::HIDDEN,
				'default' => [
					'url' => '',
				],
			]
		);
	}

    public function get_settings_for_display( $setting_key = null ) {
        $settings = parent::get_settings_for_display($setting_key);
        if($setting_key == 'text'){

        }
        return $settings;
    }

	protected function render() {
		$instance = $this;
		$settings = $instance->get_settings_for_display();
		if ( ! empty( $settings['product_id'] ) ) {
			$product_id = $settings['product_id'];
		} elseif ( wp_doing_ajax() && ! empty( $settings['product_id'] ) ) {
			$product_id = $_POST['post_id']; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			$product_id = get_queried_object_id();
		}
        $type = $this->get_settings_for_display('la_btn_type');
		global $product;
		$product = wc_get_product( $product_id );
        $p_title = '';
        $p_url = '';
        $p_id = $product_id;
        if( $product ) {
	        $p_title = $product->get_title();
	        $p_url = $product->add_to_cart_url();
	        $p_id = $product->get_id();
        }
		$instance->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );
		$this->add_render_attribute( 'button',
			[
				'rel' => 'nofollow',
				'href' => $p_url,
				'data-product_title' => $p_title,
				'data-product_id' => $p_id,
				'class' => sprintf('elementor-button-link add_%1$s la-core-%1$s', $type),
			]
		);

		$instance->add_render_attribute( 'button', 'class', 'elementor-button' );
		$instance->add_render_attribute( 'button', 'role', 'button' );

		if ( ! empty( $settings['button_css_id'] ) ) {
			$instance->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		if ( ! empty( $settings['size'] ) ) {
			$instance->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( ! empty( $settings['hover_animation'] ) ) {
			$instance->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
		?>
		<div <?php $instance->print_render_attribute_string( 'wrapper' ); ?>>
			<a <?php $instance->print_render_attribute_string( 'button' ); ?>>
				<?php $this->render_text( $instance ); ?>
			</a>
		</div>
		<?php
	}
}
