<style>
.username-span {
    color: White;
    font-size: 16px;
    padding-right: 15px;
}


</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
    <a class="navbar-brand" href="#">Kamran</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">About</a>
        </li>  
    </ul>
    <?php 
    if (isset($_SESSION['u_id'])) {
        echo '<form action="../includes/logout.inc.php" method="POST">';
        $user = $_SESSION['u_id'];
        $select = mysqli_query($conn,"SELECT firstName , lastName FROM users WHERE id=$user");
        $fetch = mysqli_fetch_assoc($select);
        $firstName = $fetch['firstName'];
        $lastName = $fetch['lastName']; 
        echo '<span class="username-span">', 'Logged in as ' , $firstName, ' ', $lastName ,'</span>';
         echo '<button name="logout" type="submit" class="btn btn-success">Log Out</button>
    </form>'; 
    }
     else {
        echo ' <a class="btn btn-primary" href="../signin/login.php">Log In</a>
        <a class="btn btn-info ml-2" href="../signin/signin.php">Sign UP</a>';
    }
   ?>
    </div>
</div>
</nav>
