<?php
class LessonController
{
    public function save($id){
        $date = $_GET["date"] ?? null;
        $startTime = $_GET["startTime"] ?? null;
        $endTime = $_GET["endTime"] ?? null;
        $grades_id = $_GET["grades_id"] ?? null;
        // TODO:récup la description
        $description = "test";
        $is_hp = 0;
        if($date != null and $startTime != null and $endTime != null and $grades_id != null){
            bdd_request('INSERT INTO lessons (modules_id, description, is_hp, date_start, date_end, grades_id) VALUES (?,?,?,?,?,?);',[$id,$description,$is_hp,$date.' '.$startTime,$date.' '.$endTime,$grades_id]);
        }
    }

    public function delete($id)
    {
      bdd_request('DELETE FROM lessons WHERE id = ?;',[$id]);
    }

}
