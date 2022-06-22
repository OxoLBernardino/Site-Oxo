<?php
  $erro_cnpj = isset($_GET['erro_cnpj']) ? $_GET['erro_cnpj'] : 0;
  $erro_telefone = isset($_GET['erro_telefone']) ? $_GET['erro_telefone'] : 0;
  $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/clareandro.js" type="text/javascript"></script>
    <script src="../../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../../js/java.js" type="text/javascript"></script>

    
    <link id="favicon" rel="shortcut icon" href="assets/logo_oxo.png" type="image/png" />
  </head>
  <body>
      
      <div class="container">
		<div class="wrapper">
			<div class="company-info">
				<h3>Cadastro de Vendedor</h3>
			</div>
			<div class="contato">
				
                            <form method="POST" action="registra_vendedor.php" >
                                <div class="form-group">
                                    <p><label>CNPJ</label>
                                    <input class="num" name="cnpj" type="text" placeholder="Somente números" maxlength="18"  autofocus required></p>
                                    <?php
                                        if($erro_cnpj){
                                            echo '<font style="color:#ff0000">CNPJ já existe</font>';                                            
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    
                                    <p><label>TELEFONE</label>
                                    <input class="tel" name="telefone" type="tel" placeholder="xx xxxx-xxxx" maxlength="14" required  ></p>
                                    <?php 
                                        if($erro_telefone){
                                           echo '<font style="color:#ff0000">Telefone já existe</font>';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    
                                    <p><label>CELULAR</label>
                                    <input class="cel" name="celular" type="tel" placeholder="xx xxxxx-xxxx" maxlength="15" required></p>
                                </div>
                                
                                <div class="form-group">
                                    <p><label>EMAIL COMERCIAL</label>
                                    <input id="mail" name="comemail" type="email" placeholder="" maxlength="50" required  ></p>
                                    <?php 
                                        if($erro_email){
                                           echo '<font style="color:#ff0000">Email já existe</font>';
                                        }
                                    ?>
                                </div>
                                
                                <div class="form-group">                                   
                                    <p><label>CONTATO</label>
                                    <input id="cont" name="contato" type="text" placeholder="Nome do contato" maxlength="50" required  >    </p> 
                                </div>
                                
                                <div class="form-group">
                                    <p><label>SENHA</label>
                                    <input id="pass" name="senha" type="password" placeholder="senha" maxlength="50" required ></p> 
                                </div>
                                    
                                    <br><br>
                                    <p>
                                        <a href="index.php"><button class="btmenu">Cancelar</button></a>
                                        <button type="submit" class="btmenu">Salvar</button>
                                    </p>
                                    
                                    <br>
                            </form>
                            
                            <br>
                        </div>
                </div>
	</div>
      <br class="fix">
      
      
      <div class="banner" data-mvc-banner="leaderboard"></div>              
       
      <br class="fix">
     
      
    
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/clareandro.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
  </body>
</html>