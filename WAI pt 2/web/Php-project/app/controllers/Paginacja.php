<?php


class Paginacja extends Controller
{
    public $zmienna;
    public function stronicowanie(){
       if(isset($_GET['page'])){
           $obecna_strona=$_GET['page'];
       }
       else{
           $obecna_strona=1;
       }
       $param1=($obecna_strona-1)*$data['paging']['elementyNaStronie'];
       $this->zmienna=array_slice($data['min'],$param1, $data['paging']['elementyNaStronie']);


    }
    public function  rezultat (){
        $wynik=$this->zmienna;
        return $wynik;
    }

}
$peg = new Paginacja();
$zmienna=array($data['min']);
$result=$peg->rezultat();
