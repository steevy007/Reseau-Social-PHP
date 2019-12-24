
<?php 
require('./partials/_head.php');
require('./File/fonction.php');
require('./Filter/c_user.php');
require('./Config/database.php'); 
require('./Action/show_code.php');
require('./Action/clone_code.php');


?>
    <!--NAVBAR-->
    <?php require('./partials/_navbar.php') ?>
    <div class="bloc-code">
        <pre class="prettyprint linenums"><?=$code->code?></pre>
        <div class="btn-toolbar bt0" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="./share_code.php?id_code=<?=$code->id?>" class="btn btn-warning" name="submit"><i class="far fa-clone" aria-hidden="true"></i>&nbsp Cloner</a>   
            <a href="./share_code.php" class="btn btn-success" ><i class="fas fa-file" aria-hidden="true"></i>&nbsp Nouveau</a>     
        </div>
        </div>
        </div> 
    </div>
      <!--FOOTER-->
     
      <?php require('./partials/_footer.php') ?>
      <script src="./Librairie/Pretify/js/prettify.js"></script> 
     <script>
        prettyPrint();
     </script>
</body>
</html>