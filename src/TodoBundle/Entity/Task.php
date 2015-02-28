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
 * @ORM\Table(name="aula.tasks")
 */
class Task
{

    /**
     * @ORM\Column(type = "bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $descricao;

    /**
     * @var TodoBundle\Entity;Status
     *
     * @ORM\ManyToOne(targetEntity="TodoBundle\Entity\Status" , inversedBy = "Task")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    protected $status;

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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return TodoBundle\Entity
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param TodoBundle\Entity $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }







}