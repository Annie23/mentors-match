<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mentors match</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-5 mt-3">
            <label for="file">Upload Csv File:</label>
            <input type="file" name="csv_file" class="form-control" id="file">
        </div>
        <div class="form-group col-md-5">
            <input type="submit" class="btn btn-primary" name="upload" value="Submit">
        </div>
    </form>
    <?php require_once('handler.php'); ?>
</div>
</body>
</html>
