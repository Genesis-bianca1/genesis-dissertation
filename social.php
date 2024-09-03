<?php
include_once 'header.php';
?>


            <div class="social-container">
                <div class="post-form">
                    <form action="/includes/social.inc.php" method="POST">
                        <textarea name="content" placeholder="What is on your mind?" required></textarea>
                        <button type="submit" name="submit">Post thought</button>
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