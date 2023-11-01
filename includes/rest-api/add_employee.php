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
    

    // prevent user from entering improper values
    $employee_name = sanitize_text_field( $params['employee_name'] );
    $employee_last_name = sanitize_text_field( $params['employee_last_name'] );
    $cellphone = absint( $params['cellphone'] );
    $hourly_wage = sanitize_text_field( $params['hourly_wage'] );
    $job_title = sanitize_text_field( $params['job_title'] );
    $hire_date = date( $params['hire_date'] );

    // wordpress sql object
    global $wpdb;

    //prevent sql injection
    $wpdb -> prepare(
        "
            INSERT INTO {$wpdb->prefix}employees (employee_name, employee_last_name, cellphone, hourly_wage, job_title, hire_date)
            values (%s, %s, %d, %f, %s, %s)
        "
    );
}