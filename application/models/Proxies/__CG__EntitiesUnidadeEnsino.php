<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class UnidadeEnsino extends \Entities\UnidadeEnsino implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function setCodUnidadeEnsino($codUnidadeEnsino)
    {
        $this->__load();
        return parent::setCodUnidadeEnsino($codUnidadeEnsino);
    }

    public function getCodUnidadeEnsino()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["codUnidadeEnsino"];
        }
        $this->__load();
        return parent::getCodUnidadeEnsino();
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

    public function setCnpj($cnpj)
    {
        $this->__load();
        return parent::setCnpj($cnpj);
    }

    public function getCnpj()
    {
        $this->__load();
        return parent::getCnpj();
    }

    public function setIes(\Entities\InstituicaoEnsinoSuperior $ies = NULL)
    {
        $this->__load();
        return parent::setIes($ies);
    }

    public function getIes()
    {
        $this->__load();
        return parent::getIes();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'codUnidadeEnsino', 'nome', 'cnpj', 'ies');
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