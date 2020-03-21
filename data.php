<?php
final class Data implements \JSONSerializable
{
	private $_data = [];

	final public function __construct(array $data = [])
	{
		$this->_data = $data;
	}

	final public function __isset(string $key): bool
	{
		return array_key_exists($key, $this->_data);
	}

	final public function __unset(string $key): void
	{
		unset($this->_data[$key]);
	}

	final public function __get(string $key)
	{
		$val = $this->_data[$key];

		if (is_array($val) and $key !== 'addressLine') {
			return new self($val);
		} else {
			return $val;
		}
	}

	final public function __set(string $key, $val): void
	{
		$this->_data[$key] = $val;
	}

	final public function jsonSerialize(): array
	{
		return $this->_data;
	}

	final public static function loadFromJSONFile(string $fname):? self
	{
		return new self(json_decode(file_get_contents($fname), true));
	}
}
