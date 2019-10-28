let money = 0

let pszczoly = [
    { nazwa: "Pszczola", cena: 10, coIle: 2000, ile: 0, interval: null },
    { nazwa: "Super Pszczola", cena: 100, coIle: 1000, ile: 0, interval: null },
    { nazwa: "SSJPszczola", cena: 300, coIle: 800, ile: 0, interval: null },
    { nazwa: "Magnum Pszczola", cena: 500, coIle: 500, ile: 0, interval: null },
    { nazwa: "Pronto Pszczola", cena: 1000, coIle: 100, ile: 0, interval: null },
    { nazwa: "Mistrzowska Pszczola", cena: 2000, coIle: 50, ile: 0, interval: null },
    { nazwa: "J.K - Bzykke", cena: 5000, coIle: 10, ile: 0, interval: null },
]
let upgrade = [
    { nazwa: "ModPszczola", cena: 2500, ile: 0 },
    { nazwa: "ModSPszczola", cena: 5000, ile: 0 },
    { nazwa: "ModSSJPszczola", cena: 7500, ile: 0 },
    { nazwa: "ModMPszczola", cena: 10000, ile: 0 },
    { nazwa: "ModPPszczola", cena: 15000, ile: 0 },
    { nazwa: "ModMSPszczola", cena: 20000, ile: 0 },
    { nazwa: "ModBzykke", cena: 50000, ile: 0 },

]

let clickCost = 5;
let clickValue = 1;

let p = document.querySelector('p');
function wyswietl() {
    let przechowaj = money;
    if (przechowaj >= 1e3 && przechowaj < 1e6) {
        p.textContent = (przechowaj / 1e3).toFixed(2) + " Thousand";
    } else if (przechowaj >= 1e6 && przechowaj < 1e9) {
        p.textContent = (przechowaj / 1e6).toFixed(2) + " Milion";
    } else if (przechowaj >= 1e9 && przechowaj < 1e12) {
        p.textContent = (przechowaj / 1e9).toFixed(2) + " Bilion";
    } else if (przechowaj >= 1e12 && przechowaj < 1e15) {
        p.textContent = (przechowaj / 1e12).toFixed(2) + " Trilion";
    } else if (przechowaj >= 1e15 && przechowaj < 1e18) {
        p.textContent = (przechowaj / 1e15).toFixed(2) + " Quadrilion";
    } else if (przechowaj >= 1e18 && przechowaj < 1e21) {
        p.textContent = (przechowaj / 1e18).toFixed(2) + " Pentilion";
    } else if (przechowaj >= 1e21 && przechowaj < 1e24) {
        p.textContent = (przechowaj / 1e21).toFixed(2) + " Sextilion";
    } else if (przechowaj >= 1e24 && przechowaj < 1e27) {
        p.textContent = (przechowaj / 1e24).toFixed(2) + " Septilion";
    } else if (przechowaj >= 1e27 && przechowaj < 1e30) {
        p.textContent = (przechowaj / 1e27).toFixed(2) + " Octilion";
    } else if (przechowaj >= 1e30 && przechowaj < 1e33) {
        p.textContent = (przechowaj / 1e30).toFixed(2) + " Nonilion";
    } else if (przechowaj >= 1e33) {
        p.textContent = (przechowaj / 1e33).toFixed(2) + " Decilion";
    } else {
        p.textContent = przechowaj;
    }
    Bps();
    let wskazanie = document.querySelector('.wskaznik');
    if (pszczoly[0].ile >= 10) {
        wskazanie.textContent = "Beecome a Beecker!"
    } if (pszczoly[1].ile >= 10) {
        wskazanie.textContent = "Just Bee Yourself!"
    } if (pszczoly[2].ile >= 10) {
        wskazanie.textContent = "Beefriend Me!"
    } if (pszczoly[3].ile >= 10) {
        wskazanie.textContent = "Are you Beesexual?"
    } if (pszczoly[4].ile >= 10) {
        wskazanie.textContent = "Bee Me, Me Bee"
    } if (pszczoly[5].ile >= 10) {
        wskazanie.textContent = "Bee My BeeMaster!"
    } if (pszczoly[6].ile >= 10) {
        wskazanie.textContent = "WOLNY BZYNEK!"
    }
}
function clicker() {
    money += clickValue;
    wyswietl();
}
function perClick() {
    if (money >= clickCost) {
        clickValue += 1;
        money -= clickCost;
        clickCost = clickValue * clickValue;
        wyswietl();
        let wskazanie2 = document.querySelector('.wskaznik2');
        wskazanie2.textContent = "Wartość kliknięcia:" + clickValue + " Cena:" + clickCost;
    }
}
let divs = document.querySelectorAll('.pszczola')
let divs2 = document.querySelectorAll('.upgrader')

for (let i = 0; i < pszczoly.length; i++) {
    let pszczola = pszczoly[i]
    divs[i].querySelector('button').addEventListener('click', () => {
        if (money >= pszczola.cena) {
            pszczola.ile += 1;
            money -= pszczola.cena;
            pszczola.cena = Math.round(pszczola.cena * 1.3)
            wyswietl();

            let p = divs[i].querySelector('p');
            p.textContent = "Ilość pszczół:" + pszczola.ile + " Cena pszczoły:" + pszczola.cena;
        }
    })

    pszczola.interval = setInterval(() => {
        money += pszczola.ile
        wyswietl()
    }, pszczola.coIle)
}
for (let i = 0; i < pszczoly.length; i++) {
    let upgrader = upgrade[i]
    const btn = divs2[i].querySelector('button')
    btn.addEventListener('click', () => {
        if (money >= upgrader.cena) {
            upgrader.ile += 1;

            if (upgrader.ile <= 1) {
                money -= upgrader.cena;
                pszczoly[i].coIle /= 2
                clearInterval(pszczoly[i].interval)
                pszczoly[i].interval = setInterval(() => {
                    money += pszczoly[i].ile
                    wyswietl()
                }, pszczoly[i].coIle)
            } else {
                if (!btn.wyczerpany) {
                    btn.querySelector('img').src = "Deny.png"
                    btn.wyczerpany = true
                }
            }

            wyswietl();
        }
    })
}
function Bps() {
    let Bps = 0;
    for (let i = 0; i < pszczoly.length; i++) {
        Bps += 1000 / pszczoly[i].coIle * pszczoly[i].ile
    }
    let wskazanie3 = document.querySelector('.wskaznik3');
    wskazanie3.textContent = "Bps: " + Bps;
}

