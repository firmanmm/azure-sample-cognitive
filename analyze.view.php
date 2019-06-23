
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azure Simple Cognito Analyze</title>
    <link rel="stylesheet" href="asset/css/materialize.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m4 offset-m4">
                <h3 class="title center amber-text">Azure Vision</h3>
                <img style="width: 100%" src="<?php echo $fileLoc; ?>">
            </div>
        </div>
        <div class="row">
            <table class="highlight striped">
                <thead class="amber white-text">
                    <tr>
                        <th>ID</th>
                        <th>Caption</th>
                        <th>Confidence</th>
                    </tr>
                </thead>
                <tbody class="amber-text">
                <?php foreach($captions as $id => $caption) { ?>
                    <tr>
                        <td><?php echo $id + 1; ?></td>
                        <td><?php echo $caption['text']; ?></td>
                        <td><?php echo round($caption['confidence'], 2); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/materialize.min.js"></script>