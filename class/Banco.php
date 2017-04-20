<?php

class Banco {

    private $mysql_hostname = "localhost";
    private $mysql_user = "therevol_ther259";
    private $mysql_password = "[xUpCR6IdraENcR-b$";
    private $mysql_database = "therevol_prot";
    private $conexao;
    private $sql;

    /**
     * Faz a conexão com o banco de dados.
     *
     * @throws Exception
     */
    public function __construct() {
        $this->conexao = mysqli_connect($this->mysql_hostname, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if (mysqli_connect_errno()) {
            throw new Exception(
            "Houve um erro ao tentar se conectar ao Banco de Dados. ERRO: " .
            mysqli_connect_error());
        }
    }

    /**
     * Adiciona os links no protetor.
     *
     * @param array $links            
     * @throws Exception
     */
    public function addLinks(array $links) {
        if (count($links) != 0) {
            $this->sql = "";
            foreach ($links as $link) {
                $link = str_replace("https://", "", str_replace("http://", "", $link));
                $this->sql .= "INSERT INTO noticias1 values('null','PIRATINHA','$link','1');";
            }
            if (mysqli_multi_query($this->conexao, $this->sql)) {
                do {
                    if ($result = mysqli_store_result($this->conexao)) {
                        mysqli_free_result($result);
                    }
                } while (mysqli_more_results($this->conexao) && mysqli_next_result($this->conexao));
            } else {
                throw new Exception(
                "Houve um erro ao tentar adicionar dados ao Banco. ERRO: " .
                mysqli_error($this->conexao));
            }
        }
    }

    /**
     * Retorna a lista de links adicionados.
     *
     * @param int $linksCount            
     * @throws Exception
     */
    public function getListProtetor($linksCount) {
        $arrayLinks = array();
        $this->sql = "SELECT id_noticias FROM noticias1 ORDER BY id_noticias DESC LIMIT 0,$linksCount";
        $retorno = mysqli_query($this->conexao, $this->sql);
        if ($retorno != null) {
            while ($resultado = mysqli_fetch_assoc($retorno)) {
                $arrayLinks[] = $resultado["id_noticias"];
            }
        } else {
            throw new Exception(
            "O retorno da Query está vázia. SQL: " . $this->sql .
            "<br>ERRO: " . mysqli_error($this->conexao));
        }
        return array_reverse($arrayLinks);
    }

    /**
     * Fecha a conexão com o Banco de dados.
     */
    public function closeConexao() {
        mysqli_close($this->conexao);
    }

}
