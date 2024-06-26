<?php defined('BASEPATH') or exit('No direct script access allowed');


class Cmt_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllComments()
    {

        $q = $this->db->get("notifications");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getNotifications()
    {
        $date = date('Y-m-d H:i:s', time());
        $this->db->where("from_date <=", $date);
        $this->db->where("till_date >=", $date);
        if (!$this->Owner) {
            if ($this->Supplier) {
                $this->db->where('scope', 4);
            } elseif ($this->Customer) {
                $this->db->where('scope', 1)->or_where('scope', 3);
            } elseif (!$this->Customer && !$this->Supplier) {
                $this->db->where('scope', 2)->or_where('scope', 3);
            }
        }
        $q = $this->db->get("notifications");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getCommentByID($id)
    {

        $q = $this->db->get_where("notifications", array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;
    }
    public function getBranchPermittedCommentByID($id)
    {

        $q = $this->db->get_where("branch_notifications", array('notification_id' => $id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row->branch_id;
            }

            return $data;
        }

        return FALSE;
    }
    public function getAllBranches()
    {
        $this->db->select('id, name');

        $q = $this->db->get('branches');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function updatePermissions($id, $checked_branches)
    {
        $id = intval($id);
        $data = [];
        foreach ($checked_branches as $branch_id) {
            $data[] = array(
                'notification_id' => $id,
                'branch_id' => $branch_id
            );
        }
        $this->db->where('notification_id', $id);
        $this->db->delete('sma_branch_notifications');
        if (!empty($data)) {
           
            if ($this->db->insert_batch('sma_branch_notifications', $data)) {
                return true;
            }
        }
        return false;
    }





    public function addNotification($data)
    {

        if ($this->db->insert("notifications", $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateNotification($id, $data)
    {

        $this->db->where('id', $id);
        if ($this->db->update("notifications", $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteComment($id)
    {
        if ($this->db->delete("notifications", array('id' => $id))) {
            return true;
        }
        return FALSE;
    }
}

/* End of file pts_model.php */
/* Location: ./application/models/pts_types_model.php */
