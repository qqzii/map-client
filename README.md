# MAP Client - Package for integration with MAP

## Installation

Install the latest version with

```bash
composer require qqzii/map-client
```

## Basic Usage

Init config file map.php with simple structure

```php
[
    'url' => 'your.map.url',
    'api_version' => 'v1',
    'auth' => [
        'login' => 'your_login',
        'secret' => 'your_secret_key',
    ],
    'logger' => [
        'name' => 'name_of_your_logger',
        'filepath' => 'path/to/your/logger/file.log',
    ],
];
```

Basic way of interaction

```php
$mapService = new MapService(config('map'));

$indexQueryParamsExample = [
    'per_page' => 10,
    'page' => 1,
    'with' => ['topics'],
    'filters' => ['first_name' => 'Olivia']
];

$mapService->getCustomers($indexQueryParamsExample)
```

### Available methods for interactions with MAP

- #### Actions with customers

```php
public function getCustomers(array $queryParams = []): array
```

```php
public function getCustomer(string $customerId, array $queryParams = []): array
```

```php
public function createCustomer(array $bodyArgs = []): array
```

```php
public function updateCustomer(string $customerId, array $bodyArgs = []): array
```

```php
public function deleteCustomer(string $customerId): array
```

```php
public function initCustomerEvent(string $customerId, string $eventSlug, array $bodyArgs = []): array
```

```php
public function attachCustomerToSegment(string $customerId, string $segmentId): array
```

```php
public function detachCustomerFromSegment(string $customerId, string $segmentId): array
```

- #### Actions with segments

```php
public function getSegments(array $queryParams = []): array
```

```php
public function getSegment(string $segmentId, array $queryParams = []): array
```

```php
public function createSegment(array $bodyArgs = []): array
```

```php
public function updateSegment(string $segmentId, array $bodyArgs = []): array
```

```php
public function deleteSegment(string $segmentId): array
```

- #### Actions with topics

```php
public function getTopics(array $queryParams = []): array
```

```php
public function getTopic(string $topicId, array $queryParams = []): array
```

- #### Actions with messages

```php
public function getMessages(array $queryParams = []): array
```

```php
public function getMessage(string $messageId, array $queryParams = []): array
```

```php
public function initMessageEvent(array $bodyArgs = []): array
```

- #### Actions with devices

```php
public function createDevice(array $bodyArgs = []): array
```

```php
public function updateDevice(string $deviceId, array $bodyArgs = []): array
```
