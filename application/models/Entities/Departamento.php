<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 */
class Departamento
{
    /**
     * @var integer
     */
    private $codDepto;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $abreviatura;

    /**
     * @var \Entities\UnidadeEnsino
     */
    private $unidadeEnsino;


    /**
     * Get codDepto
     *
     * @return integer 
     */
    public function getCodDepto()
    {
        return $this->codDepto;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Departamento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return Departamento
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    
        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Set unidadeEnsino
     *
     * @param \Entities\UnidadeEnsino $unidadeEnsino
     * @return Departamento
     */
    public function setUnidadeEnsino(\Entities\UnidadeEnsino $unidadeEnsino = null)
    {
        $this->unidadeEnsino = $unidadeEnsino;
    
        return $this;
    }

    /**
     * Get unidadeEnsino
     *
     * @return \Entities\UnidadeEnsino 
     */
    public function getUnidadeEnsino()
    {
        return $this->unidadeEnsino;
    }
}
