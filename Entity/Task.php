<?php

namespace MauticPlugin\TabdealTaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tabdeal_task")
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string", length=255) */
    private $fieldOne;

    /** @ORM\Column(type="string", length=255) */
    private $fieldTwo;

    /** @ORM\Column(type="boolean") */
    private $isChecked;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFieldOne()
    {
        return $this->fieldOne;
    }

    /**
     * @param mixed $fieldOne
     * @return Task
     */
    public function setFieldOne($fieldOne): Task
    {
        $this->fieldOne = $fieldOne;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFieldTwo()
    {
        return $this->fieldTwo;
    }

    /**
     * @param mixed $fieldTwo
     * @return Task
     */
    public function setFieldTwo($fieldTwo): Task
    {
        $this->fieldTwo = $fieldTwo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsChecked()
    {
        return $this->isChecked;
    }

    /**
     * @param mixed $isChecked
     * @return Task
     */
    public function setIsChecked($isChecked): Task
    {
        $this->isChecked = $isChecked;

        return $this;
    }

}