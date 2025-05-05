<?php
class TeacherController
{
    public function browse()
    {
        $teachers = bdd_request('SELECT id,firstname,lastname,email,description FROM teachers');
        require __DIR__ . '/../views/teacher/listTeacher.php';
    }

    public function show($id)
    {
        $teacher = bdd_request('SELECT id,firstname,lastname,email,description FROM teachers WHERE teachers.id = ?;',[$id]);
        $teacher =$teacher[0];
        require __DIR__ . '/../views/teacher/showTeacher.php';
    }

    public function add()
    {
      require __DIR__ . '/../views/teacher/addTeacher.php';
    }

    public function save()
    {
      $firstname = $_GET["firstname"] ?? null;
      $lastname = $_GET["lastname"] ?? null;
      $email = $_GET["email"] ?? null;
      $description = $_GET["description"] ?? null;
      if($firstname != null and $lastname != null and $email != null and $description != null){
        $teacher = bdd_request('INSERT INTO teachers (firstname, lastname, email, description) VALUES (?,?,?,?);', [$firstname,$lastname,$email,$description]);
        self::browse();
      }
      require __DIR__ . '/../views/teacher/listTeacher.php';
    }

    public function edit($id)
    {
      $teacher = bdd_request('SELECT id,firstname,lastname,email,description FROM teachers WHERE teachers.id = ?;',[$id]);
      $teacher = $teacher[0];
      require __DIR__ . '/../views/teacher/editTeacher.php';
    }

    public function update($id)
    {
      $firstname = $_GET["firstname"] ?? null;
      $lastname = $_GET["lastname"] ?? null;
      $email = $_GET["email"] ?? null;
      $description = $_GET["description"] ?? null;
      if($firstname != null and $lastname != null and $email != null and $description != null){
        $teacher = bdd_request('UPDATE teachers SET firstname = ?, lastname = ?, email = ?, description = ? WHERE id = ?;',[$firstname,$lastname,$email,$description,$id]);
        self::browse();
      }
    }

    public function delete($id)
    {
      bdd_request('DELETE FROM teachers WHERE id = ?;',[$id]);
      self::browse();
    }
}
?>