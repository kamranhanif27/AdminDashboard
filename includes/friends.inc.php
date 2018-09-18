<div class="col-sm-3 mt-4">
        <div class="card friends-card">
            <h5 class="card-header">Friends Online</h5>
            <div class="card-body">
                <ul class="friends">
                    
                    <?php 
                        $sql = "SELECT firstName , lastName, profilePic FROM users";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pic = $row["profilePic"];

                                echo ' <li>
                                        <a href="#">
                                            <img class="profile-pic" src="../',$pic,'">
                                            <p class="profile-name">', $row["firstName"], " " , $row["lastName"] ,'</p>
                                        </a>
                                    </li>';
                            }
                        }                                       
                    ?>
                </ul>
            </div>
        </div>
