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

class Payvision extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'Payvision',
        ] + $data);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
        if (array_key_exists('threeDSecureServer', $data)) {
            $this->setThreeDSecureServer($data['threeDSecureServer']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCredentials(): PayvisionCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(PayvisionCredentials|array $credentials): self
    {
        if (!($credentials instanceof \Rebilly\Sdk\Model\PayvisionCredentials)) {
            $credentials = \Rebilly\Sdk\Model\PayvisionCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): ?PayvisionSettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|PayvisionSettings|array $settings): self
    {
        if ($settings !== null && !($settings instanceof \Rebilly\Sdk\Model\PayvisionSettings)) {
            $settings = \Rebilly\Sdk\Model\PayvisionSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function getThreeDSecureServer(): ?Payvision3dsServers
    {
        return $this->fields['threeDSecureServer'] ?? null;
    }

    public function setThreeDSecureServer(null|Payvision3dsServers|array $threeDSecureServer): self
    {
        if ($threeDSecureServer !== null && !($threeDSecureServer instanceof \Rebilly\Sdk\Model\Payvision3dsServers)) {
            $threeDSecureServer = \Rebilly\Sdk\Model\Payvision3dsServers::from($threeDSecureServer);
        }

        $this->fields['threeDSecureServer'] = $threeDSecureServer;

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
        if (array_key_exists('threeDSecureServer', $this->fields)) {
            $data['threeDSecureServer'] = $this->fields['threeDSecureServer']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
