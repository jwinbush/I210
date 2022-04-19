let menu = document.querySelector('.menu-icon');
let navbar = document.querySelector('.menu');

menu.onclick = () => {
    navbar.classList.toggle('active')
    menu.classList.toggle('move');
    bell.classList.remove('active');

}

let bell = document.querySelector('.notification');

document.querySelector('#bell-icon').onclick = () => {
    bell.classList.toggle('active');
}

//Swiper//
var swiper = new Swiper(".trending-content", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        1068: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});

function confirm_deletion(id) {
    buttons = "<div style='color:red; font-size:small'> Are you sure you wanted to delete the book?<br><br>";
    buttons += "<input type='button' onclick=window.location.href='deletebook.php?id=" + id + "' value='  Delete  ' >";
    buttons += " <input type='button' onclick='cancel_deletion(" + id + ")' value='  Cancel  ' ></div>";

    document.getElementById("delete-buttons").innerHTML = buttons;
}

function cancel_deletion(id) {
    buttons = "<div><input type='button' value='  Delete Item  ' onclick='confirm_deletion(" + id + ")'></div>";
    document.getElementById("delete-buttons").innerHTML = buttons;
}
