<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <style>
            html,
            body {
                background-color: #333;
            }
            body {
                color: #fff;
                text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
                box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
            }
            table td {
                padding: 0px 10px !important;
                line-height: 2.1em;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <main role="main" class="inner cover">
                <?php
                require_once __DIR__ . '/counter_store.php';
                $counterFile = counterFilePath();
                ensureCounterStorage($counterFile);

                if (!empty($_GET['erase'])) {
                    $file = fopen($counterFile, 'w');
                    fclose($file);
                    header("Location: /");
                        die();

                }

                $content = file_get_contents($counterFile);
                if (empty($content)) {
                    die('No information;');
                }

                $content = json_decode($content, true);

                ?>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        Number of Views: <span style="font-size: 120%; font-weight: 600;"> <?php echo $content['views'] ?> </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        Количество посещений:  <span style="font-size: 120%; font-weight: 600;"> <?php echo $content['views'] ?> </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        Number of uniq users: <span style="font-size: 120%; font-weight: 600;"><?php echo count($content['clients']) ?></span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        Количество уникальных посещений:  <span style="font-size: 120%; font-weight: 600;"><?php echo count($content['clients']) ?></span>
                    </div>
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th> IP Address </th>
                            <th> Number of views </th>
                            <th> WHO IS </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($content['clients'] as $ip => $views) { ?>
                            <tr>
                                <td><?php echo $ip ?></td>
                                <td><?php echo $views ?> views</td>
                                <td><a class="btn btn-info btn-sm" target='_blank' href='https://mxtoolbox.com/SuperTool.aspx?action=arin%3a<?php echo $ip ?>&run=toolpage'>WhoIs</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <a class="btn btn-danger" href="?erase=true" onclick="return confirm('Are u sure you want to erase all logs? Вы уверены что хотите очистить статистику?');">Erase/Очистить</a>
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
