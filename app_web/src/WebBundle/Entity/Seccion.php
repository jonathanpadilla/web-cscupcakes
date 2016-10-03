<?php

namespace WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seccion
 *
 * @ORM\Table(name="seccion")
 * @ORM\Entity
 */
class Seccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texto1", type="string", length=200, nullable=true)
     */
    private $texto1;

    /**
     * @var string
     *
     * @ORM\Column(name="texto2", type="text", length=65535, nullable=true)
     */
    private $texto2;

    /**
     * @var string
     *
     * @ORM\Column(name="texto3", type="text", length=65535, nullable=true)
     */
    private $texto3;

    /**
     * @var string
     *
     * @ORM\Column(name="texto4", type="string", length=200, nullable=true)
     */
    private $texto4;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=200, nullable=true)
     */
    private $foto;

    /**
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", length=65535, nullable=true)
     */
    private $comentario;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set texto1
     *
     * @param string $texto1
     * @return Seccion
     */
    public function setTexto1($texto1)
    {
        $this->texto1 = $texto1;

        return $this;
    }

    /**
     * Get texto1
     *
     * @return string 
     */
    public function getTexto1()
    {
        return $this->texto1;
    }

    /**
     * Set texto2
     *
     * @param string $texto2
     * @return Seccion
     */
    public function setTexto2($texto2)
    {
        $this->texto2 = $texto2;

        return $this;
    }

    /**
     * Get texto2
     *
     * @return string 
     */
    public function getTexto2()
    {
        return $this->texto2;
    }

    /**
     * Set texto3
     *
     * @param string $texto3
     * @return Seccion
     */
    public function setTexto3($texto3)
    {
        $this->texto3 = $texto3;

        return $this;
    }

    /**
     * Get texto3
     *
     * @return string 
     */
    public function getTexto3()
    {
        return $this->texto3;
    }

    /**
     * Set texto4
     *
     * @param string $texto4
     * @return Seccion
     */
    public function setTexto4($texto4)
    {
        $this->texto4 = $texto4;

        return $this;
    }

    /**
     * Get texto4
     *
     * @return string 
     */
    public function getTexto4()
    {
        return $this->texto4;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Seccion
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set activo
     *
     * @param integer $activo
     * @return Seccion
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return integer 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Seccion
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }
}
