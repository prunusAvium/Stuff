<?php


class Father {
    private $yearBirth;
    private $yearDead;
    private $name;

    /**
     * Father constructor.
     * @param $yearBirth
     * @param $yearDead
     * @param $name
     */
    public function __construct( $name, int $yearDead, int $yearBirth)
    {
        $this->setName($name);
        $this->setYearBirth($yearBirth);
        $this->setYearDead($yearDead);
    }

    /**
     * @param int $yearBirth
     */
    public function setYearBirth(int $yearBirth)
    {
        $this->yearBirth = $yearBirth;
    }

    /**
     * @param int $yearDead
     */
    public function setYearDead(int $yearDead)
    {
        $this->yearDead = $yearDead;
    }

    public function setName( $name)
    {
       /* if (mb_strlen($this->name) < 3){
            throw new Exception('Gledai si rabotata');
        }*/
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getYearBirth()
    {
        return $this->yearBirth;
    }

    /**
     * @return mixed
     */
    public function getYearDead()
    {
        return $this->yearDead;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    protected function getTimeLived(){
        return $this->yearDead - $this->yearBirth;
    }

    public function getGenerationNum(){
        return 1;
    }
}