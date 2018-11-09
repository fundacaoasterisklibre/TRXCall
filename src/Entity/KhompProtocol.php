<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 02/07/17
 * Time: 16:58
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Realtime\Sippeers;

/**
 * Class DeviceResource
 * @package  App\Entity
 *
 * @ORM\Table("khomp")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class KhompProtocol extends AbstractProtocol
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $groupId;

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     * @return KhompProtocol
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }

    public function getValue()
    {
       return $this->getGroupId();
    }


}
