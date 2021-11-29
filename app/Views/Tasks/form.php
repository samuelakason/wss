<!-- <input type="hidden" name="<?= csrf_token() ?>" value= "an invalid token"/> -->

<div>
    <label for="description">Description</label>
    <input type="text" name="description" id="description" 
           value="<?= old('description', esc($task->description)) ?>">
</div>