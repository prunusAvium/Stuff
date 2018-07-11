<?php /** @var \Models\UserProfileViewModel $model */ ?>

<p><?= $model->getId(); ?></p>
<form method="POST" action="/php-mvc/users/profileSave/<?= $model->getId(); ?>">
  Username: <input type="text" name="username" value="<?= $model->getUsername(); ?>"><br/>
  Full name: <input type="text" name="fullName" value="<?= $model->getFullName(); ?>"><br/>
  Password: <input type="text" name="password"><br/>
  Confirm: <input type="text" name="confirmPassword"><br/>
  <input type="submit" name="save" value="Save">
</form>
