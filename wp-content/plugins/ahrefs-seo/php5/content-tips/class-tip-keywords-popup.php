<?php

namespace ahrefs\AhrefsSeo\Content_Tips;

/**
 * Class for tip at keywords popup.
 *
 * @since 0.8.4
 */
class Tip_Keywords_Popup extends Tip {

	const ID       = 'popup';
	const TEMPLATE = 'keywords-popup';
	/**
	 * Need to show the tip.
	 * Has suggested keywords and was not closed by user.
	 *
	 * @return bool
	 */
	public function need_to_show() {
		return parent::need_to_show() && $this->data->has_suggested_keywords();
	}
}