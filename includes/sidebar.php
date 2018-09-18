<?php

$activePage;


echo " <div class='sidebar' data-color='purple' data-image='assets/img/sidebar-5.jpg'>

<!--

    Tip 1: you can change the color of the sidebar using: data-color='blue | azure | green | orange | red | purple'
    Tip 2: you can also add an image using data-image tag

-->

    <div class='sidebar-wrapper'>
        <div class='logo'>
            <a href='#' class='simple-text'>
                Admin Panel
            </a>
        </div>

        <ul class='nav'>
            
            <li class='";  if ($activePage == 'dashboard') {echo 'active';} else {echo '';}; echo "'>
                <a href='dashboard.php'>
                    <i class='pe-7s-graph'></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class='";  if ($activePage == 'profiles') {echo 'active';} else {echo '';}; echo "'>
                <a href='profiles.php'>
                    <i class='pe-7s-user'></i>
                    <p>Profiles</p>
                </a>
            </li>
           
            <li class='";  if ($activePage == 'notifications') {echo 'active';} else {echo '';}; echo "'>
                <a href='notifications.php'>
                    <i class='pe-7s-bell'></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class='";  if ($activePage == 'posts') {echo 'active';} else {echo '';}; echo "'>
                <a href='posts.php'>
                    <i class='pe-7s-bell'></i>
                    <p>Posts</p>
                </a>
            </li>
        </ul>
    </div>
</div> ";







?>