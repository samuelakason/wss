<div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= old('name', esc($user->name)) ?>">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= old('email', esc($user->email)) ?>">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
        <?php if($user->id): ?>
        <p>Leave Blank to Keep Existing Password</p>
        <?php endif; ?>
    </div>

    <div>
        <label for="password_confirmation">Repeat Password</label>
        <input type="password" name="password_confirmation">
    </div>