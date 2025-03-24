<?php
require_once("../../../conexao.php");

$x = '%'.$_POST['foo'].'%';
?>
																		
																		
                                                    


<?php
if($x == ''){
    $query31 = $pdo->query("SELECT * FROM produtos ORDER BY id desc");
}else{
    $query31 = $pdo->query("SELECT * FROM produtos WHERE nome LIKE '$x' ORDER BY id desc");
}
    $res31 = $query31->fetchAll(PDO::FETCH_ASSOC);
    $total_reg31 = @count($res31);
    if($total_reg31 > 0){
        for($i1=0; $i1 < $total_reg31; $i1++){
        foreach ($res31[$i1] as $key => $value){}													
            $nome = $res31[$i1]['nome'];
            $id_prod = $res31[$i1]['id'];						
    ?>	     
        <input  data-checkbox="check" id="<?php echo $id_prod?>" value="<?php echo $id_prod?>" type="checkbox"> 					
        <label for="<?php echo $id_prod?>" style="font-weight: 500;"><?php echo $nome?></label><br>
        <?php
            }
        }else{
        ?>
            <input id="0" value="Nenhum produto encontrado"/>
        <?php
            }
 ?>


<script>


</script>