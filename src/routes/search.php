<?php
$app->post('/api/Europeana/search', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'query']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "v2/search.json";
    $body = array();
    $body['wskey'] = $post_data['args']['apiKey'];

    $body['query'] = $post_data['args']['query'];

    if (isset($post_data['args']['qf']) && strlen($post_data['args']['qf']) > 0) {
        $body['qf'] = $post_data['args']['qf'];
    }
    if (isset($post_data['args']['reusability']) && count($post_data['args']['reusability']) > 0) {
        $body['reusability'] = $post_data['args']['reusability'];
    }
    if (isset($post_data['args']['profile']) && strlen($post_data['args']['profile']) > 0) {
        $body['profile'] = $post_data['args']['profile'];
    }
    if (isset($post_data['args']['start']) && strlen($post_data['args']['start']) > 0) {
        $body['start'] = $post_data['args']['start'];
    }
    if (isset($post_data['args']['rows']) && strlen($post_data['args']['rows']) > 0) {
        $body['rows'] = $post_data['args']['rows'];
    }
    if (isset($post_data['args']['facet']) && count($post_data['args']['facet']) > 0) {
        $body['facet'] = $post_data['args']['facet'];
    }
    if (isset($post_data['args']['sort']) && strlen($post_data['args']['sort']) > 0) {
        $body['sort'] = $post_data['args']['sort'];
    }
    if (isset($post_data['args']['colourpalette']) && strlen($post_data['args']['colourpalette']) > 0) {
        $body['colourpalette'] = $post_data['args']['colourpalette'];
    }
    if (isset($post_data['args']['thumbnail']) && strlen($post_data['args']['thumbnail']) > 0) {
        $body['thumbnail'] = $post_data['args']['thumbnail'];
    }
    if (isset($post_data['args']['media']) && strlen($post_data['args']['media']) > 0) {
        $body['media'] = $post_data['args']['media'];
    }
    if (isset($post_data['args']['textFulltext']) && strlen($post_data['args']['textFulltext']) > 0) {
        $body['text_fulltext'] = $post_data['args']['textFulltext'];
    }
    if (isset($post_data['args']['landingpage']) && strlen($post_data['args']['landingpage']) > 0) {
        $body['landingpage'] = $post_data['args']['landingpage'];
    }
    if (isset($post_data['args']['cursor']) && strlen($post_data['args']['cursor']) > 0) {
        $body['cursor'] = $post_data['args']['cursor'];
    }
    if (isset($post_data['args']['callback']) && strlen($post_data['args']['callback']) > 0) {
        $body['callback'] = $post_data['args']['callback'];
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