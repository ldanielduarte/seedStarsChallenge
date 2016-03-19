<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19-03-2016
 * Time: 14:41
 */

include_once('restRequest.php');
include_once('model/model.php');

$currentTime = date('d-m-Y h:i:s', time());

/*
 * Call Jenkins API
 */
$restRequest = new restRequest(
    'http://127.0.0.1:8080/api/',
    'xml?tree=jobs[name,color]'
);
$jenkinsApiAnswer = $restRequest->makeRequest();

/*
 * handle response
 */
if ($jenkinsApiAnswer) {
    foreach ($jenkinsApiAnswer->job as $job) {
        $dbJobs[] = array(
            'job_name' => (string) $job->name,
            'status' => (string) $job->color
        );
    }

    if (isset($dbJobs)) {
        $db = new model();
        $db->insertIntoJob($dbJobs, $currentTime);
    }
}