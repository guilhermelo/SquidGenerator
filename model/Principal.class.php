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
    private $extMP3;
    private $extMP4;
    private $extJPG;
    private $extDOCX;
	private $usuario;
	private $senha;
    private $opBloqHora;
    private $opBloqIp;
    private $opBloqExt;


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


    public function setOpBloqHora($opBloqHora){
        $this->opBloqHora = $opBloqHora;

        return $this;
    }

    public function getOpBloqHora(){
        return $this->opBloqHora;
    }

    public function setOpBloqExt($opBloqExt){
        $this->opBloqExt = $opBloqExt;

        return $this;
    }

    public function getOpBloqExt(){
        return $this->opBloqHora;
    }

    public function setOpBloqIp($opBloqIp){
        $this->opBloqIp = $opBloqIp;

        return $this;
    }

    public function getOpBloqIp(){
        return $this->opBloqIp;
    }

    public function getExtMP3()
    {
        return $this->extMP3;
    }

    public function setExtMP3($extMP3)
    {
        $this->extMP3 = $extMP3;

        return $this;
    }

    public function getExtMP4()
    {
        return $this->extMP4;
    }

    public function setExtMP4($extMP4)
    {
        $this->extMP4 = $extMP4;

        return $this;
    }

    public function getExtDOCX()
    {
        return $this->extDOCX;
    }

    public function setExtDOCX($extDOCX)
    {
        $this->extDOCX = $extDOCX;

        return $this;
    }
}


 ?>