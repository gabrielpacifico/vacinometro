<?php
        require __DIR__.'/vendor/autoload.php';

        use Dompdf\Dompdf;
        use Dompdf\Options;

        //Instanciação do objeto options
        $options = new Options();

        //Configuração da root para o diretório atual
        $options->setChroot(__DIR__);

        //Instanciação do objeto dompdf
        $dompdf = new Dompdf($options);

        //Armazenamento das saídas do arquivo em buffer
        ob_start();
        require 'pdf/criar_registros.php';

        //Envio do valor do buffer para a a classe
        $dompdf->loadHtml(ob_get_clean());

        //Página
        $dompdf->setPaper('A4','landscape');
        
        //Renderização do arquivo PDF
        $dompdf->render();

        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();

        //Forçar Download
        //$dompdf->stream('Registro beneficiários da vacina da Covid-19');

?>