       <?php
       $routes = [
       'getSingleProviderDatasets',
       'getSingleProvider',
       'getDataProviders',
       'getSingleDataset',
       'getDatasets',
       'getSingleRecord',
       'translateQuery',
       'getSearchRecommendations',
        'search',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }

