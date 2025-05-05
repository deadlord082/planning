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
                            <h1>Détails d'un Module</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                                <div class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                                    <div class="fc-toolbar-chunk">
                                        <h2 class="fc-toolbar-title" id="fc-dom-1"><?php echo $module['name'] ?></h2>
                                    </div>
                                    <p><?php echo $module['description'] ?></p>
                                    <h4><?php echo $module['duration'] ?></h4>
                                    <p><?php echo $module['color'] ?></p>
                                    <h4><?php echo $module['classe'] ?></h4>
                                    <p><?php echo ($module['firstname'].' '.$module['lastname']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>