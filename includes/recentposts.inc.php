<div class="card recent-posts mt-4">
    <h5 class="card-header">Recent Posts</h5>
    <div class="card-body">
        <ul class="posts">
            <?php 
                $sql = "SELECT title FROM posts";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo ' <li><p>', $row['title'], '</p></li>';
                    }
                }                                       
            ?>
         </ul>
    </div>
</div>
</div>