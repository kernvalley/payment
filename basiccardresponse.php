<?php
namespace KernValley\Payment;

final class BasicCardResponse implements \JSONSerializable
{
	private $_cardNumber = null;

	private $_cardholderName = null;

	private $_cardSecurityCode = null;

	private $_expiryMonth = null;

	private $_expiryYear = null;

	private $_billingAddress = null;

	final public function __construct(?object $details = null)
	{
		if (isset($details)) {
			$this->setCardNumber($details->cardNumber ?? null);
			$this->setCardholderName($details->cardholderName ?? null);
			$this->setCardSecurityCode($details->cardSecurityCode ?? null);
			$this->setExpiryMonth($details->expiryMonth ?? null);
			$this->setExpiryYear($details->expiryYear ?? null);

			if (isset($details->billingAddress)) {
				$this->setBillingAddress(new Address($details->billingAddress));
			}
		}
	}

	final public function jsonSerialize(): array
	{
		return [
			'cardNumber'       => $this->getCardNumber(),
			'cardholderName'   => $this->getCardholderName(),
			'cardSecurityCode' => $this->getCardSecurityCode(),
			'expiryMonth'      => $this->getExpiryMonth(),
			'expiryYear'       => $this->getExpiryYear(),
			'billingAddress'   => $this->getBillingAddress(),
		];
	}

	final public function getCardNumber():? string
	{
		return $this->_cardNumber;
	}

	final public function setCardNumber(?string $val = null): void
	{
		$this->_cardNumber = $val;
	}

	final public function getCardholderName():? string
	{
		return $this->_cardholderName;
	}

	final public function setCardholderName(?string $val = null): void
	{
		$this->_cardholderName = $val;
	}

	final public function getCardSecurityCode():? string
	{
		return $this->_cardSecurityCode;
	}

	final public function setCardSecurityCode(?string $val = null): void
	{
		$this->_cardSecurityCode = $val;
	}

	final public function getExpiryMonth():? int
	{
		return $this->_expiryMonth;
	}

	final public function setExpiryMonth(?int $val = null): void
	{
		$this->_expiryMonth = $val;
	}

	final public function getExpiryYear():? int
	{
		return $this->_expiryYear;
	}

	final public function setExpiryYear(?int $val = null): void
	{
		$this->_expiryYear = $val;
	}

	final public function getBillingAddress():? Address
	{
		return $this->_billingAddress;
	}

	final public function setBillingAddress(?Address $val = null): void
	{
		$this->_billingAddress = $val;
	}

	final public function valid(): bool
	{
		// @TODO Implement validation
		// [ ] Check card number set & valid
		// [ ] Check not expired
		return $this->getCardNumber() !== null and ! $this->expired();
	}

	final public function expired(): bool
	{
		// @TODO check expiry vs. current date
		if (isset($this->_expiryMonth, $this->_expiryYear)) {
			return false;
		} else {
			return false;
		}
	}
}
