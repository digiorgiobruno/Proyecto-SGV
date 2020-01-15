<form method="POST"	action="validarlogin.php" >


	<?php 
		
			if(isset($_GET['us'])){
	  			$us=$_GET['us'];

	  	

					if($us==1){
								?>

								Password:<input type="password" name="password" placeholder="Password"> <br>
								<input type="submit" name="INGRESAR">

								<?php

							}
						else
							{
								if($us==2)
									{
									
									 echo "usuario inexistente!!!";
		?>
									<br>
									User:<input type="text" name="usuario" placeholder="User"><br>
									<input type="submit" name="INGRESAR">

		<?php
									}
							}


		}else{

		?>
				User:<input type="text" name="usuario" placeholder="User"><br>
				<input type="submit" name="INGRESAR">

		<?php

		}



		?>
	
</form>