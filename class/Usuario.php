<?php
class Usuario{
    private $id;
    private $nomeUsuario;
    private $perfilImagem;
    /**
     * Usuario constructor.
     */
    public function __construct($id,$nomeUsuario,$perfilImagem)
    {
        $this->id = $id;
        $this->nomeUsuario = $nomeUsuario;
        $this->perfilImagem = $perfilImagem.".png";
    }

    /**
     * @return mixed
     */
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    /**
     * @return mixed
     */
    public function getPerfilImagem()
    {
        return $this->perfilImagem;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}