<?php

namespace WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cupcakes
 *
 * @ORM\Table(name="cupcakes", indexes={@ORM\Index(name="categoria", columns={"categoria"})})
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
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria", referencedColumnName="id")
     * })
     */
    private $categoria;



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

    /**
     * Set activo
     *
     * @param integer $activo
     * @return Cupcakes
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
     * Set categoria
     *
     * @param \WebBundle\Entity\Categoria $categoria
     * @return Cupcakes
     */
    public function setCategoria(\WebBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \WebBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}
