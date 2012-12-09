<!-- FÖRSTA SIDAN SOM INLOGGAD -->
<?php $user_data = $this->session->userdata('logged_in');?>
<!-- <section class="topImage row-fluid">
    <img src="<?php echo base_url();?>/images/front.jpeg" style="width:100%;" />
	<h1 class="span4 offset4 logo"><img class="" src="<?php echo base_url();?>images/logo.png" /></h1>
</section> -->

<div class="container top">
	<div class="row-fluid">
		<div class="span4 info-first">
			<p>
				Lite info om vad man kan göra på siten.
			</p>
		</div>
		<div class="span4 info-second">
			<p>
				Lite annan rolig info eller kanske tips
			</p>
		</div>
		<div class="span4 info-last">
			<p>
				Onödig fakta.
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<h3>Senaste annonser</h3>
    <ul id="results" class="thumbnails">
    <?php if (isset($result['error'])):
      echo $result['error'];
    elseif($result):
    foreach ($result as $row):
    $edit = ($user_data['id'] === $row->user_id)?TRUE:FALSE; ?>
    <li class="span3 item">
      <?php if($edit): 
        echo anchor('#','Ändra annons', 'class=""');
        echo anchor('#','Radera annons', 'class=""');
        endif;?>
      <a href="#" class="img">
          <?php if (! $row->url):?>
            <img src="http://placehold.it/300x200"/>
          <?php else: ?>
            <img src="<?php echo base_url().$row->url?>"/>
          <?php endif; ?>
      </a>
      <h4><a href="<?php echo base_url().'item/'.$row->id; ?>"><?php echo $row->headline; ?></a></h4>
      <!-- <p><?php  echo $row->description; ?></p> -->
      <span class="icons">
        <!-- Av:
        <a href="<?php  echo base_url(); ?>index.php/user/<?php  echo $row->user_id; ?>">
        <?php  echo $row->firstname.' '.$row->lastname; ?>
        </a> -->
        <a href="<?php echo base_url().'user/'.$row->user_id; ?>">
              <i class="icon-user"></i>
          <!-- <?php  echo $row->firstname.' '.$row -> lastname; ?> -->
            </a>
            <a href="message/<?php echo $row->id;?>"><i class="icon-pencil"></i></a>
            <a href="#"><i class="icon-star"></i></a>
      </span>
      <span>Upplagd den <?php  echo $row->date_added; ?></span>
      <!-- <p><?php  echo $row -> id; ?></p> -->
      <!-- <p><?php  echo $row->end_date; ?></p> -->
      </li>
      <?php endforeach;
      endif ?>
    </ul>
  </div>
</div>