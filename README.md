# Agility Content Fetch PHP SDK
This is the PHP library for accessing live and preview content from your [Agility CMS](https://agilitycms.com) instance.


Don't have an Agility CMS instance? Sign up for a [Free Trial](https://agilitycms.com/free) today!

## Features
- Queries the high-availability, CDN backed Agility Fetch REST API
- Get a sitemap for a given channel
- Get a page, including its content zones, modules, and their content
- Get a content item
- Query a content list using a filter syntax
- Get the details of a media gallery
- Keep track of syncing content to your app
- Optional in-memory caching

## Getting Started
In order to use this sdk, you'll need to install the composer package and you'll also need to authenticate your requests.

### Prerequisites
You must have access to an Agility instance to retrieve the *guid* and generate your *apiKey*. Or, you must have these values provided to you.

### Installation
Install it using **composer** (recommended):
```
composer require agility/fetch
```

## Contributing
If you would like to contribute to this SDK, you can fork the repository and submit a pull request. We'd love to include your updates.
