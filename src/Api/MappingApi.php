<?php

declare(strict_types=1);

namespace LupaSearch\Api;

use JsonSerializable;
use LupaSearch\LupaClientInterface;
use LupaSearch\Utils\JsonUtils;

class MappingApi
{
    /**
     * @var LupaClientInterface
     */
    private $client;

    public function __construct(LupaClientInterface $client)
    {
        $this->client = $client;
    }

    public function createMapping(string $indexId, JsonSerializable|array $httpBody): void
    {
        $this->client->send(
            LupaClientInterface::METHOD_POST,
            "/indices/{$indexId}/mapping",
            true,
            JsonUtils::jsonEncode($httpBody)
        );
    }

    public function updateMapping(string $indexId, JsonSerializable|array $httpBody): void
    {
        $this->client->send(
            LupaClientInterface::METHOD_PUT,
            "/indices/{$indexId}/mapping",
            true,
            JsonUtils::jsonEncode($httpBody)
        );
    }
}
