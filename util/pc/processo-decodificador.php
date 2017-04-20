<?php

require_once '../sessoes.php';
require_once './Funcoes.php';
require_once '../simple_html_dom.php';
$links_codificado[] = $_POST["linksCodificado"];
$tipo_servidor = $_POST["decodificador"];
if ($tipo_servidor == "1") {
    if (!empty($links_codificado[0])) {
        $links_decodificado = Funcoes::decodificaLinks($links_codificado);
        $links_prontos = "";
        foreach ($links_decodificado as $link_decode) {
            foreach ($link_decode as $link) {
                $links_prontos .= $link . "\n";
            }
        }
        addLinkCodificado($links_prontos);
        header("location: ../../paginas/pc/form-decodificador.php?key=1");
        die();
    } else {
        header("location: ../../paginas/pc/form-decodificador.php?key=0");
        die();
    }
} else if ($tipo_servidor == "2") {
    if (!empty($links_codificado[0])) {
        $links_codi = Funcoes::separarLinks($links_codificado[0]);
        $links_pronto = "";
        foreach ($links_codi as $link) {
            $posicao = strpos($link, "http://www");
            $link = $posicao != 0 ? substr($link, $posicao) : $link;
            $codigo = file_get_html($link);
            $a = $codigo->find("a[id=link]", 0);
            $links_pronto .= $a->href . "\n";
        }
        addLinkCodificado($links_pronto);
        header("location: ../../paginas/pc/form-decodificador.php?key=1");
        die();
    } else {
        header("location: ../../paginas/pc/form-decodificador.php?key=0");
        die();
    }
}

