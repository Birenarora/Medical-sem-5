<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rest API Client Side Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        h2{
            font-family: georgia;
            font-size: 10 px;
        }
    </style>
</head>
<body style="background-color: #C9FFBF;">

    <div class="container">
        <h2><b>Frequently Asked Questions</b></h2>
        <form class="form-inline" action="" method="POST">
            <div class="form-group">
                <!-- <label for="name" style="font-size: 25px;">Name</label> -->
                <select type="text" name="name" class="form-control" required/>
                <option>--Select your question--</option>
                <option value="ques1">What all facilities are available in your store apart from medicine?</option>
                <option value="ques2">Do you have any health check-up schemes?</option>
                <option value="ques3">Is Cabergoline available in your store? </option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

    <h3>
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];

            $url = "http://localhost/InP/shrutika/api.php?name=" . $name;

            $client = curl_init($url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($client);

            $result = json_decode($response);

            echo $result->data;
        }
        ?>
    </h3>
</div>
</body>
</html>