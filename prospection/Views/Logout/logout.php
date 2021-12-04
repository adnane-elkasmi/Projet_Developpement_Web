<article class="logout">
    <div>
        <form action="?view=logout" method="post">
            <h4> Avertissement : </h4>
			Voulez-vous vraiment vous déconnecter ?<br><br><br>
			<input name="oui" type="submit" value="Oui"><br><br>
			<a href="javascript:history.go(-1)" style='background-color: lightgrey; color: #222222; border: 1px solid; border-color: darkgrey'><span style='color : lightgrey; font-size: 3px;'>s</span> Non <span style='color : lightgrey; font-size: 3px;'>s</span></a><br><br>
        </form>
    </div>
</article>
<?php
    // Si l'utilisateur répond oui
    if (isset($_POST['oui'])){
        if ($_POST['oui'] == "Oui"){
			session_destroy();
			$session = $_GET["session"];
			setcookie($session, ' ', 1);
			header("Location:?view=login");
			exit();
		}
	}
?>
