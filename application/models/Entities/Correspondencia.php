<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Correspondencia
 */
class Correspondencia
{
    /**
     * @var integer
     */
    private $codCompCurric;

    /**
     * @var integer
     */
    private $codCompCurricCorresp;

    /**
     * @var float
     */
    private $percentual;

    /**
     * @var \Entities\ComponenteCurricular
     */
    private $componenteCurricular;

    /**
     * @var \Entities\ComponenteCurricular
     */
    private $componenteCurricularCorresp;


    /**
     * Set codCompCurric
     *
     * @param integer $codCompCurric
     * @return Correspondencia
     */
    public function setCodCompCurric($codCompCurric)
    {
        $this->codCompCurric = $codCompCurric;
    
        return $this;
    }

    /**
     * Get codCompCurric
     *
     * @return integer 
     */
    public function getCodCompCurric()
    {
        return $this->codCompCurric;
    }

    /**
     * Set codCompCurricCorresp
     *
     * @param integer $codCompCurricCorresp
     * @return Correspondencia
     */
    public function setCodCompCurricCorresp($codCompCurricCorresp)
    {
        $this->codCompCurricCorresp = $codCompCurricCorresp;
    
        return $this;
    }

    /**
     * Get codCompCurricCorresp
     *
     * @return integer 
     */
    public function getCodCompCurricCorresp()
    {
        return $this->codCompCurricCorresp;
    }

    /**
     * Set percentual
     *
     * @param float $percentual
     * @return Correspondencia
     */
    public function setPercentual($percentual)
    {
        $this->percentual = $percentual;
    
        return $this;
    }

    /**
     * Get percentual
     *
     * @return float 
     */
    public function getPercentual()
    {
        return $this->percentual;
    }

    /**
     * Set componenteCurricular
     *
     * @param \Entities\ComponenteCurricular $componenteCurricular
     * @return Correspondencia
     */
    public function setComponenteCurricular(\Entities\ComponenteCurricular $componenteCurricular = null)
    {
        $this->componenteCurricular = $componenteCurricular;
    
        return $this;
    }

    /**
     * Get componenteCurricular
     *
     * @return \Entities\ComponenteCurricular 
     */
    public function getComponenteCurricular()
    {
        return $this->componenteCurricular;
    }

    /**
     * Set componenteCurricularCorresp
     *
     * @param \Entities\ComponenteCurricular $componenteCurricularCorresp
     * @return Correspondencia
     */
    public function setComponenteCurricularCorresp(\Entities\ComponenteCurricular $componenteCurricularCorresp = null)
    {
        $this->componenteCurricularCorresp = $componenteCurricularCorresp;
    
        return $this;
    }

    /**
     * Get componenteCurricularCorresp
     *
     * @return \Entities\ComponenteCurricular 
     */
    public function getComponenteCurricularCorresp()
    {
        return $this->componenteCurricularCorresp;
    }
}