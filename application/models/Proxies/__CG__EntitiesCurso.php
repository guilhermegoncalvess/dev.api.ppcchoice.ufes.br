<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Curso extends \Entities\Curso implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function setCodCurso($codCurso)
    {
        $this->__load();
        return parent::setCodCurso($codCurso);
    }

    public function getCodCurso()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["codCurso"];
        }
        $this->__load();
        return parent::getCodCurso();
    }

    public function setNome($nome)
    {
        $this->__load();
        return parent::setNome($nome);
    }

    public function getNome()
    {
        $this->__load();
        return parent::getNome();
    }

    public function setAnoCriacao($anoCriacao)
    {
        $this->__load();
        return parent::setAnoCriacao($anoCriacao);
    }

    public function getAnoCriacao()
    {
        $this->__load();
        return parent::getAnoCriacao();
    }

    public function setUnidadeEnsino(\Entities\UnidadeEnsino $unidadeEnsino = NULL)
    {
        $this->__load();
        return parent::setUnidadeEnsino($unidadeEnsino);
    }

    public function getUnidadeEnsino()
    {
        $this->__load();
        return parent::getUnidadeEnsino();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'codCurso', 'nome', 'anoCriacao', 'unidadeEnsino');
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