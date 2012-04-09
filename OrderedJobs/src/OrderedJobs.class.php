<?php

// +----------------------------------------------------------+
// | phpCodeKatas OrderedJobs                                 |
// +----------------------------------------------------------+

namespace phpCodeKatas;

/**
 * OrderedJobs
 *
 * "Imagine we have a list of jobs, each represented by a character. Because certain jobs must be done before others,
 *  a job may have a dependency on another job. For example, a may depend on b, meaning the final sequence of jobs
 *  should place b before a. If a has no dependency, the position of a in the final sequence does not matter.
 *  
 *  The goal of the kata is to parse the job dependency structure and produce a sequence of jobs in the order that
 *  observes their dependency chain."
 *
 * @author j.krause <info@kraeuschen.de>
 *
 * @see http://invalidcast.com/2011/09/the-ordered-jobs-kata
 */
class OrderedJobs
{
    /**
     * stores the jobs
     * 
     * @var array
     */
    protected $orderedJobs = array();

    /**
     * returns the ordered job sequence
     * 
     * @param string $jobList
     * 
     * @return string
     */
    public function getOrderedJobList($jobList)
    {
        $jobs = explode("\n", str_replace(" ", '', $jobList));

        foreach ($jobs as $job) {
            $this->_createJob($job);
        }

        return implode('', $this->orderedJobs);
    }

    /**
     * creates a new job 
     * 
     * @param string $job
     * 
     * @return void
     */
    protected function _createJob($job)
    {
        @list($job, $dependency) = explode("=>", $job);

        if (isset($dependency)) {
            $this->_addDependencyJob($job, $dependency);
        } else {
            $this->_addJob($job);
        }
    }

    /**
     * adds a job to  the ordered job array
     * 
     * @param string $job
     * 
     * @return void
     */
    protected function _addJob($job)
    {
        if (empty($job)) {
            return;
        }

        if (!$this->_jobExists($job)) {
            array_push($this->orderedJobs, $job);
        }
    }

    /**
     * adds a job with his dependency
     * 
     * @param string $job
     * @param string $dependency
     * 
     * @return void
     */
    protected function _addDependencyJob($job, $dependency)
    {
        $this->_checkDependencies($job, $dependency);

        if (!$this->_jobExists($job)) {
            $this->_addJob($dependency);
            $this->_addJob($job);
        } else {
            $this->_addDependencyBefore($job, $dependency);
        }
    }

    /**
     * shifts an dependendy job before job
     * 
     * @param string $job
     * @param string $dependency
     * 
     * @return void
     */
    protected function _addDependencyBefore($job, $dependency)
    {
        $orderedJobs = $this->orderedJobs;
        $this->orderedJobs = array();

        foreach ($orderedJobs as $currentJob) {
            if ($currentJob == $job) {
                $this->_addJob($dependency);
                $this->_addJob($job);
            }
            $this->_addJob($currentJob);
        }
    }

    /**
     * checks dependencies
     * 
     * @param $job
     * @param $dependency
     * 
     * @return void
     */
    protected function _checkDependencies($job, $dependency)
    {
        $this->_checkSelfReferencingJob($job, $dependency);
        $this->_checkCircularDependencies($job, $dependency);
    }

    /**
     * Checks for circular dependencies
     * 
     * @param string $job
     * @param string $dependency
     * 
     * @throws \InvalidArgumentException
     * 
     * @return void
     */
    protected function _checkCircularDependencies($job, $dependency)
    {
        if ($this->_jobExists($job) && $this->_jobExists($dependency)) {
            throw new \InvalidArgumentException('jobs can not have circular dependencies');
        }
    }

    /**
     * Throws an Exception if a dependency is the same as the job
     * 
     * @param string $job
     * @param string $dependency
     * 
     * @throws \InvalidArgumentException
     * 
     * @return void
     */
    protected function _checkSelfReferencingJob($job, $dependency)
    {
        if ($job === $dependency) {
            throw new \InvalidArgumentException(sprintf('self referencing jobs are not allowed: %s => %s',
                                                        $job, $dependency));
        }
    }

    /**
     * lookup, if is an job in list
     * 
     * @param string $job
     * 
     * @return bool
     */
    protected function _jobExists($job)
    {
        return (array_search($job, $this->orderedJobs) === false) ? false : true;
    }
}
