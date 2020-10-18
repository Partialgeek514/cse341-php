<div class="feature">
    <div class="imgBox">
        <?php echo "<img src='$feature[image]' alt='Game Thumbnail'>" ?>
    </div>
    <div class="gameInfoBox">
        <div class="gameHeader">
        <?php
            echo "<h3 class='gameTitle'>$feature[gameTitle]</h3>";
            echo "<p class='year'>$feature[gameYear]</p>";
        ?>
        </div>
        <?php
            echo "<p class'gameDescription'>$feature[gameDescription]</p>";
        ?>
    </div>
</div>