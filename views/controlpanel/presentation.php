<?php require_once 'menu.php'; ?>
<link rel="stylesheet" type="text/css" href="/css/cp.min.css"/>
<div class="c_container">
<button type="button" class="btn-pre-add btn-primary btn" name="button">Frame aanmaken</button>
</div>
<div class="pre-add-modal">
  <header>
    Aanmaken
  </header>
  <div class="content">
    <form method="post" action="">
      <p>Frame aanmaken</p>
      <?php
          if(isSet($rError)){
              echo $rError;
          }?>
      <div class='field'>
        <label for="title">Titel<span class="required">*</span></label>
        <input required name="title" type='text' id="title"/>
      </div>
      <div class='field'>
        <label for="orderIndex">Plaats in presentatie(bijv. 1, 2 of 3)<span class="required">*</span></label>
        <input required name="orderIndex" type='text' />
      </div>
      <div class='field'>
        <label for="duration">Looptijd(in seconden)<span class="required">*</span></label>
        <input required name="duration" type='text' />
      </div>
      <div class='field'>
        <label for="media">Video(url)</label>
        <input name="media" type='text' />
      </div>
      <div class='field'>
        <label for="text">omschrijving</label>
        <textarea name="text" rows="8" cols="80"></textarea>
      </div>
      <div class='field'>
        <input type='submit' class='btn-primary' value="Aanmaken" />
      </div>
    </form>
  </div>
</div>
