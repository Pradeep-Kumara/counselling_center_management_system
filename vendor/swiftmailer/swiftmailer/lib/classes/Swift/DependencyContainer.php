<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Dependency Injection container.
 *
 * @author  Chris Corbyn
 */
class Swift_DependencyContainer
{
    /** Constant for literal value types */
    const TYPE_VALUE = 0x0001;

    /** Constant for new instance types */
    const TYPE_INSTANCE = 0x0010;

    /** Constant for shared instance types */
    const TYPE_SHARED = 0x0100;

    /** Constant for aliases */
    const TYPE_ALIAS = 0x1000;

    /** Singleton instance */
    private static $instance = null;

    /** The data container */
    private $store = array();

    /** The current endpoint in the data container */
    private $endPoint;

    /**
     * Constructor should not be used.
     *
     * Use {@link getInstance()} instead.
     */
    public function __construct()
    {
    }

    /**
     * Returns a singleton of the DependencyContainer.
     *
     * @return self
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * List the names of all items stored in the Container.
     *
     * @return array
     */
    public function listItems()
    {
        return array_keys($this->store);
    }

    /**
     * Test if an product is registered in this container with the given name.
     *
     * @see register()
     *
     * @param string $itemName
     *
     * @return bool
     */
    public function has($itemName)
    {
        return array_key_exists($itemName, $this->store)
            && isset($this->store[$itemName]['lookupType']);
    }

    /**
     * Lookup the product with the given $itemName.
     *
     * @see register()
     *
     * @param string $itemName
     *
     * @return mixed
     *
     * @throws Swift_DependencyException If the dependency is not found
     */
    public function lookup($itemName)
    {
        if (!$this->has($itemName)) {
            throw new Swift_DependencyException(
                'Cannot lookup dependency "'.$itemName.'" since it is not registered.'
                );
        }

        switch ($this->store[$itemName]['lookupType']) {
            case self::TYPE_ALIAS:
                return $this->createAlias($itemName);
            case self::TYPE_VALUE:
                return $this->getValue($itemName);
            case self::TYPE_INSTANCE:
                return $this->createNewInstance($itemName);
            case self::TYPE_SHARED:
                return $this->createSharedInstance($itemName);
        }
    }

    /**
     * Create an array of arguments passed to the constructor of $itemName.
     *
     * @param string $itemName
     *
     * @return array
     */
    public function createDependenciesFor($itemName)
    {
        $args = array();
        if (isset($this->store[$itemName]['args'])) {
            $args = $this->resolveArgs($this->store[$itemName]['args']);
        }

        return $args;
    }

    /**
     * Register a new dependency with $itemName.
     *
     * This method returns the current DependencyContainer instance because it
     * requires the use of the fluid interface to set the specific details for the
     * dependency.
     *
     * @see asNewInstanceOf(), asSharedInstanceOf(), asValue()
     *
     * @param string $itemName
     *
     * @return $this
     */
    public function register($itemName)
    {
        $this->store[$itemName] = array();
        $this->endPoint = &$this->store[$itemName];

        return $this;
    }

    /**
     * Specify the previously registered product as a literal value.
     *
     * {@link register()} must be called before this will work.
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function asValue($value)
    {
        $endPoint = &$this->getEndPoint();
        $endPoint['lookupType'] = self::TYPE_VALUE;
        $endPoint['value'] = $value;

        return $this;
    }

    /**
     * Specify the previously registered product as an alias of another product.
     *
     * @param string $lookup
     *
     * @return $this
     */
    public function asAliasOf($lookup)
    {
        $endPoint = &$this->getEndPoint();
        $endPoint['lookupType'] = self::TYPE_ALIAS;
        $endPoint['ref'] = $lookup;

        return $this;
    }

    /**
     * Specify the previously registered product as a new instance of $className.
     *
     * {@link register()} must be called before this will work.
     * Any arguments can be set with {@link withDependencies()},
     * {@link addConstructorValue()} or {@link addConstructorLookup()}.
     *
     * @see withDependencies(), addConstructorValue(), addConstructorLookup()
     *
     * @param string $className
     *
     * @return $this
     */
    public function asNewInstanceOf($className)
    {
        $endPoint = &$this->getEndPoint();
        $endPoint['lookupType'] = self::TYPE_INSTANCE;
        $endPoint['className'] = $className;

        return $this;
    }

    /**
     * Specify the previously registered product as a shared instance of $className.
     *
     * {@link register()} must be called before this will work.
     *
     * @param string $className
     *
     * @return $this
     */
    public function asSharedInstanceOf($className)
    {
        $endPoint = &$this->getEndPoint();
        $endPoint['lookupType'] = self::TYPE_SHARED;
        $endPoint['className'] = $className;

        return $this;
    }

    /**
     * Specify a list of injected dependencies for the previously registered product.
     *
     * This method takes an array of lookup names.
     *
     * @see addConstructorValue(), addConstructorLookup()
     *
     * @param array $lookups
     *
     * @return $this
     */
    public function withDependencies(array $lookups)
    {
        $endPoint = &$this->getEndPoint();
        $endPoint['args'] = array();
        foreach ($lookups as $lookup) {
            $this->addConstructorLookup($lookup);
        }

        return $this;
    }

    /**
     * Specify a literal (non looked up) value for the constructor of the
     * previously registered product.
     *
     * @see withDependencies(), addConstructorLookup()
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function addConstructorValue($value)
    {
        $endPoint = &$this->getEndPoint();
        if (!isset($endPoint['args'])) {
            $endPoint['args'] = array();
        }
        $endPoint['args'][] = array('type' => 'value', 'product' => $value);

        return $this;
    }

    /**
     * Specify a dependency lookup for the constructor of the previously
     * registered product.
     *
     * @see withDependencies(), addConstructorValue()
     *
     * @param string $lookup
     *
     * @return $this
     */
    public function addConstructorLookup($lookup)
    {
        $endPoint = &$this->getEndPoint();
        if (!isset($this->endPoint['args'])) {
            $endPoint['args'] = array();
        }
        $endPoint['args'][] = array('type' => 'lookup', 'product' => $lookup);

        return $this;
    }

    /** Get the literal value with $itemName */
    private function getValue($itemName)
    {
        return $this->store[$itemName]['value'];
    }

    /** Resolve an alias to another product */
    private function createAlias($itemName)
    {
        return $this->lookup($this->store[$itemName]['ref']);
    }

    /** Create a fresh instance of $itemName */
    private function createNewInstance($itemName)
    {
        $reflector = new ReflectionClass($this->store[$itemName]['className']);
        if ($reflector->getConstructor()) {
            return $reflector->newInstanceArgs(
                $this->createDependenciesFor($itemName)
                );
        }

        return $reflector->newInstance();
    }

    /** Create and register a shared instance of $itemName */
    private function createSharedInstance($itemName)
    {
        if (!isset($this->store[$itemName]['instance'])) {
            $this->store[$itemName]['instance'] = $this->createNewInstance($itemName);
        }

        return $this->store[$itemName]['instance'];
    }

    /** Get the current endpoint in the store */
    private function &getEndPoint()
    {
        if (!isset($this->endPoint)) {
            throw new BadMethodCallException(
                'Component must first be registered by calling register()'
                );
        }

        return $this->endPoint;
    }

    /** Get an argument list with dependencies resolved */
    private function resolveArgs(array $args)
    {
        $resolved = array();
        foreach ($args as $argDefinition) {
            switch ($argDefinition['type']) {
                case 'lookup':
                    $resolved[] = $this->lookupRecursive($argDefinition['product']);
                    break;
                case 'value':
                    $resolved[] = $argDefinition['product'];
                    break;
            }
        }

        return $resolved;
    }

    /** Resolve a single dependency with an collections */
    private function lookupRecursive($item)
    {
        if (is_array($item)) {
            $collection = array();
            foreach ($item as $k => $v) {
                $collection[$k] = $this->lookupRecursive($v);
            }

            return $collection;
        }

        return $this->lookup($item);
    }
}
