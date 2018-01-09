<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('conexao.php');
$db = mysql_select_db('DB_voxus', $link);

if ($_GET['action'] == 'deletar')
	{
        mysql_query("delete from ".tab_task." where codigo = ".$_GET['codigo']) 
		or die ('Falha ao deletar o registro da tabela "'.tab_task.'": '.mysql_error());
    }

?>


<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Consultar Cadastros</title>
	<link type="text/css" rel="stylesheet" href="estilo1.css"/>


</head>
<body>
<h1>Consulta de Cadastros</h1>

    <table border="1">

        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Anexo</th>
            <th>Ação</th>
        </tr>


        <?php
        
        $sql = "SELECT * FROM tab_task";
        $select = mysql_query($sql)  or die(mysql_error());

        while ($registro = mysql_fetch_object($select)){
                $codigo = $registro['codigo'];
                $nome = $registro['nome'];
                $descricao = $registro['descricao'];
                $anexo = $registro['anexo'];


                echo "<tr>
                    <td>$codigo</td>
                    <td>$nome</td>
                    <td>$descricao</td>
                    <td>$anexo</td>
                    <td>
                    < href='fomularioedicao.html?action=editar&codigousu='.$registro->numero.>Editar</a>
                    <a href='consulta.php?action=deletar&codigo='.$registro->numero.''>Deletar</a>
                    </td>
                </tr>";
        }
        mysql_free_result($select);

        ?>

        <tr></tr>

    </table>
    <a href="formulario.html">Incluir Cadastro</a>
</body>
</html>
