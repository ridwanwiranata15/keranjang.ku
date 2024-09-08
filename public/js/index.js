document.getElementById('tambah-barang').addEventListener("click", (e)=>{
    e.preventDefault();
    document.getElementById('add-barang').style.display = "block";
})
document.getElementById('close-add-barang').addEventListener("click", (e)=>{
    e.preventDefault();
    document.getElementById('add-barang').style.display = "none";
})

function UbahBarang(id){
    document.querySelector('.modal-ubah-barang').style.display = "block";
    const inputs = document.querySelectorAll('#form-ubah-barang input')
    const values = document.querySelectorAll('tr[data-id="'+id+'"] td');
    inputs[2].value = values[0].textContent;
    inputs[3].value = values[1].textContent;
    inputs[4].value = values[2].textContent;
    inputs[5].value = values[3].textContent;
    document.querySelector("#save-ubah").addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector("#form-ubah-barang").action = "/edit_barang/" + id;
        document.querySelector("#form-ubah-barang").submit();
    })
}
document.getElementById('close-ubah-barang').addEventListener("click", (e)=>{
    e.preventDefault();
    document.querySelector('.modal-ubah-barang').style.display = "none";
})

