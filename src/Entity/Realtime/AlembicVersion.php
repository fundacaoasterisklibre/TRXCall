<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlembicVersion
 *
 * @ORM\Table(name="alembic_version")
 * @ORM\Entity
 */
class AlembicVersion
{
    /**
     * @var string
     *
     * @ORM\Column(name="version_num", type="string", length=32, nullable=false)
     * @ORM\Id
     */
    private $versionNum;



    /**
     * Set versionNum
     *
     * @param string $versionNum
     *
     * @return AlembicVersion
     */
    public function setVersionNum($versionNum)
    {
        $this->versionNum = $versionNum;

        return $this;
    }

    /**
     * Get versionNum
     *
     * @return string
     */
    public function getVersionNum()
    {
        return $this->versionNum;
    }
}
