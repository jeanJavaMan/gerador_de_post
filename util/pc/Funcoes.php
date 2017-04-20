<?php

use Stichoza\GoogleTranslate\TranslateClient;

class Funcoes {

    public static function pegaCodigo($siteUrl) {
        $codigoSite = file_get_contents($siteUrl);
        return $codigoSite;
    }

    public static function pegaIntroducao($codeSite) {
        $pattern = '/<div class="game_description_snippet">(.*?)<\/div>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            return "";
        } else {
            if (isset($resultado[1][0])) {
                return $resultado[1][0];
            } else {
                return null;
            }
        }
    }

    /**
     *  Pega descrição para Post normal
     * @param type $codeSite
     * @return string
     * @throws Exception
     */
    public static function pegaDescricao($codeSite) {
        $pattern = '/<h2>About.*?<\/h2>(.*?)<div/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Descrição não encontrada <font color='red'>Erro em util/pc/Funcoes.php linha: 24</font>", 1);
        }
        if (isset($resultado[1][0])) {
            return $resultado[1][0];
        } else {
            return "Descrição não encontrada!";
        }
    }

    /**
     * Pegar a descrição para postV2 colocando o código fonte.
     * @param type $codeSite
     * @return string
     * @throws Exception
     */
    public static function pega_descricao_v2($codeSite) {
        $pattern = '/<h2>Sobre.*?<\/h2>(.*?)<div/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Descrição não encontrada <font color='red'>Erro em util/pc/Funcoes.php linha: 24</font>", 1);
        }
        if (isset($resultado[1][0])) {
            return $resultado[1][0];
        } else {
            return "Descrição não encontrada!";
        }
    }

    public static function pegaTitulo($codeSite) {
        $pattern = '/class=\"apphub_AppName">(.*?)<\/div/';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Titulo não encontrado <font color='red'>Erro em util/pc/Funcoes.php linha: 38</font>", 1);
        } else {
            return $resultado[1][0];
        }
    }

    /**
     *  Pega o gênero do jogo no post normal.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pegaGeneros($codeSite) {
        $pattern = '/<b>Genre:<\/b> <a href=\".*?">(.*?)<\/a><br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Gêneros não encontrados <font color='red'>Erro em util/pc/Funcoes.php linha: 49</font>", 1);
        }
        return strip_tags($resultado[1][0]);
    }

    /**
     *  Pega o gênero do jogo no postV2 colocando o código fonte.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pega_generos_v2($codeSite) {
        $pattern = '/<b>Gênero:<\/b> <a href=\".*?">(.*?)<\/a><br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Gêneros não encontrados <font color='red'>Erro em util/pc/Funcoes.php linha: 49</font>", 1);
        }
        return strip_tags($resultado[1][0]);
    }

    /**
     * Pega a data do jogo no post normal.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pegaData($codeSite) {
        $pattern = '/<b>Release Date:<\/b>(.*?)<br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Data de Lançamento não encontrada <font color='red'>Erro em util/pc/Funcoes.php linha: 59</font>", 1);
        }
        return $resultado[1][0];
    }

    /**
     * Pega a data do jogo no postV2 colocando o código fonte.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pega_data_v2($codeSite) {
        $pattern = '/<b>Data de lançamento:<\/b>(.*?)<br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Data de Lançamento não encontrada <font color='red'>Erro em util/pc/Funcoes.php linha: 59</font>", 1);
        }
        return $resultado[1][0];
    }

    /**
     * Pega o nome da distribuidora no post normal.
     * @param type $codeSite
     * @return string
     */
    public static function pegaDistribuidora($codeSite) {
        $pattern = '/<b>Publisher:<\/b>(.*?)<br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            return "";
        }
        return strip_tags($resultado[1][0]);
    }

    /**
     * Pega o nome da distribuidora no postV2 colocando código fonte.
     * @param type $codeSite
     * @return string
     */
    public static function pega_distribuidora_v2($codeSite) {
        $pattern = '/<b>Distribuidora:<\/b>(.*?)<br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            return "";
        }
        return strip_tags($resultado[1][0]);
    }

    /**
     * Pega o nome do desenvolvedor no post normal.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pegaDesenvolvedor($codeSite) {
        $pattern = '/<b>Developer:<\/b>(.*?)<br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Desenvolvedor não encontrado <font color='red'>Erro em util/pc/Funcoes.php linha: 79</font>", 1);
        }
        return strip_tags($resultado[1][0]);
    }

    /**
     * Pega o nome do desenvolvedor no postV2 colocando o código fonte.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pega_desenvolvedor_v2($codeSite) {
        $pattern = '/<b>Desenvolvedor:<\/b>(.*?)<br>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Desenvolvedor não encontrado <font color='red'>Erro em util/pc/Funcoes.php linha: 79</font>", 1);
        }
        return strip_tags($resultado[1][0]);
    }

    public static function pegaClassificacao($codeSite) {
        $pattern = '/itemprop=\"description">(.*?)<\/span>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            return "";
        } else {
            return $resultado[1][0];
        }
    }

    public static function pegaAnalise($codeSite) {
        $pattern = '/<span class=\"responsive_hidden">(.*?)<\/span>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            return "";
        } else {
            return $resultado[1][0];
        }
    }

    /**
     * Pega os requisitos mínimos do jogo no post normal.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pegaRequisitoMin($codeSite) {
        $pattern = '/<strong>Minimum:<\/strong>(.*?)<\/ul>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Requisito não encontrado <font color='red'>Erro em util/pc/Funcoes.php linha: 106</font>", 1);
        } else {
            // ao traduzir lembrar de usar o replace de /
            return $resultado[0][0];
        }
    }

    /**
     * Pega os requisitos mínimos do jogo no postV2 colocando o código fonte.
     * @param type $codeSite
     * @return type
     * @throws Exception
     */
    public static function pega_requisito_min_v2($codeSite) {
        $pattern = '/<strong>Mínimos:<\/strong>(.*?)<\/ul>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Requisito não encontrado <font color='red'>Erro em util/pc/Funcoes.php linha: 106</font>", 1);
        } else {
            // ao traduzir lembrar de usar o replace de /
            return $resultado[0][0];
        }
    }

    /**
     * Pega os requisitos recomendados do jogo no post normal.
     * @param type $codeSite
     * @return string
     */
    public static function pegaRequisitoMax($codeSite) {
        $pattern = '/<strong>Recommended:<\/strong>(.*?)<\/ul>/s';
        $encontrou = preg_match_all($pattern, $codeSite, $resultado);
        // ao traduzir lembrar de usar o replace de /
        if ($encontrou == 0) {
            return "";
        } else {
            return $resultado[0][0];
        }
    }

    /**
     * Pega os requisitos recomendados do jogo no postV2 colocando o código fonte.
     * @param type $codeSite
     * @return string
     */
    public static function pega_requisito_max_v2($codeSite) {
        $pattern = '/<strong>Recomendados:<\/strong>(.*?)<\/ul>/s';
        $encontrou = preg_match_all($pattern, $codeSite, $resultado);
        // ao traduzir lembrar de usar o replace de /
        if ($encontrou == 0) {
            return "";
        } else {
            return $resultado[0][0];
        }
    }

    public static function pegaTipoJogo($codeSite) {
        $pattern = '/class=\"name".*?>(.*?)<\/a>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception(
            "Tipo jogo não encontrado <font color='red'>Erro em util/pc/Funcoes.php linha: 129</font>", 1);
        } else {
            return $resultado[1][0];
        }
    }

    public static function removerCaracteres($texto) {
        $texto = str_replace("'", "", $texto);
        $texto = str_replace("#039;", "", $texto);
        $palavra = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $texto);
        $palavra = str_replace("&", "e", $palavra);
        $palavra = str_replace(":", "", $palavra);
        $palavra = str_replace("-", "", $palavra);
        $palavra = str_replace("_", " ", $palavra);
        $palavra = str_replace(".", "", $palavra);
        $palavra = str_replace("!", "", $palavra);
        $palavra = str_replace("/", "", $palavra);
        return $palavra;
    }

    /* Funções para post do tipo ANIME */

    public static function pegarImagemCapa($codeAnbient) {
        $div = $codeAnbient->find("div.poster-trailer", 0);
        $img = $div->find("img", 0);
        return "https://www.anbient.com" . $img->src;
    }

    public static function pegarDescricaoAnime($codeAnbient) {
        $div = $codeAnbient->find("div.field-body", 0);
        $sinopse = $div->find("div", 0);
        return $sinopse->plaintext;
    }

    public static function pegarLinkImagem($linksmoeanime, $quantidade) {
        $linksImagem = array();
        for ($index = 0; $index < $quantidade; $index ++) {
            if ($index === 0) {
                $link = $linksmoeanime;
            } else {
                $link = $linksmoeanime . "/" . ($index + 1);
            }
            $codeAnima = file_get_html($link);
            for ($i = 0; $i < count($codeAnima->find("div.episode-list-box-image")); $i ++) {
                $div = $codeAnima->find("div.episode-list-box-image", $i);
                $img = $div->find("img", 0);
                $linksImagem[] = $img->src;
            }
        }
        return $linksImagem;
    }

    public static function separarLinks($links) {
        if ($links != null || !empty($links)) {
            $pattern = "/htt(.*)\s|htt(.*)\Z/";
            $retorno = preg_match_all($pattern, $links, $resultado);
            if ($retorno == 0) {
                throw new Exception(
                "<font color='red'>Não foi possivel separar os links na função: separarLinks(links)</font>"
                . "\nLinks Fornecidos: " . $links);
            } else {
                return $resultado[0];
            }
        } else {
            $vazio = [];
            return $vazio;
        }
    }

    public static function pegarTitulo($codeAnbient) {
        $h1 = $codeAnbient->find("h1.title", 0);
        return $h1->plaintext;
    }

    public static function verificarExtensao($link) {
        $tmp = explode(".", $link);
        $resultado = end($tmp);

        if ($resultado == "gif") {
            return true;
        } else if ($resultado == "jpg" || $resultado == "png" || $resultado == "jpeg") {
            return false;
        } else {
            return true;
        }
    }

    public static function pegaInformacoesList($urlAnimeList, TranslateClient $tr) {
        $codeAnimeList = file_get_html($urlAnimeList . "/episode");
        $informacoesExtra = "";
        for ($i = 0; $i < count($codeAnimeList->find("div.spaceit")); $i ++) {
            $div = $codeAnimeList->find("div.spaceit", $i);
            $informacoesExtra .= $tr->translate($div->plaintext) . "\n";
        }
        $htmlSite = file_get_contents($urlAnimeList);
        $pattern = '/itemprop=\"ratingValue">(.*?)<\/span>/';
        if (preg_match_all($pattern, $htmlSite, $resultado)) {
            $informacoesExtra .= "Nota: " . $resultado[1][0];
        }
        return $informacoesExtra;
    }

    public static function pegaIntroducaoList($urlAnimeList) {
        $codeAnimeList = file_get_html($urlAnimeList . "/episode");
        $introducao = "";
        for ($i = 0; $i < count($codeAnimeList->find("div.spaceit_pad")); $i ++) {
            $div = $codeAnimeList->find("div.spaceit_pad", $i);
            $introducao .= $div->plaintext;
        }
        return str_replace("\n", " ", $introducao);
    }

    public static function pegaNomeEpisodios($urlAnimeList, TranslateClient $tr, $quantList) {
        $episodios = array();
        for ($index = 0; $index < $quantList; $index ++) {
            if ($index === 0) {
                $link = $urlAnimeList . "/episode";
            } else {
                $link = $urlAnimeList . "/episode?offset=" . $index . "00";
            }
            $code = file_get_html($link);
            for ($i = 0; $i < count($code->find("a.fl-l")); $i ++) {
                $a = $code->find("a.fl-l", $i);
                $episodios[] = $tr->translate($a->plaintext);
            }
        }

        return $episodios;
    }

    public static function pegaTituloAnimeList($codeAnimeList) {
        $h1 = $codeAnimeList->find("h1.h1", 0);
        return $h1->plaintext;
    }

    public static function pegaNomeEpisodioDe($codeAnimeList, $qualEpisodio, $quantidade, TranslateClient $tr) {
        $episodios = array();
        $apartirDe = ($qualEpisodio - 1);
        for ($i = 0; $i < $quantidade; $i ++) {
            $a = $codeAnimeList->find("a.fl-l", $apartirDe);
            $episodios[] = $tr->translate($a->plaintext);
            $apartirDe++;
        }
        return $episodios;
    }

    public static function pegaImagensAnima($codeAnimaKai, $qualEpisodio, $quantidade) {
        $linksImagem = array();
        $encontrado = 1;
        for ($i = 0; $i < sizeof($codeAnimaKai->find("div.nome-thumb")); $i++) {
            $div = $codeAnimaKai->find("div.nome-thumb", $i);
            $span = $div->find("span", 0);
            $texto = str_replace(" ", "", $span->plaintext);
            $textoComparar = "epi" . $qualEpisodio;
            if (strcmp($texto, $textoComparar) == 0) {
                $a = $div->find("a", 1);
                $img = $a->find("img", 0);
                $linksImagem[] = $img->src;
                if ($encontrado == $quantidade) {
                    break;
                } else {
                    $encontrado++;
                    $qualEpisodio++;
                }
            }
        }
        return $linksImagem;
    }

    public static function removeCaracterEditor($texto) {
        $remover = '<div id="ql-editor-1" class="ql-editor" contenteditable="true">';
        return str_replace($remover, "", $texto);
    }

    /**
     * Função que decodificar os links codificados e junta aos links normais.
     * Obs: já separa os links também.
     * @param array $linksNormais
     * @param array $linksCodificados
     */
    public static function juntaLinksCodi(array $linksNormais, array $linksCodificados) {
        $linksProntos = [];
        $contador = 0;
        if (count($linksNormais) >= count($linksCodificados)) {
            $contador = count($linksNormais);
        } else {
            $contador = count($linksCodificados);
        }
        for ($i = 0; $i < $contador; $i++) {
            if (isset($linksNormais[$i]) || !empty($linksNormais[$i])) {
                $linkSeparado = Funcoes::separarLinks($linksNormais[$i]);
                $linksProntos[$i] = $linkSeparado;
            } else {
                $array_inicial = [];
                $linksProntos[$i] = $array_inicial;
            }
            if (isset($linksCodificados[$i]) || !empty($linksCodificados[$i])) {
                $linkSeparado2 = Funcoes::separarLinks($linksCodificados[$i]);
                $linksCod = Funcoes::pegarCodigoDeDownload($linkSeparado2);
                foreach ($linksCod as $link) {
                    $linksProntos[$i][] = Funcoes::decodificarBase64($link);
                }
            }
        }
        return $linksProntos;
    }

    public static function decodificaLinks(array $linksCodi) {
        $linksPronto = [];
        for ($i = 0; $i < count($linksCodi); $i++) {
            $linksSeparado = Funcoes::separarLinks($linksCodi[$i]);
            $links_com_codi = Funcoes::pegarCodigoDeDownload($linksSeparado);
            foreach ($links_com_codi as $link_codificado) {
                $linksPronto[$i][] = Funcoes::decodificarBase64($link_codificado);
            }
        }
        return $linksPronto;
    }

    private static function decodificarBase64($link) {
        $split = explode("/", $link);
        $length = count($split);
        $part2[0] = $split[($length - 2)];
        $p2len = (strlen($part2[0]) - 1 );
        $vv = "";
        for ($i = $p2len; $i >= 0; $i--) {
            $vv .= "" . $part2[0][$i] . "";
        }
        return base64_decode($vv);
    }

    private static function pegarCodigoDeDownload($linksCodifiicados) {
        $linksComCode = [];
        $pattern = "/punchsub.zlx.com.br\/download\/(.*)/";
        foreach ($linksCodifiicados as $linkCodificado) {
            if (preg_match_all($pattern, $linkCodificado, $resultado) != 0) {
                $linksComCode[] = $resultado[0][0];
            }
        }
        return $linksComCode;
    }

}
