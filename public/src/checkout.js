var modal = document.getElementById('modal')


document.getElementById('modalClose').addEventListener('click', (e) => {
    e.preventDefault()

    window.location = 'index.php'
})

window.onclick = function(event) {
    if (event.target == modal) {
        window.location = 'index.php'
    }
  }