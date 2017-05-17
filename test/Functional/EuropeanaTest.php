<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class EuropeanaTest extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'getSingleProviderDatasets',
            'getSingleProvider',
            'getDataProviders',
            'getSingleDataset',
            'getDatasets',
            'getSingleRecord',
            'translateQuery',
            'getSearchRecommendations',
            'search'

        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Europeana/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}
