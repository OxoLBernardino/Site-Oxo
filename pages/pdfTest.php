<?php


//referenciar o DOMPDF com name space
use Dompdf\Dompdf;
//include autoloader
require_once '../gerenciamento/dompdf/autoload.inc.php';

//Criando a instancia

$relatorio = new DOMPDF();

$relatorio->load_html('
       <h1 style="text_align: center;"> GERAR RELATORIO PDF </h1>'
        . '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquet neque metus, et fringilla libero finibus non. Integer a metus mollis, dignissim dui sed, fermentum massa. Vivamus eget vulputate libero, ac tristique urna. Nulla vitae lacinia urna. Sed ac mi a ex pretium viverra id tincidunt turpis. Integer pellentesque porttitor justo et venenatis. Morbi varius arcu id ligula gravida, non molestie metus ornare. Duis in magna tortor. Nam non urna at justo sollicitudin viverra eget quis leo. Morbi ullamcorper dictum odio at finibus. Nunc vitae euismod sapien. Etiam facilisis, lectus et finibus pretium, nisl lorem porttitor orci, at egestas ex turpis a mauris. Nulla ac metus nec mi lacinia congue sed vitae neque. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

<p>In ut augue diam. Coração receitou, palaço ???Pellentesque fermentum nulla quis nunc sollicitudin, id vehicula massa pretium. Sed massa purus, lobortis nec aliquet vitae, hendrerit non quam. Aenean iaculis lacus eget nunc convallis, et suscipit sem pellentesque. Sed sem arcu, efficitur ut consequat ac, bibendum non erat. Donec ac lacus sit amet purus facilisis dictum nec id urna.</p>'
        );

//renderizar o html

$relatorio->render();

//exibir a pagina
$relatorio->stream(
        
        "pedido.pdf",
        array(
            "Attachment" => false
        )
        
        );