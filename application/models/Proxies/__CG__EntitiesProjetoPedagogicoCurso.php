<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class ProjetoPedagogicoCurso extends \Entities\ProjetoPedagogicoCurso implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function setCodPpc($codPpc)
    {
        $this->__load();
        return parent::setCodPpc($codPpc);
    }

    public function getCodPpc()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["codPpc"];
        }
        $this->__load();
        return parent::getCodPpc();
    }

    public function setDtInicioVigencia($dtInicioVigencia)
    {
        $this->__load();
        return parent::setDtInicioVigencia($dtInicioVigencia);
    }

    public function getDtInicioVigencia()
    {
        $this->__load();
        return parent::getDtInicioVigencia();
    }

    public function setDtTerminoVigencia($dtTerminoVigencia)
    {
        $this->__load();
        return parent::setDtTerminoVigencia($dtTerminoVigencia);
    }

    public function getDtTerminoVigencia()
    {
        $this->__load();
        return parent::getDtTerminoVigencia();
    }

    public function setChTotalDisciplinaOpt($chTotalDisciplinaOpt)
    {
        $this->__load();
        return parent::setChTotalDisciplinaOpt($chTotalDisciplinaOpt);
    }

    public function getChTotalDisciplinaOpt()
    {
        $this->__load();
        return parent::getChTotalDisciplinaOpt();
    }

    public function setChTotalDisciplinaOb($chTotalDisciplinaOb)
    {
        $this->__load();
        return parent::setChTotalDisciplinaOb($chTotalDisciplinaOb);
    }

    public function getChTotalDisciplinaOb()
    {
        $this->__load();
        return parent::getChTotalDisciplinaOb();
    }

    public function setChTotalAtividadeExt($chTotalAtividadeExt)
    {
        $this->__load();
        return parent::setChTotalAtividadeExt($chTotalAtividadeExt);
    }

    public function getChTotalAtividadeExt()
    {
        $this->__load();
        return parent::getChTotalAtividadeExt();
    }

    public function setChTotalAtividadeCmplt($chTotalAtividadeCmplt)
    {
        $this->__load();
        return parent::setChTotalAtividadeCmplt($chTotalAtividadeCmplt);
    }

    public function getChTotalAtividadeCmplt()
    {
        $this->__load();
        return parent::getChTotalAtividadeCmplt();
    }

    public function setChTotalProjetoConclusao($chTotalProjetoConclusao)
    {
        $this->__load();
        return parent::setChTotalProjetoConclusao($chTotalProjetoConclusao);
    }

    public function getChTotalProjetoConclusao()
    {
        $this->__load();
        return parent::getChTotalProjetoConclusao();
    }

    public function setChTotalEstagio($chTotalEstagio)
    {
        $this->__load();
        return parent::setChTotalEstagio($chTotalEstagio);
    }

    public function getChTotalEstagio()
    {
        $this->__load();
        return parent::getChTotalEstagio();
    }

    public function setDuracao($duracao)
    {
        $this->__load();
        return parent::setDuracao($duracao);
    }

    public function getDuracao()
    {
        $this->__load();
        return parent::getDuracao();
    }

    public function setQtdPeriodos($qtdPeriodos)
    {
        $this->__load();
        return parent::setQtdPeriodos($qtdPeriodos);
    }

    public function getQtdPeriodos()
    {
        $this->__load();
        return parent::getQtdPeriodos();
    }

    public function setChTotal($chTotal)
    {
        $this->__load();
        return parent::setChTotal($chTotal);
    }

    public function getChTotal()
    {
        $this->__load();
        return parent::getChTotal();
    }

    public function setAnoAprovacao($anoAprovacao)
    {
        $this->__load();
        return parent::setAnoAprovacao($anoAprovacao);
    }

    public function getAnoAprovacao()
    {
        $this->__load();
        return parent::getAnoAprovacao();
    }

    public function setSituacao($situacao)
    {
        $this->__load();
        return parent::setSituacao($situacao);
    }

    public function getSituacao()
    {
        $this->__load();
        return parent::getSituacao();
    }

    public function setCurso(\Entities\Curso $curso = NULL)
    {
        $this->__load();
        return parent::setCurso($curso);
    }

    public function getCurso()
    {
        $this->__load();
        return parent::getCurso();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'codPpc', 'dtInicioVigencia', 'dtTerminoVigencia', 'chTotalDisciplinaOpt', 'chTotalDisciplinaOb', 'chTotalAtividadeExt', 'chTotalAtividadeCmplt', 'chTotalProjetoConclusao', 'chTotalEstagio', 'duracao', 'qtdPeriodos', 'chTotal', 'anoAprovacao', 'situacao', 'curso');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}