<?php
/**
 * ListApi
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
 * ListApi Class Doc Comment
 *
 * @category Class
 * @package  Agility\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ListApi
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
     * Operation getContentList
     *
     * Retrieves a list of content items by reference name.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to retrieve content for. (required)
     * @param  string $reference_name The unique reference name of the content list you wish to retrieve in the current locale. Reference names must be ALL lowercase. (required)
     * @param  string $fields [Optional] A comma separated list of the fields to return. (optional)
     * @param  int $take [Optional] The maximum number of items to retrieve in this request. Default is 10. Maximum allowed is 250. (optional)
     * @param  int $skip [Optional] The number of items to skip from the list. Default is 0. Used for implementing pagination. (optional)
     * @param  string $filter [Optional] The filter you wish to apply to the list query. Supports [eq (Equal To), ne (Not Equal), lt (Less Than), lte (Less Than or Equal), gt (Greater Than), gte (Greater Than or Equal)]. Example value: &#x60;fields.title[eq]\&quot;some title\&quot; or fields.details[like]\&quot;some text\&quot;&#x60; (optional)
     * @param  string $sort [Optional] The field to sort the results by. Example fields.title or properties.created, seo.metaDescription (optional)
     * @param  string $direction [Optional] The direction to sort the results by. Default is asc. Valid values are asc, desc. (optional)
     * @param  int $content_link_depth [Optional] The depth of list items. Maximum allowed is 5. (optional)
     * @param  bool $expand_all_content_links [Optional] Whether or not to expand entire linked content references, includings lists and items that are rendered in the CMS as Grid or Link. (optional)
     *
     * @throws \Agility\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed //\Agility\Client\Model\HeadlessContentListResponse
     */
    public function getContentList($guid, $apitype, $locale, $reference_name, $fields = null, $take = null, $skip = null, $filter = null, $sort = null, $direction = null, $content_link_depth = null, $expand_all_content_links = null)
    {
        $response = $this->getContentListWithHttpInfo($guid, $apitype, $locale, $reference_name, $fields, $take, $skip, $filter, $sort, $direction, $content_link_depth, $expand_all_content_links);

        return $response;
    }

    /**
     * Operation getContentListWithHttpInfo
     *
     * Retrieves a list of content items by reference name.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to retrieve content for. (required)
     * @param  string $reference_name The unique reference name of the content list you wish to retrieve in the current locale. Reference names must be ALL lowercase. (required)
     * @param  string $fields [Optional] A comma separated list of the fields to return. (optional)
     * @param  int $take [Optional] The maximum number of items to retrieve in this request. Default is 10. Maximum allowed is 250. (optional)
     * @param  int $skip [Optional] The number of items to skip from the list. Default is 0. Used for implementing pagination. (optional)
     * @param  string $filter [Optional] The filter you wish to apply to the list query. Supports [eq (Equal To), ne (Not Equal), lt (Less Than), lte (Less Than or Equal), gt (Greater Than), gte (Greater Than or Equal)]. Example value: &#x60;fields.title[eq]\&quot;some title\&quot; or fields.details[like]\&quot;some text\&quot;&#x60; (optional)
     * @param  string $sort [Optional] The field to sort the results by. Example fields.title or properties.created, seo.metaDescription (optional)
     * @param  string $direction [Optional] The direction to sort the results by. Default is asc. Valid values are asc, desc. (optional)
     * @param  int $content_link_depth [Optional] The depth of list items. Maximum allowed is 5. (optional)
     * @param  bool $expand_all_content_links [Optional] Whether or not to expand entire linked content references, includings lists and items that are rendered in the CMS as Grid or Link. (optional)
     *
     * @throws \Agility\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Agility\Client\Model\HeadlessContentListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getContentListWithHttpInfo($guid, $apitype, $locale, $reference_name, $fields = null, $take = null, $skip = null, $filter = null, $sort = null, $direction = null, $content_link_depth = null, $expand_all_content_links = null)
    {

        $returnType = '\Agility\Client\Model\HeadlessContentListResponse';
        $request = $this->getContentListRequest($guid, $apitype, $locale, $reference_name, $fields, $take, $skip, $filter, $sort, $direction, $content_link_depth, $expand_all_content_links);

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

//print_r("RESP BODY $responseBody \n");
return json_decode($responseBody);

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
                        '\Agility\Client\Model\HeadlessContentListResponse',
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
     * Operation getContentListAsync
     *
     * Retrieves a list of content items by reference name.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to retrieve content for. (required)
     * @param  string $reference_name The unique reference name of the content list you wish to retrieve in the current locale. Reference names must be ALL lowercase. (required)
     * @param  string $fields [Optional] A comma separated list of the fields to return. (optional)
     * @param  int $take [Optional] The maximum number of items to retrieve in this request. Default is 10. Maximum allowed is 250. (optional)
     * @param  int $skip [Optional] The number of items to skip from the list. Default is 0. Used for implementing pagination. (optional)
     * @param  string $filter [Optional] The filter you wish to apply to the list query. Supports [eq (Equal To), ne (Not Equal), lt (Less Than), lte (Less Than or Equal), gt (Greater Than), gte (Greater Than or Equal)]. Example value: &#x60;fields.title[eq]\&quot;some title\&quot; or fields.details[like]\&quot;some text\&quot;&#x60; (optional)
     * @param  string $sort [Optional] The field to sort the results by. Example fields.title or properties.created, seo.metaDescription (optional)
     * @param  string $direction [Optional] The direction to sort the results by. Default is asc. Valid values are asc, desc. (optional)
     * @param  int $content_link_depth [Optional] The depth of list items. Maximum allowed is 5. (optional)
     * @param  bool $expand_all_content_links [Optional] Whether or not to expand entire linked content references, includings lists and items that are rendered in the CMS as Grid or Link. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getContentListAsync($guid, $apitype, $locale, $reference_name, $fields = null, $take = null, $skip = null, $filter = null, $sort = null, $direction = null, $content_link_depth = null, $expand_all_content_links = null)
    {
        return $this->getContentListAsyncWithHttpInfo($guid, $apitype, $locale, $reference_name, $fields, $take, $skip, $filter, $sort, $direction, $content_link_depth, $expand_all_content_links)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getContentListAsyncWithHttpInfo
     *
     * Retrieves a list of content items by reference name.
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to retrieve content for. (required)
     * @param  string $reference_name The unique reference name of the content list you wish to retrieve in the current locale. Reference names must be ALL lowercase. (required)
     * @param  string $fields [Optional] A comma separated list of the fields to return. (optional)
     * @param  int $take [Optional] The maximum number of items to retrieve in this request. Default is 10. Maximum allowed is 250. (optional)
     * @param  int $skip [Optional] The number of items to skip from the list. Default is 0. Used for implementing pagination. (optional)
     * @param  string $filter [Optional] The filter you wish to apply to the list query. Supports [eq (Equal To), ne (Not Equal), lt (Less Than), lte (Less Than or Equal), gt (Greater Than), gte (Greater Than or Equal)]. Example value: &#x60;fields.title[eq]\&quot;some title\&quot; or fields.details[like]\&quot;some text\&quot;&#x60; (optional)
     * @param  string $sort [Optional] The field to sort the results by. Example fields.title or properties.created, seo.metaDescription (optional)
     * @param  string $direction [Optional] The direction to sort the results by. Default is asc. Valid values are asc, desc. (optional)
     * @param  int $content_link_depth [Optional] The depth of list items. Maximum allowed is 5. (optional)
     * @param  bool $expand_all_content_links [Optional] Whether or not to expand entire linked content references, includings lists and items that are rendered in the CMS as Grid or Link. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getContentListAsyncWithHttpInfo($guid, $apitype, $locale, $reference_name, $fields = null, $take = null, $skip = null, $filter = null, $sort = null, $direction = null, $content_link_depth = null, $expand_all_content_links = null)
    {
        $returnType = '\Agility\Client\Model\HeadlessContentListResponse';
        $request = $this->getContentListRequest($guid, $apitype, $locale, $reference_name, $fields, $take, $skip, $filter, $sort, $direction, $content_link_depth, $expand_all_content_links);

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
     * Create request for operation 'getContentList'
     *
     * @param  string $guid The instance GUID, available from the API Keys section. (required)
     * @param  \Agility\Client\Model\APIType $apitype The Type of API - fetch or preview. (required)
     * @param  string $locale The locale code you want to retrieve content for. (required)
     * @param  string $reference_name The unique reference name of the content list you wish to retrieve in the current locale. Reference names must be ALL lowercase. (required)
     * @param  string $fields [Optional] A comma separated list of the fields to return. (optional)
     * @param  int $take [Optional] The maximum number of items to retrieve in this request. Default is 10. Maximum allowed is 250. (optional)
     * @param  int $skip [Optional] The number of items to skip from the list. Default is 0. Used for implementing pagination. (optional)
     * @param  string $filter [Optional] The filter you wish to apply to the list query. Supports [eq (Equal To), ne (Not Equal), lt (Less Than), lte (Less Than or Equal), gt (Greater Than), gte (Greater Than or Equal)]. Example value: &#x60;fields.title[eq]\&quot;some title\&quot; or fields.details[like]\&quot;some text\&quot;&#x60; (optional)
     * @param  string $sort [Optional] The field to sort the results by. Example fields.title or properties.created, seo.metaDescription (optional)
     * @param  string $direction [Optional] The direction to sort the results by. Default is asc. Valid values are asc, desc. (optional)
     * @param  int $content_link_depth [Optional] The depth of list items. Maximum allowed is 5. (optional)
     * @param  bool $expand_all_content_links [Optional] Whether or not to expand entire linked content references, includings lists and items that are rendered in the CMS as Grid or Link. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getContentListRequest($guid, $apitype, $locale, $reference_name, $fields = null, $take = null, $skip = null, $filter = null, $sort = null, $direction = null, $content_link_depth = null, $expand_all_content_links = null)
    {
        // verify the required parameter 'guid' is set
        if ($guid === null || (is_array($guid) && count($guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $guid when calling getContentList'
            );
        }
        // verify the required parameter 'apitype' is set
        if ($apitype === null || (is_array($apitype) && count($apitype) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $apitype when calling getContentList'
            );
        }
        // verify the required parameter 'locale' is set
        if ($locale === null || (is_array($locale) && count($locale) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $locale when calling getContentList'
            );
        }
        // verify the required parameter 'reference_name' is set
        if ($reference_name === null || (is_array($reference_name) && count($reference_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $reference_name when calling getContentList'
            );
        }

        $resourcePath = '/{guid}/{apitype}/{locale}/list/{referenceName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($fields !== null) {
            $queryParams['Fields'] = ObjectSerializer::toQueryValue($fields, null);
        }
        // query params
        if ($take !== null) {
            $queryParams['Take'] = ObjectSerializer::toQueryValue($take, 'int32');
        }
        // query params
        if ($skip !== null) {
            $queryParams['Skip'] = ObjectSerializer::toQueryValue($skip, 'int32');
        }
        // query params
        if ($filter !== null) {
            $queryParams['Filter'] = ObjectSerializer::toQueryValue($filter, null);
        }
        // query params
        if ($sort !== null) {
            $queryParams['Sort'] = ObjectSerializer::toQueryValue($sort, null);
        }
        // query params
        if ($direction !== null) {
            $queryParams['Direction'] = ObjectSerializer::toQueryValue($direction, null);
        }
        // query params
        if ($content_link_depth !== null) {
            $queryParams['ContentLinkDepth'] = ObjectSerializer::toQueryValue($content_link_depth, 'int32');
        }
        // query params
        if ($expand_all_content_links !== null) {
            $queryParams['ExpandAllContentLinks'] = ObjectSerializer::toQueryValue($expand_all_content_links, null);
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
        // path params
        if ($reference_name !== null) {
            $resourcePath = str_replace(
                '{' . 'referenceName' . '}',
                ObjectSerializer::toPathValue($reference_name),
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