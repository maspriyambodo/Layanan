<?php
function get_business_unit_info($id_bu) {
    return get_field_value("m_business_unit", "*", "id_business_unit", $id_bu, false);    
}

function get_region_info($id_region) {
    return get_field_value("m_region", "*", "id_region", $id_region, false);
}

function get_field_value($tbl, $field, $whtField, $whrValue, $onlyField = true) {
    $ci = &get_instance();
    $ci->db->where($whtField, $whrValue);
    if($onlyField) {
        $ci->db->select($whtField, FALSE);
    }
    $query = $ci->db->get($tbl);
    $result = $query->result();
    $cols = $query->list_fields();

    if(!array_key_exists($field, $cols) && $onlyField) {
        return "";
    }

    $data = array();
    if(count($cols) > 0) {
        foreach($cols as $c) {
            $data[$c] = "";
        }
    }
    $data = (object)$data;
    if($query->num_rows()>0) {
        $data = $result[0];
    }

    if($onlyField) {
        return $data->$field;
    }

    return $data;
}

function get_region_filter($id_region) {
    $ci = &get_instance();
    $res = "";
    $del = "";

    if($id_region!="" && $id_region > 0) {
        $whr = "id_parent = ". $ci->db->escape($id_region) . " or id = " . $ci->db->escape($id_region);
        $ci->db->where($whr);
        $que = $ci->db->get("m_wilayah");
        foreach($que->result() as $r) {
            $res .= $del . $r->id;
            $del = ",";
        }
    }

    return $res;
}

function get_area_by_region($id_region) {
    $ci = &get_instance();
    $res = array();

    if($id_region!="" && $id_region > 0) {
        $whr = "id = " . $ci->db->escape($id_region);
        $ci->db->where($whr);
        $que = $ci->db->get("m_wilayah");
        $dt = $que->row();
        if($dt) {
            $res = array(
                "provinsi" => $dt->id_provinsi,
                "kabupaten" => $dt->id_kabupaten,
                "kecamatan" => $dt->id_kecamatan,
            );
        }
    }

    return $res;
}
?>