<?php
$app->post('/api/Europeana/getDatasets', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "v2/datasets.json";
    $body = array();
    $body['wskey'] = $post_data['args']['apiKey'];

    if (isset($post_data['args']['edmDatasetName']) && strlen($post_data['args']['edmDatasetName']) > 0) {
        $body['edmDatasetName'] = $post_data['args']['edmDatasetName'];
    }
    if (isset($post_data['args']['callback']) && strlen($post_data['args']['callback']) > 0) {
        $body['callback'] = $post_data['args']['callback'];
    }
    if (isset($post_data['args']['countryCode']) && strlen($post_data['args']['countryCode']) > 0) {
        $body['countryCode'] = $post_data['args']['countryCode'];
    }
    if (isset($post_data['args']['status']) && strlen($post_data['args']['status']) > 0) {
        $body['status'] = $post_data['args']['status'];
    }
    if (isset($post_data['args']['offset']) && strlen($post_data['args']['offset']) > 0) {
        $body['offset'] = $post_data['args']['offset'];
    }
    if (isset($post_data['args']['pagesize']) && strlen($post_data['args']['pagesize']) > 0) {
        $body['pagesize'] = $post_data['args']['pagesize'];
    }

    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('GET', $query_str, [
            'query' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        $success = $rawBody->success;

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200' && $success) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});