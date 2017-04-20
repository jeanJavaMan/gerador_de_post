<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Util;

/**
 * Description of Util
 *
 * @author jeanderson
 */
class Util {

    private $dir_down = "../android/";
    private $dir_error_log = "../android/log/log_erro.txt";
    private $dir_error_log_request = "../android/request/error_log";
    private $dir_feed = "../android/log/feed_back.txt";
    private $dir_baixado = "../android/log/acesso/";
    private $dir_votos = "../android/log/votos/";
    private $dir_jogos_recomendado = "../android/log/jogos.txt";
    private $dir_log_pc = "util/pc/error_log";
    private $dir_log_down = "../android/error_log";

    function __construct() {
        
    }

    public function verificar_logs() {
        $dados = [];
        $dados["count"] = 0;
        if (file_exists($this->dir_error_log)) {
            $dados["count"] ++;
            $dados["icon"][] = "assets/icon/error-icon.png";
            $dados["msg"][] = "Um log de erro foi encontrado em ANDROID";
            $dados["href"][] = "?key=log&type=error";
        }
        if (file_exists($this->dir_feed)) {
            $dados["count"] ++;
            $dados["icon"][] = "assets/icon/icon_new.png";
            $dados["msg"][] = "Um Feed Back foi adicionado! Por favor verifique.";
            $dados["href"][] = "?key=log&type=feed";
        }
        if (file_exists($this->dir_log_pc)) {
            $dados["count"] ++;
            $dados["icon"][] = "assets/icon/error-icon.png";
            $dados["msg"][] = "Um log de erro foi encontrado em util/pc por favor verifique";
            $dados["href"][] = "?key=log&type=pc";
        }
        if (file_exists($this->dir_log_down)) {
            $dados["count"] ++;
            $dados["icon"][] = "assets/icon/error-icon.png";
            $dados["msg"][] = "Um log de erro foi encontrado em ANDROID";
            $dados["href"][] = "?key=log&type=error_down";
        }
        if (file_exists($this->dir_error_log_request)) {
            $dados["count"] ++;
            $dados["icon"][] = "assets/icon/error-icon.png";
            $dados["msg"][] = "Um log de erro foi encontrado em ANDROID REQUEST";
            $dados["href"][] = "?key=log&type=error_down_request";
        }
        return $dados;
    }

    public function ler_log($type) {
        switch ($type) {
            case "error":
                return $this->leitor_de_log($this->dir_error_log);
            case "feed":
                return $this->leitor_de_log($this->dir_feed);
            case "acesso":
                return $this->leitor_de_acesso();
            case "pc":
                return $this->leitor_de_log($this->dir_log_pc);
            case "error_down":
                return $this->leitor_de_log($this->dir_log_down);
            case "votos":
                return $this->leitor_de_votos();
            case "error_down_request":
                return $this->leitor_de_log($this->dir_error_log_request);
            default :
                return "";
        }
    }

    private function leitor_de_log($diretorio) {
        if (file_exists($diretorio)) {
            $arquivo = file($diretorio);
            $dados_do_arquivo = "";
            foreach ($arquivo as $texto) {
                $dados_do_arquivo .= $texto;
            }
            return $dados_do_arquivo;
        } else {
            return "";
        }
    }

    public function apagar_log($type) {
        switch ($type) {
            case "error":
                return unlink("../" . $this->dir_error_log);
            case "feed":
                return unlink("../" . $this->dir_feed);
            case "acesso":
                return $this->apagar_acessos();
            case "pc":
                return unlink(str_replace("util/", "", $this->dir_log_pc));
            case "error_down":
                return unlink("../" . $this->dir_log_down);
            case "error_down_request":
                return unlink("../" . $this->dir_error_log_request);
        }
    }

    private function leitor_de_acesso() {
        $texto = "";
        $total = 0;
        $arquivos = scandir($this->dir_baixado);
        for ($i = 0; $i < (count($arquivos) - 2); $i++) {
            $nome_do_arquivo = $arquivos[$i + 2];
            $texto_do_arquivo = $this->leitor_de_log($this->dir_baixado . $nome_do_arquivo);
            $quantidade = intval($texto_do_arquivo);
            $total += $quantidade;
            $data = str_replace(".txt", "", $nome_do_arquivo);
            $texto .= "\n[Data: $data | Acessos: $quantidade ]";
        }
        $texto .= "\n>>>>>>>>>> Informações <<<<<<<<<<\n";
        $media = ($total / (count($arquivos) - 2));
        $texto .="Total Baixado: $total\nMédia de Downloads por dia: $media";        
        return $texto;
    }
    
    private function leitor_de_votos() {
        $texto = "";
        $total = 0;
        $arquivos = scandir($this->dir_votos);
        for ($i = 0; $i < (count($arquivos) - 2); $i++) {
            $nome_do_arquivo = $arquivos[$i + 2];
            $texto_do_arquivo = $this->leitor_de_log($this->dir_votos . $nome_do_arquivo);            
            $estrela = str_replace(".txt", "", $nome_do_arquivo);
            $texto .= "\n[Estrela: $estrela | Votos: $texto_do_arquivo ]";
        }
        $texto .= "\n>>>>>>>>>> Jogos Recomendados <<<<<<<<<<\n";
        $texto_jogos = $this->leitor_de_log($this->dir_jogos_recomendado);
        $texto .= $texto_jogos;
        return $texto;
    }

    /**
     * apagar todos os arquivos da pasta acesso.
     */
    private function apagar_acessos() {
        if(is_dir($this->dir_baixado)){
            $diretorio = dir($this->dir_baixado);
            while($arquivo = $diretorio->read()){
                if(($arquivo != ".") && ($arquivo != "..")){
                    unlink($this->dir_baixado.$arquivo);
                }
            }
            $diretorio->close();
            return true;
        }else{
            return false;
        }
    }

}
