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

class InstaDebit extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'InstaDebit',
        ] + $data);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCredentials(): InstaDebitCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(InstaDebitCredentials|array $credentials): self
    {
        if (!($credentials instanceof \Rebilly\Sdk\Model\InstaDebitCredentials)) {
            $credentials = \Rebilly\Sdk\Model\InstaDebitCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): ?InstaDebitSettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|InstaDebitSettings|array $settings): self
    {
        if ($settings !== null && !($settings instanceof \Rebilly\Sdk\Model\InstaDebitSettings)) {
            $settings = \Rebilly\Sdk\Model\InstaDebitSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('credentials', $this->fields)) {
            $data['credentials'] = $this->fields['credentials']?->jsonSerialize();
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
