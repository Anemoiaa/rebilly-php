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

class TransactionEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transaction', $data)) {
            $this->setTransaction($data['transaction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransaction(): ?Transaction
    {
        return $this->fields['transaction'] ?? null;
    }

    public function setTransaction(null|Transaction|array $transaction): self
    {
        if ($transaction !== null && !($transaction instanceof Transaction)) {
            $transaction = Transaction::from($transaction);
        }

        $this->fields['transaction'] = $transaction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transaction', $this->fields)) {
            $data['transaction'] = $this->fields['transaction']?->jsonSerialize();
        }

        return $data;
    }
}
