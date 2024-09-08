//suplier

document.getElementById('tambah-suplier').addEventListener("click", (e)=>{
    e.preventDefault();
    document.getElementById('add-suplier').style.display = "block";
})
document.getElementById('close-add-suplier').addEventListener("click", (e)=>{
    e.preventDefault();
    document.getElementById('add-suplier').style.display = "none";
})

function Ubahsuplier(id){
    document.querySelector('.modal-ubah-suplier').style.display = "block";
    const inputs = document.querySelectorAll('#form-ubah-suplier input')
    const values = document.querySelectorAll('tr[data-id="'+id+'"] td');

    inputs[2].value = values[0].textContent;
    inputs[3].value = values[1].textContent;
    

    document.querySelector("#save-ubah").addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector("#form-ubah-suplier").action = "/edit_suplier/" + id;
        document.querySelector("#form-ubah-suplier").submit();
    })
}
document.getElementById('close-ubah-suplier').addEventListener("click", (e)=>{
    e.preventDefault();
    document.querySelector('.modal-ubah-suplier').style.display = "none";
})