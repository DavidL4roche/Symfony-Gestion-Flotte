<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContainerRepository")
 * @ORM\Table(name="CONTAINER")
 */
class Container
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $color;

    /**
     * @var ContainerModel
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ContainerModel")
     */
    private $container_model;

    /**
     * @var ContainerShip
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ContainerShip")
     */
    private $containership;

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
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return ContainerModel
     */
    public function getContainerModel(): ContainerModel
    {
        return $this->container_model;
    }

    /**
     * @param ContainerModel $container_model
     */
    public function setContainerModel(ContainerModel $container_model)
    {
        $this->container_model = $container_model;
    }

    /**
     * @return ContainerShip
     */
    public function getContainership(): ContainerShip
    {
        return $this->containership;
    }

    /**
     * @param ContainerShip $containership
     */
    public function setContainership(ContainerShip $containership)
    {
        $this->containership = $containership;
    }

    public function __toString()
    {
        if($this->id) {
            return 'Container n°' . $this->id;
        }
        return 'Container without id';
    }


}