<?php

declare(strict_types=1);

namespace LupaSearch\Api;

use JsonSerializable;
use LupaSearch\LupaClientInterface;
use LupaSearch\Utils\JsonUtils;

class CustomSuggestionsApi
{
    /**
     * @var LupaClientInterface
     */
    private $client;

    public function __construct(LupaClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCustomSuggestions(string $indexId): array
    {
        return $this->client->send(LupaClientInterface::METHOD_GET, "/indices/$indexId/customSuggestions", true);
    }

    public function createCustomSuggestions(string $indexId, JsonSerializable|array $httpBody): array
    {
        return $this->client->send(
            LupaClientInterface::METHOD_POST,
            "/indices/$indexId/customSuggestions",
            true,
            JsonUtils::jsonEncode($httpBody)
        );
    }

    public function deleteCustomSuggestions(string $indexId, JsonSerializable|array $httpBody): void
    {
        $this->client->send(
            LupaClientInterface::METHOD_POST,
            "/indices/$indexId/customSuggestions/batchDelete",
            true,
            JsonUtils::jsonEncode($httpBody)
        );
    }
}
