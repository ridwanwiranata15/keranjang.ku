//transaksi

document.getElementById('tambah-transaksi').addEventListener("click", (e)=>{
    e.preventDefault();
    document.getElementById('add-transaksi').style.display = "block";
})
document.getElementById('close-add-transaksi').addEventListener("click", (e)=>{
    e.preventDefault();
    document.getElementById('add-transaksi').style.display = "none";
})

function UbahTransaksi(id){
    document.querySelector('.modal-ubah-transaksi').style.display = "block";
    const inputs = document.querySelectorAll('#form-ubah-transaksi input')
    const values = document.querySelectorAll('tr[data-id="'+id+'"] td');
    inputs[2].value = values[0].textContent;
    inputs[3].value = values[2].textContent;
    inputs[4].value = values[3].textContent;
    inputs[5].value = values[4].textContent;

    document.querySelector("#save-ubah").addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector("#form-ubah-transaksi").action = "/edit_transaksi/" + id;
        document.querySelector("#form-ubah-transaksi").submit();
    })
}
document.getElementById('close-ubah-transaksi').addEventListener("click", (e)=>{
    e.preventDefault();
    document.querySelector('.modal-ubah-transaksi').style.display = "none";
})