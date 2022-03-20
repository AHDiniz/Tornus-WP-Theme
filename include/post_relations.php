<?php

require_once WP_CONTENT_DIR . '/plugins/tour-route-plugin/src/data_persistance/route_relationship.php';

use TourRoute\RouteRelationship;

function TornusAddActivityToRoute($route_id, $activity_id)
{
    RouteRelationship::Insert($route_id, $activity_id);
}

function TornusDeleteActivityFromRoute($route_id, $activity_id)
{
    RouteRelationship::Delete($route_id, $activity_id);
}

function TornusGetActivitiesInRoute($route_id)
{
    $activities = array();

    $results = RouteRelationship::GetActivitiesInRoute($route_id);

    foreach ($results as $result)
    {
        array_push($activities, get_post($result->activity_id));
    }

    return $activities;
}

?>