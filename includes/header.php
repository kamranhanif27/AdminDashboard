<?php
session_start();
?>
<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <?php
                    
                    $x;
                    echo '<a class="navbar-brand" href="#">'. $x . '</a>'?>
                    
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                       
                      
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                        <li>
                            
                            <?php 
                            if (isset($_SESSION['au_id'])) {
                                echo '<form action="includes/adminlogout.inc.php" method="POST">';
                                
                                 echo '<button name="a-logout" type="submit" class="btn btn-danger">Log Out</button>
                            </form>'; 
                            }
                             else {
                                echo ' <a class="btn btn-primary" href="signin/adminlogin.php">Log In</a>';
                            }
                           ?>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>