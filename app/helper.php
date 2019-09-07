<?php

function uppercase($string){
	return strtoupper($string);
}

// this function replace permission array "on" parameter with "true"
function permissions_filter(array $permission)
{
	foreach ($permission as $key => $value) {
		$permissions  = str_replace($value, 'true', $permission);
	}

	return json_encode($permissions);
}
// this function  all permission names
function permission_name($permission){
	$permission = json_decode($permission);
	$permission = collect($permission);
	$name = array();
	foreach ($permission as $key => $value) {
	$name[] = $key;
 	}

 	return $name;
}

// this function return user role id please check user edit form..!!!
function role_name($user)
{
	$ids = array_pluck($user->role,'id');
	return $ids;
}

function check_class($check)
{
	if($check == 1)
	{
		$class = 'success';
	
	}
	else
	{
		$class = 'danger';
	
	}

	return $class;
}

function check_status($check)
{
	if($check == 1)
	{
		
		$status = 'Active';
	}
	else
	{
	
		$status = 'In-Active';
	}

	return $status;
}

function post_status($check)
{
	$status = '';
	$class = '';

	if($check == 'active')
	{
		$status = 'active';
		$class = 'success';
	}
	else if($check == 'pending')
	{
		$status = 'pending';
		$class = 'info';
	}
	else if($check == 'disabled')
	{
		$status = 'disabled';
		$class = 'danger';
	}

	return ['status' => $status,'class'=>$class];
}

function post_approved($check)
{
	if($check == 1)
	{
		$status = 'Approved';
		$class = 'success';
	}
	else
	{
		$status = 'Pending';
		$class = 'danger';
	}

	return ['status' => $status,'class' => $class];
}


