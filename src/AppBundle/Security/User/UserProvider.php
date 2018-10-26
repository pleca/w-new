<?php

namespace AppBundle\Security\User;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserProvider implements UserProviderInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {
        return $this->fetchUser($username);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    private function fetchUser($username)
    {
        //todo: tu pobieram z bazy dane o userze na podstawie podanego loginu
//        $query = $this->em->prepare("CALL bank_contract_person_add ( :bank_contract_person_contarct_id, :bank_contract_person_person_id )");
//        try {
//            $query->execute([
//                ":bank_contract_person_contarct_id" => $contractID["ContractID"],
//                ":bank_contract_person_person_id" => $personID["id"],
//            ]);
//        } catch (\Exception $e) {
//            $msg .= $e->getMessage();
//            return new JsonResponse("MESSAGE4:  ".$msg, 401);
//        }
        $username = 'pawel';
        $password = 'pawel';
        $salt = '1234';
        $roles = ['ROLE_USER', 'ROLE_ADMIN'];

        $userData = true; //todo: chwilowe, póki baza nic nie zwraca.

        if (!$userData) {
            throw new UsernameNotFoundException(
                sprintf('Login "%s" nie istnieje.', $username)
            );
        }

        return new User($username, $password, $salt, $roles);
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}