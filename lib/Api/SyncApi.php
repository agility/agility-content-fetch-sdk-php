<?php
/**
 * SyncApi
 * PHP version 5
 *
 * @category Class
 * @package  Agility\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Agility CMS REST API
 *
 * Agility CMS REST API for retrieving content from the Agility CMS.  The API Types are fetch (for published content) and preview (for latest, or staging content).
 *
 * OpenAPI spec version: v1
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.36
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Agility\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Agility\Client\ApiException;
use Agility\Client\Configuration;
use Agility\Client\HeaderSelector;
use Agility\Client\ObjectSerializer;

/**
 * SyncApi Class Doc Comment
 *
 * @category Class
 * @package  Agility\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SyncApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation guidApitypeLocaleSyncItemsGet
     *
     * Retrieves all content items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync content items for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \Agility\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Agility\Client\Model\HeadlessContentItemHeadlessSync
     */
    public function guidApitypeLocaleSyncItemsGet($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        list($response) = $this->guidApitypeLocaleSyncItemsGetWithHttpInfo($guid, $apitype, $locale, $sync_token, $page_size);
        return $response;
    }

    /**
     * Operation guidApitypeLocaleSyncItemsGetWithHttpInfo
     *
     * Retrieves all content items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync content items for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \Agility\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Agility\Client\Model\HeadlessContentItemHeadlessSync, HTTP status code, HTTP response headers (array of strings)
     */
    public function guidApitypeLocaleSyncItemsGetWithHttpInfo($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        $returnType = '\Agility\Client\Model\HeadlessContentItemHeadlessSync';
        $request = $this->guidApitypeLocaleSyncItemsGetRequest($guid, $apitype, $locale, $sync_token, $page_size);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Agility\Client\Model\HeadlessContentItemHeadlessSync',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Agility\Client\Model\NotFoundResult',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Agility\Client\Model\EmptyResult',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation guidApitypeLocaleSyncItemsGetAsync
     *
     * Retrieves all content items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync content items for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function guidApitypeLocaleSyncItemsGetAsync($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        return $this->guidApitypeLocaleSyncItemsGetAsyncWithHttpInfo($guid, $apitype, $locale, $sync_token, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation guidApitypeLocaleSyncItemsGetAsyncWithHttpInfo
     *
     * Retrieves all content items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync content items for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function guidApitypeLocaleSyncItemsGetAsyncWithHttpInfo($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        $returnType = '\Agility\Client\Model\HeadlessContentItemHeadlessSync';
        $request = $this->guidApitypeLocaleSyncItemsGetRequest($guid, $apitype, $locale, $sync_token, $page_size);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'guidApitypeLocaleSyncItemsGet'
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync content items for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function guidApitypeLocaleSyncItemsGetRequest($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        // verify the required parameter 'guid' is set
        if ($guid === null || (is_array($guid) && count($guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $guid when calling guidApitypeLocaleSyncItemsGet'
            );
        }
        // verify the required parameter 'apitype' is set
        if ($apitype === null || (is_array($apitype) && count($apitype) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $apitype when calling guidApitypeLocaleSyncItemsGet'
            );
        }
        // verify the required parameter 'locale' is set
        if ($locale === null || (is_array($locale) && count($locale) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $locale when calling guidApitypeLocaleSyncItemsGet'
            );
        }

        $resourcePath = '/{guid}/{apitype}/{locale}/sync/items';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($sync_token !== null) {
            $queryParams['syncToken'] = ObjectSerializer::toQueryValue($sync_token, 'int64');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['pageSize'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }

        // path params
        if ($guid !== null) {
            $resourcePath = str_replace(
                '{' . 'guid' . '}',
                ObjectSerializer::toPathValue($guid),
                $resourcePath
            );
        }
        // path params
        if ($apitype !== null) {
            $resourcePath = str_replace(
                '{' . 'apitype' . '}',
                ObjectSerializer::toPathValue($apitype),
                $resourcePath
            );
        }
        // path params
        if ($locale !== null) {
            $resourcePath = str_replace(
                '{' . 'locale' . '}',
                ObjectSerializer::toPathValue($locale),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('APIKey');
        if ($apiKey !== null) {
            $headers['APIKey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation guidApitypeLocaleSyncPagesGet
     *
     * Retrieves all pages items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync pages for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \Agility\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Agility\Client\Model\HeadlessContentPageHeadlessSync
     */
    public function guidApitypeLocaleSyncPagesGet($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        list($response) = $this->guidApitypeLocaleSyncPagesGetWithHttpInfo($guid, $apitype, $locale, $sync_token, $page_size);
        return $response;
    }

    /**
     * Operation guidApitypeLocaleSyncPagesGetWithHttpInfo
     *
     * Retrieves all pages items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync pages for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \Agility\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Agility\Client\Model\HeadlessContentPageHeadlessSync, HTTP status code, HTTP response headers (array of strings)
     */
    public function guidApitypeLocaleSyncPagesGetWithHttpInfo($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        $returnType = '\Agility\Client\Model\HeadlessContentPageHeadlessSync';
        $request = $this->guidApitypeLocaleSyncPagesGetRequest($guid, $apitype, $locale, $sync_token, $page_size);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Agility\Client\Model\HeadlessContentPageHeadlessSync',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Agility\Client\Model\NotFoundResult',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Agility\Client\Model\EmptyResult',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation guidApitypeLocaleSyncPagesGetAsync
     *
     * Retrieves all pages items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync pages for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function guidApitypeLocaleSyncPagesGetAsync($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        return $this->guidApitypeLocaleSyncPagesGetAsyncWithHttpInfo($guid, $apitype, $locale, $sync_token, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation guidApitypeLocaleSyncPagesGetAsyncWithHttpInfo
     *
     * Retrieves all pages items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync pages for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function guidApitypeLocaleSyncPagesGetAsyncWithHttpInfo($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        $returnType = '\Agility\Client\Model\HeadlessContentPageHeadlessSync';
        $request = $this->guidApitypeLocaleSyncPagesGetRequest($guid, $apitype, $locale, $sync_token, $page_size);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'guidApitypeLocaleSyncPagesGet'
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to sync pages for. (required)
     * @param  int $sync_token The token from the most recently synced value. (optional)
     * @param  int $page_size The number of items to return per set. (optional, default to 500)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function guidApitypeLocaleSyncPagesGetRequest($guid, $apitype, $locale, $sync_token = null, $page_size = '500')
    {
        // verify the required parameter 'guid' is set
        if ($guid === null || (is_array($guid) && count($guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $guid when calling guidApitypeLocaleSyncPagesGet'
            );
        }
        // verify the required parameter 'apitype' is set
        if ($apitype === null || (is_array($apitype) && count($apitype) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $apitype when calling guidApitypeLocaleSyncPagesGet'
            );
        }
        // verify the required parameter 'locale' is set
        if ($locale === null || (is_array($locale) && count($locale) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $locale when calling guidApitypeLocaleSyncPagesGet'
            );
        }

        $resourcePath = '/{guid}/{apitype}/{locale}/sync/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($sync_token !== null) {
            $queryParams['syncToken'] = ObjectSerializer::toQueryValue($sync_token, 'int64');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['pageSize'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }

        // path params
        if ($guid !== null) {
            $resourcePath = str_replace(
                '{' . 'guid' . '}',
                ObjectSerializer::toPathValue($guid),
                $resourcePath
            );
        }
        // path params
        if ($apitype !== null) {
            $resourcePath = str_replace(
                '{' . 'apitype' . '}',
                ObjectSerializer::toPathValue($apitype),
                $resourcePath
            );
        }
        // path params
        if ($locale !== null) {
            $resourcePath = str_replace(
                '{' . 'locale' . '}',
                ObjectSerializer::toPathValue($locale),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('APIKey');
        if ($apiKey !== null) {
            $headers['APIKey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
