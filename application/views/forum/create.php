<div class="container">

<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('forum/create'); ?>
  <div class="form-group">
    <label>Question</label>
    <textarea id="editor1" class="form-control" name="question" placeholder="Add Thread"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>