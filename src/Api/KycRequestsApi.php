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
use function GuzzleHttp\json_encode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\KycRequest;
use Rebilly\Sdk\Paginator;

class KycRequestsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return KycRequest
     */
    public function create(
        KycRequest $kycRequest,
    ): KycRequest {
        $uri = '/kyc-requests';

        $request = new Request('POST', $uri, body: json_encode($kycRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycRequest::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-requests/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return KycRequest
     */
    public function get(
        string $id,
    ): KycRequest {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-requests/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycRequest::from($data);
    }

    /**
     * @return Collection<KycRequest>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
        ];
        $uri = '/kyc-requests?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): KycRequest => KycRequest::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return KycRequest
     */
    public function update(
        string $id,
        ?KycRequest $kycRequest = null,
    ): KycRequest {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-requests/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($kycRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycRequest::from($data);
    }
}
