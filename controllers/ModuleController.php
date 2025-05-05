<?php
class ModuleController
{
    public function browse()
    {
        $modules = bdd_request('SELECT modules.id,modules.name,modules.description,duration,color,classrooms.name as classe,teachers.firstname,teachers.lastname FROM modules INNER JOIN classrooms ON classrooms.id = modules.classroom_id INNER JOIN teachers ON teachers.id = modules.teacher_id');
        require __DIR__ . '/../views/module/listModule.php';
    }

    public function show($id)
    {
        $module = bdd_request('SELECT modules.id,modules.name,modules.description,duration,color,classrooms.name as classe,teachers.firstname,teachers.lastname FROM modules INNER JOIN classrooms ON classrooms.id = modules.classroom_id INNER JOIN teachers ON teachers.id = modules.teacher_id WHERE modules.id = ?;',[$id]);
        $module =$module[0];
        require __DIR__ . '/../views/module/showModule.php';
    }

    public function add()
    {
      $classrooms = bdd_request('SELECT id,name FROM classrooms');
      $teachers = bdd_request('SELECT id,firstname,lastname FROM teachers');
      $color = '#' . self::random_color_part() . self::random_color_part() . self::random_color_part();
      require __DIR__ . '/../views/module/addModule.php';
    }

    function random_color_part() {
      return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    public function save()
    {
      $name = $_GET["name"] ?? null;
      $description = $_GET["description"] ?? null;
      $duration = $_GET["duration"] ?? null;
      $color = $_GET["color"] ?? null;
      if(empty($_GET["is_option"])){
        $is_option = 0;
      }
      else{
        $is_option = (int)$_GET["is_option"] ?? 0;
      }
      $classroom = intval($_GET["classroom"]) ?? null;
      $teacher = intval($_GET["teacher"]) ?? null;
      if($name != null and $duration != null and $color != null and $classroom != null and $teacher != null){
        $module = bdd_request('INSERT INTO modules (name, description, duration, color, is_option, classroom_id, teacher_id) VALUES (?,?,?,?,?,?,?);',[$name,$description,$duration,$color,$is_option,$classroom,$teacher]);
        self::browse();
      }
      require __DIR__ . '/../views/module/listModule.php';
    }

    public function edit($id)
    {
      $module = bdd_request('SELECT modules.id,modules.name,modules.description,duration,color,classrooms.name as classe,teachers.firstname,teachers.lastname FROM modules INNER JOIN classrooms ON classrooms.id = modules.classroom_id INNER JOIN teachers ON teachers.id = modules.teacher_id WHERE modules.id = ?;',[$id]);
      $module = $module[0];
      $classrooms = bdd_request('SELECT id,name FROM classrooms');
      $teachers = bdd_request('SELECT id,firstname,lastname FROM teachers');
      require __DIR__ . '/../views/module/editModule.php';
    }

    public function update($id)
    {
      $name = $_GET["name"] ?? null;
      $description = $_GET["description"] ?? null;
      $duration = $_GET["duration"] ?? null;
      $color = $_GET["color"] ?? null;
      if(empty($_GET["is_option"])){
        $is_option = 0;
      }
      else{
        $is_option = (int)$_GET["is_option"] ?? 0;
      }
      $classroom = intval($_GET["classroom"]) ?? null;
      $teacher = intval($_GET["teacher"]) ?? null;
      if($name != null and $duration != null and $color != null and $classroom != null and $teacher != null){
        $module = bdd_request('UPDATE modules SET 
        name = ?,
        description = ?,
        duration = ?,
        color = ?,
        is_option = ?,
        classroom_id = ?,
        teacher_id = ?
        WHERE modules.id = ?;',
      [$name,$description,$duration,$color,$is_option,$classroom,$teacher,$id]);
        self::browse();
      }
    }

    public function delete($id)
    {
      bdd_request('DELETE FROM modules WHERE id = ?;',[$id]);
      self::browse();
    }
}
?>