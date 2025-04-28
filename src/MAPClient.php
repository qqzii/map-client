<?php

namespace Qqzii\MapClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use JsonException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Throwable;

final class MAPClient
{
    private const int RETRY_TIMES = 3;
    private const int RETRY_DELAY_MS = 300;
    private const int DEFAULT_TIMEOUT = 10;
    private const string TIMEZONE = 'Europe/Minsk';
    private const string CONTENT_TYPE = 'application/json';
    private const string ENCODING = 'charset=utf-8';
    private Client $client;
    private Logger $logger;

    private function __construct()
    {
        $mapConfig = config('map');

        $this->initClient($mapConfig);
        $this->initLogger($mapConfig);
    }

    public static function create(): self
    {
        return new self();
    }

    /**
     * @throws Throwable
     * @throws JsonException
     */
    public function call(ApiMethod $method, string $endpoint, array $bodyArgs = []): array
    {
        return retry(MAPClient::RETRY_TIMES, function () use ($method, $endpoint, $bodyArgs) {
            try {
                $response = $this->client->{$method->value}($endpoint, $bodyArgs);

                return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            } catch (ClientException $clientException) {
                $this->logError($clientException);

                throw $clientException;
            }
        }, MAPClient::RETRY_DELAY_MS);
    }

    private function initClient(array $mapConfig): void
    {
        $this->client = new Client([
            'base_uri' => "{$mapConfig['url']}/api/{$mapConfig['api_version']}/",
            'timeout' => $mapConfig['timeout'] ?? MAPClient::DEFAULT_TIMEOUT,
            'headers' => [
                'Time-Zone' => MAPClient::TIMEZONE,
                'Content-Type' => MAPClient::CONTENT_TYPE . ';' . MAPClient::ENCODING,
                'Accept' => MAPClient::CONTENT_TYPE . ';' . MAPClient::ENCODING,
                'Auth-Login' => $mapConfig['auth']['login'],
                'Auth-Secret' => $mapConfig['auth']['secret'],
            ],
        ]);
    }

    private function initLogger(array $mapConfig): void
    {
        $this->logger = new Logger($mapConfig['logger']['name']);
        $this->logger->pushHandler(new StreamHandler($mapConfig['logger']['filepath']));
    }

    private function logError(ClientException $exception): void
    {
        $this->logger->error('MAP API request failed', [
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'response' => json_decode($exception->getResponse()->getBody(), true),
        ]);
    }
}
