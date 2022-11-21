<?php
session_start();

require_once('.\fpdf184\fpdf.php');

class pdf extends fpdf {
     
    function header(){
        $this->setfont( 'Arial', 'UIB',14);
        $this->cell(2 ,);
        $this->cell(35,5,'INVOICE',0,1,'L');
        $this->ln(2);
        $this->image('.\pictures\wall paper\wall paper 3.jpg',87,18,7,7);
        $this->setfont( 'Arial', 'UIB',12);
        $this->cell(84 ,30);
        $this->cell(35,10 ,'Rascon Tastes',0,1, 'c');
        $this->setfont( 'courier', 'I',10);
        $this->cell(70 ,30);
        $this->cell(35,6 ,'Email : rascontastes@gmail.com',0,1, 'c');
        $this->cell(70 ,30);
        $this->cell(35,6 ,'Adress: P.O BOx 9310-10900 ',0,1, 'c');
        $this->cell(70 ,30);
        $this->cell(35,6 ,'City: Losagelas',0,1, 'c');
        $this->cell(70 ,30);
        $this->cell(35,6 ,'Conacts: +254728318369,',0,1, 'c');
        $this->cell(86 ,30);
        $this->cell(35,5 ,'+254729100990 ,',0,1, 'c');
        $this->cell(70 ,30);
        $this->cell(35,6 ,'social hundles: ',0,1, 'c');
        
    
        
    } 
    function footer(){
        $this->setY(-10);
        $this->setFont('Arial','T',8,);
        $this->cell(35,5,'powered by Melvins technology' );
    }
}
 $invoice = new pdf('p','mm','A5');
 $invoice->AddPage();
include('dbconnect.php');
$sql ="SELECT * FROM oder where  `full_name` = 'john kelvin'";
$results = $conn->query($sql);
$row =$results->fetch_assoc();
 foreach($results as $row){
    $invoice->ln(4);
    $invoice->setfont( 'arial', 'UI',11);
    $invoice->cell(20,5 ,'INVOICE: ',0,0, 'c');
    $invoice->cell(35,5 , $row['invoice'],0,1, 'c');
    $invoice->ln(2);
    $invoice->setfont( 'courier', 'I',10);
    $invoice->cell(15,6 ,'name: ',0,0, 'c');
    $invoice->cell(35,5 , $row['full_name'],0,1, 'c');
    $invoice->cell(15,6 ,'email: ',0,0, 'c');
    $invoice->cell(35,5 , $row['email'],0,1, 'c');
    $invoice->cell(15,6 ,'phone: ',0,0, 'c');
    $invoice->cell(35,5 , $row['contacts'],0,1, 'c');
    $invoice->cell(15,6 ,'adress: ',0,0, 'c');
    $invoice->cell(35,5 ,$row['adress'],0,1, 'c');
    $invoice->cell(15,6 ,'city: ',0,0, 'c');
    $invoice->cell(35,5 , $row['city'],0,1, 'c');
 }

 $invoice->SetFont('times','B',10);
 $invoice->ln(8);
 $invoice->
 $invoice->cell(15,5,'n.o' ,1, 0 , 'C');
 $invoice->cell(45,5,'name', 1, 0 , 'C');
 $invoice->cell(20,5,'price', 1, 0 , 'C');
 $invoice->cell(20,5,'qty', 1, 0 , 'C');
 $invoice->cell(20,5,'total', 1, 0 , 'C');


 $no = 0;
 $item = json_decode($row['items']);
 
 foreach($item as $key=>$row ){
    $no =$no + 1;
    $invoice->SetFont('times','',10);
    $invoice->ln(5);
    $invoice->cell(15,5,$no,1, 0 , 'C');
    $invoice->cell(45,5,$item[$key]->name, 1, 0 , 'C');
    $invoice->cell(20,5,$item[$key]->qty, 1, 0 , 'C');
    $invoice->cell(20,5,$item[$key]->price, 1, 0 , 'C');
    $invoice->cell(20,5,$item[$key]->total ,1, 0 , 'C');
    $invoice->cell(70);
    $invoice->cell(20,5,$item[$key]->total ,1, 0 , 'C');

 };

 $invoice->Output();


?>