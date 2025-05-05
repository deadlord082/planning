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
                            <h1>Liste des Formateurs</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                                <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                                    <div class="fc-toolbar-chunk">
                                        <h2 class="fc-toolbar-title" id="fc-dom-1">Formateurs</h2>
                                    </div>
                                    <form action="index.php">
                                        <input name="route" value="addTeacher" hidden>
                                        <button class="fc-prev-button btn btn-primary" type="submit">Ajoutée un formateur</button>
                                    </form>
                                </div>
                                <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 494.074px;">
                                    <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                    <table id="planning">
                                        <tr>
                                            <th>nom</th>
                                            <th>prénom</th>
                                            <th>email</th>
                                            <th>description</th>
                                            <th>action</th>
                                        </tr>
                                            <?php 
                                                foreach($teachers as $teacher){
                                                    echo('
                                                    <tr>
                                                        <td>'.$teacher['firstname'].'</td>
                                                        <td>'.$teacher['lastname'].'</td>
                                                        <td>'.$teacher['email'].'</td>
                                                        <td>'.$teacher['description'].'</td>
                                                        <td style="max-width: 110px;" >
                                                            <div class="btn-group">
                                                                <form action="index.php">
                                                                    <input name="route" value="showTeacher" hidden>
                                                                    <input name="id" value="'.$teacher['id'].'" hidden>
                                                                    <button class="btn btn-primary" type="submit">Info</button>
                                                                </form>
                                                                <form action="index.php">
                                                                    <input name="route" value="editTeacher" hidden>
                                                                    <input name="id" value="'.$teacher['id'].'" hidden>
                                                                    <button class="btn btn-primary" type="submit">Edit</button>
                                                                </form>
                                                                <form action="index.php">
                                                                    <input name="route" value="delTeacher" hidden>
                                                                    <input name="id" value="'.$teacher['id'].'" hidden>
                                                                    <button class="btn btn-primary" type="submit">Del</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    ');
                                                }
                                            ?>
                                                <!-- <div style="background-color:#eb4034;">#eb4034</div> -->
                                    </table>
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