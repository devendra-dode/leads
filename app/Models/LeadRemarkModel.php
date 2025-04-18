<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadRemarkModel extends Model {

    protected $table = 'tbl_leads_remarks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['lead_id', 'remark', 'created_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        return $data;
    }

    protected function beforeUpdate(array $data) {
        return $data;
    }


}
