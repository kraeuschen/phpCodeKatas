<?php

use phpCodeKatas\OrderedJobs;

/**
 * OrderedJobsTest
 *
 * Unittests of OrderJobs Kata
 *
 * @author j.krause <info@kraeuschen.de>
 */
class OrderedJobsTest extends PHPUnit_Framework_TestCase
{
    /**
     * wraps the class
     * 
     * @param string $jobList
     * 
     * @return string
     */
    private function _getList($jobList)
    {
        $orderedJobs = new OrderedJobs();
        return $orderedJobs->getOrderedJobList($jobList);
    }
	
    /**
     * should be empty
     * 
     * @return void
     */
    public function testEmptyString()
    {
        $this->assertEquals('', $this->_getList(''));
    }

    /**
     * returns the single only
     * 
     * @return void
     */
    public function testSingleJob()
    {
        $this->assertEquals('a', $this->_getList('a =>'));
    }

    /**
     * test the sequence of on joblist
     * 
     * @return void
     */
    public function testMultipleJobs()
    {
        $this->assertEquals('abc', $this->_getList("a => \nb => \nc =>"));
    }

    /**
     * three jobs with an single dependency
     * 
     * @return void
     */
    public function testMultipleJobsWithSingleDependency()
    {
        $this->assertEquals('acb', $this->_getList("a => \nb => c\nc =>"));
    }

    /**
     * five jobs with multiple dependencies
     * 
     * @return void
     */
    public function testMultipleJobsWithMultipleDependencies()
    {
        $this->assertEquals('afcbde', $this->_getList("a =>\nb => c\nc => f\nd => a\ne => b\nf =>"));
    }

    /**
     * self referencing jobs a not possible
     * 
     * Enter description here ...
     */
    public function testSelfReferencingJobException()
    {
        $this->setExpectedException('InvalidArgumentException', 'self referencing jobs are not allowed: c => c');
        $this->_getList("a =>\nb =>\nc => c");
    }

    /**
     * circular dependendies exception
     * 
     * @return void
     */
    public function testCheckCircularDependenciesException()
    {
        $this->setExpectedException('InvalidArgumentException', 'jobs can not have circular dependencies');
        $this->_getList("a =>\nb => c\nc => f\nd => a\ne =>\nf => b");
    }
}
