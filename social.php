<?php
include_once 'header.php';
include_once 'dbh.inc.php';
include_once 'func.inc.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}

if(isset($_SESSION['u_name_id'])) {
    if(isset($_POST['submit_post'])) {
    $u_id = $_SESSION['u_name_id'];
    $post_content = trim($_POST['content']);

    if(!empty($post_content)) {
        $sql = "INSERT INTO posts (username, content) VALUES (?, ?)";
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

            <div class="social-container">
                <h3>What's on your mind? &#9997</h3>
                <p>Show off your skills to the world!<br>Posting can be a good way of learning from others</p>
                <div class="post-form">
                    <form action="/includes/social.inc.php" method="POST">
                        <textarea name="content" placeholder="Share what you are thinking in 255 characters or less" required></textarea>
                            <button type="submit" name="submit_post">Post thought</button>
                    </form>
                </div>

                <div class="posts">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="post">
                            <!--Check that 'user_name' works as intended, else, refer to the issue above (comments) and fix-->
                            <!-- Bug expected in this section -->
                            <p><strong><?php echo htmlspecialchars($row['user_name']); ?></strong></p>
                            <p><?php echo htmlspecialchars($row['content']); ?></p>
                            <span><?php echo date('F j, Y, g:i a', strtotime($row['timestamp'])); ?></span>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>

<?php
include_once 'footer.php';
?>