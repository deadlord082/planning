<?php
class ClassController
{
    public function browse()
    {
        $classes = bdd_request('SELECT classrooms.id,classrooms.name,classrooms.description,sesions.name as session,grades.name as grade FROM classrooms INNER JOIN sesions ON sesions.id = classrooms.sesion_id INNER JOIN grades ON grades.id = classrooms.grade_id');
        require __DIR__ . '/../views/class/listClass.php';
    }

    public function show($id)
    {
        $classe = bdd_request('SELECT classrooms.id,classrooms.name,classrooms.description,sesions.name as session,sesions.description as session_desc,grades.name as grade,grades.description as grade_desc FROM classrooms INNER JOIN sesions ON sesions.id = classrooms.sesion_id INNER JOIN grades ON grades.id = classrooms.grade_id WHERE classrooms.id = ?',[$id]);
        $classe =$classe[0];
        require __DIR__ . '/../views/class/showClass.php';
    }

    public function add()
    {
      $years = bdd_request('SELECT id,name FROM sesions WHERE is_active = true');
      $grades = bdd_request('SELECT id,name FROM grades');
      require __DIR__ . '/../views/class/addClass.php';
    }

    public function save()
    {
      $name = $_GET["name"] ?? null;
      $description = $_GET["description"] ?? null;
      $sesion = intval($_GET["sesion"]) ?? null;
      $grade = intval($_GET["grade"]) ?? null;
      if($name != null and $sesion != null and $grade != null){
        $classe = bdd_request('INSERT INTO classrooms (name, description, grade_id, sesion_id) VALUES (?, ?, ?, ?);',[$name,$description,$sesion,$grade]);
        self::browse();
      }
      require __DIR__ . '/../views/class/addClass.php';
    }

    public function edit($id)
    {
      $classe = bdd_request('SELECT classrooms.id,classrooms.name,classrooms.description,classrooms.sesion_id,classrooms.grade_id FROM classrooms WHERE classrooms.id = ?',[$id]);
      $classe =$classe[0];
      $years = bdd_request('SELECT id,name FROM sesions WHERE is_active = true');
      $grades = bdd_request('SELECT id,name FROM grades');
      require __DIR__ . '/../views/class/eeditClass.php';
    }

    public function update($id)
    {
      $name = $_GET["name"] ?? null;
      $description = $_GET["description"] ?? null;
      $sesion = intval($_GET["sesion"]) ?? null;
      $grade = intval($_GET["grade"]) ?? null;
      if($name != null and $sesion != null and $grade != null){
        $classe = bdd_request('UPDATE classrooms SET name = ?, description = ?, grade_id = ?, sesion_id = ? WHERE classrooms.id = ?;',[$name,$description,$grade,$sesion,$id]);
        self::browse();
      }
    }

    public function delete($id)
    {
      bdd_request('DELETE FROM classrooms WHERE classrooms.id = ? ;', [$id]);
      self::browse();
    }

    public function calendar()
    {
        $years = bdd_request('SELECT id,name FROM sesions WHERE is_active = true');
        $selectedYears = $_GET["years"] ?? $years[0]["name"];
        $yearsFrag = explode("-",$selectedYears);

        $grades = bdd_request('SELECT id,name FROM grades');
        $selectedGrades = $_GET["grades"] ??  $grades[0]["id"];

        $modules = bdd_request('SELECT id,name,description,color FROM modules');

        $lessons = bdd_request('SELECT lessons.id,lessons.description,date_start,date_end,grades_id,modules.name,modules.color FROM lessons INNER JOIN modules ON modules.id = lessons.modules_id');

        $months = cal_info(0)["months"];
        $realMonths = [];
        $firstMonth= [];
        $lastMonth= [];
        $monthData = [];

        foreach($months as $month){
          $key = array_search($month, $months);
          if($key >= 8){
            $year = $yearsFrag[0];
          }
          else{
            $year = $yearsFrag[1];
          }
          $number_day = cal_days_in_month(CAL_GREGORIAN, $key, $year);
          array_push($realMonths,["name" => $month,"nb_day" => $number_day,"days" => []]);
        }

        foreach($realMonths as $month){
          $i = 1;
          $nb_month = array_search($month, $realMonths) + 1;
          if($nb_month >= 9){
            $year = $yearsFrag[0];
          }
          else{
            $year = $yearsFrag[1];
          }
          while($i <= $month["nb_day"]){
            $eventM = [];
            $eventA = [];
            $time = strtotime($i."-".$nb_month."-".$year);
            $date = date('Y-m-d',$time);
            $precise_date = date('Y-m-d h:i:s',$time);
            foreach($lessons as $lesson){
              if(date('Y-m-d',strtotime($lesson["date_start"])) == $date){
                if($lesson["date_start"] <= $precise_date && $lesson["grades_id"] == $selectedGrades){
                  array_push($eventM, $lesson);
                }
                elseif ($lesson["grades_id"] == $selectedGrades) {
                  array_push($eventA, $lesson);
                }
              }
            }

            $dayName = date('l',strtotime($date));

            if($month['name'] == 'September' && $i == 1){
              switch($dayName){
                case 'Tuesday':
                  array_push($month["days"],[null]);
                  break;
                case 'Wednesday':
                  array_push($month["days"],[null],[null]);
                  break;
                case 'Thursday':
                  array_push($month["days"],[null],[null],[null]);
                  break;
                case 'Friday':
                  array_push($month["days"], [null],[null],[null],[null]);
                  break;
              }
            }
            switch($dayName){
              default:
                $weekend = false;
                break;
              case"Saturday":
                $weekend = true;
                break;
              case"Sunday":
                $weekend = true;
                break;
              }
            array_push($month["days"],["date" => $date,"day" => $i,"dayName" => $dayName,"weekend" => $weekend,"eventM" => $eventM ,"eventA" => $eventA ]);
            $i += 1;
            }
            if($month['name'] == 'September' || $month['name'] == 'October' || $month['name'] == 'November' || $month['name'] == 'December'){
              array_push($firstMonth,$month);
            }
            else{
              array_push($lastMonth,$month);
            }
            $monthData = array_merge($firstMonth, $lastMonth);
          } 

        require __DIR__ . '/../views/calendar/class.php';
    }
}
?>