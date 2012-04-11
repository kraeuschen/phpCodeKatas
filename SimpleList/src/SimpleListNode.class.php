<?php

namespace phpCodeKatas;

// +----------------------------------------------------------+
// | phpCodeKatas Simple List Node                            |
// +----------------------------------------------------------+

/**
 * SimpleListNode.class.php
 *
 * @author j.krause <info@kraeuschen.de>
 */
class SimpleListNode
{
    /**
     * next node
     * 
     * @var SimpleListNode
     */
    protected $nextNode = null;

    /**
     * name of the node
     * 
     * @var string
     */
    protected $value = null;

    /**
     * class constructor sets the value
     * 
     * @param string $value
     * 
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @retun string $this->value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * returns next node
     * 
     * @return SimpleListNode
     */
    public function getNextNode()
    {
        return $this->nextNode;
    }

    /**
     * sets next node
     * 
     * @param SimpleListNode $node
     * 
     * @return void
     */
    public function setNextNode(SimpleListNode $node)
    {
        $this->nextNode = $node;
    }

    /**
     * sets next node to null
     * 
     * @return void
     */
    public function unsetNextNode()
    {
        $this->nextNode = null;
    }
}
