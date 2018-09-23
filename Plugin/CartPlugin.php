<?php

namespace Baze\LimitProductsInCart\Plugin;

class CartPlugin {
	protected $checkoutSession;

	public function __construct(\Magento\Checkout\Model\Session $checkoutSession) {
		$this->checkoutSession = $checkoutSession;
	}

	public function aroundAddProduct(
		\Magento\Checkout\Model\Cart $subject,
		callable $proceed,
		$productInfo,
		$requestInfo = null
	) {
		$this->checkoutSession->getQuote()->removeAllItems()->save();
		return $proceed($productInfo, $requestInfo);
	}
}
