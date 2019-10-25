
function beeanimate() {
    const div = document.querySelector('.beebutton')
    if(div.classList.contains("beeanimation")) {
        div.classList.remove("beeanimation")
    }
    setTimeout(() => {
        div.classList.add("beeanimation")
    }, 1)
}
