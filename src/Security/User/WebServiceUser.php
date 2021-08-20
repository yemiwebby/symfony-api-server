<?php

namespace App\Security\User;

use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class WebServiceUser implements
    UserInterface, EquatableInterface {

    private $roles;
    private $jwt;

    public function __construct($jwt, $roles) {

        $this->roles = $roles;
        $this->jwt = $jwt;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    : array {

        return $this->roles;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    : ?string {

        return null;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    : ?string {

        return null;
    }

    public function isEqualTo(UserInterface $user)
    : bool {

        if (!$user instanceof WebServiceUser) {
            return false;
        }

        return $this->getUsername() === $user->getUsername();
    }

    /**
     * @inheritDoc
     */
    public function getUsername() {

        return $this->jwt["email"] ?? $this->jwt["sub"];
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
    }

    public function getUserIdentifier() {
        return $this->jwt["email"] ?? $this->jwt["sub"];
    }
}