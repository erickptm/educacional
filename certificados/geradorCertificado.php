<?php
require('../tcpdf/tcpdf.php');
include('../banco/protect.php');

$nome = $_POST['nome'];
$curso = $_POST['curso'];
$data = $_POST['data'];

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

$pdf->SetTitle('Certificate of Completion');

$pdf->AddPage();

$imagePath = '../imagens/LogoVAV.png';
$pdf->Image($imagePath, 250, 10, 40, 0, '', '', 'T', false, 300, '', false, false, 0);

$pdf->SetFont('helvetica', '', 24);
$pdf->writeHTML
("
<style>
      body {
         text-align: center;
         font-family: Arial, sans-serif;
      }
      h1 {
         font-size: 32pt;
         margin-bottom: 20px;
      }
      h2 {
         font-size: 25pt;
         margin-bottom: 10px;
      }
      h3{
         font-size: 20pt;
         margin-bottom: 10px;
      }
      p {
         font-size: 16pt;
         margin-bottom: 10px;
      }
   </style>

   <h1>Certificado De Conclusão</h1>
   <p>Isso certifica que o Aluno(a): $nome</p>
   <p>Concluiu com sucesso o Curso: $curso</p>
   <p>Na data de: $data</p>
   <p>Este certificado é concedido em reconhecimento do compromisso e dedicação demonstrados por $nome durante o curso: $curso. Durante este período, o aluno demonstrou habilidades exemplares e conhecimento profundo na área de segurança online.</p>
   <h2>Parabéns por essa realização notável!</h2>
   <h3>ONG: A Verde, Água, Vida</h3>
");

$pdf->Output($nome . '-' . $curso . '-' . 'certificate.pdf', 'D');