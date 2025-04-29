<?php

namespace Qqzii\MapClient;

use JsonException;
use Throwable;

final readonly class MAPService
{
    private MAPClient $mapClient;

    public function __construct(array $mapClientConfig)
    {
        $this->mapClient = MAPClient::create($mapClientConfig);
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getCustomers(array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "customers?{$queryParamsString}" : 'customers';

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getCustomer(string $customerId, array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "customers/{$customerId}?{$queryParamsString}" : "customers/{$customerId}";

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function createCustomer(array $bodyArgs = []): array
    {
        $endpoint = 'customers';

        return $this->getClient()->call(
            ApiMethod::POST,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function updateCustomer(string $customerId, array $bodyArgs = []): array
    {
        $endpoint = "customers/{$customerId}";

        return $this->getClient()->call(
            ApiMethod::PATCH,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function deleteCustomer(string $customerId): array
    {
        $endpoint = "customers/{$customerId}";

        return $this->getClient()->call(
            ApiMethod::DELETE,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function initCustomerEvent(string $customerId, string $eventSlug, array $bodyArgs = []): array
    {
        $endpoint = "customers/{$customerId}/event/{$eventSlug}";

        return $this->getClient()->call(
            ApiMethod::POST,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function attachCustomerToSegment(string $customerId, string $segmentId): array
    {
        $endpoint = "customers/{$customerId}/segments/{$segmentId}";

        return $this->getClient()->call(
            ApiMethod::POST,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function detachCustomerFromSegment(string $customerId, string $segmentId): array
    {
        $endpoint = "customers/{$customerId}/segments/{$segmentId}";

        return $this->getClient()->call(
            ApiMethod::DELETE,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getSegments(array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "segments?{$queryParamsString}" : 'segments';

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getSegment(string $segmentId, array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "segments/{$segmentId}?{$queryParamsString}" : "segments/{$segmentId}";

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function createSegment(array $bodyArgs = []): array
    {
        $endpoint = 'segments';

        return $this->getClient()->call(
            ApiMethod::POST,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function updateSegment(string $segmentId, array $bodyArgs = []): array
    {
        $endpoint = "segments/{$segmentId}";

        return $this->getClient()->call(
            ApiMethod::PATCH,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function deleteSegment(string $segmentId): array
    {
        $endpoint = "segments/{$segmentId}";

        return $this->getClient()->call(
            ApiMethod::DELETE,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getTopics(array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "topics?{$queryParamsString}" : 'topics';

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getTopic(string $topicId, array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "topics/{$topicId}?{$queryParamsString}" : "topics/{$topicId}";

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function initMessageEvent(array $bodyArgs = []): array
    {
        $endpoint = 'message-events';

        return $this->getClient()->call(
            ApiMethod::POST,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getMessages(array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "messages?{$queryParamsString}" : 'messages';

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function getMessage(string $messageId, array $queryParams = []): array
    {
        $queryParamsString = get_query_params_string($queryParams);
        $endpoint = $queryParamsString ? "messages/{$messageId}?{$queryParamsString}" : "messages/{$messageId}";

        return $this->getClient()->call(
            ApiMethod::GET,
            $endpoint
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function createDevice(array $bodyArgs = []): array
    {
        $endpoint = 'devices';

        return $this->getClient()->call(
            ApiMethod::POST,
            $endpoint,
            $bodyArgs
        );
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function updateDevice(string $deviceId, array $bodyArgs = []): array
    {
        $endpoint = "devices/{$deviceId}";

        return $this->getClient()->call(
            ApiMethod::PATCH,
            $endpoint,
            $bodyArgs
        );
    }

    private function getClient(): MAPClient
    {
        return $this->mapClient;
    }
}
