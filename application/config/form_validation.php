<?php

$config = array(
    'project' => array(
        array(
            'field' => 'name',
            'label' => 'Project Name',
            'rules' => 'required|is_unique[projects.name]'
        ),
        array(
            'field' => 'project_type_id',
            'label' => 'Project Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'estimated_days',
            'label' => 'Estimate Days',
            'rules' => 'required'
        ),
        array(
            'field' => 'category_id',
            'label' => 'category_id',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'priority',
            'label' => 'priority',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'project_manager',
            'label' => 'project_manager',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'quick_notes',
            'label' => 'quick_notes',
            'rules' => 'trim'
        ),
    ),
    
    'similar_project' => array(
        array(
            'field' => 'name',
            'label' => 'Project Name',
            'rules' => 'required|is_unique[projects.name]'
        ),
        array(
            'field' => 'quick_notes',
            'label' => 'quick_notes',
            'rules' => 'trim'
        ),
    ),

    'faq' => array(
        array(
            'field' => 'heading',
            'label' => 'Heading',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
    ),
    'category' => array(
        array(
            'field' => 'name',
            'label' => 'Category',
            'rules' => 'required'
        ),
    ),
    'action_plan' => array(
        array(
            'field' => 'action',
            'label' => 'Action',
            'rules' => 'required'
        ),
        array(
            'field' => 'complete_level',
            'label' => 'Complete Level',
            'rules' => 'numeric'
        ),
        
    ),
    'type' => array(
        array(
            'field' => 'type',
            'label' => 'Type',
            'rules' => 'required'
        ),
    ),
    'timesheet' => array(
        array(
            'field' => 'dates',
            'label' => 'Dates',
            'rules' => 'required'
        ),
        array(
            'field' => 'total_time',
            'label' => 'Total time',
            'rules' => 'numeric'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ),
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'password'
        ),
    ),
    'user' => array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required|is_unique[users.username]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|matches[password_confirm]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[users.email]'
        ),
        array(
            'field' => 'password_confirm',
            'label' => 'Password Confirm',
            'rules' => 'required'
        ),
        array(
            'field' => 'role',
            'label' => 'role',
            'rules' => 'trim'
        ),
        array(
            'field' => 'department',
            'label' => 'department',
            'rules' => 'trim'
        ),
        array(
            'field' => 'language',
            'label' => 'language',
            'rules' => 'trim'
        ),
        
    ),
    'edit_user' => array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
    ),
    'store' => array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required'
        ),
        array(
            'field' => 'fax',
            'label' => 'Fax',
            'rules' => 'numeric'
        ),
        array(
            'field' => 'address',
            'label' => 'address',
            'rules' => 'trim'
        ),
        array(
            'field' => 'contact',
            'label' => 'Contact',
            'rules' => 'trim'
        ),
        array(
            'field' => 'telephone',
            'label' => 'telephone',
            'rules' => 'trim'
        ),
    ),
    'news' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'description',
            'rules' => 'required'
        ),
        array(
            'field' => 'client_visibility',
            'label' => 'client_visibility',
            'rules' => 'trim'
        ),
    ),
    'edit_news' => array(
        array(
            'field' => 'client_visibility',
            'label' => 'Visibility',
            'rules' => 'required'
        ),
    ),
    'quality' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'product',
            'label' => 'Product',
            'rules' => 'required'
        ),
        array(
            'field' => 'problem_type',
            'label' => 'Problem Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'store',
            'label' => 'Store',
            'rules' => 'required'
        ),
        array(
            'field' => 'qty_in_store',
            'label' => 'Qty In Store',
            'rules' => 'required|integer'
        ),
        array(
            'field' => 'qty_defect',
            'label' => 'Qty Defect',
            'rules' => 'required|integer'
        ),
        array(
            'field' => 'description',
            'label' => 'description',
            'rules' => 'trim'
        ),
        array(
            'field' => 'title',
            'label' => 'title',
            'rules' => 'trim'
        ),
        array(
            'field' => 'ds',
            'label' => 'ds',
            'rules' => 'trim|integer'
        ),
        array(
            'field' => 'contact_info',
            'label' => 'contact_info',
            'rules' => 'trim'
        ),
    ),
    'suggestion' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'store',
            'label' => 'Store',
            'rules' => 'required'
        ),
        array(
            'field' => 'product',
            'label' => 'Product',
            'rules' => 'required'
        ),
        array(
            'field' => 'suggestion_type',
            'label' => 'Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'subject',
            'label' => 'subject',
            'rules' => 'trim'
        ),
        array(
            'field' => 'description',
            'label' => 'description',
            'rules' => 'trim'
        ),
        array(
            'field' => 'contact_info',
            'label' => 'contact_info',
            'rules' => 'trim'
        ),
    ),
    'edit_suggestion' => array(
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required'
        ),
    ),
    'client_user' => array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|matches[password_confirm]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[client_user.email]'
        ),
        array(
            'field' => 'password_confirm',
            'label' => 'Password Confirm',
            'rules' => 'required'
        ),
        array(
            'field' => 'store',
            'label' => 'Store',
            'rules' => 'required'
        ),
    ),
    'edit_client_user' => array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'store',
            'label' => 'Store',
            'rules' => 'required'
        ),
    ),
    'admin_quality' => array(
        array(
            'field' => 'status',
            'label' => 'status',
            'rules' => 'required'
        ),
    ),
);
?>