<div class="col-2-3">

   <?php echo validation_errors(); ?>

   <?php echo form_open('article/edit_article/'.$query['slug']); ?>

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

         <select name="issue">
            <option disabled selected>Issue</option>
            <?php 

            foreach ($issue->result() as $row) : 

            if ($row->issue_num == $query['issue']) {
               $selected = "selected";
            } else {
               $selected = "";
            };

            ?>
               <option value="<?php echo $row->issue_num;?>" <?php echo $selected; ?>><?php echo $row->issue_num; ?></option>
            <?php 
            endforeach; 
            ?>
         </select><br />

      </div>

      <textarea name="text" class="tinymce"><?php echo $query['text'];?></textarea><br />

      <div class="formitems">

         <input type="submit" name="submit" value="Submit Changes" />

      </div>

   </form>

</div>