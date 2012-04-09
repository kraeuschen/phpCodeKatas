<?php

require_once('../src/SimpleList.class.php');

use phpCodeKatas\SimpleList;

/**
 * Unittests for the SimpleList Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class SimpleListTest extends PHPUnit_Framework_TestCase
{
    /**
     * Empty list
     * 
     * @return void
     */
    public function testFindItemInEmptyListReturnsNull()
    {
        $list = new SimpleList();
        $this->assertNull($list->find("fred"));
    }

    /**
     * Adds a single node
     * 
     * @return void
     */
    public function testAddItemReturnsNodeSingle()
    {
        $list = new SimpleList();
        $list->add("fred");
        $this->assertEquals("fred", $list->find("fred")->getValue());
        $this->assertNull($list->find("wilma"));
    }
    
    /**
     * Adds two nodes
     * 
     * @return void
     */
    public function testAddTwoItemsReturnsNodeSingle()
    {
        $list = new SimpleList();
        $list->add("fred");
        $list->add("wilma");
        $this->assertEquals("fred", $list->find("fred")->getValue());
        $this->assertEquals("wilma", $list->find("wilma")->getValue());
    }
    
    /**
     * Test for getValues method of simple list
     * 
     * @return void
     */
    public function testAddTwoItemsGetValues()
    {
        $list = new SimpleList();
        $list->add("fred");
        $list->add("wilma");
        $this->assertEquals(array("fred", "wilma"), $list->getValues());
    }

    /**
     * create multiple nodes and deleting an item
     * 
     * @return void
     */
    public function testDeleteNodeSingle()
    {
        $list = new SimpleList();
        $list->add("fred");
        $list->add("wilma");
        $list->add("betty");
        $list->add("barney");

        $this->assertEquals(array("fred", "wilma", "betty", "barney"), $list->getValues());

        $list->delete($list->find("wilma"));

        $this->assertEquals(array("fred", "betty", "barney"), $list->getValues());
    }

    /**
     * create multiple nodes and deleting an item
     * 
     * @return void
     */
    public function testDeleteNodeSingleComplete()
    {
        $list = new SimpleList();
        $list->add("fred");
        $list->add("wilma");
        $list->add("betty");
        $list->add("barney");

        $this->assertEquals(array("fred", "wilma", "betty", "barney"), $list->getValues());

        $list->delete($list->find("betty"));
        $this->assertEquals(array("fred", "wilma", "barney"), $list->getValues());

        $list->delete($list->find("fred"));
        $this->assertEquals(array("wilma", "barney"), $list->getValues());

        $list->delete($list->find("barney"));
        $this->assertEquals(array("wilma"), $list->getValues());

        $list->delete($list->find("wilma"));
        $this->assertEquals(array(), $list->getValues());
    }
}
