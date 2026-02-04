<?php if (!empty($errors)) : ?>
    <div class="errors">
        <p>Your account could not be created. Please check the following:</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?=$error ?></li>
            <?php endforeach; ?>    
        </ul>
    </div>
<?php endif; ?>

<form action="index.php?controller=reviewer&action=regformsubmit" method="post">
    <label for="name">Your name</label>
    <input name="reviewer[name]" id="name" type="text" value="<?=$author['name'] ?? '' ?>">

    <label for="email">Your email</label>
    <input name="reviewer[email]" id="email" type="text" value="<?=$author['email'] ?? '' ?>">

    <label for="password">Your password</label>
    <input name="reviewer[password]" id="password" type="password" value="<?=$author['password'] ?? '' ?>">

    <input type="submit" name="submit" value="Register account">
</form>