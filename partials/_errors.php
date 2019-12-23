<?php
if(isset($error) && count($error)!=0){
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php foreach($error as $value){echo " <strong>$value </strong><br/>";} ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
}
  ?>