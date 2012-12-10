<!-- SKAPA ANNONS -->
<?php foreach($result as $row):?>
  <div class="container top uploadItemForm">
    <h1>Skapa en annons</h1>
    
    <?php echo anchor('item/upload/'.$row->id,'Ändra/lägg till bild', 'class=edit_pic');?> 
    <?php echo form_open('item/verify_new',array('class' => 'form-horizontal'), array('item_id' => $row->id)); 
   // <form class="form-horizontal">?>
      <a href='#'>
        <?php if (! $row->url):?>
          <img src="http://placehold.it/150x150"/>
        <?php else: ?>
        <img src="<?php echo base_url().$row->url?>"/>
        <?php endif;?>
      </a>
      <div class="control-group">
        <label class="control-label" for="selectCategory">Kategori</label>
        <div class="controls">
          <select id="selectCategory" name="selectCategory">
            <option value="">-- Välj en kategori --</option>
            <?php foreach ($categories as $cat): ?>
              <?php if ($cat->id == $row->category_id):?>
                <option value='<?php echo $cat->id?>' selected="selected"><?php echo $cat->name ?></option>
              <?php else: ?>
                <option value='<?php echo $cat->id?>'><?php echo $cat->name ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputTitle">Titel</label>
        <div class="controls">
          <input type="text" id="inputTitle" name="inputTitle" placeholder="Titel" value="<?php echo $row->headline; ?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputDescription">Beskrivning</label>
        <div class="controls">
          <textarea type="text" id="inputDescription" name="inputDescription" placeholder="Beskrivning..."><?php echo $row->description;?></textarea>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <!-- <button type="submit" class="btn btn-primary">Kontrollera annons</button> -->
          <?php echo form_submit('submit','Kontrollera annons', 'class="btn btn-primary"') ?>
          <!-- <button type="submit" class="btn">Avbryt</button> -->
        </div>
      </div>
    </form>
<?php endforeach;?>