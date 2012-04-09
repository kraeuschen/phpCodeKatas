<?php

// +----------------------------------------------------------+
// | phpCodeKatas Simple List                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

require_once('SimpleListNode.class.php');

/**
 * A single linked list
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://codekata.pragprog.com/2007/01/kata_twenty_one.html
 */
class SimpleList
{
    /**
     * Holds the first node
     * 
     * @var SimpleListNode
     */
    protected $firstNode = null;

    /**
     * Holds the latest node to avoid while loop on adding an items
     * makes the code more complex in other methods
     * 
     * @var SimpleListNodey
     */
    protected $lastNode = null;

    /**
     * searches a node by string
     * 
     * @param string $search
     * 
     * @return SimpleListNode
     */
    public function find($search)
    {
        if ($this->firstNode === null) {
            return null;
        }

        $node = $this->firstNode;

        while ($node !== null) {
            if ($node->getValue() == $search) {
                return $node;
                break;
            }
            $node = $node->getNextNode();
        }
    }

    /**
     * Creates a node
     * 
     * @param string $name
     * 
     * @return void
     */
    public function add($name)
    {
        $node = new SimpleListNode($name);

        if ($this->firstNode === null) {
            $this->firstNode = $node;
            $this->lastNode = $this->firstNode;
        } else {
            $this->lastNode->setNextNode($node);
            $this->lastNode = $node;
        }
    }

    /**
     * Return all values as array
     * 
     * @return array
     */
    public function getValues()
    {
        $array = array();

        $node = $this->firstNode;

        while ($node !== null) {
            array_push($array, $node->getValue());
            $node = $node->getNextNode();
        };

        return $array;
    }

    /**
     * deletes a node from chain
     * 
     * @param SimpleListNode $node
     * 
     * @todo this should be reworked
     * 
     * @return void
     */
    public function delete(SimpleListNode $nodeToDelete)
    {
        $node = $this->firstNode;

        if ($node->getValue() == $nodeToDelete->getValue()) {
            $this->firstNode = $node->getNextNode();

            if ($this->firstNode == null) {
                $this->lastNode  = null;
            }
            return;
        }

        while ($node !== null) {
            $nextNode = $node->getNextNode();

            if ($nextNode == null) {
                break;
            }

            // needed for our lastNode cache
            if ($nextNode->getValue() == $this->lastNode->getValue()) {
                $node->unsetNextNode();
                $this->lastNode = $node;
                break;
            }

            if ($nextNode->getValue() == $nodeToDelete->getValue()) {
                $node->setNextNode($nextNode->getNextNode());
                break;
            }

            $node = $nextNode;
        }
    }
}
