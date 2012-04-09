<?php

require_once('../src/SimpleListNode.class.php');

use phpCodeKatas\SimpleListNode;

/**
 * Unittests for the SimpleList Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class SimpleListTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     */
    public function testGetValueShouldReturnValue()
    {
        $node = new SimpleListNode('foo');
        $this->assertEquals('foo', $node->getValue());
    }

    /**
     * @return void
     */
    public function testGetNextNodeShouldReturnNull()
    {
        $node = new SimpleListNode('foo');
        $this->assertNull($node->getNextNode());
    }

    /**
     * @return void
     */
    public function testSetNextNode()
    {
        $node = new SimpleListNode('foo');

        $nextNode = new SimpleListNode('bar');
        $node->setNextNode($nextNode);

        $this->assertEquals('foo', $node->getValue());
        $this->assertEquals('bar', $node->getNextNode()->getValue());
    }

    /**
     * @return void
     */
    public function testUnsetNextNode()
    {
        $node = new SimpleListNode('foo');
        $nextNode = new SimpleListNode('bar');
        $node->setNextNode($nextNode);
        $node->unsetNextNode();

        $this->assertNull($node->getNextNode());
    }
}
