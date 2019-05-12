var btns = document.querySelectorAll('.btn');

btns.forEach((el) => {
    el.addEventListener('click', () => {
        console.log(el.innerHTML);
    })
}) 

