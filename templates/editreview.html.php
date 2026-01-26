<div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Leave a new film review below</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    
    <form action="" method="post">
        <input type="hidden" name="film[id]" value="<?=$film['id'] ?? ''?>">
        <div class="w3-section">
            <label>Film Title</label>
            <input class="w3-input w3-border" type="text" name="film[title]" value="<?=$film['title'] ?? ''?>">
        </div>

        <label>Type your review here</label>
        <textarea class="w3-input w3-border" name="film[review]" rows="3" cols="40"><?=htmlspecialchars($film['review']?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Save</button>
    </form>
</div>