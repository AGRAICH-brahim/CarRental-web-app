<?php 
 // ...
            // Votre code existant pour enregistrer la réservation
        
           

            // Génération du PDF
            require_once '../../../dompdf/autoload.inc.php';
            
            use Dompdf\Dompdf ;
        
            // Création d'une nouvelle instance de Dompdf
            $pdf = new Dompdf();
        
            // Ajout du contenu au PDF
            $pdf->loadHtml($html);
            // Ajoutez d'autres éléments HTML selon vos besoins
        
            // Rendu du PDF
            $pdf->render();

            $pdf->setPaper('A4' , 'portrait');
        
            $pdf->stream()


            ?>