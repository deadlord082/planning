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
                            <h1>Modifier un Niveau</h1>
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
                                        <input name="route" value="updateGrade" hidden>
                                        <input name="id" value="<?php echo $grade["id"]?>" hidden>
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label for="label">Nom</label>
                                            <input required value="<?php echo $grade["name"] ?>" type="text" class="form-control" style="max-width: 300px;" id="name" name="name" placeholder="écrire un nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Description</label>
                                            <input required type="text" value="<?php echo $grade["description"] ?>" class="form-control" style="max-width: 300px;" id="description" name="description" placeholder="écrire une description">
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