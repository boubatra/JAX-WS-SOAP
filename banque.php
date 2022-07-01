<?php
$montant=0; 
if(isset($_POST['action'])){
    $action=$_POST['action'];
    if($action=="OK"){
        if(isset($_POST['montant'])){
            $montant=$_POST['montant'];
            $clientSOAP=new SoapClient("http://localhost:8585/BanqueWS?wsdl");
            $param=new stdClass();
            $param->montant=$montant;
            $res=$clientSOAP->__soapCall("conversionEuroToDh",array($param));
        }
    } elseif($action=="Comptes"){
            $clientSOAP=new SoapClient("http://localhost:8585/BanqueWS?wsdl");
            $cptes=$clientSOAP->__soapCall("getComptes", array());

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Conversion</title>
</head>
<body>
    <form action="banque.php" method="post">
        Montant:<input type="text" value="<?php echo($montant) ?>" name="montant">
        <input name="action" type="submit" value="OK">
        <input name="action" type="submit" value="Comptes">

    </form>

        <?php if(isset($res)) {?>
        <?php echo($montant) ?> en Euro = <?php echo($res->return) ?> en Dirham
        <?php }?>
    
        <?php if(isset($cptes)) {?>
        <table border="1">
            <tr>
                <th>CODE</th>
                <th>Solde</th>
            </tr>
            <?php 
                foreach($cptes->return as $cp) {
            ?>
                <tr>
                <td><?php echo($cp->code)?></td>
                <td><?php echo($cp->solde)?></td>
                </tr>
            <?php } ?>
        </table>
        <?php }?>
</body>
</html>
