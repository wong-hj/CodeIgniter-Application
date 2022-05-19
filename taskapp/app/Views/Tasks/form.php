<!-- Form for CRUD -->


<div>
    <label for="description"> Description </label>

    <!-- old() to preserve the input after validation  -->
    <!-- esc() is to escape special characters and turn into string -->
    <input type="text" id="description" name="description" value="<?= old('description', esc($task->description)) ?>">
</div>