<?php
/**
 * This interface defines the basic actions that a block / panel needs to support.
 *
 * Every blockstrategy is *only* responsible for rendering a block and declaring some basic
 * support, but *not* for updating its configuration etc. For this purpose, use controllers
 * and models.
 */
interface BlockStrategyInterface {
    /**
     * This could configure your entity
     */
    public function setConfig(Config\EntityConfig $config);

    /**
     * Returns the config this strategy is configured with.
     * @return Core\Model\Config\EntityConfig
     */
    public function getConfig();

    /**
     * Set the view object.
     * @param  \Zend_View_Interface $view
     * @return \Zend_View_Helper_Interface
     */
    public function setView(\Zend_View_Interface $view);

    /**
     * @return \Zend_View_Interface
     */
    public function getView();

    /**
     * Renders this strategy. This method will be called when the user
     * displays the site.
     *
     * @return string
     */
    public function renderFrontend();

    /**
     * Renders the backend of this block. This method will be called when
     * a user tries to reconfigure this block instance.
     *
     * Most of the time, this method will return / output a simple form which in turn
     * calls some controllers.
     *
     * @return string
     */
    public function renderBackend();

    /**
     * Returns all possible types of panels this block can be stacked onto
     *
     * @return array
     */
    public function getRequiredPanelTypes();

    /**
     * Determines whether a Block is able to use a given type or not
     * @param string $typeName The typename
     * @return boolean
     */
    public function canUsePanelType($typeName);

    public function setBlockEntity(AbstractBlock $block);

    public function getBlockEntity();
}