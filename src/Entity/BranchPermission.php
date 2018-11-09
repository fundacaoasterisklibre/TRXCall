<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BranchPermission
 * @package  App\Entity
 *
 * @ORM\Table("branch_permission")
 * @ORM\Entity
 */
class BranchPermission
{
    /**
     * @ORM\Id
     * @ORM\Column(name="group_type", type="string", length=40, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $groupType;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="permissions")
     */
    protected $branch;


    /**
     * @ORM\Column(type="boolean")
     */
    private $permit = false;

    /**
     * @return mixed
     */
    public function getGroupType()
    {
        return $this->groupType;
    }

    /**
     * @param mixed $groupType
     * @return BranchPermission
     */
    public function setGroupType($groupType)
    {
        $this->groupType = $groupType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param mixed $branch
     * @return BranchPermission
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermit()
    {
        return $this->permit;
    }

    /**
     * @param mixed $permit
     * @return BranchPermission
     */
    public function setPermit($permit)
    {
        $this->permit = $permit;
        return $this;
    }

}
