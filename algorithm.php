<?php
$p=101;
echo $p." =p  ";
echo"<br>";
$q=103;
echo $q." =q  ";
echo"<br>";
$r=107;
echo $r." =r  ";
echo"<br>";
$s=109;
echo $s." =s  ";
echo"<br>";
$n=$p*$q;
echo $n." =n  ";
echo"<br>";
$z=$r*$s;
echo $z." =z  ";
echo"<br>";
$phin=($p-1)*($q-1);
echo $phin." =phin ";
echo"<br>";
$phiz=($r-1)*($s-1);
echo $phiz." =phiz  ";
echo"<br>";
// Function to print primes for e n 
/*$count=0;
$arrayp=array(0,1);
$isit=0;*/
/*
// Driver Code
$nn = $phin; 
for ($i = 2; $i <= $nn; $i++) 
{
    if($nn<=1)
    $isit=0;
    for($i=2;$i<$nn;$i++)
    {
        if($nn%$i==0)
        $isit=1;
    }
    if ($isit==1)
    {
        $arrayp[$count]=$i;
        $count++;
    }
} 
$cc=count($arrayp);
/*for($i=0;$i<$cc;$i++)
{
    echo $arrayp[$i];
    echo("<br>");
}
$vale=0;
for($i=0;$i<$cc;$i++)
{
    if(($arrayp[$i]>1) && ($arrayp[$i]<$n))
    {
        if(gmp_gcd($arrayp[$i],$phin)==1)
        {
            $e=$arrayp[$i];
            echo $e;
            $vale=$e;
        }
    }
}*/
for($i=$phin;$i>0;$i--)
{
    if(gmp_gcd($i,$phin)==1){
        $e=$i;
        break;
    }
}
echo $e."=e<br>";
for($i=$phiz;$i>0;$i--)
{
    if(gmp_gcd($i,$phiz)==1){
        $g=$i;
        break;
    }
}
echo $g."=g<br>";
//sdsd
//echo $vale;
//echo"<br>";
// Function to print primes for g z
/*$count=0;
$arrayp=array(0,1);
$isit=0;
// Driver Code
$ng = $phiz; 
for ($i = 2; $i <= $ng; $i++) 
{
    if($n<=1)
    $isit=0;
    for($i=2;$i<$ng;$i++)
    {
        if($ng%$i==0)
        $isit=1;
    }
    if ($isit==1)
    {
        $arrayp[$count]=$i;
        $count++;
    }
} 
$cc=count($arrayp);
/*for($i=0;$i<$cc;$i++)
{
    echo $arrayp[$i];
    echo("<br>");
}
for($i=0;$i<$cc;$i++)
{
    if(($arrayp[$i]>1) && ($arrayp[$i]<$z))
    {
        if(gmp_gcd($arrayp[$i],$phiz)==1)
        {
            $g=$arrayp[$i];
        }
    }
}*/
//sdsd
//echo $g;
//echo"<br>";
//$egmp=strval($e);
//$phingmp=strval($phin);
//$ggmp=strval($g);
//$phizgmp=strval($phiz);
$d=gmp_invert($e,$phin);
echo $d;
echo"=d<br>";
$t=gmp_invert($g,$phiz);
echo $t;
echo"=t<br>";
$dp=$d % ($p-1);
$dq=$d % ($q-1);
$dr=$d % ($r-1);
$ds=$d % ($s-1);
//public keys: (e,n),(g,z)
//private key:(t,z,dp,dq,dr,ds)
$myfile = fopen("file11.txt", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("file11.txt"));
$redf=fread($myfile,filesize("file11.txt"));
$M=$redf;
fclose($myfile);
$count=strlen($M);
echo $count."<br>";
$unpak=unpack("C*",$M);
for($i=1;$i<($count+1);$i++)
{   
    echo $unpak[$i];
    echo "<br>";
    //$unpak[$i]=decbin($unpak[$i]);
    //echo"<br>";
}
$cipher="";
$binz=strval(decbin($z));
$cz=strlen($binz);
for($i=1;$i<($count+1);$i++)
{
    $C1=bcpowmod(strval($unpak[$i]),strval($e),strval($n));
    $C=intval(bcpowmod($C1,strval($g),strval($z)));
    $cipher.=str_pad(decbin($C),$cz,"0", STR_PAD_LEFT);
    echo"<br>";
    echo $C."=C<br>";
}
echo $cipher;
//variable M is message in integer form
//$M=113;
echo $M." is the messages to be sent.<br> ";
//$count=strlen($M);
//encryption
//$C1= pow($M,$e) % $n;
//$C= pow($C1,$g) % $z;
//$C=pow($M,$e)%$n;
//echo $C." =c ";
//echo"<br>";
$prikeyar1=array($t,$z);
$prikeyar2=array($d,$n);
$pubkeyar1=array($e,$n);
$pubkeyar2=array($g,$z);
$privkey=join($prikeyar1);
$pubkey=join($pubkeyar1);
echo" public key1: (".$e.",".$n.")<br>";
echo" public key2: (".$g.",".$z.")<br>";
echo" private key1: (".$t.",".$z.")<br>";
echo" private key2: (".$d.",".$n.")<br>";
//SHA
//hash ( 'sha512' , $C [, bool $raw_output = FALSE ] ) : string
$hashed = hash('sha512', $C);
/*
$privkey1=openssl_pkey_get_private("file://C:\Users\HP\Downloads\openssl-toolkit\server.pem");
openssl_sign($C,$signature,$privkey1);
//decryption
$pubkey1=openssl_pkey_get_public("file://C:\Users\HP\Downloads\openssl-toolkit\server.crt");
$ok=openssl_verify($C,$signature,$pubkey1);
if ($ok==1)
{
    echo"Signature is good<br>";
}
elseif($ok==0)
{
    echo"Signature is bad<br>";
}
else
{
    echo"ugly, eroor checking signature<br>";
}
*/

$cipher_db=$cipher;
$cipher_arr= str_split($cipher_db,14);
echo $cipher_arr[0];



$dec_m="";
for($i=0;$i<count($cipher_arr);$i++){
    $C=bindec($cipher_arr[$i]);
    echo"<br>";
    echo $C;
   
    $M1=bcpowmod($C,strval($g),strval($z));
    $M=intval(bcpowmod($M1,strval($e),strval($n)));

    
    // $Cp= $C1 % $p;
    // $Cq= $C1 % $q;
    // $Cr= $C1 % $r;
    // $Cs= $C1 % $s;
    // $dp= $d % ($p-1);
    // $dq= $d % ($q-1);
    // $dr= $d % ($r-1);
    // $ds= $d % ($s-1);
    // $mp= bcpowmod(strval($Cp),strval($dp),strval($p));
    // echo $mp;
    // $mq= bcpowmod(strval($Cq),strval($dq),strval($q));
    // $mr= bcpowmod(strval($Cr),strval($dr),strval($r));
    // $ms= bcpowmod(strval($Cs),strval($ds),strval($s));
    // echo $mp;
    
    $char= chr($M);
   
    $dec_m.=$char;
    // echo $dp;
    // echo"<br>";
    // echo $dq;
    // echo"<br>";
    
    // echo $dr;
    // echo"<br>";
    // echo $ds;
    // echo"-----<br>";


    // echo $char;
    
}
// echo $dec_m;


//$message=pow($C,$d)%$n;
//echo $message." mm ";
$hashed2=hash('sha512',$C);
if($hashed==$hashed2)
{
    echo"Hashes are the same";
    echo"<br>";
}

//echo($mp.$mq.$mr.$ms);
echo $dec_m;
?>