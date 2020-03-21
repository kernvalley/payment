<?php
namespace KernValley\Payment;

final class Address implements Interfaces\Address
{
	protected $_addressLine = [];

	protected $_city = null;

	protected $_country = null;

	protected $_dependentLocality = null;

	protected $_organization = null;

	protected $_phone = null;

	protected $_postalCode = null;

	protected $_recipient = null;

	protected $_region = null;

	protected $_sortingCode = null;

	final public function __construct(?object $address = null)
	{
		$this->_setAddressObject($address);
	}


	final public function jsonSerialize(): array
	{
		return [
			'addressLine'       => $this->getAddressLine(),
			'city'              => $this->getCity(),
			'country'           => $this->getCountry(),
			'dependentLocality' => $this->getDependentLocality(),
			'organization'      => $this->getOrganization(),
			'phone'             => $this->getPhone(),
			'postalCode'        => $this->getPostalCode(),
			'recipient'         => $this->getRecipient(),
			'region'            => $this->getRegion(),
			'sortingCode'       => $this->getSortingCode(),
		];
	}

	final public function getAddressLine(): array
	{
		return $this->_addressLine;
	}

	final public function setAddressLine(string ...$lines): void
	{
		$this->_addressLine = $lines;
	}

	final public function getCity():? string
	{
		return $this->_city;
	}

	final public function setCity(?string $city): void
	{
		$this->_city = $city;
	}

	final public function getCountry():? string
	{
		return $this->_country;
	}

	final public function setCountry(?string $country): void
	{
		$this->_country = $country;
	}

	final public function getDependentLocality():? string
	{
		return $this->_dependentLocality;
	}

	final public function setDependentLocality(?string $dependentLocality): void
	{
		$this->_dependentLocality = $dependentLocality;
	}

	final public function getOrganization():? string
	{
		return $this->_organization;
	}

	final public function setOrganization(?string $organization): void
	{
		$this->_organization = $organization;
	}

	final public function getPhone():? string
	{
		return $this->_phone;
	}

	final public function setPhone(?string $phone): void
	{
		$this->_phone = $phone;
	}

	final public function getPostalCode():? string
	{
		return $this->_postalCode;
	}

	final public function setPostalCode(?string $postalCode): void
	{
		$this->_postalCode = $postalCode;
	}

	final public function getRecipient():? string
	{
		return $this->_recipient;
	}

	final public function setRecipient(?string $recipient): void
	{
		$this->_recipient = $recipient;
	}

	final public function getRegion():? string
	{
		return $this->_region;
	}

	final public function setRegion(?string $region): void
	{
		$this->_region = $region;
	}

	final public function getSortingCode():? string
	{
		return $this->_sortingCode;
	}

	final public function setSortingCode(?string $sortingCode): void
	{
		$this->_sortingCode = $sortingCode;
	}

	final protected function _setAddressObject(?object $address): void
	{
		if (isset($address)) {
			if (is_array($address->addressLine)) {
				$this->setAddressLine(...$address->addressLine);
			}

			$this->setRecipient($address->recipient ?? null);
			$this->setOrganization($address->organization ?? null);
			$this->setCity($address->city ?? null);
			$this->setRegion($address->region ?? null);
			$this->setPostalCode($address->postalCode ?? null);
			$this->setCountry($address->country ?? null);
			$this->setPhone($address->phone ?? null);
			$this->setDependentLocality($address->dependentLocality ?? null);
			$this->setSortingCode($address->sortingCode ?? null);
		}
	}
}
