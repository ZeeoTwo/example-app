


// document.getElementById("reply").addEventListener("click", (event) => {
//     console.log(event.target.value);
// });

const buttons = document.querySelectorAll('.reply');
console.log(buttons);

const input = document.getElementById('parent');

buttons.forEach(button => {
    button.addEventListener('click', event => {
        input.value = event.target.value;
        // console.log(event.target.value);
    });
});

input.value = '';