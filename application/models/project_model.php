
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
    }

    public function add_multiple_attachemnt($data) {

        $id = $this->db->insert_batch('project_attachments', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function add_timesheet_attachemnt($data) {

        $id = $this->db->insert('timesheet_attachments', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
        //return $id;
    }

    public function get_action_plan($id = 0) {
        $this->db->select('users.username as resposible ,project_actionplan.*');
        $this->db->from('project_actionplan');
        $this->db->join('users', 'users.id = project_actionplan.resposible_id');
        $this->db->where(array('project_actionplan.project_id' => $id));
        $query = $this->db->get();
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

        $query = $this->db->get_where('projects', array('project_type_id' => $project_type_id, 'status' => 'active'));
        return $query->result();
    }

    public function get_all_archieve_project() {
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
        $query = $this->db->get_where('projects', array('projects.project_type_id' => $project_type_id, 'projects.status' => 'active'));
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
        $type_ids = array('2');
        $this->db->where('user_type', '2');
        $this->db->where('is_deleted', '0');
        $query = $this->db->get_where('users');
        $res = $query->result();
        return $res;
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

    public function action_plan_user() {
        $this->db->select('id,username');
        $this->db->from('users');
        $this->db->where(array('user_group_id !=' => '1', 'is_deleted' => '0'));
        $query = $this->db->get();
        //p($this->db->last_query());
        return $query->result_array();
    }

    public function get_timesheet_data($id = 0) {
        $query = $this->db->get_where('project_timesheet', array('id' => $id));
        return $query->row_array();
    }

    public function update_records($id = 0) {

        $category_id = (int) $this->input->post('category_id');
        $estimated_days = (int) $this->input->post('estimated_days');
        $priority = $this->input->post('priority');
        $project_manager = $this->input->post('project_manager');
        $quick_notes = $this->input->post('quick_notes');
        $quick_notes = htmlentities($quick_notes);

        $query_type = $this->db->get_where('projects', array('id' => $id));
        $project = $query_type->row_array();
        $project_type_id = $project['project_type_id'];

        $project_name = $this->input->post('name');

        if ($project_type_id == 2) {

            $data = array(
                'priority' => $priority,
                'quick_notes' => $quick_notes,
            );
        } else {
            if ($project_name != $project['name']) {
                $res_proj_res = $this->products_model->getfrom('projects', false, array('where' => array('name' => $project_name)));
                if (!empty($res_proj_res)) {
                    $this->session->set_flashdata('unique_project', 'The Project Name field must contain a unique value.');
                    redirect('project/edit/' . $id);
                }
            }
            $data = array(
                'name' => $project_name,
                'project_type_id' => $this->input->post('project_type_id'),
                'category_id' => $category_id,
                'estimated_days' => $estimated_days,
                'priority' => $priority,
                'project_manager' => $project_manager,
                'quick_notes' => $quick_notes,
            );
        }
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

    public function update_action_plan($id = 0, $data) {
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
        $this->delete_records_by_project_id($id);
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    public function delete_records_by_project_id($id) {
        $tables = array('project_actionplan', 'project_attachments', 'project_external_notes', 'project_notes',
            'project_suppliers', 'project_timesheet');
        foreach ($tables as $table) {
            $this->db->where('project_id', $id);
            $q = $this->db->get($table);
            if ($q->num_rows() > 0) {
                $this->db->where('project_id', $id);
                $this->db->delete($table);
            }
        }
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

    // ------------------------------------------------------------------------
    // All Notification Queries
    // ------------------------------------------------------------------------

    public function add_notification($data) {
        $this->db->insert('notifications', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

}
?>

