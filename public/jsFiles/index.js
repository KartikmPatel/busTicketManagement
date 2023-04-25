const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click',function(){
        allSideMenu.forEach(i=>{
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

//toggle sidebar
const menuBar = document.querySelector('#content nav .bx.bx-menu');

const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click',function(){
    sidebar.classList.toggle('hide');
})

if(window.innerWidth < 768)
{
    sidebar.classList.add('hide');
}
    const searchButton = document.querySelector('#content nav form .form-input button');
    const searchForm = document.querySelector('#content nav form');

    searchButton.addEventListener('click',function(e){
        if(window.innerWidth<576){
        e.preventDefault();
        searchForm.classList.toggle('show');
        }
    })
