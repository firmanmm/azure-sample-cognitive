
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azure Storage List</title>
    <link rel="stylesheet" href="asset/css/materialize.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m4 offset-m4">
                <form class="section" action="" method="POST" enctype="multipart/form-data">
                    <h3 class="title center amber-text">Azure Storage</h3>
                    <div class="section">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Upload File</span>
                            <input type="file" name="uploaded">
                            </div>
                                <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="File to upload">
                            </div>
                        </div> 
                    </div>
                    <div class="row center">
                        <button class="btn waves-effect waves-light" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="highlight striped">
                <thead class="amber white-text">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="amber-text">
                    <?php foreach($blobs as $id => $blob) { ?>
                    <tr>
                        <td><?php echo $id + 1; ?></td>
                        <td><?php echo $blob->getName(); ?></td>
                        <td>
                            <a class="btn waves-effect waves-light" href="  ?analyze=<?php echo $blob->getUrl(); ?>">Analyze</a>
                            <a class="btn-flat waves-effect waves-light" href="<?php echo $blob->getUrl(); ?>">View</a>
                        </td>
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