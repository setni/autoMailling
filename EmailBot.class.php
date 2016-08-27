<?php
/*
 * Author: setni
 */

class EmailBot 
{
    //--------------VARIABLESS
    private $fileURL;
    private $yourAdress;
    private $object;
    private $text;
    private $domain;
    private static $nom = false;
    private static $tab = array();
    
    //--------------SETTERS
    public function setFile         ($fileURL)      { $this->mailFile   = $fileURL;}
    public function setYourAdress   ($yourAdress)   { $this->yourAdress = $yourAdress;}
    public function setObject       ($object)       { $this->mailObject = $object;}
    public function setText         ($text)         { $this->mailText   = $text;}
    public function setDomain       ($domain)       { $this->mailDomain = $domain;}
    
    //--------------CONSTRUCTORS
	public function __construct($fileURL = null, $yourAdress = null, $object = null, $text = null, $domain = null)
	{
		if (!empty($fileURL)) {
			$this->setFile($fileURL);
		}
		if (!empty($yourAdress)) {
			$this->setYourAdress($yourAdress);
        }
        if (!empty($object)) {
			$this->setObject($object);
		}
        if (!empty($text)) {
			$this->setText($text);
		}
        if (!empty($domain)) {
			$this->setDomain($domain);
		}
	}
    
    //--------------PUBLIC
    public function emailBot() 
    {
        $this->_emailBot($this->mailFile, $this->yourAdress, $this->mailObject, $this->mailText, $this->mailDomain); 
        return "********\r\ndone\r\n********\r\n";
    }
    
    //--------------PRIVATE
    private function _emailBot($file, $yourAdress, $object, $text, $domain) 
    {
        $lecture = fopen($file, 'r');
        while($ligne = fgets($lecture)) {
            
            if($nom) $noms[] = strtolower($this->wd_remove_accents($ligne));
            
            if(preg_match("#\*#", $ligne)) $nom = true;
            else $nom = false;
            
        }
        
        foreach($noms as $value) {
            if(!preg_match("#utilisateur#", $value)) {
                $tab    = explode(" ",$value);
                $mail   = $tab[0].'.'.$tab[1].$domain;
                //$this->envois_mail($mail, $object, $text, $yourAdress);
                print_r("Sent to: ".$mail."\r\n\r\n"); //to follow the sending. ! Not a best practice
            }
            //sleep(40); //to simulate human action
        }
        return true;
    }

    private function envois_mail ($mail, $object, $messageHtml, $yourAdress) 
    {
    
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) 
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
       
        //=====
        $boundary = "-----=".md5(rand());
        //==========
 
        //=====
        $header = "From: '.$yourAdress.'".$passage_ligne;
        $header.= "Reply-to: ".$yourAdress."\"".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"".$boundary."\"".$passage_ligne;
        //==========
 
        //=====
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$messageHtml.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
  
        //=====
        return mail($adresse,$object,$message,$header);

    }
    
    private function wd_remove_accents($str, $charset='utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); 
        $str = preg_replace('#&[^;]+;#', '', $str); 
    
        return $str;
    }

}



