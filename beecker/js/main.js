 //Glowna zmienna
 var Defvalue = 0;
 //zmienne do intervali
 var t;
 var t1;
 var t2;
 var t3;
 //zmienne do pszczół
 var pszczeliczba=0;
 var spszczeliczba=0;
 var ssjpszczeliczba=0;
 var magnpszczeliczba=0;
 //zmienne do cen
 var costp = 10;
 var costc = 5;
 var costsp = 100;
 var costssjp = 300;
 var costmagnp = 500
 //-----------------------------------
 var ClickValue = 1;
 var p = document.querySelector('p');
 function wyswietl(){
     var przechowaj = Defvalue;
     if(przechowaj >= 1e3 && przechowaj < 1e6){ 
         p.textContent = (przechowaj/1e3).toFixed(2)+" Thousand";
     }else if(przechowaj >= 1e6 && przechowaj < 1e9){ 
         p.textContent = (przechowaj/1e6).toFixed(2)+" Milion";
     }else if(przechowaj >= 1e9 && przechowaj < 1e12){ 
         p.textContent = (przechowaj/1e9).toFixed(2)+" Bilion";
     }else if(przechowaj >= 1e12 && przechowaj < 1e15){ 
         p.textContent = (przechowaj/1e12).toFixed(2)+" Trilion";
     }else if(przechowaj >= 1e15 && przechowaj < 1e18){ 
         p.textContent = (przechowaj/1e15).toFixed(2)+" Quadrilion";
     }else if(przechowaj >= 1e18 && przechowaj < 1e21){ 
         p.textContent = (przechowaj/1e18).toFixed(2)+" Pentilion";
     }else if(przechowaj >= 1e21 && przechowaj < 1e24){ 
         p.textContent = (przechowaj/1e21).toFixed(2)+" Sextilion";
     }else if(przechowaj >= 1e24 && przechowaj < 1e27){ 
         p.textContent = (przechowaj/1e24).toFixed(2)+" Septilion";
     }else if(przechowaj >= 1e27 && przechowaj < 1e30){ 
         p.textContent = (przechowaj/1e27).toFixed(2)+" Octilion";
     }else if(przechowaj >= 1e30 && przechowaj < 1e33){ 
         p.textContent = (przechowaj/1e30).toFixed(2)+" Nonilion";
     }else if(przechowaj >= 1e33){ 
         p.textContent = (przechowaj/1e33).toFixed(2)+" Decilion";
     }else {
         p.textContent = przechowaj;
     }
 }
 function clicker(){
     Defvalue += ClickValue;
     wyswietl();
 }
 function startpszczola(){
     if(Defvalue >= costp){
         pszczeliczba+=1;
         Defvalue -= costp;
         costp = pszczeliczba*pszczeliczba+10;
         wyswietl();
         if(t==null){
             t = setInterval(pszczola, 2000);
         }
         var p1 = document.querySelector('p1');
         p1.textContent = "Ilość pszczół:" + pszczeliczba + " Cena pszczoły:" + costp;

     } else {

     }
     
 }
 function pszczola(){
     Defvalue = Defvalue+1*pszczeliczba;
     wyswietl();
     
 }
 function PerClick(){
     if(Defvalue >= costc){
         ClickValue +=1;
         Defvalue -= costc;
         costc = ClickValue*ClickValue;
         wyswietl();
         var p2 = document.querySelector('p2');
         p2.textContent = "Wartość kliknięcia:" + ClickValue + " Cena:" + costc;

     }
     
     
     
 }
 function startsuperpszczola(){
     if(Defvalue >= costsp){
         spszczeliczba+=1;
         Defvalue -= costsp;
         costsp = spszczeliczba*spszczeliczba*5+100;
         wyswietl();
         if(t1 == null){
             t1 = setInterval(spszczola, 1000);
         }
         var p3 = document.querySelector('p3');
         p3.textContent = "Ilość Spszczół:" + spszczeliczba + " Cena Spszczoły:" + costsp;
     } else {

     }
 }
 function spszczola(){
     Defvalue = Defvalue+1*spszczeliczba;
     wyswietl();
 }
 function startssjpszczola(){
     if(Defvalue >= costssjp){
         ssjpszczeliczba+=1;
         Defvalue -= costssjp;
         costssjp = ssjpszczeliczba*ssjpszczeliczba*15+300;
         wyswietl();
         if(t2 == null){
             t2 = setInterval(ssjpszczola, 800);
         }
         var p4 = document.querySelector('p4');
         p4.textContent = "Ilość pszczół:" + ssjpszczeliczba + " Cena pszczoły:" + costssjp;
     } else {

     }
 }
 function ssjpszczola(){
     Defvalue = Defvalue+1*ssjpszczeliczba;
     wyswietl();
 }
 function startmagnpszczola(){
     if(Defvalue >= costmagnp){
         magnpszczeliczba+=1;
         Defvalue -= costmagnp;
         costmagnp = magnpszczeliczba*magnpszczeliczba*30+500;
         wyswietl();
         if(t3 == null){
             t3 = setInterval(magnpszczola, 500);
         }
         var p5 = document.querySelector('p5');
         p5.textContent = "Ilość pszczół:" + magnpszczeliczba + " Cena pszczoły:" + costmagnp;
     } else {

     }
 }
 function magnpszczola(){
     Defvalue = Defvalue+1*magnpszczeliczba*2;
     wyswietl();
 }