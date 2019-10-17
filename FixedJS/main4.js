let money = 0

let pszczoly = [
    { nazwa: "Pszczola",        cena: 10,    coIle: 2000, ile: 0 },
    { nazwa: "Super Pszczola",  cena: 100,   coIle: 1000, ile: 0 },
    { nazwa: "SSJPszczola",     cena: 300,   coIle: 800,  ile: 0 },
    { nazwa: "Magnum Pszczola", cena: 500,   coIle: 500,  ile: 0 },
    { nazwa: "Pronto Pszczola", cena: 1000,  coIle: 100,  ile: 0 },
]

let clickCost = 5;
let clickValue = 1;

let p = document.querySelector('p');
function wyswietl(){
    let przechowaj = money;
    if(przechowaj >= 1e3 && przechowaj < 1e6){ 
        p.textContent = (przechowaj/1e3).toFixed(2)+" Thousand";
    } else if(przechowaj >= 1e6 && przechowaj < 1e9){ 
        p.textContent = (przechowaj/1e6).toFixed(2)+" Milion";
    } else if(przechowaj >= 1e9 && przechowaj < 1e12){ 
        p.textContent = (przechowaj/1e9).toFixed(2)+" Bilion";
    } else if(przechowaj >= 1e12 && przechowaj < 1e15){ 
        p.textContent = (przechowaj/1e12).toFixed(2)+" Trilion";
    } else if(przechowaj >= 1e15 && przechowaj < 1e18){ 
        p.textContent = (przechowaj/1e15).toFixed(2)+" Quadrilion";
    } else if(przechowaj >= 1e18 && przechowaj < 1e21){ 
        p.textContent = (przechowaj/1e18).toFixed(2)+" Pentilion";
    } else if(przechowaj >= 1e21 && przechowaj < 1e24){ 
        p.textContent = (przechowaj/1e21).toFixed(2)+" Sextilion";
    } else if(przechowaj >= 1e24 && przechowaj < 1e27){ 
        p.textContent = (przechowaj/1e24).toFixed(2)+" Septilion";
    } else if(przechowaj >= 1e27 && przechowaj < 1e30){ 
        p.textContent = (przechowaj/1e27).toFixed(2)+" Octilion";
    } else if(przechowaj >= 1e30 && przechowaj < 1e33){ 
        p.textContent = (przechowaj/1e30).toFixed(2)+" Nonilion";
    } else if(przechowaj >= 1e33){ 
        p.textContent = (przechowaj/1e33).toFixed(2)+" Decilion";
    } else {
        p.textContent = przechowaj;
    }
}
function clicker(){
    money += clickValue;
    wyswietl();
}
function perClick(){
    if(money >= clickCost){
        clickValue +=1;
        money -= clickCost;
        clickCost = clickValue*clickValue;
        wyswietl();
        let p2 = document.querySelector('p2');
        p2.textContent = "Wartość kliknięcia:" + clickValue + " Cena:" + clickCost;
    }
}
let divs = document.querySelectorAll('.pszczola')

for (let i = 0; i < pszczoly.length; i++) {
    let pszczola = pszczoly[i]
    divs[i].querySelector('button').addEventListener('click', () => {
        if(money >= pszczola.cena){
            pszczola.ile += 1;
            money -= pszczola.cena;
            pszczola.cena = Math.round(pszczola.cena * 1.3)
            wyswietl();

            let p = divs[i].querySelector('p');
            p.textContent = "Ilość pszczół:" + pszczola.ile + " Cena pszczoły:" + pszczola.cena;
        }
    })

    setInterval(() => {
        money += pszczola.ile
        wyswietl()
    }, pszczola.coIle)
}


