#IUCN API Client

A PHP client to retrieve data from [The IUCN Red List of Threatened Species™](http://www.iucnredlist.org/).
It currently supports the version 3 of the API as described in the [API reference](http://apiv3.iucnredlist.org/api/v3/docs).  

### Disclaimer

This project is not supported or endorsed in any manner by the IUCN.

### Requirements

The client is written in PHP 7.2 and requires *curl* and *json* extensions.

An API key (token) is required to authenticate yourself and be able to use the IUCN API. To obtain an API key, please use the
[application form](http://apiv3.iucnredlist.org/api/v3/token) and submit your request to the IUCN.

### Getting started

Create an instance of the client and pass it your API key as a parameter.

````php
<?php
use KatTheWaffle\IucnApi\Client;

$client = new Client('<your-api-key>');
echo $client->getVersion(); // Display the current IUCN Red List version.
````

### Documentation

Documentation can be generated using PhpDocumentor.