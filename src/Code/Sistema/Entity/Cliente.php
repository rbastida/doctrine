<?php

namespace Code\Sistema\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 * @ORM\Entity(repositoryClass="\Code\Sistema\Entity")
 */

class Cliente {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)    
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)    
     */
    private $email;

    /**
     * @return mixed
     */
    function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

}
