<div class="responsive-form">
    <?php if (empty($film) || $userID == $reviewerID): ?>
        <div class="w3-container" id="contact" style="margin-top:75px">
            <h1><b>Leave a new film review below</b></h1>
            
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="film[id]" value="<?=$film['id'] ?? ''?>">
                <div class="w3-section">
                    <label>Film Title</label>
                    <input class="w3-input w3-border" type="text" required name="film[title]" value="<?=$film['title'] ?? ''?>">
                </div>

                <label>Type your review here</label>
                <input class="w3-input w3-border" type="text" required name="film[review]" value="<?=$film['review'] ?? ''?>">
                
                <label>Select your image to add to your review. Please ensure it is related to your film review:</label>
                <?php if (!empty($film['image'])) : ?>
                    Original image: <?=htmlspecialchars($film['image']??'' , ENT_QUOTES, 'UTF-8')?>
                <?php endif; ?>
                <input type="file" name="fileToUpload" id="fileToUpload">

                <label for ='film_alt_txt'>Enter the alternative text for your image here!</label>
                <input type="text" name="film[alt_text]" required value="<?=$film['alt_text'] ?? ''?>">
                <?=htmlspecialchars($film['alt_text'] ??'' , ENT_QUOTES, 'UTF-8')?>

                <input type="submit" name="Add your film review" value="Save">
            </form>
        </div>
    <?php  else: ?>
        <p>You can only edit jokes that you own.</p>
    <?php endif;?>
</div>