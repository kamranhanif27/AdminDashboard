<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up!</title>
</head>
<body>
    <div class="container">
        <div class="signinform">
            <form action="../includes/signup.inc.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="signInInputFirst">First Name:</label>
                <input name="first" type="text" class="form-control" id="signInInputFirst" aria-describedby="firstHelp" placeholder="Firstname">
            </div>
            <div class="form-group">
                <label for="signInInputLast">Last Name:</label>
                <input name="last" type="text" class="form-control" id="signInInputLast" aria-describedby="lastHelp" placeholder="Lastname">
            </div>
            <div class="form-group">
                <label for="signInInputUid">Username:</label>
                <input name="uid" type="text" class="form-control" id="signInInputUid" aria-describedby="uidHelp" placeholder="Username">
                <small id="uidHelp" class="form-text text-muted">Choose a memorable username.</small>
            </div>
            <div class="form-group">
                <label for="signInInputEmail1">Email address:</label>
                <input name="email" type="email" class="form-control" id="signInInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="signInInputPassword1">Password:</label>
                <input name="pwd" type="password" class="form-control" id="signInInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="signInInputJob">Job Title:</label>
                <input name="job" type="text" class="form-control" id="signInInputJob" aria-describedby="jobHelp" placeholder="What's your job?">
            </div>
            <div class="form-group">
                <label for="signInInputImg">Profile Picture:</label>
                <input name="fileToUpload" type="file" class="form-control" placeholder="Upload your image">
            </div>
                <button name="submit" type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>



    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>