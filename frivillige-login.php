<?
    include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
?>
    <div class="main-container">
      	<div class="content">
          <div class="form">
            <h2>Login til alle Frivillige på Cykelfærgen</h2>
              <form action="login" method="POST">
                <input type="hidden" name="email" value="frivillige">
                <? if(isset($_SESSION["url"])){?>
                    <input type="hidden" name="url" value="<?= $_SESSION["url"];?>">
                <?}?>
                <input type="password" name="password" class="login__input" placeholder="Password">
                <button type="submit" class="login__btn">Login</button>
              </form>
          </div>
      	</div>  
    </div>
  <? include("scripts/script.php")?>
</body>