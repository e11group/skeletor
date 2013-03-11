<?php
namespace Skeletor\API;

class TemplateModel extends AbstractEntity implements TemplateInterface
{
    protected $_id;
    public $_title;
    public $_content;
    protected $_comments;

    public function __construct($title, $content) {
        // map post fields to the corresponding mutators
        $this->setTitle($title);
        $this->setContent($content);
    }
    
    public function setId($id) {
        if ($this->_id !== null) {
            throw new \BadMethodCallException(
                "The ID for this post has been set already.");
        }
 
        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException("The post ID is invalid.");
        }
 
        $this->_id = $id;
        return $this;
    }

    public function getId() {

    }
    
    public function setTitle($title) {
        if (!is_string($title)
            || strlen($title) < 2
            || strlen($title) > 100) {
            throw new \InvalidArgumentException("The post title is invalid.");
        }
 
        $this->_title = htmlspecialchars(trim($title), ENT_QUOTES);
        return $this;
    }

    public function getTitle() {
        return $this->_title;
    }
    
    public function setContent($content)
    {
        if (!is_string($content) || strlen($content) < 2) {
            throw new \InvalidArgumentException("The post content is invalid.");
        }
 
        $this->_content = htmlspecialchars(trim($content), ENT_QUOTES);
        return $this;
    }
    
    public function getContent() {
        return $this->_content;
    }
    
}