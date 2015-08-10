<?php echo validation_errors(); ?>

<?php echo form_open('article/edit_post/'.$query['slug']); ?>

   <div class="formitems">

      <input type="text" name="title" placeholder="Title" value="<?php echo $query['title'];?>"><br />

      <input type="text" name="author" placeholder="Author" value="<?php echo $query['author'];?>"><br />

      <?php 
         $selected = category($query['cat']); 
      ?>
      <select name="cat">
         <option disabled>Category</option>
         <option value="art" <?php echo $selected['art'];?> >Art</option>
         <option value="music" <?php echo $selected['music'];?>>Music</option>
         <option value="poetry" <?php echo $selected['poetry'];?>>Poetry</option>
         <option value="design" <?php echo $selected['design'];?>>Design</option>
      </select><br />

      <input type="hidden" name="issue" value="<?php echo $query['slug'];?>">

   </div>

   <textarea name="text" class="tinymce"><?php echo $query['text'];?></textarea><br />

   <div class="formitems">

      <input type="submit" name="submit" value="Submit Changes" />

   </div>

</form>