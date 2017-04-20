<?php

class CodeSite {

    public static function getTitulo($type, $nomeDoJogo, $possuiMod) {
        switch ($type) {
            case 1:
                return "Download " . $nomeDoJogo . " APK Completo e Atualizado - Android";
            case 2:
                if ($possuiMod) {
                    return "Download " . $nomeDoJogo . " APK + MOD Atualizado - Android";
                } else {
                    return "Download " . $nomeDoJogo . " APK + DATA Atualizado - Android";
                }
            case 3:
                return "Download " . $nomeDoJogo . " APK + DATA Torrent Atualizado - Android";
            case 4:
                if ($possuiMod) {
                    return "Download " . $nomeDoJogo . " APK + DATA + MOD Torrent Atualizado - Android";
                } else {
                    return "Download " . $nomeDoJogo . " APK + DATA Atualizado - Android";
                }
            default:
                return "Download " . $nomeDoJogo . " Atualizado - Android";
        }
    }

    public static function getIntroducao($nomeDoJogo, $introducao, $nomeImagem) {
        $retorno = preg_match_all("/<div>(.*?)<\/div>/", $introducao,$result);
        if($retorno != 0){
            $introducao = $result[1][0];
        }
        $intro = "<img class='size-full aligncenter' src='http://therevolution.com.br/wp-content/uploads/2016/img/" . $nomeImagem . ".png' alt='" . $nomeImagem . "' width='590' height='350' />\n" . "<strong>" . $nomeDoJogo . " - </strong> " . $introducao . "<!--more-->\n";
        return $intro;
    }

    public static function getParagrafo($nomeJogo) {
        $paragrafo = "<!--more-->\n\n<h2>" . $nomeJogo . " - Completo & Atualizado</h2>\n";
        return $paragrafo;
    }

    public static function getTabelas($links, $tamanhosArquivos, $descricao, $possuiMod, $quantDown) {
        $download = "[wptab name='DOWNLOAD/DESCRIÇÃO']"
                . "<h2><strong>Descrição</strong></h2>\n" . $descricao . "\n\n"
                . "\n<strong>Tamanho & Informações:</strong>\n\n";
        if(!$possuiMod){
            $download .= "<strong>Informações e Tamanhos dos arquivos estão na página de Download!</strong>\n\n";
        }else{
            $download .= "<strong>Informações Sobre o MOD e os Tamanhos dos arquivos estão na página de Download</strong>\n\n";
        }
        $download .= "<hr />
                      <ul>
                      <li>Após passar pelo protetor, você será redirecionado para a página contendo todos os arquivo do Jogo e <strong>Sempre com a versão atualizada </strong>e o melhor com<strong> Links Diretos Aproveite!
                      </strong></li>
                      <li>Clique no botão <strong>DOWNLOAD</strong> logo a baixo para baixar!</li>
                      </ul>
                      <a href='http://protetor.therevolution.com.br/news/" . $links[0] . "' target='_blank'><img class='alignnone wp-image-10767' src='http://therevolution.com.br/wp-content/uploads/2016/08/Botao-Download.png' alt='Botao-Download' width='254' height='94' /></a>
                      [/wptab]\n\n\n";
        return $download;
    }

    public static function getComoInstall($type, $localInstall, $temMod) {
        if ($type <= 1 || ($temMod && $type <= 2)) {
            $install = "[wptab name='COMO INSTALAR/BAIXAR']\n"
                    . "\n"
                    . "<strong>Modo de instalação</strong>:\n"
                    . "<ul>\n"
                    . " 	<li>Baixe o <strong>APK(instalador)</strong></li>\n"
                    . " 	<li>Cole o <strong>APK</strong> para a memória ou SD do seu Android</li>\n"
                    . " 	<li>Desconecte seu celular do computador</li>\n"
                    . " 	<li>Abra o explorador de memória do seu celular,</li>\n"
                    . " 	<li>Procure o APK e instale</li>\n"
                    . " 	<li>Seja Feliz!</li>\n"
                    . "</ul>\n"
                    . "Ainda está com dúvidas? <a href='http://therevolution.com.br/como-instalar-apk-e-data-no-android/' target='_blank'>Clique aqui e veja um tutorial detalhado</a>\n\n"
                    . "&nbsp;\n"
                    . "\n"
                    . "[/wptab]\n\n\n";
            return $install;
        } else if ($type > 1) {
            $install = "[wptab name='COMO INSTALAR']\n"
                    . "\n"
                    . "<strong>Modo de instalação</strong>:\n"
                    . "<ul>\n"
                    . " 	<li>Baixe os arquivos (<strong>APK</strong> + <strong>DATA</strong>)</li>\n"
                    . " 	<li>Cole o <strong>APK</strong> para a memória ou SD do seu Android</li>\n"
                    . "     <li>Extraia o <strong>DATA</strong> para qualquer pasta do computador</li>\n"
                    . " 	<li>No Celular cole o <strong>DATA</strong> na pasta <strong>" . $localInstall . "</strong></li>\n"
                    . " 	<li>Desconecte seu celular do computador</li>\n"
                    . " 	<li>Abra o explorador de memória do seu celular,</li>\n"
                    . " 	<li>Procure o APK e instale</li>\n"
                    . " 	<li>Seja Feliz!</li>\n"
                    . "</ul>\n"
                    . "Ainda está com dúvidas? <a href='http://therevolution.com.br/como-instalar-apk-e-data-no-android/' target='_blank'>Clique aqui e veja um tutorial detalhado</a>\n\n"
                    . "&nbsp;\n"
                    . "\n"
                    . "[/wptab]\n\n\n";
            return $install;
        }
    }

    public static function getYoutube($youtubeLink) {
        if (!empty($youtubeLink)) {
            $trailer = "[wptab name='TRAILER']\n"
                    . "[youtube " . $youtubeLink . "&amp;w=480&amp;h=270]\n"
                    . "[/wptab]\n\n\n";

            return $trailer;
        } else {
            return "";
        }
    }

    public static function getImagens($imagensNomes, $largura = 590, $altura = 350) {
        $textoFinal = "[wptab name='IMAGENS']\n<img class='alignnone size-full' src='http://therevolution.com.br/wp-content/uploads/2016/img/" . $imagensNomes[1] . ".png' alt='" . $imagensNomes[1] . "' width='" . $largura . "' height='" . $altura . "' /><img class='alignnone size-full' src='http://therevolution.com.br/wp-content/uploads/2016/img/" . $imagensNomes[2] . ".png' alt='" . $imagensNomes[2] . "' width='" . $largura . "' height='" . $altura . "' /><img class='alignnone size-full' src='http://therevolution.com.br/wp-content/uploads/2016/img/" . $imagensNomes[3] . ".png' alt='" . $imagensNomes[3] . "' width='" . $largura . "' height='" . $altura . "' /><img class='alignnone size-full' src='http://therevolution.com.br/wp-content/uploads/2016/img/" . $imagensNomes[4] . ".png' alt='" . $imagensNomes[4] . "' width='" . $largura . "' height='" . $altura . "' />[/wptab]\n\n"
                . "[wptab name='AJUDA']\n"
                . "\n"
                . "Caso ao instalar o app e ao abrir aparece <strong>licença inválida</strong>, então siga o passo a passo que irei mostrar!\n"
                . "\n"
                . "<strong>Requisitos:</strong>\n"
                . "<ol>\n"
                . " 	<li>Seu SmartPhone precisa ter acesso <strong>ROOT</strong>.</li>\n"
                . " 	<li>Você Precisa ter instalado em seu celular o app <strong>lucky patcher</strong></li>\n"
                . "</ol>\n"
                . "<strong>Passo a Passo:</strong>\n"
                . "<ul>\n"
                . " 	<li>Baixe e Instale o app lucky Patcher e dê acesso root a ele.</li>\n"
                . " 	<li>Abra o Lucky Patcher vai aparecer a lista de apps instalado no celular.</li>\n"
                . " 	<li>Selecione o Jogo e vai em <strong>Abrir Menu de Patches.</strong></li>\n"
                . " 	<li>Depois clique em <strong>Remover Verificação de Licença.</strong></li>\n"
                . " 	<li>E por fim clique em <strong>Modos Automáticos</strong> e depois em aplicar.</li>\n"
                . "</ul>\n"
                . "<strong>Fim:</strong>\n"
                . "\n"
                . "Esse método funcionar na maioria dos casos, após fazer os passo a passo, você poderá jogar tranquilamente sem aparecer Licença Inválida!\n"
                . "\n"
                . "&nbsp;\n"
                . "\n"
                . "[/wptab]"
                . "[end_wptabset]";
        return $textoFinal;
    }

    public static function getTags($nomeJogo) {
        $texto = "Baixar Atualização " . $nomeJogo . ", Baixar Atualizado " . $nomeJogo . ", "
                . "Baixar Grátis " . $nomeJogo . ", Baixar " . $nomeJogo . " apk e data, Baixar " . $nomeJogo . " atualizado, "
                . "Baixar " . $nomeJogo . " Completo Android, Baixar " . $nomeJogo . " Completo Sem Erros, Baixar " . $nomeJogo . " Completo Torrent"
                . ", Como Baixar e Instalar " . $nomeJogo . " completo + data, Como Baixar Grátis " . $nomeJogo . ", Como baixar " . $nomeJogo . ", "
                . "Download " . $nomeJogo . " Android Game Full, Download " . $nomeJogo . " Android Torrent Full, download " . $nomeJogo . " apk + data,"
                . " Download " . $nomeJogo . " Completo, Download " . $nomeJogo . " Crackeado,"
                . " Download " . $nomeJogo . " Free Baixar " . $nomeJogo . " Completo para Android (2017) + Atualização + Data"
                . " Jogo grátis Faça o Download Torrent FULL e sem erros Aproveitem, Download " . $nomeJogo . " full cracked, Fazer Download " . $nomeJogo . ""
                . " Completo Android, how to download " . $nomeJogo . ", How To Download " . $nomeJogo . " Full Cracked, Jogar " . $nomeJogo . ", Jogo " . $nomeJogo . ""
                . "  Completo, mrandroid, " . $nomeJogo . " android, " . $nomeJogo . " apk, " . $nomeJogo . " apk data, " . $nomeJogo . " apk download, " . $nomeJogo . ""
                . " apk offline, " . $nomeJogo . " Download Completo Grátis, " . $nomeJogo . " google play, " . $nomeJogo . " Grátis, Update " . $nomeJogo . ","
                . " how to download " . $nomeJogo . ", how do i download " . $nomeJogo . ", jogos android 2017";
        return $texto;
    }

    public static function getMetaDesc($nomeJogo) {
        $metaDescricao = "Versão Atualizada Baixar " . $nomeJogo . " Completo para Android(2017) + Atualização + Data Jogo grátis Faça o Download Torrent FULL e sem erros Aproveitem";
        return $metaDescricao;
    }

}
