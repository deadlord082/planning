<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
      <title>planning</title>
      <script>
      function erase(ev) {
        if(ev.target.parentElement.parentElement.id != "modules"){
          const lesson_id = ev.target.parentElement.id;
          const xhttp = new XMLHttpRequest();

          xhttp.onload = function() {
            document.getElementById("demo").innerHTML = this.responseText;
          }
          xhttp.open("POST", "index.php?route=deleteLesson&id=" + lesson_id, true);xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send();

          ev.target.parentElement.remove();
        }
      }

      function allowDrop(ev) {
        ev.preventDefault();
      }

      function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
      }

      function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var container = document.getElementById("modules");
        var content = container.innerHTML;
        ev.target.appendChild(document.getElementById(data));
        container.innerHTML= content; 
        
        const startTimeM = document.getElementById("startTimeM").value;
        const endTimeM = document.getElementById("endTimeM").value;
        const startTimeA = document.getElementById("startTimeA").value;
        const endTimeA = document.getElementById("endTimeA").value;
        const grades_id = document.getElementById("selectGrade").value;
        
        const date = ev.target.id;
        const time = ev.target.getAttribute('name');
        let parameters = "";

        if(time == 'morning'){
          parameters = '&date=' + date + '&startTime=' + startTimeM + '&endTime=' + endTimeM + '&grades_id=' + grades_id;
        }
        else{
          parameters = '&date=' + date + '&startTime=' + startTimeA + '&endTime=' + endTimeA + '&grades_id=' + grades_id;
        }

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          document.getElementById("demo").innerHTML = this.responseText;
        }
        
        xhttp.open("POST", "index.php?route=saveLesson&id="+data + parameters, true);xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
      }
      </script>
  </head>
  <body>
    <div id="demo"></div>
      <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Calendrier Classe</h1>
              </div>
            </div>
          </div>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="sticky-top mb-3">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Modules</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="modules" class="external-events">
                        <?php 
                        foreach($modules as $module){
                          echo('<div id="'.$module["id"].'" class="external-event text-light" style="background-color:'.$module['color'].'" draggable="true" ondragstart="drag(event)" ondblclick="erase(event)"><div style="mix-blend-mode: difference;">'.$module["name"].'</div></div>');
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Heure de cours</h3>
                    </div>
                    <div class="card-body">
                      <p>matin</p>
                      <div class="input-group">
                        <input id="startTimeM" type="time" value="08:00" class="form-control">
                        <input id="endTimeM" type="time" value="12:00" class="form-control">
                      </div>
                      <p>après-midi</p>
                      <div class="input-group">
                        <input id="startTimeA" type="time" value="13:00" class="form-control">
                        <input id="endTimeA" type="time" value="17:00" class="form-control">
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
              <div class="col-md-9">
                <div class="card card-primary">
                  <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                      <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                        <div class="fc-toolbar-chunk">
                          <div class="btn-group">
                            <form action="index.php">
                              <input name="route" value="calendarClass" hidden>
                              <select id="selectYear" name="years" class="form-control ">
                                <?php
                                foreach($years as $year){
                                  if($year["name"] == $selectedYears){
                                    echo('<option selected>'.$year["name"].'</option>');
                                  }
                                  else{
                                    echo('<option>'.$year["name"].'</option>');
                                  }
                                }
                                ?>
                              </select>
                              <select id="selectGrade" name="grades" class="form-control">
                                <?php
                                  foreach($grades as $grade){
                                    if($grade["id"] == $selectedGrades){
                                      echo('<option value='.$grade["id"].' selected>'.$grade["name"].'</option>');
                                    }
                                    else{
                                      echo('<option  value='.$grade["id"].'>'.$grade["name"].'</option>');
                                    }
                                  }
                                  ?>
                              </select>
                              <button class="btn btn-primary" type="submit">filtrer</button>
                            </form>
                          </div>
                        </div>
                        <div class="fc-toolbar-chunk">
                          <h2 class="fc-toolbar-title" id="fc-dom-1"><?php echo $selectedYears ?></h2>
                        </div>
                      </div>
                      <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active">
                        <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                          <table id="planning" class="table table-striped table-bordered">
                            <tr>
                              <th>Lundi</th>
                              <th>Mardi</th>
                              <th>Mercredi</th>
                              <th>Jeudi</th>
                              <th>Vendredi</th>
                            </tr>
                            <tr class="container-fluid">
                              <?php
                                foreach($monthData as $month){
                                  foreach($month["days"] as $day){
                                    if(count($day) == 1){
                                      echo('<td></td>');
                                    }
                                    else{
                                      $eventM = '';
                                      $eventA = '';
                                      if(!$day["weekend"]){
                                        if($day['eventM'] != null){
                                          foreach($day['eventM'] as $event){
                                            $eventM = $eventM.'<div id="'.$event['id'].'" class="external-event text-light" style="background-color:'.$event['color'].';" ondblclick="erase(event)"><div style="mix-blend-mode: difference;">'.$event["name"].'</div></div>';
                                          }
                                        }
                                        if($day['eventA'] != null){
                                          foreach($day['eventA'] as $event){
                                            $eventA = $eventA.'<div id="'.$event['id'].'" class="external-event text-light" style="background-color:'.$event['color'].';" ondblclick="erase(event)"><div style="mix-blend-mode: difference;">'.$event["name"].'</div></div>';
                                          }
                                        }
                                        echo('
                                          <td class="col-2 text-center">
                                            '.$day['date'].'
                                            <div class="row">
                                              <div class="col border-end" id="'.$day['date'].'" name="morning" ondrop="drop(event)" ondragover="allowDrop(event)">Matin'.$eventM.'</div>
                                              <div class="col" id="'.$day['date'].'" name="afternoon" ondrop="drop(event)" ondragover="allowDrop(event)">Après-midi'.$eventA.'</div>
                                            </div>
                                          </td>
                                        ');
                                      }
                                      else{
                                        echo('</tr>');
                                      }
                                    }
                                  }
                                }
                              ?>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  </body>
</html>