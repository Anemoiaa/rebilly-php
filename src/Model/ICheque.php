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

class ICheque extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'iCheque',
        ] + $data);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCredentials(): IChequeCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(IChequeCredentials|array $credentials): self
    {
        if (!($credentials instanceof IChequeCredentials)) {
            $credentials = IChequeCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('credentials', $this->fields)) {
            $data['credentials'] = $this->fields['credentials']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
