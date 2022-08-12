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
use Rebilly\Sdk\Model\CheckoutForm;

class CheckoutFormsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CheckoutForm
     */
    public function create(
        ?CheckoutForm $checkoutForm = null,
    ): CheckoutForm {
        $uri = '/checkout-forms';

        $request = new Request('POST', $uri, body: json_encode($checkoutForm));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CheckoutForm::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/checkout-forms/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return CheckoutForm
     */
    public function get(
        string $id,
    ): CheckoutForm {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/checkout-forms/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CheckoutForm::from($data);
    }

    /**
     * @return CheckoutForm[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/checkout-forms' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CheckoutForm => CheckoutForm::from($item), $data);
    }

    /**
     * @return CheckoutForm
     */
    public function update(
        string $id,
        ?CheckoutForm $checkoutForm = null,
    ): CheckoutForm {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/checkout-forms/{id}');

        $request = new Request('PUT', $uri, body: json_encode($checkoutForm));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CheckoutForm::from($data);
    }
}
