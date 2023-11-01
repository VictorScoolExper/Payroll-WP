<?php
// Payroll WP by Victor Martinez

function pr_wp_activate_plugin()
{
    if (version_compare(get_bloginfo('version'), '6.0', '<')) {
        wp_die(
            __('You must updated WordPress to use this plugin', 'payroll-wp')
        );
    }

    // TODO: ADD POST TYPES

    // flush current rules and creates new custom post types
    flush_rewrite_rules();

    // create wordpress database object
    global $wpdb;
    $charsetCollate = $wpdb->get_charset_collate();

    // $employeeTableName = "{$wpdb -> prefix}employees";
    // $sqlEmployees = "
    //     CREATE TABLE {$employeeTableName} (
    //         employee_id INT AUTO_INCREMENT PRIMARY KEY,
    //         employee_name VARCHAR(50) NOT NULL,
    //         employee_last_name VARCHAR(50) NOT NULL,
    //         cellphone VARCHAR(13) NOT NULL,
    //         hourly_wage DECIMAL(10,2) NOT NULL,
    //         job_title VARCHAR(100),
    //         hire_date DATE,
    //         created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    //         updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //     ) ENGINE='InnoDB' {$charsetCollate};
    // ";

    // $crewTableName = "{$wpdb -> prefix}crews";
    // $sqlCrews = "
    //     CREATE TABLE {$crewTableName} (
    //         crew_id INT AUTO_INCREMENT PRIMARY KEY,
    //         crew_name VARCHAR(100) NOT NULL,
    //         crew_leader INT,
    //         description TEXT,
    //         created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    //         updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //     ) ENGINE='InnoDB' {$charsetCollate};
    // ";

    // $crewEmployeesTableName = "{$wpdb -> prefix}crews_employees";
    // $sqlCrewEmployees = "
    //     CREATE TABLE crew_employees (
    //         crew_employee_id INT AUTO_INCREMENT PRIMARY KEY,
    //         crew_id INT,
    //         employee_id INT,
    //         created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    //         updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //         CONSTRAINT fk_crew_employees_crews FOREIGN KEY (crew_id) REFERENCES crews(crew_id) ON DELETE SET NULL,
    //         CONSTRAINT fk_crew_employees_employees FOREIGN KEY (employee_id) REFERENCES employees(employee_id) ON DELETE SET NULL
    //     ) ENGINE='InnoDB' {$charsetCollate};
    // ";

    // $timesheetTableName = "{$wpdb -> prefix}timesheets";
    // $sqlTimesheet = "
    //     CREATE TABLE {$timesheetTableName} (
    //         timesheet_id INT AUTO_INCREMENT PRIMARY KEY,
    //         employee_id INT,
    //         work_date DATE,
    //         hours_worked INT,
    //         status ENUM('unverified', 'verified', 'paid'),
    //         created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    //         updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //         CONSTRAINT fk_timesheets_employees FOREIGN KEY (employee_id) REFERENCES employees(employee_id) ON DELETE SET NULL
    //     ) ENGINE='InnoDB' {$charsetCollate};
    // ";

    // $payrollTableName = "{$wpdb -> prefix}payroll";
    // $sqlPayroll = "
    //     CREATE TABLE payroll (
    //         payroll_id INT AUTO_INCREMENT PRIMARY KEY,
    //         employee_id INT,
    //         week_start DATE NOT NULL,
    //         week_end DATE NOT NULL,
    //         total_hours INT NOT NULL,
    //         gross_pay DECIMAL(10,2) NOT NULL,
    //         created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    //         updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //         CONSTRAINT fk_payroll_employees FOREIGN KEY (employee_id) REFERENCES employees(employee_id) ON DELETE SET NULL
    //     ) ENGINE='InnoDB' {$charsetCollate};
    // ";

    // // essential functions for upgrading and maintaining the database schema of WordPress, during activation.
    require_once(ABSPATH . "/wp-admin/includes/upgrade.php");

    // // execute sql statements
    // dbDelta( $sqlEmployees );
    // dbDelta( $sqlCrews );
    // dbDelta( $sqlCrewEmployees );
    // dbDelta( $sqlTimesheet );
    // dbDelta( $sqlPayroll );
};

