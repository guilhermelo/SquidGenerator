<?php 

class Principal {
	
	private $sitesLiberados;
	private $ipLiberado;
	private $fgPorHora;
	private $fgPorExtensao;
	private $fgPorAutenticacao;
	private $hrInicial;
	private $hrFim;
	private $extPNG;
	private $extEXE;
	private $extPDF;
	private $extGIF;
	private $usuario;
	private $senha;


	function __construct() {}

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSitesLiberados()
    {
        return $this->sitesLiberados;
    }

    /**
     * @param mixed $sitesLiberados
     *
     * @return self
     */
    public function setSitesLiberados($sitesLiberados)
    {
        $this->sitesLiberados = $sitesLiberados;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpLiberado()
    {
        return $this->ipLiberado;
    }

    /**
     * @param mixed $ipLiberado
     *
     * @return self
     */
    public function setIpLiberado($ipLiberado)
    {
        $this->ipLiberado = $ipLiberado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFgPorHora()
    {
        return $this->fgPorHora;
    }

    /**
     * @param mixed $fgPorHora
     *
     * @return self
     */
    public function setFgPorHora($fgPorHora)
    {
        $this->fgPorHora = $fgPorHora;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFgPorExtensao()
    {
        return $this->fgPorExtensao;
    }

    /**
     * @param mixed $fgPorExtensao
     *
     * @return self
     */
    public function setFgPorExtensao($fgPorExtensao)
    {
        $this->fgPorExtensao = $fgPorExtensao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFgPorAutenticacao()
    {
        return $this->fgPorAutenticacao;
    }

    /**
     * @param mixed $fgPorAutenticacao
     *
     * @return self
     */
    public function setFgPorAutenticacao($fgPorAutenticacao)
    {
        $this->fgPorAutenticacao = $fgPorAutenticacao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHrInicial()
    {
        return $this->hrInicial;
    }

    /**
     * @param mixed $hrInicial
     *
     * @return self
     */
    public function setHrInicial($hrInicial)
    {
        $this->hrInicial = $hrInicial;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHrFim()
    {
        return $this->hrFim;
    }

    /**
     * @param mixed $hrFim
     *
     * @return self
     */
    public function setHrFim($hrFim)
    {
        $this->hrFim = $hrFim;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtPNG()
    {
        return $this->extPNG;
    }

    /**
     * @param mixed $extPNG
     *
     * @return self
     */
    public function setExtPNG($extPNG)
    {
        $this->extPNG = $extPNG;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtEXE()
    {
        return $this->extEXE;
    }

    /**
     * @param mixed $extEXE
     *
     * @return self
     */
    public function setExtEXE($extEXE)
    {
        $this->extEXE = $extEXE;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtPDF()
    {
        return $this->extPDF;
    }

    /**
     * @param mixed $extPDF
     *
     * @return self
     */
    public function setExtPDF($extPDF)
    {
        $this->extPDF = $extPDF;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtGIF()
    {
        return $this->extGIF;
    }

    /**
     * @param mixed $extGIF
     *
     * @return self
     */
    public function setExtGIF($extGIF)
    {
        $this->extGIF = $extGIF;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}


 ?>