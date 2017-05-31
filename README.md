[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Europeana/functions?utm_source=RapidAPIGitHub_EuropeanaFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Europeana Package
Explore 53,551,004 artworks, artefacts, books, videos and sounds from across Europe.
* Domain: [Europeana](http://europeana.com)
* Credentials: apiKey

## How to get credentials: 
0. Go to [Europeana API page](http://labs.europeana.eu/api)
1. Sign up at [Registration page](http://labs.europeana.eu/api/registration)
2. Get your api key to email


## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Europeana.search
Search for records

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Europeana
| query        | String     | Request query
| qf           | String       | Request query
| reusability  | Select       | Reusability
| profile      | String     | Profile
| start        | Number     | Start
| rows         | Number     | Rows
| facet        | List       | Facet
| sort         | String     | Sort
| colourpalette| String       | Colour palette
| thumbnail    | Boolean    | Thumbnail
| media        | Boolean    | Media
| textFulltext | Boolean    | Text fulltext
| landingpage  | Boolean    | Landingpage
| cursor       | String     | Cursor
| callback     | String     | Callback

## Europeana.getSearchRecommendations
Get autocompletion recommendations for search queries

| Field   | Type   | Description
|---------|--------|----------
| query   | String | Request query
| rows    | Number | Rows
| callback| String | Callback
| phrases | Boolean| Phrases

## Europeana.translateQuery
Translate a term to different languages

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Europeana
| term         | String     | Term
| languageCodes| List       | Language codes
| callback     | String     | Callback
| profile      | String     | Profile

## Europeana.getSingleRecord
Get a single record

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Europeana
| collectionId| String     | Id of the collection
| recordId    | String     | Id of the record
| callback    | String     | Callback
| profile     | String     | Profile

## Europeana.getDatasets
Get the list of Europeana datasets

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Europeana
| callback      | String     | Callback
| edmDatasetName| String     | edm Dataset Name
| countryCode   | String     | Country code
| status        | String     | Status
| offset        | String     | Offset
| pagesize      | String     | Page size

## Europeana.getSingleDataset
Get information about a specific dataset

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Europeana
| datasetId| String     | Id of the dataset
| callback | String     | Callback

## Europeana.getDataProviders
Get the list of Europeana data providers

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Europeana
| callback   | String     | Callback
| countryCode| String     | Country code
| status     | String     | Status
| offset     | String     | Offset
| pagesize   | String     | Page size

## Europeana.getSingleProvider
Get information about a specific data provider

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key obtained from Europeana
| providerId| String     | Id of the data provider
| callback  | String     | Callback

## Europeana.getSingleProviderDatasets
Get the list of datasets provided by a specific provider

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key obtained from Europeana
| providerId| String     | Id of the data provider
| callback  | String     | Callback

