<?php

/**
 * Create a block with arbitrary content.
 *
 */
class SimpleBlock extends Plugin
{
	/**
	 * Register the template.
	 **/
	function action_init()
	{
		$this->load_text_domain( 'simpleblock' );
		$this->add_template( 'block.simpleblock', dirname(__FILE__) . '/block.simpleblock.php' );
	}

	/**
	 * Add to the list of possible block types.
	 **/
	public function filter_block_list( $block_list )
	{
		$block_list[ 'simpleblock' ] = _t( 'Simple Block', 'simpleblock' );
		return $block_list;
	}

	/**
	 * Output the content of the block, and nothing else.
	 **/
	public function action_block_content_simpleblock( $block, $theme )
	{
		return $block;
	}

	/**
	 * Configuration form with one big textarea. Raw to allow JS/HTML/etc. Insert them at your own peril.
	 **/
	public function action_block_form_simpleblock( $form, $block )
	{
		$content = $form->append('textarea', 'content', $block, _t( 'Content:', 'simpleblock' ) );
		$content->raw = true;
		$content->rows = 5;
	}

}

?>
