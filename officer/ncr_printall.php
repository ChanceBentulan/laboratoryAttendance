      <?php
        session_start();
        //path to fpdf
       $user=$_SESSION['user'];
        require "fpdf182/fpdf.php";
        define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $user = $_GET['user'];
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }
        class myPDF extends FPDF
        {
          function header(){
              // Arial bold 15
              $this->SetFont('Arial','B',20);
              // Move to the right
              $this->Cell(120);
              // Title
              $this->Cell(30,10,'ATTENDANCE',0,0,'C');
              // Line break
              $this->Ln(20);
          }
          // Page footer
          function footer(){
              // Position at 1.5 cm from bottom
              $this->SetY(-15);
              // Arial italic 8
              $this->SetFont('Arial','I',8);
              // Page number
              $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
          }
          function headerTable(){
                //set font
                $this->SetFont('Arial','B',10);
                //adjust to the right of table
                 $this->Cell(30);
                $this->Cell(10,10,'No',1,0,'C');
                $this->Cell(25,10,'User',1,0,'C');    
                $this->Cell(27,10,'Role',1,0,'C'); 
                $this->Cell(15,10,'Lab',1,0,'C');                  
                $this->Cell(20,10,'Date In',1,0,'C');
                $this->Cell(20,10,'Date Out',1,0,'C');    
                $this->Cell(20,10,'Time In',1,0,'C');
                $this->Cell(20,10,'Time Out',1,0,'C'); 
                $this->Cell(35,10,'Duty Hours',1,0,'C');
                $this->Cell(25,10,'Sched Hours',1,0,'C');         
          }
          function viewTable($conn,$user){

                //set font
                $this->SetFont('Arial','',9.5);
                //ang statement na mo connect sa sql
                $query=mysqli_query($conn,"SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ncr' ORDER BY Date_In");
                while($data = mysqli_fetch_array($query)){
                  //line break of table
                  $this->Ln();
                  //adjust to the right of table
                  $this->Cell(30);
                  $this->Cell(10,10,$data['No'],1,0,'C');
                  $this->Cell(25,10,$data['user'],1,0,'P');    
                  $this->Cell(27,10,$data['role'],1,0,'P'); 
                  $this->Cell(15,10,$data['labassign'],1,0,'P');                    
                  $this->Cell(20,10,$data['Date_In'],1,0,'P');
                  $this->Cell(20,10,$data['Date_Out'],1,0,'P');  
                  $this->Cell(20,10,$data['timein'],1,0,'P');
                  $this->Cell(20,10,$data['timeout'],1,0,'P');
                  $this->Cell(35,10,$data['time_dur'],1,0,'P');
                  $day = date('l',$data['Date_Out']);
                  switch($day){
                    case "Monday":
                      $this->Cell(25,10,$data['Monday'],1,0,'P');
                      break;                      
                    case "Tuesday":
                      $this->Cell(25,10,$data['Tuesday'],1,0,'P');
                      break;
                    case "Wednesday":
                      $this->Cell(25,10,$data['Wednesday'],1,0,'P');
                      break;
                    case "Thursday":
                      $this->Cell(25,10,$data['Thursday'],1,0,'P');
                      break;
                    case "Friday":
                      $this->Cell(25,10,$data['Friday'],1,0,'P');
                      break;
                    default:
                      $this->Cell(25,10,"No Time Set",1,0,'P');
                }
              }
          }
        }
        $pdf = new myPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4',0);
        $pdf->headerTable();
        $pdf->viewTable($conn,$user);
        $pdf->Output();          
        /**
         * 
         */

      ?>