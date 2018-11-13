<?php 
	session_start();
	if(isset($_POST['indice'])){
		$indice = $_POST['indice'];
		if(count($_SESSION['productos'])>0){

			$cuenta = count($_SESSION['productos']);
			for ($i = $indice; $i< ($cuenta-1); $i++) {
				$_SESSION['productos'][$i]=$_SESSION['productos'][$i];
			}
			unset($_SESSION['productos'][$cuenta-1]);
			$_SESSION['item']--;
		}else{
			$_SESSION['productos'] = null;
			$_SESSION['item']=0;
		}
	}
?>