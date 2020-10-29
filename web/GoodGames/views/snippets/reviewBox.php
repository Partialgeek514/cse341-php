<div class="reviewEntry">
    <form action="/GoodGames/index.php" method="POST">
        <label for="reviewText">Write a Review</label>
        <textarea name="reviewText" cols='50' rows="5"></textarea>
        <button type="submit">Submit</button>
        <input type="hidden" name="action" value="createReview">
        <input type="hidden" name="gameId" value=<?php echo "'$gameId'"; ?>>
    </form>
</div>