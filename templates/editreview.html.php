<div class="responsive-form">
    <?php if (empty($film) || $userID == $reviewerID): ?>
        <div class="w3-container" id="contact" style="margin-top:75px">
            <h1><b>Leave a new film review below</b></h1>
            
            <form action="" method="post">
                <input type="hidden" name="film[id]" value="<?=$film['id'] ?? ''?>">
                <div class="w3-section">
                    <label>Film Title</label>
                    <input class="w3-input w3-border" type="text" name="film[title]" value="<?=$film['title'] ?? ''?>">
                </div>

                <label>Type your review here</label>
                <input class="w3-input w3-border" type="text" name="film[review]" value="<?=$film['review'] ?? ''?>">
                <input type="submit" name="Add your film review" value="Save">
            </form>
        </div>
    <?php endif;?>
</div>