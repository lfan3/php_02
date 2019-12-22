# php_02
## ex03 UTMPX
* first two data in signed char forma , the others two in int format * . 
0x1234 en binary is 1001000110100, so the unsigned char is one byte with the most heavy one to show the signe.
so now take the light un byte is 00110100 which is egale to int 52
so the same way 0x5678 is 101011001111000 01111000 is egal to 120

>  $bin = pack("c2n2",0x1234,0x5678,65,66);
    print_r(unpack("c2chars/n2int",$bin));
** the resulte is 52 120 65 66 **  

* all the data in Unsigned char. P ascii = 80 H ascci=72 *  
>   $data = "PHP";
** the resulte is 80 72 80 **
## Ressource :
https://www.w3schools.com/php/func_misc_unpack.asp
