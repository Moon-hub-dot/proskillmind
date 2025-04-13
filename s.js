// Common JS
document.querySelectorAll('.watch-control, .controls a, .iphone-btn').forEach(control => {
    control.addEventListener('click', e => {
        e.preventDefault()
    })
})
// End of Common JS


function startQuickTest() {
    // Code to start Quick IQ Test
    alert("Quick IQ Test started!");
}

function startAdvancedTest() {
    // Code to start Advanced IQ Test
    alert("Advanced IQ Test started!");
}
