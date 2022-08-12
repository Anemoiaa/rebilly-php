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
use Rebilly\Sdk\Model\Attachment;

class AttachmentsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Attachment
     */
    public function attach(
        Attachment $attachment,
    ): Attachment {
        $uri = '/attachments';

        $request = new Request('POST', $uri, body: json_encode($attachment));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Attachment::from($data);
    }

    public function detach(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/attachments/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Attachment[]
     */
    public function getAllAttachments(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'expand' => $expand,
            'fields' => $fields,
            'sort' => $sort,
        ];
        $uri = '/attachments' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Attachment => Attachment::from($item), $data);
    }

    /**
     * @return Attachment
     */
    public function getAttachment(
        string $id,
    ): Attachment {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/attachments/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Attachment::from($data);
    }

    /**
     * @return Attachment
     */
    public function updateAttachment(
        string $id,
        Attachment $attachment,
    ): Attachment {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/attachments/{id}');

        $request = new Request('PUT', $uri, body: json_encode($attachment));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Attachment::from($data);
    }
}
