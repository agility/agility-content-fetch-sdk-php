# SwaggerClient-php
Agility CMS REST API for retrieving content from the Agility CMS.  The API Types are fetch (for published content) and preview (for latest, or staging content).

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: v1
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen
For more information, please visit [https://help.agilitycms.com](https://help.agilitycms.com)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: APIKeyAuthorization
$config = Agility\Client\Configuration::getDefaultConfiguration()->setApiKey('APIKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Agility\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('APIKey', 'Bearer');

$apiInstance = new Agility\Client\Api\ContentModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$guid = "guid_example"; // string |
$apitype = new \Agility\Client\Model\APIType(); // \Agility\Client\Model\APIType |

try {
    $result = $apiInstance->guidApitypeContentmodelsGet($guid, $apitype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentModelsApi->guidApitypeContentmodelsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to */*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ContentModelsApi* | [**guidApitypeContentmodelsGet**](docs/Api/ContentModelsApi.md#guidapitypecontentmodelsget) | **GET** /{guid}/{apitype}/contentmodels | Returns content models for the Agility instance.
*GalleryApi* | [**guidApitypeGalleryIdGet**](docs/Api/GalleryApi.md#guidapitypegalleryidget) | **GET** /{guid}/{apitype}/gallery/{id} | Gets the gallery by ID.
*ItemApi* | [**getContentItem**](docs/Api/ItemApi.md#getContentItem) | **GET** /{guid}/{apitype}/{locale}/item/{id} | Gets the details of a content item by ther Content ID.
*ListApi* | [**getContentList**](docs/Api/ListApi.md#getContentList) | **GET** /{guid}/{apitype}/{locale}/list/{referenceName} | Retrieves a list of content items by reference name.
*PageApi* | [**getPage**](docs/Api/PageApi.md#getPage) | **GET** /{guid}/{apitype}/{locale}/page/{id} | Gets the details of a page by its Page ID.
*SitemapApi* | [**getSitemapFlat**](docs/Api/SitemapApi.md#getSitemapFlat) | **GET** /{guid}/{apitype}/{locale}/sitemap/flat/{channelName} | Gets the sitemap, returned in a flat list, where the dictionary key is the page path. This method is ideal for page routing.
*SitemapApi* | [**guidApitypeLocaleSitemapNestedChannelNameGet**](docs/Api/SitemapApi.md#guidapitypelocalesitemapnestedchannelnameget) | **GET** /{guid}/{apitype}/{locale}/sitemap/nested/{channelName} | Gets the sitemap as an array in a nested format, ideal for generating menus.
*SyncApi* | [**guidApitypeLocaleSyncItemsGet**](docs/Api/SyncApi.md#guidapitypelocalesyncitemsget) | **GET** /{guid}/{apitype}/{locale}/sync/items | Retrieves all content items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
*SyncApi* | [**guidApitypeLocaleSyncPagesGet**](docs/Api/SyncApi.md#guidapitypelocalesyncpagesget) | **GET** /{guid}/{apitype}/{locale}/sync/pages | Retrieves all pages items in a paged format.  Each call returns a sync token that should be persisted and passed into subsequent requests to maintain sync state.
*UrlRedirectionApi* | [**guidApitypeUrlredirectionGet**](docs/Api/UrlRedirectionApi.md#guidapitypeurlredirectionget) | **GET** /{guid}/{apitype}/urlredirection | Gets the list of all URL Redirections since a particular date/time. Persist the lastAccessDate that is returned and use that value to maintain state on subsequent requests.

## Documentation For Models

 - [APIType](docs/Model/APIType.md)
 - [AgilityDefinition](docs/Model/AgilityDefinition.md)
 - [AgilityField](docs/Model/AgilityField.md)
 - [AgilityFieldType](docs/Model/AgilityFieldType.md)
 - [EmptyResult](docs/Model/EmptyResult.md)
 - [HeadlessContentItem](docs/Model/HeadlessContentItem.md)
 - [HeadlessContentItemHeadlessSync](docs/Model/HeadlessContentItemHeadlessSync.md)
 - [HeadlessContentItemProperties](docs/Model/HeadlessContentItemProperties.md)
 - [HeadlessContentItemSeo](docs/Model/HeadlessContentItemSeo.md)
 - [HeadlessContentListResponse](docs/Model/HeadlessContentListResponse.md)
 - [HeadlessContentPage](docs/Model/HeadlessContentPage.md)
 - [HeadlessContentPageHeadlessSync](docs/Model/HeadlessContentPageHeadlessSync.md)
 - [HeadlessContentPageVisibility](docs/Model/HeadlessContentPageVisibility.md)
 - [HeadlessContentScripts](docs/Model/HeadlessContentScripts.md)
 - [HeadlessContentSiteMapItem](docs/Model/HeadlessContentSiteMapItem.md)
 - [HeadlessContentSiteMapNestedItem](docs/Model/HeadlessContentSiteMapNestedItem.md)
 - [HeadlessContentZone](docs/Model/HeadlessContentZone.md)
 - [HeadlessGallery](docs/Model/HeadlessGallery.md)
 - [HeadlessMediaItem](docs/Model/HeadlessMediaItem.md)
 - [NotFoundResult](docs/Model/NotFoundResult.md)
 - [RedirectUrl](docs/Model/RedirectUrl.md)
 - [UrlRedirection](docs/Model/UrlRedirection.md)

## Documentation For Authorization


## APIKeyAuthorization

- **Type**: API key
- **API key parameter name**: APIKey
- **Location**: HTTP header


## Author


