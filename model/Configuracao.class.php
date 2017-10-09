<?php 

class Configuracao{
	private $hostname;
	private $qtdeRam;
	private $tamMaxArqRam;
	private $tamMaxArqDisco;
	private $tamMinArqDisco;
	private $percMinCacheSwap;
	private $percMaxCacheSwap;
    private $tamArquivoCache;
    private $qtdePastas;
    private $qtdeSubPastas;

    function __construct(){}

    /**
     * @return mixed
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param mixed $hostname
     *
     * @return self
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQtdeRam()
    {
        return $this->qtdeRam;
    }

    /**
     * @param mixed $qtdeRam
     *
     * @return self
     */
    public function setQtdeRam($qtdeRam)
    {
        $this->qtdeRam = $qtdeRam;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTamMaxArqRam()
    {
        return $this->tamMaxArqRam;
    }

    /**
     * @param mixed $tamMaxArqRam
     *
     * @return self
     */
    public function setTamMaxArqRam($tamMaxArqRam)
    {
        $this->tamMaxArqRam = $tamMaxArqRam;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTamMaxArqDisco()
    {
        return $this->tamMaxArqDisco;
    }

    /**
     * @param mixed $tamMaxArqDisco
     *
     * @return self
     */
    public function setTamMaxArqDisco($tamMaxArqDisco)
    {
        $this->tamMaxArqDisco = $tamMaxArqDisco;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTamMinArqDisco()
    {
        return $this->tamMinArqDisco;
    }

    /**
     * @param mixed $tamMinArqDisco
     *
     * @return self
     */
    public function setTamMinArqDisco($tamMinArqDisco)
    {
        $this->tamMinArqDisco = $tamMinArqDisco;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPercMinCacheSwap()
    {
        return $this->percMinCacheSwap;
    }

    /**
     * @param mixed $percMinCacheSwap
     *
     * @return self
     */
    public function setPercMinCacheSwap($percMinCacheSwap)
    {
        $this->percMinCacheSwap = $percMinCacheSwap;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPercMaxCacheSwap()
    {
        return $this->percMaxCacheSwap;
    }

    /**
     * @param mixed $percMaxCacheSwap
     *
     * @return self
     */
    public function setPercMaxCacheSwap($percMaxCacheSwap)
    {
        $this->percMaxCacheSwap = $percMaxCacheSwap;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTamArquivoCache()
    {
        return $this->tamArquivoCache;
    }

    /**
     * @param mixed $tamArquivoCache
     *
     * @return self
     */
    public function setTamArquivoCache($tamArquivoCache)
    {
        $this->tamArquivoCache = $tamArquivoCache;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQtdePastas()
    {
        return $this->qtdePastas;
    }

    /**
     * @param mixed $qtdePastas
     *
     * @return self
     */
    public function setQtdePastas($qtdePastas)
    {
        $this->qtdePastas = $qtdePastas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQtdeSubPastas()
    {
        return $this->qtdeSubPastas;
    }

    /**
     * @param mixed $qtdeSubPastas
     *
     * @return self
     */
    public function setQtdeSubPastas($qtdeSubPastas)
    {
        $this->qtdeSubPastas = $qtdeSubPastas;

        return $this;
    }
}

?>