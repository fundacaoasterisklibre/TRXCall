<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Branch;

/**
 * QueueMemberAgent
 *
 * @ORM\Entity
 */
class QueueMemberAgent extends QueueMember
{
    /**
     * @var Branch
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;

    /**
     * @return Branch
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Branch $user
     * @return QueueMemberAgent
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}
