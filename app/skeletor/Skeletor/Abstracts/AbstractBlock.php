<?php
/**
 * This is the base class for both Panels and Blocks.
 * It shouldn't be extended by your own blocks - simply write a strategy!
 */
abstract class AbstractBlock {
    /**
     * The id of the block item instance
     * This is a doctrine field, so you need to setup generation for it
     * @var integer
     */
    private $id;

    // Add code for relation to the parent panel, configuration objects, ....

    /**
     * This var contains the classname of the strategy
     * that is used for this blockitem. (This string (!) value will be persisted by Doctrine 2)
     *
     * This is a doctrine field, so make sure that you use an @column annotation or setup your
     * yaml or xml files correctly
     * @var string
     */
    protected $strategyClassName;

    /**
     * This var contains an instance of $this->blockStrategy. Will not be persisted by Doctrine 2.
     *
     * @var BlockStrategyInterface
     */
    protected $strategyInstance;

    /**
     * Returns the strategy that is used for this blockitem.
     *
     * The strategy itself defines how this block can be rendered etc.
     *
     * @return string
     */
    public function getStrategyClassName() {
        return $this->strategyClassName;
    }

    /**
     * Returns the instantiated strategy
     *
     * @return BlockStrategyInterface
     */
    public function getStrategyInstance() {
        return $this->strategyInstance;
    }

    /**
     * Sets the strategy this block / panel should work as. Make sure that you've used
     * this method before persisting the block!
     *
     * @param BlockStrategyInterface $strategy
     */
    public function setStrategy(BlockStrategyInterface $strategy) {
        $this->strategyInstance  = $strategy;
        $this->strategyClassName = get_class($strategy);
        $strategy->setBlockEntity($this);
    }