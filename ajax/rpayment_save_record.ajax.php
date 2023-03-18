<?php
require_once "../controllers/payment.controller.php";
require_once "../models/payment.model.php";


class savePayment{
  public $par1; 
  public $par2; 
  public $par3; 
  public $par4; 
  public $par5; 
  public $par6; 
  public $cashr1; 
  public $cashr2; 
  public $cashr3; 
  public $cashr4; 
  public $cashr5; 
  public $cashr6; 
  public $chand1; 
  public $chand2; 
  public $chand3; 
  public $chand4; 
  public $chand5; 
  public $chand6; 
  public $rbal1; 
  public $rbal2; 
  public $rbal3; 
  public $rbal4; 
  public $rbal5; 
  public $rbal6; 
  public $receipt1; 
  public $receipt2; 
  public $receipt3; 
  public $receipt4; 
  public $receipt5; 
  public $receipt6; 
  public $tchand; 
  public $tcashr; 
  public $tbal; 



  public function savePaymentRecord(){
    $par1 = $this->par1;
    $par2 = $this->par2;
    $par3 = $this->par3;
    $par4 = $this->par4;
    $par5 = $this->par5;
    $par6 = $this->par6;
    $cashr1 = $this->cashr1;
    $cashr2 = $this->cashr2;
    $cashr3 = $this->cashr3;
    $cashr4 = $this->cashr4;
    $cashr5 = $this->cashr5;
    $cashr6 = $this->cashr6;
    $chand1 = $this->chand1;
    $chand2 = $this->chand2;
    $chand3 = $this->chand3;
    $chand4 = $this->chand4;
    $chand5 = $this->chand5;
    $chand6 = $this->chand6;
    $rbal1 = $this->rbal1;
    $rbal2 = $this->rbal2;
    $rbal3 = $this->rbal3;
    $rbal4 = $this->rbal4;
    $rbal5 = $this->rbal5;
    $rbal6 = $this->rbal6;
    $receipt1 = $this->receipt1;
    $receipt2 = $this->receipt2;
    $receipt3 = $this->receipt3;
    $receipt4 = $this->receipt4;
    $receipt5 = $this->receipt5;
    $receipt6 = $this->receipt6;
    $tcashr = $this->tcashr;
    $tchand = $this->tchand;
    $tbal = $this->tbal;

    $data = array("par1"=>$par1,
                    "par2"=>$par2,
                    "par3"=>$par3,
                    "par4"=>$par4,
                    "par5"=>$par5,
                    "par6"=>$par6,
                    "cashr1"=>$cashr1,
                    "cashr2"=>$cashr2,
                    "cashr3"=>$cashr3,
                    "cashr4"=>$cashr4,
                    "cashr5"=>$cashr5,
                    "cashr6"=>$cashr6,
                    "chand1"=>$chand1,
                    "chand2"=>$chand2,
                    "chand3"=>$chand3,
                    "chand4"=>$chand4,
                    "chand5"=>$chand5,
                    "chand6"=>$chand6,
                    "rbal1"=>$rbal1,
                    "rbal2"=>$rbal2,
                    "rbal3"=>$rbal3,
                    "rbal4"=>$rbal4,
                    "rbal5"=>$rbal5,
                    "rbal6"=>$rbal6,
                    "receipt1"=>$receipt1,
                    "receipt2"=>$receipt2,
                    "receipt3"=>$receipt3,
                    "receipt4"=>$receipt4,
                    "receipt5"=>$receipt5,
                    "receipt6"=>$receipt6,
                    "tcashr"=>$tcashr,
                    "tchand"=>$tchand,
                    "tbal"=>$tbal
                  );
                  
      $answer = (new ControllerPayments)->ctrAddPayment($data);

  }
}

$save_payment = new savePayment();
$save_payment -> par1 = $_POST["par1"];
$save_payment -> par2 = $_POST["par2"];
$save_payment -> par3 = $_POST["par3"];
$save_payment -> par4 = $_POST["par4"];
$save_payment -> par5 = $_POST["par5"];
$save_payment -> par6 = $_POST["par6"];
$save_payment -> cashr1 = $_POST["cashr1"];
$save_payment -> cashr2 = $_POST["cashr2"];
$save_payment -> cashr3 = $_POST["cashr3"];
$save_payment -> cashr4 = $_POST["cashr4"];
$save_payment -> cashr5 = $_POST["cashr5"];
$save_payment -> cashr6 = $_POST["cashr6"];
$save_payment -> chand1 = $_POST["chand1"];
$save_payment -> chand2 = $_POST["chand2"];
$save_payment -> chand3 = $_POST["chand3"];
$save_payment -> chand4 = $_POST["chand4"];
$save_payment -> chand5 = $_POST["chand5"];
$save_payment -> chand6 = $_POST["chand6"];
$save_payment -> rbal1 = $_POST["rbal1"];
$save_payment -> rbal2 = $_POST["rbal2"];
$save_payment -> rbal3 = $_POST["rbal3"];
$save_payment -> rbal4 = $_POST["rbal4"];
$save_payment -> rbal5 = $_POST["rbal5"];
$save_payment -> rbal6 = $_POST["rbal6"];
$save_payment -> receipt1 = $_POST["receipt1"];
$save_payment -> receipt2 = $_POST["receipt2"];
$save_payment -> receipt3 = $_POST["receipt3"];
$save_payment -> receipt4 = $_POST["receipt4"];
$save_payment -> receipt5 = $_POST["receipt5"];
$save_payment -> receipt6 = $_POST["receipt6"];
$save_payment -> tcashr = $_POST["tcashr"];
$save_payment -> tchand = $_POST["tchand"];
$save_payment -> tbal = $_POST["tbal"];




$save_payment -> savePaymentRecord();