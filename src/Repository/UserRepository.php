<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace  App\Repository;

use Doctrine\ORM\Query;
use App\Entity\User;

class UserRepository extends GenericRepository
{

    /**
     * @return array
     */
    public function getArrayList() {
        return $this->createQueryBuilder("user")
            ->select("user.id,user.name,user.email,department.name as dep")
            ->leftJoin('user.department', 'department')
            ->getQuery()
            ->getArrayResult();
    }

    public function getArrayResource() {
        return $this->createQueryBuilder("user")
            ->select("user.id, user.name")
//            ->where('user.enabled = true')
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * @param $username
     * @return User
     */
    public function findUserByUsername($username)
    {

        return
            $this->createQueryBuilder('u')
                ->where('u.email = :username')
                ->setParameter('username', $username)
                ->getQuery()
                ->getOneOrNullResult(Query::HYDRATE_SIMPLEOBJECT);
    }

}