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

class PayPalAccount extends CommonPayPalAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('stickyGatewayAccountId', $data)) {
            $this->setStickyGatewayAccountId($data['stickyGatewayAccountId']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getStickyGatewayAccountId(): ?string
    {
        return $this->fields['stickyGatewayAccountId'] ?? null;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): self
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof \Rebilly\Sdk\Model\RiskMetadata)) {
            $riskMetadata = \Rebilly\Sdk\Model\RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\ApprovalUrlLink|\Rebilly\Sdk\Model\AuthTransactionLink|\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{authTransaction:\Rebilly\Sdk\Model\Transaction,customer:\Rebilly\Sdk\Model\Customer}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('stickyGatewayAccountId', $this->fields)) {
            $data['stickyGatewayAccountId'] = $this->fields['stickyGatewayAccountId'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setStickyGatewayAccountId(null|string $stickyGatewayAccountId): self
    {
        $this->fields['stickyGatewayAccountId'] = $stickyGatewayAccountId;

        return $this;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\ApprovalUrlLink|\Rebilly\Sdk\Model\AuthTransactionLink|\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{authTransaction:\Rebilly\Sdk\Model\Transaction,customer:\Rebilly\Sdk\Model\Customer} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['authTransaction'] = isset($embedded['authTransaction']) ? ($embedded['authTransaction'] instanceof \Rebilly\Sdk\Model\Transaction ? $embedded['authTransaction'] : \Rebilly\Sdk\Model\Transaction::from($embedded['authTransaction'])) : null;
        $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof \Rebilly\Sdk\Model\Customer ? $embedded['customer'] : \Rebilly\Sdk\Model\Customer::from($embedded['customer'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
