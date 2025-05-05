<?php
class gradeController
{
    public function browse()
    {
        $grades = bdd_request('SELECT id,name,description FROM grades');
        require __DIR__ . '/../views/grade/listgrade.php';
    }

    public function show($id)
    {
        $grade = bdd_request('SELECT id,name,description FROM grades WHERE grades.id = ?;',[$id]);
        $grade = $grade[0];
        require __DIR__ . '/../views/grade/showgrade.php';
    }

    public function add()
    {
      require __DIR__ . '/../views/grade/addgrade.php';
    }

    public function save()
    {
      $name = $_GET["name"] ?? null;
      $description = $_GET["description"] ?? null;
      if($name != null and $description != null){
        $grade = bdd_request('INSERT INTO grades (name,description) VALUES (?,?);',[$name,$description]);
        self::browse();
      }
      require __DIR__ . '/../views/grade/listgrade.php';
    }

    public function edit($id)
    {
      $grade = bdd_request('SELECT id,name,description FROM grades WHERE grades.id = ?;'[$id]);
      $grade = $grade[0];
      require __DIR__ . '/../views/grade/editgrade.php';
    }

    public function update($id)
    {
      $name = $_GET["name"] ?? null;
      $description = $_GET["description"] ?? null;
      if($name != null and $description != null){
        $grade = bdd_request('UPDATE grades SET name = ?, description = ? WHERE id = ?;',[$name,$description,$id]);
        self::browse();
      }
    }

    public function delete($id)
    {
      bdd_request('DELETE FROM grades WHERE id = ?;',[$id]);
      self::browse();
    }
}
?>