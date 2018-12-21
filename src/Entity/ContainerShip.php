<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContainerShipRepository")
 * @ORM\Table(name="CONTAINERSHIP")
 */
class ContainerShip
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $captain_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $container_limit;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCaptainName()
    {
        return $this->captain_name;
    }

    /**
     * @param mixed $captain_name
     */
    public function setCaptainName($captain_name)
    {
        $this->captain_name = $captain_name;
    }

    /**
     * @return mixed
     */
    public function getContainerLimit()
    {
        return $this->container_limit;
    }

    /**
     * @param mixed $container_limit
     */
    public function setContainerLimit($container_limit)
    {
        $this->container_limit = $container_limit;
    }


    public function __toString()
    {
        if($this->name) {
            return $this->name;
        }
        return 'ContainerShip without name';
    }


}