<?php
namespace KernValley\Payment;

class Response implements \JSONSerializable
{
	private $_requestId = null;

	private $_methodName = 'basic-card';

	private $_details = null;

	private $_shippingAddress = null;

	private $_shippingOption = null;

	private $_payerName = null;

	private $_payerEmail = null;

	private $payerPhone = null;

	final public function __construct(?object $data = null)
	{
		if (isset($data)) {
			$this->setRequestId($data->requestId ?? null);
			$this->setDetails(new BasicCardResponse($data->details ?? null));
			$this->setMethodName($data->methodName ?? 'basic-card');
			$this->setPayerName($data->payerName ?? null);
			$this->setPayerEmail($data->payerEmail ?? null);
			$this->setPayerPhone($data->payerPhone ?? null);
			$this->setShippingOption($data->shippingOption ?? null);

			if (isset($data->shippingAddress)) {
				$this->setShippingAddress(new Address($data->shippingAddress ?? null));
			}
		}
	}

	final public function getRequestId(): string
	{
		return empty($this->_requestId) ? static::_generateUUID() : $this->_requestId;
	}

	final public function setRequestId(?string $val): void
	{
		$this->_requestId = $val;
	}

	final public function getDetails():? BasicCardResponse
	{
		return $this->_details;
	}

	final public function setDetails(?BasicCardResponse $val): void
	{
		$this->_details = $val;
	}

	final public function getMethodName():? string
	{
		return $this->_methodName;
	}

	final public function setMethodName(?string $val = null): void
	{
		$this->_methodName = $val;
	}

	final public function getShippingAddress():? Address
	{
		return $this->_shippingAddress;
	}

	final public function setShippingAddress(?Address $address = null): void
	{
		$this->_shippingAddress = $address;
	}

	final public function getShippingOption():? string
	{
		return $this->_shippingOption;
	}

	final public function setShippingOption(?string $val = null): void
	{
		$this->_shippingOption = $val;
	}

	final public function getPayerName():? string
	{
		return $this->_payerName;
	}

	final public function setPayerName(?string $val = null): void
	{
		$this->_payerName = $val;
	}

	final public function getPayerEmail():? string
	{
		return $this->_payerEmail;
	}

	final public function setPayerEmail(?string $val = null): void
	{
		$this->_payerEmail = $val;
	}

	final public function getPayerPhone():? string
	{
		return $this->_payerPhone;
	}

	final public function setPayerPhone(?string $val = null): void
	{
		$this->_payerPhone = $val;
	}

	final public function jsonSerialize():? array
	{
		return [
			'requestId'       => $this->getRequestId(),
			'methodName'      => $this->getMethodName(),
			'details'         => $this->getDetails(),
			'shippingAddress' => $this->getShippingAddress(),
			'payerName'       => $this->getPayerName(),
			'payerEmail'      => $this->getPayerEmail(),
			'payerPhone'      => $this->getPayerPhone(),
			'shippingOption'  => $this->getShippingOption(),
		];
	}

	final public function valid(): bool
	{
		return is_null($this->_details) or $this->_details->valid();
	}

	final private function _generateUUID(): string
	{
		return trim(`uuidgen`);
	}
}
