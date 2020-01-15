
	<?php 
		
			if(isset($us)){
	  			

	  	

					if($us==1){
								?>
								<form method="POST"	action="validarlogin.php" >
								Password:<input type="password" name="password" placeholder="Password"> <br>
								<input type="submit" name="INGRESAR">
								</form>
								<?php

							}
						else
							{
								if($us==2)
									{
									

									 echo "usuario inexistente!!!";
		?>							
									<form method="POST"	action="validarlogin.php" >
									<br>
									User:<input type="text" name="usuario" placeholder="User"><br>
									<input type="submit" name="INGRESAR">
									</form>
		<?php
									}
							}


		}else{

		?>
				<form method="POST"	action="validarlogin.php" >
				User:<input type="text" name="usuario" placeholder="User"><br>
				<input type="submit" name="INGRESAR">
				</form>

		<?php

		}



		?>
