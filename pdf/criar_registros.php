<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro dos beneficiários da vacina da Covid-19</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"> 
    
    

    <style>
        h1{
            font-size: 18px;
        }
        *{
            font-family: sans-serif;
        }
        table{
            border: 1px solid #ccc;
            width: 100%;
            border-radius: 5px;
            text-align: center;
        }
        table td,
        table th{
            border: 1px solid #ccc;
        }
        table th{
            font-weight: bold;
            background-color: #eee;
            padding: 10px;
        }
    </style>
</head>
<body>
    <center>
    <h1>Registros dos beneficiários da vacina da Covid-19</h1>
    </center><br>
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Vacina</th>
                    <th scope="col">Doses recebidas</th>
                </tr>
            </thead>
            
            <?php
            
                    	include 'conexao.php';

                    		$sql = "SELECT * FROM `beneficiarios`";
                    		$insert = mysqli_query($conexao, $sql);
                    
                    		while($rows = mysqli_fetch_assoc($insert)){
                        	$beneficiario = $rows['beneficiario'];
                        	$idade = $rows['idade'];
                        	$categoria = $rows['categoria'];
                        	$vacina = $rows['vacina'];
                        	$dose = $rows['dose'];
        
            ?>	
        <tbody>
                <tr>
                    <td> <?php echo $beneficiario ?> </td>
                    <td> <?php echo $idade ?> </td>
                    <td> <?php echo $categoria ?> </td>
                    <td> <?php echo $vacina ?></td>
                    <td> <?php echo $dose ?> </td>
                </tr>
                <?php } ?>
        </tbody>
        </table>

</body>
</html>