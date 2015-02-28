<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 25/02/15
 * Time: 17:42
 */

namespace TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aula.status")
 */
class Status {

    /**
     * @ORM\Column(type = "bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Task
     * @ORM\OneToMany(targetEntity="TodoBundle\Entity\Task", mappedBy = "Status")
     */
    protected $tasks;

    /**
     * @ORM\Column(type="string")
     */
    protected $descricaoStatus;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param mixed $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return mixed
     */
    public function getDescricaoStatus()
    {
        return $this->descricaoStatus;
    }

    /**
     * @param mixed $descricaoStatus
     */
    public function setDescricaoStatus($descricaoStatus)
    {
        $this->descricaoStatus = $descricaoStatus;
    }



}