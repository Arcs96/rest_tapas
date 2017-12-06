<?php

namespace RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tapa
 *
 * @ORM\Table(name="tapa")
 * @ORM\Entity(repositoryClass="RestBundle\Repository\TapaRepository")
 */
class Tapa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_tapa", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 128,
     *      maxMessage = "Has superado el limite de caracteres"
     * )
     */
    private $nomTapa;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $descrip;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fecha", type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "Has introducido un valor menor o igual a 0"
     * )
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $foto;


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
     * Set nomTapa
     *
     * @param string $nomTapa
     *
     * @return Tapa
     */
    public function setNomTapa($nomTapa)
    {
        $this->nomTapa = $nomTapa;

        return $this;
    }

    /**
     * Get nomTapa
     *
     * @return string
     */
    public function getNomTapa()
    {
        return $this->nomTapa;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     *
     * @return Tapa
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Tapa
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Tapa
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Tapa
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
}
