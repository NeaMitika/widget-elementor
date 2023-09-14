<?php
class Elementor_repeater_timeline_cuneo_digital_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'repeater_timeline_cuneo_digital_widget';
	}

	public function get_title() {
		return esc_html__( 'Timeline', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'textdomain' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' 			=> esc_html__( 'Title #1', 'textdomain' ),
						'list_content' 			=> esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'grafica_section',
			[
				'label' => esc_html__( 'Grafica', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content ' => 'background-color: {{VALUE}}'
				],
				'default' => '#F9F8F8',
			]
		);

		$this->add_control(
			'circle_border_color',
			[
				'label' => esc_html__( 'Circle Border Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container::after' => ' border: 4px solid {{VALUE}}'
				],
				'default' => '#C31220',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.title ' => 'color: {{VALUE}}'
				],
				'default' => '#C31220',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['list'] ) {
			echo '<div class="timeline">';
			foreach (  $settings['list'] as $item ) {
				echo '<div class="container timeline-section-' . esc_attr( $item['_id'] ) . '">';
					echo '<div class="content">';
						echo '<h2 class="title">' . $item['list_title'] .  '</h2>';
						echo '<p>' . $item['list_content'] . '</p>';
					echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}
	}

	protected function content_template() {
		?>
		<# if ( settings.list.length ) { #>
			<div class="timeline">
			<# _.each( settings.list, function( item ) { #>
				<div class="container timeline-section-{{ item._id }}">
					<div class="content">
						<h2 class="title">{{{ item.list_title }}}</h2>
						<p>{{{ item.list_content }}}</p>
					</div>
				</div>
			<# }); #>
			</div>
		<# } #>
		<?php
	}
}