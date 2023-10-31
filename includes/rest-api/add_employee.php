<?php 
// Payroll WP by Victor Martinez

function pr_wp_rest_api_add_employee($request) {
    // associative arrays
    $response = ['status' => 'failed', 'message' => 'Something went wrong'];

    // retrieve JSON data from the $request object
    $params = $request->get_json_params();

    // check if params are set
    if(
        !isset(
            $params['employee_name'], 
            $params['employee_last_name'], 
            $params['cellphone'], 
            $params['hourly_wage'],
            $params['job_title'],
            $params['hire_date']
        ) ||
        empty($params['employee_name']) || 
        empty($params['employee_last_name']) || 
        empty($params['cellphone']) || 
        empty($params['hourly_wage']) ||
        empty($params['job_title']) ||
        empty($params['hire_date'])
    ){
        $response['message'] = "parameters are missing";
        return $response;
    }
    
}