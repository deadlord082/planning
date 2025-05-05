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
                            <h1>Modifier une Classe</h1>
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
                                        <input name="route" value="updateClass" hidden>
                                        <input name="id" value="<?php echo $classe['id'] ?>" hidden>
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label for="label">Nom</label>
                                            <input required type="text" class="form-control" value="<?php echo $classe["name"] ?>" style="max-width: 300px;" id="name" name="name" placeholder="écrire un nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Description</label>
                                            <input type="text" class="form-control" value="<?php echo $classe["description"] ?>" style="max-width: 300px;" id="description" name="description" placeholder="écrire une description">
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Année</label>
                                            <select required id="sesion" name="sesion" class="form-control ">
                                                <?php
                                                    foreach($years as $year){
                                                        if($year["id"] == $classe["sesion_id"]){
                                                            echo('<option selected value='.$year["id"].'>'.$year["name"].'</option>');
                                                        }
                                                        else{
                                                            echo('<option value='.$year["id"].'>'.$year["name"].'</option>');
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Groupe</label>
                                            <select required id="grade" name="grade" class="form-control ">
                                                <?php
                                                    foreach($grades as $grade){
                                                        if($grade["id"] == $classe["grade_id"]){
                                                            echo('<option selected value='.$grade["id"].'>'.$grade["name"].'</option>');
                                                        }
                                                        else{
                                                            echo('<option value='.$grade["id"].'>'.$grade["name"].'</option>');
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="color">Couleur</label>
                                            <input type="color" class="form-control" style="max-width: 100px;" id="color" name="color" placeholder="choisir une couleur">
                                        </div> -->
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