<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:27
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Department
 * @package  App\Entity
 *
 * @ORM\Table("department")
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentRepository")
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="department_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
     private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Department
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Department
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
