<?php

    session_start();

   if(isset($_POST['acao'])){
        //existe um post para recuperação de senha!
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['token'] = uniqid();

?>
    <!-- A partir daqui é um e-mail que se deve enviar ao user-->
    <h2>Você fez uma solicitação de nova senmha!</h2>
    <p>Clique <a href="recuperar.php?token=<?php echo $_SESSION['token']; ?>">aqui</a> para redefinir.</p>
    
<!-- O conteudo abaixo deve ser enviado via e-mail, esta tudo na pagina como exemplo-->
<?php
   }else if($_GET['token']){
       $token = $_GET['token'];
       if($token != $_SESSION['token']){
            die('O token no parametro get não é valido!');
       }else{
           //Podemos redefinir a nwnha
           echo '<h2>Redefinição de senha para o e-mail: '.$_SESSION['email'].'</h2>';
           echo '<form method="post"> 
                    <input type="password" name="password" />
                    <input type="submit" name="redefinir" value="REDEFINIR" />
                </form>';
       }
?>

<?php
   }
?>


<?php

    if(isset($_POST['redefinir'])){
        echo 'A SENHA FOI REDEFINIDA COM SUCESSO!';
    }

?>
