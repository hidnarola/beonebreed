
<?php

class Project_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    }

    public function add_records($data) {

        $this->db->insert('projects', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function add_notes_records($data) {

        $this->db->insert('project_notes', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function add_action_plan($data) {

        $id = $this->db->insert('project_actionplan', $data);
        return $id;
    }

    public function add_timesheet($data) {
        $id = $this->db->insert('project_timesheet', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function add_external_link($data) {

        $id = $this->db->insert('project_external_notes', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function add_attachemnt($data) {

        $id = $this->db->insert('project_attachments', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
        //return $id;
    }

    public function add_timesheet_attachemnt($data) {

        $id = $this->db->insert('timesheet_attachments', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
        //return $id;
    }

    public function get_action_plan($id = 0) {

        $query = $this->db->get_where('project_actionplan', array('project_id' => $id));
        return $query->result();
    }

    public function get_project_attachment($id = 0) {
        $query = $this->db->get_where('project_attachments', array('project_id' => $id));
        return $query->result();
    }

    public function get_project_attachment_by_image($id) {
        $query = $this->db->get_where('project_attachments', array('project_id' => $id))->result_array();
        $filename = array();
            foreach ($query as $q) {
                    $path = base_url() . 'uploads/' . $q['name'];
                    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                    if (in_array($ext, array('jpg', 'png', 'gif'))) {

                        $filename[] = $q['name'];
                    }
                
            }
        return $filename;
    }

    public function get_timesheet_attachment($id = 0) {
        $query = $this->db->get_where('timesheet_attachments', array('timesheet_id' => $id));
        return $query->result();
    }

    public function get_project_notes($id = 0) {
        $query = $this->db->get_where('project_notes', array('project_id' => $id));
        return $query->result();
    }

    public function get_project_external_link($id = 0) {
        $query = $this->db->get_where('project_external_notes', array('project_id' => $id));
        return $query->result();
    }

    public function get_timesheet($id = 0) {

        $query = $this->db->get_where('project_timesheet', array('project_id' => $id));
        return $query->result();
    }

    public function get_all_inprogress_project() {

        //get inprogress project id
        $user_id = $this->session->userdata('id');
        $query_type = $this->db->get_where('project_types', array('type' => 'inprogress'));
        $project_type = $query_type->row_array();
        $project_type_id = $project_type['id'];

        $query = $this->db->get_where('projects', array('project_type_id' => $project_type_id, 'status' => 'active', 'created_by' => $user_id));
        return $query->result();
    }

    public function get_all_archieve_project() {

        //get archieve project.

        $query = $this->db->get_where('projects', array('status' => 'archieve'));
        return $query->result();
    }

    public function get_all_idea_project() {

        //get idea project id
        $user_id = $this->session->userdata('id');
        $query_type = $this->db->get_where('project_types', array('type' => 'idea'));
        $project_type = $query_type->row_array();
        $project_type_id = $project_type['id'];

        $this->db->select('projects.*,projects.id as pid,projects.created_date as p_created_at,users.*');
        $this->db->join('users', 'users.id = projects.created_by', 'right');
        $query = $this->db->get_where('projects', array('projects.project_type_id' => $project_type_id, 'projects.status' => 'active', 'projects.created_by' => $user_id));
        $d = $query->result();
        return $d;
    }

    //get project types

    public function get_all_types() {
        $query = $this->db->get('project_types');
        return $query->result();
    }

    //get department

    public function get_caregory() {
        $query = $this->db->get('categories');
        return $query->result();
    }

    //get project manager

    public function get_project_manager() {
        $type_ids = array('2', '4');
        $this->db->where_in('user_type', $type_ids);
        $query = $this->db->get_where('users');
        return $query->result();
    }

    public function get($id = 0) {
        $query = $this->db->get_where('projects', array('id' => $id));
        return $query->row_array();
    }

    public function get_project_id($id = 0) {
        $this->db->select('project_id');
        $query = $this->db->get_where('project_timesheet', array('id' => $id));
        return $query->row_array();
    }

    public function get_username() {
        $this->db->select('username');
        $query = $this->db->get_where('users');
        return $query->result();
    }

    public function get_action_plan_data($id = 0) {
        $query = $this->db->get_where('project_actionplan', array('id' => $id));
        return $query->row_array();
    }

    public function get_timesheet_data($id = 0) {
        $query = $this->db->get_where('project_timesheet', array('id' => $id));
        return $query->row_array();
    }

    public function update_records($id = 0) {
        if ($this->input->post('category_id') == '') {

            $category_id = 0;
        } else {

            $category_id = $this->input->post('category_id');
        }

        if ($this->input->post('estimated_days') == '') {

            $estimated_days = 0;
        } else {

            $estimated_days = $this->input->post('estimated_days');
        }
        if ($this->input->post('priority') == '') {

            $priority = 0;
        } else {

            $priority = $this->input->post('priority');
        }
        if ($this->input->post('project_manager') == '') {

            $project_manager = '';
        } else {
            $project_manager = $this->input->post('project_manager');
        }
        if ($this->input->post('quick_notes') == '') {

            $quick_notes = '';
        } else {
            $quick_notes = $this->input->post('quick_notes');
        }

        $query_type = $this->db->get_where('projects', array('id' => $id));
        $project = $query_type->row_array();
        $project_type_id = $project['project_type_id'];

        if ($project_type_id == 2) {

            $data = array(
                'priority' => $priority,
                'quick_notes' => $quick_notes,
            );
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'project_type_id' => $this->input->post('project_type_id'),
                'category_id' => $category_id,
                'estimated_days' => $estimated_days,
                'priority' => $priority,
                'project_manager' => $project_manager,
                'quick_notes' => $quick_notes,
            );
        }
        p($data);exit;
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function update_estimate_level($id = 0) {

        $data = array(
            'complete_level' => $this->input->post('s_value'),
        );

        $this->db->where('id', $id);
        return $this->db->update('project_actionplan', $data);
    }

    public function update_project_status($id = 0) {

        $update_time = date("Y-m-d H:i:s");
        $data = array(
            'status' => 'archieve',
            'updated_date' => $update_time,
        );
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function update_action_plan($id = 0) {

        if ($this->input->post('target_date') == '') {
            $target_date = '0000-00-00 00:00:00';
        } else {
            $target_date = $this->input->post('target_date');
        }
        if ($this->input->post('notes') == '') {
            $notes = '';
        } else {
            $notes = $this->input->post('notes');
        }
        $data = array(
            'action' => $this->input->post('action'),
            'resposible' => $this->input->post('resposible'),
            'mertic_key' => $this->input->post('mertic_key'),
            'complete_level' => $this->input->post('complete_level'),
            'target_date' => $target_date,
            'notes' => $notes,
        );
        $this->db->where('id', $id);
        return $this->db->update('project_actionplan', $data);
    }

    public function update_timesheet($id = 0) {

        if ($this->input->post('total_time') != '') {
            $total_time = $this->input->post('total_time');
        } else {
            $total_time = 0;
        }
        if ($this->input->post('speciality_date') == '') {
            $speciality_date = '0000-00-00 00:00:00';
        } else {
            $speciality_date = $this->input->post('speciality_date');
        }
        $data = array(
            'username' => $this->input->post('username'),
            'total_time' => $total_time,
            'dates' => $this->input->post('dates'),
            'today_introduction' => $this->input->post('today_introduction'),
            'today_research_report' => $this->input->post('today_research_report'),
            'speciality_date' => $speciality_date,
            'speciality_username' => $this->input->post('speciality_username'),
            'speciality' => $this->input->post('speciality'),
            'company_name' => $this->input->post('company_name'),
            'subject_discussion' => $this->input->post('Subject_discussion'),
            'Contact_info' => $this->input->post('contact_info'),
        );
        $this->db->where('id', $id);
        return $this->db->update('project_timesheet', $data);
    }

    public function delete_records($id) {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    public function delete_selected_records($id) {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    public function insert_attachment($data) {
        $id = $this->db->insert('products_attachments', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    //  get_all_projects_by_id used to fetch projects rable data by id.
    /*  By Parth Viramgama pav */
    public function get_all_projects_by_id($id) {
        $query = $this->db->get_where('projects', array('id' => $id));
        return $query->result_array();
    }

    /**  get_all_actionplan_by_project_id function used to fetch data from 
      project_actionplan table by project id.
      /*  By Parth Viramgama pav */
    public function get_all_actionplan_by_projects_id($id) {
        $query = $this->db->get_where('project_actionplan', array('project_id' => $id));
        return $query->result();
    }

    /**  get_all_project_data_by_name function used to fetch data from 
      projects table by project name.
      @param  $proj_name as string
      @return  return integer
      /*  By Parth Viramgama pav */
    public function get_all_project_data_by_name($proj_name) {
        $query = $this->db->get_where('projects', array('name' => $proj_name));
        return $query->num_rows();
    }

}
?>

