<?php

// +----------------------------------------------------------+
// | phpCodeKatas Simple List                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * SimpleList.class.php
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
        } else {
            $lastNode = $this->_getLastNode();
            $lastNode->setNextNode($node);
        }
    }

    /**
     * returns last node in current chain
     * 
     * @return SimpleListNode
     */
    protected function _getLastNode()
    {
        $node = $this->firstNode;

        while ($node->getNextNode() !== null) {
            $node = $node->getNextNode();
        }

        return $node;
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
     * @return void
     */
    public function delete(SimpleListNode $node)
    {
        if ($this->firstNode->getValue() == $node->getValue()) {
            $this->_deleteFirstNode($node);
        } else {
            $this->_deleteRegularNode($node);
        }
    }

    /**
     * Deletes regular code
     * 
     * @param SimpleListNode $nodeToDelete
     * 
     * @return void
     */
    private function _deleteRegularNode(SimpleListNode $nodeToDelete)
    {
        $node = $this->firstNode;

        while ($node->getNextNode() !== null) {
            $nextNode = $node->getNextNode();

            if ($nextNode->getValue() !== $nodeToDelete->getValue()) {
                $node = $nextNode;
                continue;
            }

            if ($nextNode->getNextNode() !== null) {
                $node->setNextNode($nextNode->getNextNode());
            } else {
                $node->unsetNextNode();
            }

            break;
        }
    }
    
    /**
     * Deletes first node
     * 
     * @param SimpleListNode $node
     * 
     * @retutn void
     */
    private function _deleteFirstNode(SimpleListNode $node)
    {
        $this->firstNode = $node->getNextNode();
    }
}
