<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'employee'       => [
        'title'          => 'Employee',
        'title_singular' => 'Employee',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => 'Name',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'employee_no'        => 'Employee No',
            'employee_no_helper' => '',
        ],
    ],
    'allowance'      => [
        'title'          => 'Allowances',
        'title_singular' => 'Allowance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'year'              => 'Year',
            'year_helper'       => '',
            'month'             => 'Month',
            'month_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'employee'          => 'Employee',
            'employee_helper'   => '',
            'amount'            => 'Amount',
            'amount_helper'     => '',
        ],
    ],
    'deduction'      => [
        'title'          => 'Deductions',
        'title_singular' => 'Deduction',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'employee'          => 'Employee',
            'employee_helper'   => '',
            'year'              => 'Year',
            'year_helper'       => '',
            'month'             => 'Month',
            'month_helper'      => '',
            'amount'            => 'Amount',
            'amount_helper'     => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'advance'        => [
        'title'          => 'Advances',
        'title_singular' => 'Advance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'employee'          => 'Employee',
            'employee_helper'   => '',
            'year'              => 'Year',
            'year_helper'       => '',
            'month'             => 'Month',
            'month_helper'      => '',
            'amount'            => 'Amount',
            'amount_helper'     => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];
