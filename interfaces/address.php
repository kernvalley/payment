<?php
namespace KernValley\Payment\Interfaces;

interface Address extends \JSONSerializable
{
	public function getAddressLine(): array;

	public function setAddressLine(string ...$lines): void;

	public function getCity():? string;

	public function setCity(?string $city): void;

	public function getCountry():? string;

	public function setCountry(?string $country): void;

	public function getDependentLocality():? string;

	public function setDependentLocality(?string $dependentLocality): void;

	public function getOrganization():? string;

	public function setOrganization(?string $organization): void;

	public function getPhone():? string;

	public function setPhone(?string $phone): void;

	public function getPostalCode():? string;

	public function setPostalCode(?string $postalCode): void;

	public function getRecipient():? string;

	public function setRecipient(?string $recipient): void;

	public function getRegion():? string;

	public function setRegion(?string $region): void;

	public function getSortingCode():? string;

	public function setSortingCode(?string $sortingCode): void;
}
