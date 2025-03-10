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

use JsonSerializable;

class CoinGateSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('targetCurrency', $data)) {
            $this->setTargetCurrency($data['targetCurrency']);
        }
        if (array_key_exists('tolerancePercentage', $data)) {
            $this->setTolerancePercentage($data['tolerancePercentage']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTargetCurrency(): ?string
    {
        return $this->fields['targetCurrency'] ?? null;
    }

    public function setTargetCurrency(null|string $targetCurrency): static
    {
        $this->fields['targetCurrency'] = $targetCurrency;

        return $this;
    }

    public function getTolerancePercentage(): ?int
    {
        return $this->fields['tolerancePercentage'] ?? null;
    }

    public function setTolerancePercentage(null|int $tolerancePercentage): static
    {
        $this->fields['tolerancePercentage'] = $tolerancePercentage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('targetCurrency', $this->fields)) {
            $data['targetCurrency'] = $this->fields['targetCurrency'];
        }
        if (array_key_exists('tolerancePercentage', $this->fields)) {
            $data['tolerancePercentage'] = $this->fields['tolerancePercentage'];
        }

        return $data;
    }
}
