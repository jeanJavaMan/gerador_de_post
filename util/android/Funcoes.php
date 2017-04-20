<?php

class Funcoes {

    public static function pegaCodigo($siteUrl) {
        $codigoSite = file_get_contents($siteUrl);
        return $codigoSite;
    }

    public static function pegaDescricao($codeSite) {
        $pattern = '/<div class=\"b\-application\__description\ b\-application\__description\_type\_full\ b\-user\-content\">(.*?)<\/div>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception("Não foi encontrado a descricao <font color='red'>Erro em util/android/Funcoes.php linha: 11</font>", 1);
        } else {
            return $resultado[0][0];
        }
    }

    public static function pegaDownloads($codeSite) {
        $pattern = '/pdalife.ru\/d.*?\/(.*?).html/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception("Não foi encontrado links de Download <font color='red'>Erro em util/android/Funcoes.php linha: 21</font>", 1);
        } else {
            if (count($resultado[0]) >= 3) {
                $links = array_slice($resultado[0], 0, 3);
            } else if (count($resultado) < 3) {
                $links = $resultado[0];
            }
            return $links;
        }
    }

    public static function pegaDownloadsV2($linkDoSite, $possuiMod) {
        $codeSite = file_get_html($linkDoSite);
        for ($i = 0; $i < count($codeSite->find("p.b-download__row")); $i++) {
            $encontrado = $codeSite->find("p.b-download__row", $i);
            $links = $encontrado->find("a", 0);
            $link = $links->href;
            $linkSemHttp = str_replace("http://", "", $link);
            $linksDown[] = str_replace("https://", "", $linkSemHttp);
            if (!$possuiMod && $i === 2) {
                break;
            }
            if ($possuiMod && $i === 3) {
                break;
            }
        }
        return $linksDown;
    }

    public static function pegaTamanhos($codeSite) {
//        $pattern = '/\[(.*?)]</';
//        $retorno = preg_match_all($pattern, $codeSite, $resultado);
//        if ($retorno == 0) {
//            throw new Exception("Não foi encontrado os tamanhos! <font color='red'>Erro em util/android/Funcoes.php linha: 37</font>", 1);
//        } else {
//            return $resultado[1];
//        }
        return "[]";
    }

    public static function pegaNome($codeSite) {
        $pattern = '/<h1 class=\"b\-header\__label\">(.*?)<\/h1>/s';
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            throw new Exception("Não foi encontrado o Nome <font color='red'>Erro em util/android/Funcoes.php linha: 47</font>", 1);
        } else {
            return $resultado[1][0];
        }
    }

    public static function pegaLocalInstall($codeSite) {
        $pattern = "/sdcard\/Android\/.*?\/(.*?)\//s";
        $retorno = preg_match_all($pattern, $codeSite, $resultado);
        if ($retorno == 0) {
            return "";
        } else {
            if (isset($resultado[0][1])) {
                return $resultado[0][1];
            } else {
                return "sem local";
            }
        }
    }

    public static function pegaPartLink($linkSite) {
        $pattern = "/pdalife.ru\/(.*?).html/s";
        preg_match_all($pattern, $linkSite, $resultado);
        return $resultado[1][0];
    }

    public static function pegaQuantDown($linkSite) {
        $codeSite = file_get_html($linkSite);
        $quantidadeDown = count($codeSite->find("div.b-dwn-spoiler__link-line"));
        if ($quantidadeDown <= 4) {
            return $quantidadeDown;
        } else {
            return 4;
        }
    }

    public static function pega_categoria($linkSite) {
        $codeSite = file_get_html($linkSite);
        $a = $codeSite->find("a[itemprop='applicationCategory']", 0);
        return $a->plaintext;
    }

    public static function removeCaracterEditor($texto) {
        $remover = '<div id="ql-editor-1" class="ql-editor" contenteditable="true">';
        return str_replace($remover, "", $texto);
    }

    /**
     * Remove caracteres especiais, assim como acentos.
     * @param type $texto
     * @return type
     */
    public static function remover_caracteres($texto) {
        $texto = str_replace("'", "", $texto);
        $texto = str_replace("#039;", "", $texto);
        $palavra = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $texto);
        $palavra = str_replace("&", "e", $palavra);
        $palavra = str_replace(":", "", $palavra);
        $palavra = str_replace("-", " ", $palavra);
        $palavra = str_replace("_", " ", $palavra);
        $palavra = str_replace(".", "", $palavra);
        $palavra = str_replace("!", "", $palavra);
        return $palavra;
    }

    public static function separar_link_fars($link_fars) {
        if (!empty($link_fars)) {
            $pattern = "/.com\/(.*?)\//s";
            $resultCode = preg_match_all($pattern, $link_fars, $resultado);
            if ($resultCode !== false) {
                return $resultado[1][0];
            } else {
                return new Exception("Houve um erro ao separar o link do farsAndroid");
            }
        }else{
            return null;
        }
    }

}
