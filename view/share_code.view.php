
<?php 
require('./partials/_head.php');
require('./File/fonction.php');
require('./Filter/c_user.php');
require('./Config/database.php'); 
require('./Action/Save_code.php');
require('./Action/show_code_id.php');
?>
    <!--NAVBAR-->
    <?php require('./partials/_navbar.php') ?>
    <div class="bloc-code">
    
       <form  method="post">
        <textarea id="code"  class="code" name="code" placeholder="Veuillez tapez votre code.............." required="required"><?= $code?:''?></textarea>
        <div class="btn-toolbar bt0" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="submit" class="btn btn-info btn-rounded" name="submit"><i class="fas fa-save" aria-hidden="true"></i>&nbsp Enregistrer</button>
            <a href="./share_code.php" class="btn btn-secondary btn-rounded" ><i class="fas fa-broom" aria-hidden="true"></i>&nbsp Nettoyer</a>
            
        </div>
        </div>
       </form>
        </div>
        </div> 
      <!--FOOTER-->
      
      <?php require('./partials/_footer.php') ?>
     
</body>
</html>