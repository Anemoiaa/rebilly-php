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

class Adyen extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'Adyen',
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

    public function getCredentials(): AdyenCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(AdyenCredentials|array $credentials): self
    {
        if (!($credentials instanceof AdyenCredentials)) {
            $credentials = AdyenCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): AdyenSettings
    {
        return $this->fields['settings'];
    }

    public function setSettings(AdyenSettings|array $settings): self
    {
        if (!($settings instanceof AdyenSettings)) {
            $settings = AdyenSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function getThreeDSecureServer(): ?Adyen3dsServers
    {
        return $this->fields['threeDSecureServer'] ?? null;
    }

    public function setThreeDSecureServer(null|Adyen3dsServers|array $threeDSecureServer): self
    {
        if ($threeDSecureServer !== null && !($threeDSecureServer instanceof Adyen3dsServers)) {
            $threeDSecureServer = Adyen3dsServers::from($threeDSecureServer);
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
