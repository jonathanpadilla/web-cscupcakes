<?php

namespace WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cupcakes
 *
 * @ORM\Table(name="cupcakes")
 * @ORM\Entity
 */
class Cupcakes
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
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=100, nullable=true)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="texto1", type="string", length=50, nullable=true)
     */
    private $texto1;

    /**
     * @var string
     *
     * @ORM\Column(name="texto2", type="string", length=50, nullable=true)
     */
    private $texto2;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="string", length=50, nullable=true)
     */
    private $precio;



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
     * Set tipo
     *
     * @param integer $tipo
     * @return Cupcakes
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Cupcakes
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set texto1
     *
     * @param string $texto1
     * @return Cupcakes
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
     * @return Cupcakes
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
     * Set precio
     *
     * @param string $precio
     * @return Cupcakes
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}
