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

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;

use function GuzzleHttp\json_decode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\PaymentMethodMetadata;
use Rebilly\Sdk\Paginator;

class PaymentMethodsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return PaymentMethodMetadata
     */
    public function get(
        string $apiName,
    ): PaymentMethodMetadata {
        $pathParams = [
            '{apiName}' => $apiName,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-methods/{apiName}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentMethodMetadata::from($data);
    }

    /**
     * @return Collection<PaymentMethodMetadata>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/payment-methods?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PaymentMethodMetadata => PaymentMethodMetadata::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }
}
