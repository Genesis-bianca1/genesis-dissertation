<?php
include_once 'header.php';
include_once 'dbh.inc.php';
include_once 'func.inc.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
} else {
    if(isset($_POST["submit"])) {
    $u_id = $_SESSION["u_id"];
    $post_content = trim($_POST["content"]);

    //To inspect if post_t NOT NULL is causing the error in DB posts table
    if(!empty($post_content)) {
        $sql = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "is", $u_id, $post_content);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    } else {
        echo "<p>Looks like you haven't written anything, try again.</p>";
    }
}
}
?>
<!--The back-end is on hold, as some tasks in Sprint 5 failed and system requires fixing prioritised bugs-->

            <!--Social posts container and text area-->
            <div class="social-container">
                <h3>What's on your mind? &#9997</h3>
                <p>Show off your skills to the world!<br>Posting can be a good way of learning from others</p>
                <div class="post-form">
                    <form action="/includes/social.inc.php" method="POST" enctype="multipart/form-data">
                        <textarea name="content" placeholder="Share what you are thinking in 255 characters or less" required></textarea>
                        <input type="file" name="file_to_upload" id="file_to_upload">
                        <button type="submit" value="Upload" name="submit_post">Post thought</button>
                    </form>
                </div>
                
                <!--Inspecting the bug in this section-->
                <div class="posts">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="post">
                            <p><strong><?php echo htmlspecialchars($row["user_id"]); ?></strong></p>
                            <p><?php echo htmlspecialchars($row["content"]); ?></p>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>

<?php
include_once 'footer.php';
?>