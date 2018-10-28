<?php

      
require('fpdf.php');
      
         $pdf = new FPDF();
         $pdf->AddPage();
         $pdf->SetFont('Arial', 'B', 14);
         $title='Historial De Calificaciones';
      $pdf->SetTitle($title);
        
  
      $pdf->Ln(8);
       $pdf->Cell(50, 8, ' ', 0);
               $pdf->Cell(300, 10, 'Hola, Este es tu historial al momento', 0);
              
               
              
                 
       $pdf-> Output(); 
       ?>

