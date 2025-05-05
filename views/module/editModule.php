<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <title>planning</title>
        <script>
        </script>
    </head>
    <body>
        <div class="content-wrapper" style="min-height: 1854.8px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modifier un Module</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                                    <form action="index.php">
                                        <input name="route" value="updateModule" hidden>
                                        <input name="id" value="<?php echo $module["id"] ?>" hidden>
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label for="label">Nom</label>
                                            <input required value="<?php echo $module["name"] ?>" type="text" class="form-control" style="max-width: 300px;" id="name" name="name" placeholder="écrire un nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Description</label>
                                            <input type="text" value="<?php echo $module["description"] ?>" class="form-control" style="max-width: 300px;" id="description" name="description" placeholder="écrire une description">
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Durée</label>
                                            <input type="number" value="<?php echo $module["duration"] ?>" class="form-control" style="max-width: 300px;" id="duration" name="duration" placeholder="ajouter une durée">
                                        </div>
                                        <div class="form-group">
                                            <label for="color">Couleur</label>
                                            <input type="color" value="<?php echo $module["color"] ?>" class="form-control" style="max-width: 100px;" id="color" name="color" placeholder="choisir une couleur">
                                        </div>
                                        <div class="form-group">
                                            <label for="is_option">est une option</label>
                                            <input type="checkbox" style="max-width: 100px;" id="is_option" name="is_option">
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Classe</label>
                                            <select required id="classroom" name="classroom" class="form-control ">
                                                <?php
                                                    foreach($classrooms as $classroom){
                                                        if($module["classroom_id"] == $classroom["id"]){
                                                            echo('<option selected value='.$classroom["id"].'>'.$classroom["name"].'</option>');
                                                        }
                                                        else{
                                                            echo('<option value='.$classroom["id"].'>'.$classroom["name"].'</option>');
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Formateur</label>
                                            <select required id="teacher" name="teacher" class="form-control ">
                                                <?php
                                                    foreach($teachers as $teacher){
                                                        if($module["teacher_id"] == $teacher["id"]){
                                                            echo('<option selected value='.$teacher["id"].'>'.$teacher["firstname"].' '.$teacher["lastname"].'</option>');
                                                        }
                                                        else{
                                                            echo('<option value='.$teacher["id"].'>'.$teacher["firstname"].' '.$teacher["lastname"].'</option>');
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>