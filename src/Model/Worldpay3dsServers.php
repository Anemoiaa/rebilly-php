<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use InvalidArgumentException;
use JsonSerializable;

abstract class Worldpay3dsServers implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['name']) {
            case 'Other':
                return new Other($data);
            case 'ThreeDSecureIO3dsServer':
                return new WorldpayThreeDSecureIOServer($data);
        }

        throw new InvalidArgumentException("Unsupported name value: '{$data['name']}'");
    }

    public function getName(): ThreeDSecureServerName
    {
        return $this->fields['name'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name']?->value;
        }

        return $data;
    }

    private function setName(ThreeDSecureServerName|string $name): self
    {
        if (!($name instanceof ThreeDSecureServerName)) {
            $name = ThreeDSecureServerName::from($name);
        }

        $this->fields['name'] = $name;

        return $this;
    }
}
