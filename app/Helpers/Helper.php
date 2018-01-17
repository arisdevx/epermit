<?php

use App\Models\HikingHealthDetail;
use App\Models\ActivityLogDetail;
use App\Models\Setting;
use Illuminate\Support\Facades\Cookie;

if(!function_exists('getHealthy'))
{
	function getHealthy($key, $health_id)
	{
		$healthy = HikingHealthDetail::where('hiking_health_id', $health_id)
									 ->where('name', $key)
									 ->first();

		return $healthy;
	}
}

if(!function_exists('log_access_id'))
{
	function log_access_id()
	{
		$keys    = explode(',', Cookie::get('logs_id'));

		return $keys[0];
	}
}

if(!function_exists('log_activity_id'))
{
	function log_activity_id()
	{
		$keys    = explode(',', Cookie::get('logs_id'));

		return $keys[1];
	}
}

if(!function_exists('writeLog'))
{
	function activityLog($activity)
	{
		$activityDetail                  = new ActivityLogDetail;
		$activityDetail->activity        = $activity;
		$activityDetail->activity_log_id = log_activity_id();
		$activityDetail->save();
	}
}