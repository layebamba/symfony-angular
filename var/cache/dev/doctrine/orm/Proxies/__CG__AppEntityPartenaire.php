<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Partenaire extends \App\Entity\Partenaire implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'nomAgence', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'ninea', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'registre', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'lieu', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'phone', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'isActive', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'partenaire', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'creer'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'nomAgence', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'ninea', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'registre', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'lieu', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'phone', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'isActive', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'partenaire', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'creer'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Partenaire $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNomAgence(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomAgence', []);

        return parent::getNomAgence();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomAgence(string $nomAgence): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomAgence', [$nomAgence]);

        return parent::setNomAgence($nomAgence);
    }

    /**
     * {@inheritDoc}
     */
    public function getNinea(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNinea', []);

        return parent::getNinea();
    }

    /**
     * {@inheritDoc}
     */
    public function setNinea(string $ninea): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNinea', [$ninea]);

        return parent::setNinea($ninea);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegistre(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegistre', []);

        return parent::getRegistre();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegistre(string $registre): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegistre', [$registre]);

        return parent::setRegistre($registre);
    }

    /**
     * {@inheritDoc}
     */
    public function getLieu(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLieu', []);

        return parent::getLieu();
    }

    /**
     * {@inheritDoc}
     */
    public function setLieu(string $lieu): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLieu', [$lieu]);

        return parent::setLieu($lieu);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', []);

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone(string $phone): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', [$phone]);

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', []);

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive(bool $isActive): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', [$isActive]);

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function getPartenaire(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartenaire', []);

        return parent::getPartenaire();
    }

    /**
     * {@inheritDoc}
     */
    public function addPartenaire(\App\Entity\User $partenaire): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPartenaire', [$partenaire]);

        return parent::addPartenaire($partenaire);
    }

    /**
     * {@inheritDoc}
     */
    public function removePartenaire(\App\Entity\User $partenaire): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePartenaire', [$partenaire]);

        return parent::removePartenaire($partenaire);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreer(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreer', []);

        return parent::getCreer();
    }

    /**
     * {@inheritDoc}
     */
    public function addCreer(\App\Entity\Compte $creer): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCreer', [$creer]);

        return parent::addCreer($creer);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCreer(\App\Entity\Compte $creer): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCreer', [$creer]);

        return parent::removeCreer($creer);
    }

}
