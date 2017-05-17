[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Europeana/functions?utm_source=RapidAPIGitHub_EuropeanaFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Europeana Package
Europeana
* Domain: [Europeana](http://europeana.com)
* Credentials: apiKey

## How to get credentials: 
0. Go to [Europeana API page](http://labs.europeana.eu/api)
1. Sign up at [Registration page](http://labs.europeana.eu/api/registration)
2. Get your api key to email

## Europeana.search
Search for records

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Europeana
| query        | String     | Request query
| qf           | Array      | Request query
| reusability  | Array      | Reusability
| profile      | String     | Profile
| start        | Number     | Start
| rows         | Number     | Rows
| facet        | Array      | Facet
| sort         | String     | Sort
| colourpalette| Array      | Colour palette
| thumbnail    | Boolean    | Thumbnail
| media        | Boolean    | Media
| textFulltext | Boolean    | Text fulltext
| landingpage  | Boolean    | Landingpage
| cursor       | String     | Cursor
| callback     | String     | Callback

## Europeana.getSearchRecommendations
Get autocompletion recommendations for search queries

| Field   | Type  | Description
|---------|-------|----------
| query   | String| Request query
| rows    | Number| Rows
| callback| String| Callback
| phrases | Bolean| Phrases

## Europeana.translateQuery
Translate a term to different languages

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Europeana
| term         | String     | Term
| languageCodes| Array      | Language codes
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

