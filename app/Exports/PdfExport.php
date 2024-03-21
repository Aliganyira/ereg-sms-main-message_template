<?php
namespace App\Exports;
if (ob_get_contents()) ob_end_clean();

use Codedge\Fpdf\Fpdf\Fpdf;

class PdfExport extends FPDF {

// variable to store widths and aligns of cells, and line height
    var $widths;
    var $aligns;
    var $lineHeight;

//Set the array of column widths
    function SetWidths($w){
        $this->widths=$w;
    }

//Set the array of column alignments
    function SetAligns($a){
        $this->aligns=$a;
    }

//Set line height
    function SetLineHeight($h){
        $this->lineHeight=$h;
    }

//Calculate the height of the row
    function Row($data)
    {
        // number of line
        $nb=0;

        // loop each data to find out greatest line number in a row.
        for($i=0;$i<count($data);$i++){
            // NbLines will calculate how many lines needed to display text wrapped in specified width.
            // then max function will compare the result with current $nb. Returning the greatest one. And reassign the $nb.
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        }

        //multiply number of line with line height. This will be the height of current row
        $h=$this->lineHeight * $nb;

        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Draw the cells of current row
        for($i=0;$i<count($data);$i++)
        {
            // width of the current col
            $w=$this->widths[$i];
            // alignment of the current col. if unset, make it left.
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function RowMulti($data,$align='L',$border=0)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : $align;
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }


    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //calculate the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }


    function WordWrap($text, $maxwidth)
    {
        $text = trim($text);
        if ($text==='')
            return 0;
        $space = $this->GetStringWidth(' ');
        $lines = explode("\n", $text);
        $text = '';
        $count = 0;

        foreach ($lines as $line)
        {
            $words = preg_split('/ +/', $line);
            $width = 0;

            foreach ($words as $word)
            {
                $wordwidth = $this->GetStringWidth($word);
                if ($wordwidth > $maxwidth)
                {
                    // Word is too long, we cut it
                    for($i=0; $i<strlen($word); $i++)
                    {
                        $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                        if($width + $wordwidth <= $maxwidth)
                        {
                            $width += $wordwidth;
                            $text .= substr($word, $i, 1);
                        }
                        else
                        {
                            $width = $wordwidth;
                            $text = rtrim($text)."\n".substr($word, $i, 1);
                            $count++;
                        }
                    }
                }
                elseif($width + $wordwidth <= $maxwidth)
                {
                    $width += $wordwidth + $space;
                    $text .= $word.' ';
                }
                else
                {
                    $width = $wordwidth + $space;
                    $text = rtrim($text)."\n".$word.' ';
                    $count++;
                }
            }
            $text = rtrim($text)."\n";
            $count++;
        }
        $text = rtrim($text);
        return $count;
    }

    function MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0)
    {
        //Output text with automatic or explicit line breaks, at most $maxline lines
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $b=0;
        if($border)
        {
            if($border==1)
            {
                $border='LTRB';
                $b='LRT';
                $b2='LR';
            }
            else
            {
                $b2='';
                if(is_int(strpos($border,'L')))
                    $b2.='L';
                if(is_int(strpos($border,'R')))
                    $b2.='R';
                $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
            }
        }
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $ns=0;
        $nl=1;
        while($i<$nb)
        {
            //Get next character
            $c=$s[$i];
            if($c=="\n")
            {
                //Explicit line break
                if($this->ws>0)
                {
                    $this->ws=0;
                    $this->_out('0 Tw');
                }
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $ns=0;
                $nl++;
                if($border && $nl==2)
                    $b=$b2;
                if($maxline && $nl>$maxline)
                    return substr($s,$i);
                continue;
            }
            if($c==' ')
            {
                $sep=$i;
                $ls=$l;
                $ns++;
            }
            $l+=$cw[$c];
            if($l>$wmax)
            {
                //Automatic line break
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                    if($this->ws>0)
                    {
                        $this->ws=0;
                        $this->_out('0 Tw');
                    }
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
                else
                {
                    if($align=='J')
                    {
                        $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                        $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                    }
                    $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                    $i=$sep+1;
                }
                $sep=-1;
                $j=$i;
                $l=0;
                $ns=0;
                $nl++;
                if($border && $nl==2)
                    $b=$b2;
                if($maxline && $nl>$maxline)
                {
                    if($this->ws>0)
                    {
                        $this->ws=0;
                        $this->_out('0 Tw');
                    }
                    return substr($s,$i);
                }
            }
            else
                $i++;
        }
        //Last chunk
        if($this->ws>0)
        {
            $this->ws=0;
            $this->_out('0 Tw');
        }
        if($border && is_int(strpos($border,'B')))
            $b.='B';
        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
        $this->x=$this->lMargin;
        return '';
    }


    function GenerateWord()
    {
        //Get a random word
        $nb=rand(3,10);
        $w='';
        for($i=1;$i<=$nb;$i++)
            $w.=chr(rand(ord('a'),ord('z')));
        return $w;
    }


    function GenerateSentence()
    {
        //Get a random sentence
        $nb=rand(1,10);
        $s='';
        for($i=1;$i<=$nb;$i++)
            $s.=GenerateWord().' ';
        return substr($s,0,-1);
    }


    // Page header
    function Header()
    {
//        echo public_path('images/logo.png');

        // Logo
        $this->Image(public_path('images/logo.png'),95,6,20);
        // Arial bold 15
        $this->SetFont('Arial','',8);
        // Title

        $footer_height = 2;
        $this->Cell(65, $footer_height, 'Telephone : +256 41 4230 487', 0, 0,'R');
        $this->Cell(70, $footer_height, ' ', 0, 0);
        $this->Cell(70, $footer_height, 'Ministry of Finance, Planning &', 0, 1);
        $this->Ln();

        $this->Cell(65, $footer_height, ': +256 41 4233 524', 0, 0,'R');
        $this->Cell(70, $footer_height, ' ', 0, 0);
        $this->Cell(70, $footer_height, 'Economic Development', 0, 1);
        $this->Ln();

        $this->Cell(65, $footer_height, 'Fax : +256 41 4233 524', 0, 0,'R');
        $this->Cell(70, $footer_height, ' ', 0, 0);
        $this->Cell(70, $footer_height, 'Accountant General\'s Office', 0, 1);
        $this->Ln();

        $this->Cell(65, $footer_height, 'Email : finance@finance.go.ug', 0, 0,'R');
        $this->Cell(70, $footer_height, ' ', 0, 0);
        $this->Cell(70, $footer_height, 'lot 2-12, Apollo Kaggwa Road', 0, 1);
        $this->Ln();

        $this->Cell(65, $footer_height, 'Website : www.finance.go.ug', 0, 0,'R');
        $this->Cell(70, $footer_height, ' ', 0, 0);
        $this->Cell(70, $footer_height, 'P. O. Box 7031, Kampala', 0, 1);
        $this->Ln();

        $this->Cell(55, $footer_height, '', 0, 0,'R');
        $this->SetFont('Arial','B',8);
        $this->Cell(80, $footer_height, 'The Republic Of Uganda', 0, 0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(70, $footer_height, 'UGANDA', 0, 1);
        $this->Ln();



        $this->Ln();


    }

// Page footer
    function Footer()
    {


        $line1='Cc: The Auditor General, Office of the Auditor General';
        $line2 ='The Permanent Secretary/Secretary to the Treasury';
        $mission ='Mission';
        $mission_body='To formulate sound economic policies, maximize revenue mobilization, ensure efficient allocation and accountability for public resources so ';
        $mission_body2='as to achieve the most rapid and sustainable economic growth and development';
        // Position at 1.5 cm from bottom
        $this->SetY(-38);
        $this->SetDrawColor(198,198,198);
        $this->Cell(0,0, '', 1, 1,'C');
        // Arial italic 8
        $this->SetFont('Arial','B',9);
        $this->Cell(70,10, $line1, 0);
        $this->Ln(4);
        $this->Cell(70,10, $line2, 0, 0);
        $this->Ln(3);
        $this->SetFont('Arial','BI',8);
        $this->Cell(0,10, $mission, 0, 0,'C');
        $this->Ln(3);
        $this->Cell(0,10, $mission_body, 0, 0,'C');
        $this->Ln(3);
        $this->Cell(0,10, $mission_body2, 0, 0,'C');
        $this->Ln(5);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

//Sample
//$pdf->AddPage();
//$pdf->SetFont('Arial','',14);
////Table with 20 rows and 4 columns
//$pdf->SetWidths(array(50,50,50,45));
//for($i=0;$i<20;$i++) {
//$pdf->Row_multi(array(GenerateSentence(), GenerateSentence(), GenerateSentence(), GenerateSentence()));
//}



}
